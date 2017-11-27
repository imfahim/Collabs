@extends ('company.layouts.options')

@section('title', ' | Contests - Invitations')

@section('content')
<div class="container-fluid">
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Received Invitations</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sent Invitations</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
          <div class="col-md-12">
            <h3 class="text-muted">Received Invitations</h3>
          </div>
          <div class="card-body">
            @if($data_rec_has)
              @foreach ($received_invitations as $invitation)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    {{ $invitation['contest'][0]['title'] }}
                    <form method="POST" action="{{ route('company.invitations.reject') }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $invitation['id'] }}" />
                      <button type="submit" class="btn btn-sm btn-danger pull-right">Decline</button>
                    </form>
                    <form method="POST" action="{{ route('company.invitations.accept') }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $invitation['id'] }}" />
                      <button type="submit" class="btn btn-sm btn-warning pull-right">Accept</button>
                    </form>
                  </div>
                  <div class="panel-body">
                    <label>From : {{ $invitation['user_name'] }}</label><br>
                    <label>Contest Description :</label> {{ $invitation['contest'][0]['description'] }} <br />
                    <label>Contest Starting Date :</label> {{ $invitation['contest'][0]['start_on'] }} <br />
                    <label>Contest Closing Data :</label> {{ $invitation['contest'][0]['close_on'] }} <br />
                    <label>Message:</label>
                    {{ $invitation['message'] }}
                  </div>
                </div>
              @endforeach
            @else
              No Invitations Received Yet !
            @endif
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
          <div class="col-md-12">
            <h3 class="text-muted">Sent Invitations</h3>
          </div>
          <div class="card-body">
            @if($data_sent_has)
              @foreach ($sent_inviations as $invitation)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    {{ $invitation['contest'][0]['title'] }}
                    @if($invitation['status'] === 0)
                      <label class="pull-right" style="color:gold;">pending</label>
                    @elseif($invitation['status'] === 1)
                      <label class="pull-right" style="color:green;">Accepted</label>
                    @else
                      <label class="pull-right" style="color:red;">Declined</label>
                    @endif
                  </div>
                  <div class="panel-body">
                    <label>To : {{ $invitation['company_name'] }}</label><br>
                    <label>Contest Description :</label> {{ $invitation['contest'][0]['description'] }} <br />
                    <label>Message:</label>
                    {{ $invitation['message'] }}
                  </div>
                </div>
              @endforeach
            @else
              No Invitations Sent Yet !
            @endif
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
@endsection
