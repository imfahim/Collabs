@extends ('company.layouts.options')

@section('title', ' | Contests - Company Invite')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('contests.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="col-md-12">
            <h3 class="text-muted">Request Information</h3>
          </div>
          <div class="col-md-6">
            <div class="col-md-12">
              <form method="POST" action="{{ route('companies.find.by.name') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Search By Name or Email</label>
                  <input type="text" class="form-control" id="name" placeholder="Please enter possible matching name to search..." name="name" value="" required />
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-info">Search</button>
                </div>
              </form>
            </div>
              <form method="POST" action="{{ route('company.request.invite') }}">
                {{ csrf_field() }}
                <input type="hidden" name="contest_id" value="{{ $contest_id }}" />
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description">Request Message (Optional)</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Write about the contest you want to create with the other companies and a short message to the company..." name="message">{{ old('message') }}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">Search Results</div>
                  <div class="panel-body fixed-panel">
                    @if($companies)
                      @foreach ($companies as $company)
                        <div class="search-info">
                          <label><input type="checkbox" name="companies[]" value="{{ $company->id }}">&nbsp; {{ $company->name }} -- {{ $company->email }}</label>
                           <div class="pull-right">
                             <a href="{{ route('profileof.view', [$company->id]) }}"><i class="fa fa-eye"></i></a>
                           </div>
                        </div>
                        <br />
                      @endforeach
                    @else
                      <div class="search-info">
                        No Companies found yet !
                      </div>
                    @endif
                  </div>
                </div>
                <br />
                <div class="pull-right">
                  <input type="submit" class="btn btn-success" value="Send" />
                </div>
                <br /><br />
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-scripts')

@endsection
