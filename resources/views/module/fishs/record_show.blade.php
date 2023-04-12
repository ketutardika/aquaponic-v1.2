@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Fishs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chart Data {{ $fishs->fish_name}}</li>
  </ol>
</nav>

<div class="row">
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Record Data {{ $fishs->fish_name}}</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <a href="{{ route('fishs.record_export', $fishs->id ) }}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Export Record Data
    </a>
  </div>
</div>
</div>

<div class="row">
  <div class="col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <canvas id="chartjsLine"  class="table"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Update at</th>
                @foreach ($allsensors as $allsensor)
                        @foreach ($farmsections->sensordevicefarms()->get() as $sensordevicefarm)
                            @if($allsensor->id==$sensordevicefarm->id)
                            <th>{{ $allsensor->device_name }}</th>
                            @endif 
                         @endforeach
                @endforeach
              </tr>
            </thead>
            <tbody>                
                  <?php $i=1; ?>
                  @forelse ($datas as $sensordata)
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>{{ $sensordata->updated_at }}</td>
                    <?php 
                      if(in_array($sensordata->device1,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub1, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device2,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub2, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device3,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub3, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device4,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub4, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device5,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub5, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device6,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub6, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device7,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub7, 2, '.', ',')."</td>";
                      if(in_array($sensordata->device8,$sensorsactive))
                      echo "<td>".number_format($sensordata->Sub8, 2, '.', ',')."</td>";
                    ?>
                  </tr>
                <?php $i++; ?>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="5">Fishs Data Not Available</td>
                </tr>                
                @endforelse
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script>
    'use strict';


  var colors = {
    primary        : "#6571ff",
    secondary      : "#7987a1",
    success        : "#05a34a",
    info           : "#66d1d1",
    warning        : "#fbbc06",
    danger         : "#ff3366",
    light          : "#e9ecef",
    dark           : "#060c17",
    muted          : "#7987a1",
    gridBorder     : "rgba(77, 138, 240, .15)",
    bodyColor      : "#000",
    cardBg         : "#fff"
  }

  var fontFamily = "'Roboto', Helvetica, sans-serif"

   // Line Chart
   var timeFormat = 'DD/MM/YYYY';
   var ms = Date.now();
  if($('#chartjsLine').length) {
    new Chart($('#chartjsLine'), {
      type: 'line',
      data:    {
            datasets: [
                @foreach ($allsensors as $allsensor)                   
                @foreach (json_decode($farmsections->sensor_devices) as $sensor_device)
                @if($allsensor->id==$sensor_device)                          
                {
                    label: "{{ $allsensor->device_name }}",
                    data: [
                    @foreach ($dataghraps as $sensordata)  
                    <?php if($allsensor->id==1) { ?>
                    {
                        <?php if(in_array($sensordata->device1,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub1 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==2) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub2 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==3) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub3 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==4) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub4 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==5) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub5 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==6) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub6 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==7) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub7 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    <?php if($allsensor->id==8) { ?>
                    {
                        <?php if(in_array($sensordata->device2,$sensorsactive)) { ?>
                        x: "{{ $sensordata->updated_at }}", y: {{ $sensordata->Sub8 }}
                        <?php } ?>
                    },
                    <?php } ?>
                    @endforeach
                    ],
                    fill: false,
                    backgroundColor:
                    <?php if($allsensor->id==1) { ?>
                    colors.primary
                    <?php } ?>
                    <?php if($allsensor->id==2) { ?>
                    colors.success
                    <?php } ?>
                    <?php if($allsensor->id==3) { ?>
                    colors.info
                    <?php } ?>
                    <?php if($allsensor->id==4) { ?>
                    colors.warning
                    <?php } ?>
                    <?php if($allsensor->id==5) { ?>
                    colors.danger
                    <?php } ?>
                    <?php if($allsensor->id==6) { ?>
                    colors.light
                    <?php } ?>
                    <?php if($allsensor->id==7) { ?>
                    colors.dark 
                    <?php } ?>
                    <?php if($allsensor->id==8) { ?>
                    colors.muted
                    <?php } ?>,
                    borderColor:
                    <?php if($allsensor->id==1) { ?>
                    colors.primary
                    <?php } ?>
                    <?php if($allsensor->id==2) { ?>
                    colors.success
                    <?php } ?>
                    <?php if($allsensor->id==3) { ?>
                    colors.info
                    <?php } ?>
                    <?php if($allsensor->id==4) { ?>
                    colors.warning
                    <?php } ?>
                    <?php if($allsensor->id==5) { ?>
                    colors.danger
                    <?php } ?>
                    <?php if($allsensor->id==6) { ?>
                    colors.light
                    <?php } ?>
                    <?php if($allsensor->id==7) { ?>
                    colors.dark 
                    <?php } ?>
                    <?php if($allsensor->id==8) { ?>
                    colors.muted
                    <?php } ?>
                },
                @endif
                @endforeach
                @endforeach                
            ]
        },
      options: {
        responsive: true,
        maintainAspectRatio: false,
            title:      {
                display: true,
                text:    "Chart.js Time Scale"
            },
        scales:     {
                xAxes: [{
                    type:       "time",
                    time:       {
                        format: timeFormat,
                        tooltipFormat: 'll'
                    },
                    scaleLabel: {
                        display:     true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display:     true,
                        labelString: 'value'
                    }
                }]
            }
      }
    });
  }
  </script>
@endpush