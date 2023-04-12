@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sensor Type</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Data Sensor Type</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Sensor Type Input</h6>

        <form class="forms-sample" action="{{ route('sensor-type.store') }}" method="POST">
          @csrf
          <div class="row">
          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Sensor Type Name</label>
            <input type="text" name="sensor_type_name" value="{{ old('sensor_type_name') }}" class="form-control @error('sensor_type_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Type Name">
          </div>          
          <!-- error message untuk title -->
            @error('sensor_type_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Sensor Type Code</label>
            <input type="text" name="sensor_type_code" value="{{ old('sensor_type_code') }}" class="form-control @error('sensor_type_code') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Type Code">
          </div>
          <!-- error message untuk title -->
            @error('sensor_type_code')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>

          </div>

          <div class="row">
          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Measurement</label>
            <input type="text" name="sensor_type_measurement" value="{{ old('sensor_type_measurement') }}" class="form-control @error('sensor_type_measurement') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Type Measurement">
          </div>
          <!-- error message untuk title -->
            @error('sensor_type_measurement')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Measurement Code</label>
            <input type="text" name="sensor_type_measurement_code" value="{{ old('sensor_type_measurement_code') }}" class="form-control @error('sensor_type_measurement_code') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Sensor Type Measurement Code">
          </div>
          <!-- error message untuk title -->
            @error('sensor_type_measurement_code')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>

          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Sensor Type Description</label>
            <textarea name="sensor_type_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('sensor_type_description') }}</textarea>
          </div>
          <!-- error message untuk title -->
            @error('sensor_type_description')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-secondary">Cancel</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
