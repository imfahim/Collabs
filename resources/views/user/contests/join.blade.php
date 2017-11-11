@extends ('user.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('user.contests.index') }}"><button type="button" class="btn btn-outline-dark">Back</button></a>
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
          <form method="POST" action="{{ route('user.contests.participate') }}">
            {{ csrf_field() }}
            <input type="hidden" name="contest_id" value="{{ $contest_id }}" />
            <input type="hidden" name="team_id" value="{{ $team_id }}" />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="team">Select Your Project</label>
                  <select class="form-control" name="project_id" data-toggle="popover" title="Note" data-content="Please, Register for that project only which has complete information and demo details about that project to be approved easily.">
                      <option value="0"></option>
                    @foreach ($projects as $project)
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="about">Write about the project (Max 200 words)</label>
                  <textarea class="form-control" id="about" rows="3" placeholder="Write about the project." name="about" required></textarea>
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
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
@endsection
