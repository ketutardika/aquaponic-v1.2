@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Farm Section</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Farm Section</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Farm Section Edit</h6>

        <form class="forms-sample" action="{{ route('farm-section.update', $farmsections->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Farm Section Name</label>
            <input type="text" name="section_name" value="{{ old('section_name', $farmsections->section_name) }}" class="form-control @error('section_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Farm Section Name">
          </div>
          <!-- error message untuk title -->
            @error('section_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <div class="mb-3">
            <label for="ProjectType" class="form-label">Farm Section Type</label>
            <select class="form-select" id="FarmType" name="section_type" >
              <option selected="" disabled="">Select Farm Section Type</option>
              <option value="NFT" {{ $farmsections->section_type == "NFT" ? 'selected':'' }}>NFT</option>
              <option value="Dutch Bucket" {{ $farmsections->section_type == "Dutch Bucket" ? 'selected':'' }}>Dutch Bucket</option>
              <option value="Fish House" {{ $farmsections->section_type == "Fish House" ? 'selected':'' }}>Fish House</option>
              <option value="Micro Green" {{ $farmsections->section_type == "Micro Green" ? 'selected':'' }}>Micro Green</option>

            </select>
            @error('section_type')
              <p class="mb-3">
                  {{ $message }}
              </p>
            @enderror
          </div>

          <select name="sensor_devices[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
               @foreach ($allsensors as $allsensor)
                <option value="{{ $allsensor->id}}" @foreach ($sensors as $sensor) @if($allsensor->id==$sensor->id)selected="selected" @endif @endforeach>
                  {{ $allsensor->device_name }}
                </option>
                @endforeach
          </select>

          <!-- <select name="sensor_devices[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
               @foreach ($allsensors as $allsensor)
                <option value="{{ $allsensor->id}}" 
                  @foreach ($farmsections->sensordevicefarms()->get() as $sensordevicefarm)
                    @if($allsensor->id==$sensordevicefarm->id)selected="selected" 
                    @endif 
                   @endforeach>
                  {{ $allsensor->device_name }}
                </option>
                @endforeach
          </select> -->


          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Farm Section Description</label>
            <textarea name="section_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('section_description', $farmsections->section_description) }}</textarea>
          </div>
          <!-- error message untuk title -->
            @error('section_description')
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
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush


@push('custom-scripts')
  <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush