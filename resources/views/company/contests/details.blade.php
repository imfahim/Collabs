@extends ('company.layouts.options')

@section('title', ' | Contest - Details')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('browse.contests') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>Contest Details :</strong>
              </p>
              <p class="lead">{{ $contest->title }}</p>
              <p>{{ $contest->description }}</p>
              <p>Starts On : {{ $contest->start_on }}</p>
              <p>Ends On : {{ $contest->close_on }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Other Organizing Companies
          </div>
          <div class="panel-body fixed-panel">
            <div class="search-info">
              <label>&nbsp; Created By : {{ $owner->name }} ( {{ $owner->email }} )</label>
               <div class="pull-right">
                 <a href="{{ route('profileof.view', [$owner->id]) }}"><i class="fa fa-eye"></i></a>
               </div>
            </div>
            <hr />
            @if($companies)
              @foreach ($companies as $company)
                <div class="search-info">
                  <label>&nbsp; {{ $company->name }} ( {{ $company->email }} )</label>
                   <div class="pull-right">
                     <a href="{{ route('profileof.view', [$company->id]) }}"><i class="fa fa-eye"></i></a>
                   </div>
                </div>
                <br />
              @endforeach
            @else
              <div class="search-info">
                No Other Companies found yet !
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
