@extends ('user.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-right">
            <a href="{{ route('projects.create') }}"><button type="button" class="btn btn-primary">Create New</button></a>
          </div>
        </div>
      </div>
      <div class="card">
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
@endsection
