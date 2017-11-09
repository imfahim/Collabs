@extends ('company.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-right">
            <a href="{{ route('contests.create') }}"><button type="button" class="btn btn-outline-dark">Create New</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          @if ($contests)
            <table class="table table-striped table-dark" data-form="deleteForm">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Desciption</th>
                  <th scope="col">Starts From</th>
                  <th scope="col">Closing On</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contests as $contest)
                  <tr>
                    <th scope="row">{{ $contest->title }}</th>
                    <td>{{ $contest->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($contest->start_on)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($contest->close_on)->format('d/m/Y') }}</td>
                    <td>{{ ($contest->status) ? 'Closed' : 'Opened' }}</td>
                    <td>
                      <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                          <a href="{{ route('contests.show', [$contest->id]) }}" class="btn btn-sm btn-outline-success" role="button">Review</a>
                          <a href="{{ route('contests.edit', [$contest->id]) }}" class="btn btn-sm btn-outline-warning" role="button">Edit</a>
                          <form class="form-delete" method="POST" action="{{ route('contests.destroy', [$contest->id]) }}">
        										{{ csrf_field() }}
        										<input type="hidden" name="_method" value="delete" />
        										<input type="hidden" name="id" value="{{ $contest->id }}" />
        										<input type="submit" class="btn btn-sm btn-outline-danger" role="button" value="Delete"/>
        									</form>
                        </div>
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
