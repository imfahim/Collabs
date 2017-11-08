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
            Contest id :
            {{ $contest->id }}
            <br />
            Kora hoinai
        </div>
      </div>

    </div>
  </div>
@endsection
