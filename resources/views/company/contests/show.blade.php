@extends ('company.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('contests.index') }}"><button type="button" class="btn btn-outline-dark">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Contest Details :</strong>
            </p>
            <p>{{ $contest->title }}</p>
            <p>{{ $contest->description }}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <p class="lead">
            <strong>Participants :</strong>
          </p>
          <table class="table table-striped table-dark" data-form="deleteForm">
            <thead>
              <tr>
                <th scope="col">Teams</th>
                <th scope="col">Projects</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">xxxxxx</th>
                  <td>xxxx</td>
                  <td>xxxxx</td>
                  <td>
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group" role="group" aria-label="First group">
                        <a href="#" class="btn btn-sm btn-outline-success" role="button">Declare Winner</a>
                        <a href="#" class="btn btn-sm btn-outline-danger" role="button">Reject</a>
                      </div>
                    </div>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
@endsection
