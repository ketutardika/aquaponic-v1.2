@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
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
      
      @forelse ($sensordevices as $sensordevice)
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">{{$sensordevice->device_name}}</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 id="SensorValue-{{$sensordevice->id}}" class="mb-2" style="display: inline-block;">0</h3><span id="SensorMeasure-{{$sensordevice->id}}"> C</span>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">Last Update : 
                    <span id="SensorCheck-{{$sensordevice->id}}"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <h6 class="card-title mb-0 text-center">Sensor Device Data Not Available</h6>
      @endforelse
      
    </div>
  </div>
</div> <!-- row -->

<div class="row">
<div class="row mt-2">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Real-Time Data </h6>
        <div class="flot-chart-wrapper">
          <div class="flot-chart" id="flotRealTime"></div>
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
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.flot.js') }}"></script>
  <!-- @foreach ($sensordevices as $sensordevice)
  <script>
  $(document).ready(function() {
  var lastId = 0; //Set id to 0 so you will get all records on page load.
  var request = function () {
  jQuery.ajax({
      type:'GET',
      url: "/data/{{$sensordevice->id}}/live",
      data: { id: lastId }, //Add request data
      success: function (data) {
        $('#SensorValue-{{$sensordevice->id}}').text(data.value);
        $('#SensorMeasure-{{$sensordevice->id}}').text(' '+data.measurement);
        $('#SensorCheck-{{$sensordevice->id}}').text(data.update);
      }
  });
  };
  setInterval(request, 2000);
  });
  </script>
  @endforeach -->
@endpush