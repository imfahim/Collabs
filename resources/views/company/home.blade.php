@extends ('company.layouts.options')

@section('content')
Company Home
<div class="row">
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-user fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content dark-blue">
        <div class="circle-tile-description text-faded">Total Users</div>
        <div class="circle-tile-number text-faded ">{{ $users_count }}</div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="#"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content red">
        <div class="circle-tile-description text-faded"> Total Teams </div>
        <div class="circle-tile-number text-faded ">{{ $teams_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="#"><div class="circle-tile-heading green"><i class="fa fa-lightbulb-o fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content green">
        <div class="circle-tile-description text-faded"> Total Projects </div>
        <div class="circle-tile-number text-faded ">{{ $projects_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="#"><div class="circle-tile-heading orange"><i class="fa fa-trophy fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content orange">
        <div class="circle-tile-description text-faded"> Total Contests </div>
        <div class="circle-tile-number text-faded ">{{ $contests_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-sm-6">

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-area-chart"></i> Contest Engagements</div>
      <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
        <canvas id="myAreaChart" width="965" height="289" class="chartjs-render-monitor" style="display: block; width: 965px; height: 289px;"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
</div>
@endsection
