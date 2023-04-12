@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Task List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Tasklist</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Tasklist</h6>

        <form class="forms-sample" action="{{ route('tasklist.update', $tasklists->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Task List Name</label>
            <input type="text" name="tasklist_name" value="{{ old('tasklist_name', $tasklists->tasklist_name) }}" class="form-control @error('tasklist_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Tasklist Name">
            <!-- error message untuk title -->
            @error('farm_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="row">
          <div class="col-md-6">

          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Interval</label>
            <input type="text" name="interval_value" value="{{ old('interval_value', $tasklists->interval_value) }}" class="form-control @error('interval_value') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Interval">
            <!-- error message untuk title -->
            @error('interval_value')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          </div>

          <div class="col-md-6">          
          <div class="mb-3">
            <label for="IntervalType" class="form-label">Interval Type</label>
            <select class="form-select" id="IntervalType" name="interval_date" >
                  <option value="Daily" {{ $tasklists->interval_date == "Daily" ? 'selected':'' }}>Daily</option>
                  <option value="Weekly" {{ $tasklists->interval_date == "Weekly" ? 'selected':'' }}>Weekly</option>
            </select>
            @error('interval_date')
              <p class="mb-3">
                  {{ $message }}
              </p>
            @enderror
          </div>
          </div>

          </div>

          <div class="row">

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Start Date</label>
            <div class="input-group date datepicker" id="datePickerExample">
            <input type="text" name="start_date" value="{{ old('start_date', $tasklists->start_date) }}" class="form-control @error('start_date') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Start Date"><span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
            </div>
            <!-- error message untuk title -->
            @error('start_date')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">End Date</label>
            <div class="input-group date datepicker" id="datePickerExample2">
            <input type="text" name="end_date" value="{{ old('end_date', $tasklists->end_date) }}" class="form-control @error('end_date') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="End Date"><span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
            </div>
            <!-- error message untuk title -->
            @error('end_date')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          </div>
          
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Tasklist Description</label>
            <textarea name="tasklist_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('tasklist_description', $tasklists->tasklist_description) }}</textarea>
            <!-- error message untuk title -->
            @error('tasklist_description')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>


          <button type="submit" class="btn btn-primary me-2">Update</button>
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
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
