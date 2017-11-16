@extends ('user.layouts.options')

@section('styles')
  <!-- Form Validation Parsley  -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/parsley.css') }}" />
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('user.contests.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <h4>Participants Form</h4>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('user.contests.participate') }}" data-parsley-validate="">
            {{ csrf_field() }}
            <input type="hidden" name="contest_id" value="{{ $contest_id }}" />
            <input type="hidden" name="team_id" value="{{ $team_id }}" />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="team">Select Your Project</label>
                  <select class="form-control" style='font-size: 10px;' name="project_id" data-toggle="popover" title="Note" data-content="Please, Register for that project only which has complete information and demo details about that project to be approved easily." required="">
                      <option value=""></option>
                    @foreach ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="about">Write any comments (Max 200 words)</label>
                  <textarea class="form-control" id="about" rows="3" placeholder="Write about the project." name="about"></textarea>
                </div>
              </div>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-scripts')
<script src="{{ asset('js/parsley.min.js') }}"></script>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
@endsection
