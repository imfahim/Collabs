@extends ('user.layouts.options')

@section('styles')
  <!-- Form Validation Parsley  -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/parsley.css') }}" />
@endsection

@section('content')
  <div class="row">

    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h4>Ongoing Contests</h4>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          @if ($contests)
            @foreach ($contests as $contest)
              <div class="card text-center">
                <div class="card-header">

                </div>
                  @if($contest->status === 0)
                    <div class="card-body">
                      <h4 class="card-title">{{ $contest->title }}</h4>
                      <p class="card-text">{{ $contest->description }}</p>
                      <hr />
                      <form method="POST" action="{{ route('user.contests.join') }}" data-parsley-validate="">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $contest->id }}" />
                          <div class="pull-left">
                            <div class="form-group form-inline">
                              <label class="control-label">Select Your Team</label>
                              <span>&nbsp; &nbsp;</span>
                              <select class="form-control" style='font-size: 10px;' name="team" required="">
                                  <option value=""></option>
                                @foreach ($teams as $team)
                                  <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="pull-right">
                            <input type="submit" class="btn btn-success" value="Participate"/>
                          </div>
                        </form>
                      </div>
                      <div class="card-footer text-muted">
                        <div class="pull-left">
                          Starts From : {{ $contest->start_on }}
                        </div>
                        <div class="pull-right">
                          Ends On : {{ $contest->close_on }}
                        </div>
                      </div>
                  @endif
              </div>
              <br />
            @endforeach
          @else
            <div class="card text-center">
              <div class="card-header">

              </div>
              <div class="card-body">
                <h4 class="card-title">Currently no contests are available !</h4>
                <p class="card-text">Contests are launched by the companies to promote a fair of collaboration.</p>
              </div>
              <div class="card-footer text-muted">

              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h4>Joined Contests</h4>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          @if ($has_data)
            @foreach ($joined_contests as $data)
              <div class="card" style="width: 50rem;">
                <div class="card-body">
                  <div class="pull-left">
                    <h6 class="card-subtitle mb-2 text-muted">Participated Team : {{ $data['team_name'] }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Submitted Project : {{ $data['project_name'] }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Status :
                      @if($data['status'] === 1)
                        <span class="label label-success">Winner</span></h6>
                      @elseif($data['status'] === 2)
                        <span class="label label-danger">Rejected</span></h6>
                      @else
                        <span class="label label-warning">On Review</span></h6>
                      @endif
                    <p class="card-text"><strong>{{ $data['contest_name'] }}</strong></p>
                  </div>
                  <div class="pull-right">
                    <form method="POST" action="{{ route('user.contests.cancel') }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="delete" />
                      <input type="hidden" name="id" value="{{ $data['id'] }}" />
                      <input type="submit" class="btn btn-sm btn-danger" value="Cancel Participation" />
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            You have not participating any contests yet !
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection
