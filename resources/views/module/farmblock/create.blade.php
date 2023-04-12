@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Farm Block</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Data Farm Block</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Farm Block Input</h6>

        <form class="forms-sample" action="{{ route('farm-block.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Farm Block Name</label>
            <input type="text" name="block_name" value="{{ old('block_name') }}" class="form-control @error('block_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Farm Block Name">
          </div>
          <!-- error message untuk title -->
            @error('block_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <div class="mb-3">
            <label for="FarmSection" class="form-label">Farm Section</label>
            <select class="form-select" id="FarmSection" name="farm_section" >
              <option selected="" disabled="">Select Farm Section</option>
              @foreach ($farmsections as $farmsection)
                  <option value ="{{$farmsection->id}}">{{$farmsection->section_name}}</option>
              @endforeach
            </select>
            @error('farm_section')
              <p class="mb-3">
                  {{ $message }}
              </p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Farm Block Description</label>
            <textarea name="block_description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
          </div>
          <!-- error message untuk title -->
            @error('block_description')
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
@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush


@push('custom-scripts')
  <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush