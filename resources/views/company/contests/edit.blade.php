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
          <form method="POST" action="{{ route('contests.update', [$contest->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" value="{{ $contest->id }}" />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="title" value="{{ $contest->title }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="description">{{ $contest->description }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group label-floating">
                      <label class="control-label">Starts On</label>
                      <div class="col-md-4">
                        <div class="col-md-8">
                      <select class="form-control" name="start_day">
                        @for ($i = 1; $i < 32; $i++)
                            <option value="{{$i}}" {{ ($i == $dates['start_day']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                        @endfor
                      </select>
                      </div>
                      <div class="col-md-2">
                      <h4>/</h4>
                      </div>
                      </div>
                      <div class="col-md-4">
                        <div class="col-md-8">
                          <select class="form-control" name="start_month">
                            @for ($i = 1; $i < 13; $i++)
                                <option value="{{$i}}" {{ ($i == $dates['start_month']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                            @endfor
                          </select>
                        </div>
                        <div class="col-md-2">
                          <h4>/</h4>
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="col-md-8">
                      <select class="form-control" name="start_year">
                        @for ($i = 2018; $i > 2010; $i--)
                            <option value="{{$i}}" {{ ($i == $dates['start_year']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                        @endfor
                      </select>
                      </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group label-floating">
                      <label class="control-label">Ends On</label>
                      <div class="col-md-4">
                        <div class="col-md-8">
                      <select class="form-control" name="end_day">
                        @for ($i = 1; $i < 32; $i++)
                            <option value="{{$i}}" {{ ($i == $dates['end_day']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                        @endfor
                      </select>
                      </div>
                      <div class="col-md-2">
                      <h4>/</h4>
                      </div>
                      </div>
                      <div class="col-md-4">
                      <div class="col-md-8">
                      <select class="form-control" name="end_month">
                        @for ($i = 1; $i < 13; $i++)
                            <option value="{{$i}}" {{ ($i == $dates['end_month']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                        @endfor
                      </select>
                      </div>
                      <div class="col-md-2">
                      <h4>/</h4>
                      </div>
                      </div>
                      <div class="col-md-4">
                      <div class="col-md-8">
                      <select class="form-control" name="end_year">
                        @for ($i = 2018; $i > 2010; $i--)
                            <option value="{{$i}}" {{ ($i == $dates['end_year']) ? ' selected="selected"' : '' }}>{{$i}}</option>
                        @endfor
                      </select>
                      </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group label-floating">
                      <label class="control-label">Status</label>
                      <select name="status" class="form-control">
                        <option value="1" {{ ($contest->status === 1) ? 'selected' : '' }}>Closed</option>
                        <option value="0" {{ ($contest->status === 0) ? 'selected' : '' }}>Opened</option>
                      </select>
                  </div>
              </div>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
