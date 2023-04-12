@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sensor Device</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Data Sensor Auto</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Sensor Device Input</h6>

        @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

        <form class="forms-sample" action="{{ route('sensor-device-auto.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Sensor Device ID</label>
            <input type="text" name="device_id" value="{{ old('device_id',$unique_id) }}" class="form-control @error('device_id') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Device ID" readonly>
          </div>
          <!-- error message untuk title -->
            @error('device_id')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Sensor Device Name</label>
            <input type="text" name="device_name" value="{{ old('device_name') }}" class="form-control @error('device_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Device Name">
          </div>
          <!-- error message untuk title -->
            @error('device_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <div class="mb-3">
            <label for="SensorType" class="form-label">Sensor Device Type</label>
            <select class="form-select" id="SensorType" name="type_id">
                @foreach ($sensortypes as $sensortype)
                <option value ="{{$sensortype->id}}"> {{$sensortype->sensor_type_name }} ( {{$sensortype->sensor_type_code }} )</option>
                @endforeach
            </select>
            @error('type_id')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Sensor Device Notes</label>
            <textarea name="device_notes" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
          </div>
          <!-- error message untuk title -->
            @error('device_notes')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <button type="submit" class="btn btn-primary me-2">Save</button>
          <button class="btn btn-secondary">Cancel</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
