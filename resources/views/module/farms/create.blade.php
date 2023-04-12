@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Farm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Data Farm</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Farm Input</h6>

        <form class="forms-sample" action="{{ route('farms.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Farm Name</label>
            <input type="text" name="farm_name" value="{{ old('farm_name') }}" class="form-control @error('farm_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Farm Name">
          </div>
          <!-- error message untuk title -->
            @error('farm_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          <div class="mb-3">
            <label for="ProjectType" class="form-label">Farm Type</label>
            <select class="form-select" id="FarmType" name="farm_type" >
              <option selected="" disabled="">Select Farm Type</option>
              <option value="Aquaponic">Aquaponic</option>
              <option value="Hidroponic">Hidroponic</option>
            </select>
            @error('farm_type')
              <p class="mb-3">
                  {{ $message }}
              </p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Farm Description</label>
            <textarea name="farm_description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
          </div>
          <!-- error message untuk title -->
            @error('farm_description')
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
