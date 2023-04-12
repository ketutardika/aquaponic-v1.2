@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Farm Block</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Farm Block</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Farm Block Edit</h6>

        <form class="forms-sample" action="{{ route('farm-block.update', $farmblocks->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Farm Block Name</label>
            <input type="text" name="block_name" value="{{ old('block_name', $farmblocks->block_name) }}" class="form-control @error('block_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Farm Block Name">
          </div>
          <!-- error message untuk title -->
            @error('block_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror

            <div class="mb-3">
            <label for="SectionID" class="form-label">Section Farm</label>
            <select class="form-select" id="SectionID" name="farm_section">
                @ @foreach ($farmsections as $farmsection)
                <option value ="{{$farmsection->id}}" <?php if($farmsection->id==$farmblocks->section_id) echo "selected"; ?>>{{$farmsection->section_name}}</option>
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
            <textarea name="block_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('block_description', $farmblocks->block_description) }}</textarea>
          </div>
          <!-- error message untuk title -->
            @error('block_description')
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