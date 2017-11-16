@extends ('company.layouts.options')

@section('title', ' | Contests - Create')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('contests.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('contests.store') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="title" value="{{ old('title') }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="description">{{ old('description') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="col-xs-3 control-label">Starts On</label>
                    <div class="col-xs-5 date">
                        <div class="input-group input-append date" id="start_dateRangePicker">
                            <input type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" />
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="col-md-6">
                <label class="col-xs-3 control-label">Ends On</label>
                <div class="col-xs-5 date">
                    <div class="input-group input-append date" id="end_dateRangePicker">
                        <input type="text" class="form-control" name="end_date" value="{{ old('end_date') }}" />
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
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
  </div>
@endsection

@section('page-scripts')
  <script>
  $(document).ready(function() {
      $('#start_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
      $('#end_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/2010',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
  });
  </script>
@endsection
