@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
  </div>
</div> -->

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      
      @foreach ($sensordevices as $sensordevice)
      <div class="col-md-4 grid-margin stretch-card device-{{$sensordevice->id}}">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">{{$sensordevice->device_name}}</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{$sensordevice->device_last_value}} {{$sensordevice->device_measurement}}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="ordersChart-{{$sensordevice->id}}" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Fish Feeder</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2 text-led-{{ $sensorAutoDevices->id }}">
                    @if($sensorAutoDevices->device_last_value==1) ON @else OFF @endif
                </h3>
                <div class="form-check form-switch">
                  <input data-id="{{ $sensorAutoDevices->id }}" class="toggle-class form-check-input" type="checkbox" role="switch" id="fishFeeder-btn" {{ $sensorAutoDevices->device_last_value ? 'checked' : '' }}>
                  <label class="form-check-label" for="fishFeeder-btn">Feeder</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      
    </div>
  </div>
</div> <!-- row -->

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
  <div class="row align-items-start">
    <div id="live_container_1" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
  <div class="row align-items-start">
    <div id="live_container_2" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
  <div class="row align-items-start">
    <div id="live_container_3" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
  <div class="row align-items-start">
    <div id="live_container_5" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
  <div class="row align-items-start">
    <div id="live_container_6" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  </script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/highcharts-more.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  @foreach ($sensordevices as $sensordevice)
  <script>
  $(document).ready(function() {
   // Orders Chart
  if($('#ordersChart-{{$sensordevice->id}}').length) {
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
    };
    var fontFamily = "'Roboto', Helvetica, sans-serif";
    var options2 = {
      chart: {
        type: "bar",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 2,
          columnWidth: "60%"
        }
      },
      colors: [colors.primary],
      series: [{
        name: '',
        data: [
        @foreach($sensordevice->sensordatas()->latest()->limit(5)->get() as $sensordata)
                {{$sensordata->data_reading}},
        @endforeach
        ]
      }],
      xaxis: {
        type: 'time',
        categories: [
          @foreach($sensordevice->sensordatas()->latest()->limit(5)->get() as $sensordata)
                "{{ date('M d Y H:i:s', strtotime($sensordata->updated_at)) }}",
          @endforeach
        ],
      },
    };
    new ApexCharts(document.querySelector("#ordersChart-{{$sensordevice->id}}"),options2).render();
  }
  });
  </script>
  @endforeach
  <!-- HighCharts -->
  <script type="text/javascript">

    //
    // Config
    //
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    //
    // LIVE CHART
    //

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_1',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/data-live/1/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;
                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 10000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Temperature Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value}°C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        },],

        series: [{
          name: 'Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          data: [],
          yAxis: 0,
        },]
      });
    });

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_2',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/data-live/2/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;
                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 10000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Humidity Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Humidity',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value} %',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' %'
          }

        },],
 
        series: [{
          name: 'Humidity',
          type: 'spline',
          tooltip: {
            valueSuffix: ' %'
          },
          data: [],
          yAxis: 0,
        },]
      });
    });

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_3',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/data-live/5/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;
                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 10000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'TDS Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'TDS',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value} ppm',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' ppm'
          }

        },],
        series: [{
          name: 'TDS',
          type: 'spline',
          tooltip: {
            valueSuffix: ' ppm'
          },
          data: [],
          yAxis: 0,
        },]
      });
    });

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_5',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/data-live/7/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;
                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 10000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Water Temperature Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Water Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value} °C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        },],
        series: [{
          name: 'Water Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          data: [],
          yAxis: 0,
        },]
      });
    });

        $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_6',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/data-live/8/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;
                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 10000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Water PH Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Water PH',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value} ph',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' ph'
          }

        },],
        series: [{
          name: 'Water PH',
          type: 'spline',
          tooltip: {
            valueSuffix: ' ph'
          },
          data: [],
          yAxis: 0,
        },]
      });
    });
  </script>
  <script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var ex_id = $(this).data('id'); 

        if ( ex_id==4 ){
            if ($(this).prop('checked')== true  ) {
              $('.text-led-4').text("ON");
            } 
            else{
              $('.text-led-4').text("OFF");
            }
         }

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/sensor-device-auto/'+ ex_id +'/'+status,
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endpush