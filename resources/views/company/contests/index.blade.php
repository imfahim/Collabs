@extends ('company.layouts.options')

@section('title', ' | Contests')

@section('content')
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="pull-left">
          <a href="{{ route('company.invitations.list') }}"><button type="button" class="btn btn-warning">Contests Invitations ({{ $count_invitations }})</button></a>
        </div>
        <div class="pull-right">
          <a href="{{ route('contests.create') }}"><button type="button" class="btn btn-primary">Create New</button></a>
        </div>
      </div>
    </div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">My Contests</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Joined Contests</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              @if ($contests)
                <table class="table table-striped" data-form="deleteForm">
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
                            <div class="btn-group">
                              <a href="{{ route('contests.show', [$contest->id]) }}" class="btn btn-sm btn-success" role="button">Review</a>
                              <a href="{{ route('contests.edit', [$contest->id]) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                            </td>
                              <td><form class="form-delete" method="POST" action="{{ route('contests.destroy', [$contest->id]) }}">
            										{{ csrf_field() }}
            										<input type="hidden" name="_method" value="delete" />
            										<input type="hidden" name="id" value="{{ $contest->id }}" />
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
              @if ($joined_contests)
                <table class="table table-striped" data-form="deleteForm">
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
                    @foreach ($joined_contests as $joined_contest)
                      <tr>
                        <th scope="row">{{ $joined_contest->title }}</th>
                        <td>{{ $joined_contest->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($joined_contest->start_on)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($joined_contest->close_on)->format('d/m/Y') }}</td>
                        <td>{{ ($joined_contest->status) ? 'Closed' : 'Opened' }}</td>
                        <td>
                            <div class="btn-group">
                              <a href="{{ route('contests.show', [$joined_contest->id]) }}" class="btn btn-sm btn-success" role="button">Review</a>
                              <a href="{{ route('contests.edit', [$joined_contest->id]) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                            </td>
                              <td><form class="form-delete" method="POST" action="{{ route('contests.destroy', [$joined_contest->id]) }}">
            										{{ csrf_field() }}
            										<input type="hidden" name="_method" value="delete" />
            										<input type="hidden" name="id" value="{{ $joined_contest->id }}" />
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
