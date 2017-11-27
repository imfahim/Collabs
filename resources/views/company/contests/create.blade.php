@extends ('company.layouts.options')

@section('title', ' | Contests - Create')

@section('content')
  <div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Create a Request for Contest</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Create a Contest</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div id="search-info">
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
                        <button type="submit" class="btn btn-success">Search</button>
                      </div>
                    </form>
                  </div>
                <form method="POST" action="{{ route('contests.request') }}">
                  {{ csrf_field() }}
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
                               <a href="#"><i class="fa fa-eye"></i></a>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="contest-info">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="text-muted">Contest Information</h3>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="title" value="{{ old('title') }}" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="description">{{ old('description') }}</textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                          <label class="col-xs-3 control-label">Starts On</label>
                          <div class="col-xs-5 date">
                              <div class="input-group input-append date" id="start_asc_dateRangePicker">
                                  <input type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" />
                                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-xs-3 control-label">Ends On</label>
                      <div class="col-xs-5 date">
                          <div class="input-group input-append date" id="end_asc_dateRangePicker">
                              <input type="text" class="form-control" name="end_date" value="{{ old('end_date') }}" />
                              <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
              <form method="POST" action="{{ route('contests.store') }}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="title" value="{{ old('title') }}" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="description">{{ old('description') }}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="col-xs-3 control-label">Starts On</label>
                        <div class="col-xs-5 date">
                            <div class="input-group input-append date" id="start_dateRangePicker">
                                <input type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" />
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <label class="col-xs-3 control-label">Ends On</label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="end_dateRangePicker">
                            <input type="text" class="form-control" name="end_date" value="{{ old('end_date') }}" />
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-success">Create</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('page-scripts')
  <script>
  $('#myTab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  </script>
  <script>
  $(document).ready(function() {
      $('#start_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
      $('#end_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
      $('#start_asc_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
      $('#end_asc_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
  });
  </script>
@endsection
