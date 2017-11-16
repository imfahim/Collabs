@extends ('user.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('projects.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('projects.store') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="title" placeholder="Name will be shown in the project page." name="name" value="{{ old('name') }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Details</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the project." name="details">{{ old('details') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description">Github Link</label>
                  <input type="text" class="form-control" id="github" placeholder="Insert the github link o your project here" name="github" value="{{ old('github') }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description">Demo Youtube Link</label>
                  <input type="text" class="form-control" id="youtube" placeholder="If you have any youtube demo link, enter the link here" name="youtube" value="{{ old('github') }}">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">Under Which Team</label>
                      <select class="form-control" style='font-size: 10px;' name="team">
                        @foreach ($teams as $team)
                          <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                      </select>
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
@endsection
