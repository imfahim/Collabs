@extends ('user.layouts.options')

@section('title', ' | Projects')

@section('content')
  <div class="container-fluid">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">My Projects</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Joined Projects</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
                <a href="{{ route('projects.create') }}"><button type="button" class="btn btn-primary">Create New</button></a>
              <a href="{{ route('project.requests') }}"><button type="button" class="btn btn-warning pull-right">Project Requests</button></a>
            </div>
          </div>
          <div class="card">
            <div class="col-md-12">
              <h3 class="text-muted">My Projects</h3>
            </div>
            <div class="card-body">
              @if ($projects)
                <table class="table table-striped" data-form="deleteForm">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Details</th>
                      <th scope="col">Managed By</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($projects as $project)
                      <tr>
                        <th scope="row">{{ $project->name }}</th>
                        <td>{{ $project->details }}</td>
                        <td>{{ 'Team '.$project->team->name }}</td>
                        <td>{{ ($project->status) ? 'Development Phase' : 'Finished' }}</td>
                        <td>
                            <div class="btn-group">
                              <a href="{{ route('projects.show', [$project->id]) }}" class="btn btn-sm btn-info" role="button">Show</a>
                              <a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                            </td>
                              <td><form class="form-delete" method="POST" action="{{ route('projects.destroy', [$project->id]) }}">
            										{{ csrf_field() }}
            										<input type="hidden" name="_method" value="delete" />
            										<input type="hidden" name="id" value="{{ $project->id }}" />
            										<input type="submit" class="btn btn-sm btn-danger" role="button" value="Delete"/>
            									</form>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @else
                No Content's Yet, Please Add a new entity.
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
                <a href="{{ route('projects.create') }}"><button type="button" class="btn btn-primary">Create New</button></a>
              <a href="{{ route('project.requests') }}"><button type="button" class="btn btn-warning pull-right">Project Requests</button></a>
            </div>
          </div>
          <div class="card">
            <div class="col-md-12">
              <h3 class="text-muted">Joined Projects</h3>
            </div>
            <div class="card-body">
              <!-- snippet.txt -Line-1 -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


























  <!-- Confirmation Modal Box -->
  @include('components.modal')
@endsection

@section('page-scripts')
<script>
// For Deletion Confirmation Modal
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});
</script>
<script>
$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
});
</script>
@endsection
