@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Fishs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Record Data {{ $fishs->fish_name }}</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Add Record Data {{ $fishs->fish_name }}</h6>

        <form class="forms-sample" action="{{ route('fishs.record_store', $fishs->id) }}" method="POST">
          @csrf
          <input type="hidden" name="fish_id" value="{{ old('fish_id', $fishs->id) }}" class="form-control">

          <div class="row">

            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label">Date:</label>
              <div class="input-group date datepicker" id="datePickerExample">
                <input type="text" name="date" class="form-control">
                <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
              </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label">Time :</label>
              <div class="input-group date timepicker" id="datetimepickerExample" data-target-input="nearest">
          <input type="text" name="time" class="form-control datetimepicker-input" data-target="#datetimepickerExample"/>
          <span class="input-group-text" data-target="#datetimepickerExample" data-toggle="datetimepicker"><i data-feather="clock"></i></span>
        </div>
              </div>
            </div>

          </div>

          <div class="row">

          <div class="col-md-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Width</label>
            <input type="number" name="width" value="{{ old('width') }}" class="form-control @error('width') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Width">
            <!-- error message untuk title -->
            @error('width')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Height</label>
            <input type="number" name="height" value="{{ old('height') }}" class="form-control @error('height') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Height">
            <!-- error message untuk title -->
            @error('max_ph')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Condition</label>
            <input type="text" name="condition" value="{{ old('condition') }}" class="form-control @error('condition') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Condition">
            <!-- error message untuk title -->
            @error('condition')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>


          </div>
          
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
            <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            <!-- error message untuk title -->
            @error('notes')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>            
          <button type="submit" class="btn btn-primary me-2">Add Record</button>
          <button class="btn btn-secondary">Cancel</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
  <script src="{{ asset('assets/js/timepicker.js') }}"></script>
@endpush