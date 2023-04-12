@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Fishs</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Fishs</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Data Fish Input</h6>

        <form class="forms-sample" action="{{ route('fishs.update', $fishs->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
          
          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Fish Name</label>
            <input type="text" name="fish_name" value="{{ old('fish_name', $fishs->fish_name) }}" class="form-control @error('fish_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Fish Name">
            <!-- error message untuk title -->
            @error('fish_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div>
          </div>

          <div class="col-md-6">       
          <div class="mb-3">
            <label for="SectionID" class="form-label">Section Farm</label>
            <select class="form-select" id="SectionID" name="section_id">
                @ @foreach ($farmsections as $farmsection)
                <option value ="{{$farmsection->id}}" <?php if($farmsection->id==$fishs->section_id) echo "selected"; ?>>{{$farmsection->section_name}}</option>
                @endforeach
            </select>
            @error('section_id')
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
            <label for="exampleInputUsername1" class="form-label">How Many Fishs</label>
            <input type="text" name="qty_fish" value="{{ old('qty_fish', $fishs->qty_fish) }}" class="form-control @error('qty_fish') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="How Many Fishs">
            <!-- error message untuk title -->
            @error('qty_fish')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Average Fish Weight</label>
            <input type="text" name="average_weight" value="{{ old('average_weight', $fishs->average_weight) }}" class="form-control @error('average_weight') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Average Weight">
            <!-- error message untuk title -->
            @error('average_weight')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          </div>

          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fish Description</label>
            <textarea name="fish_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('fish_description',$fishs->fish_description) }}</textarea>
            <!-- error message untuk title -->
            @error('fish_description')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 

          <div class="row">
          
          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Air Temperature (°C)</label>
            <input type="number" name="min_air_temperature" value="{{ old('min_air_temperature', $fishs->min_air_temperature) }}" class="form-control @error('min_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Air Temp (°C)">
            <!-- error message untuk title -->
            @error('min_air_temperature')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Air Temperature (°C)</label>
            <input type="number" name="max_air_temperature" value="{{ old('max_air_temperature', $fishs->max_air_temperature) }}" class="form-control @error('max_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Air Temp (°C)">
            <!-- error message untuk title -->
            @error('max_air_temperature')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Humidity (%)</label>
            <input type="number" name="min_humidity" value="{{ old('min_humidity', $fishs->min_humidity) }}" class="form-control @error('min_humidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Humidity (%)">
            <!-- error message untuk title -->
            @error('min_humidity')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Humidity (%)</label>
            <input type="number" name="max_humidity" value="{{ old('max_humidity', $fishs->max_humidity) }}" class="form-control @error('max_humidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Humidity (%)">
            <!-- error message untuk title -->
            @error('max_humidity')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          </div>

          <div class="row">
          
          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Turbidity (NTU)</label>
            <input type="number" name="min_turbidity" value="{{ old('min_turbidity', $fishs->min_turbidity) }}" class="form-control @error('min_turbidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Turbidity (NTU)">
            <!-- error message untuk title -->
            @error('min_turbidity')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Turbidity (NTU)</label>
            <input type="number" name="max_turbidity" value="{{ old('max_turbidity', $fishs->max_turbidity) }}" class="form-control @error('max_turbidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Turbidity (NTU)">
            <!-- error message untuk title -->
            @error('max_turbidity')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min TDS (ppm)</label>
            <input type="number" name="min_tds" value="{{ old('min_tds', $fishs->min_tds) }}" class="form-control @error('min_tds') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min TDS (ppm)">
            <!-- error message untuk title -->
            @error('min_tds')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max TDS (ppm)</label>
            <input type="number" name="max_tds" value="{{ old('max_tds', $fishs->max_tds) }}" class="form-control @error('max_tds') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max TDS (ppm)">
            <!-- error message untuk title -->
            @error('max_tds')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          </div>


          <div class="row">

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Water Temperature (°C)</label>
            <input type="number" name="min_water_temperature" value="{{ old('min_water_temperature', $fishs->min_water_temperature) }}" class="form-control @error('min_water_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Water Temp (°C)">
            <!-- error message untuk title -->
            @error('min_water_temperature')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Water Temperature (°C)</label>
            <input type="number" name="max_water_temperature" value="{{ old('max_water_temperature', $fishs->max_water_temperature) }}" class="form-control @error('max_water_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Water Temp (°C)">
            <!-- error message untuk title -->
            @error('max_water_temperature')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>
          
          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Ph (ph)</label>
            <input type="number" name="min_ph" value="{{ old('min_ph', $fishs->min_ph) }}" class="form-control @error('min_ph') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Ph (ph)">
            <!-- error message untuk title -->
            @error('min_ph')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Ph (ph)</label>
            <input type="number" name="max_ph" value="{{ old('max_ph', $fishs->max_ph) }}" class="form-control @error('max_ph') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Ph (ph)">
            <!-- error message untuk title -->
            @error('max_ph')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          </div>

          <div class="row">
          
          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Width (cm)</label>
            <input type="number" name="min_width" value="{{ old('min_width', $fishs->min_width) }}" class="form-control @error('min_width') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Width (cm)">
            <!-- error message untuk title -->
            @error('min_width')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Width (cm)</label>
            <input type="number" name="max_width" value="{{ old('max_width', $fishs->max_width) }}" class="form-control @error('max_width') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Width (cm)">
            <!-- error message untuk title -->
            @error('max_width')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Min Height (cm)</label>
            <input type="number" name="min_height" value="{{ old('min_height', $fishs->min_height) }}" class="form-control @error('min_height') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Height (cm)">
            <!-- error message untuk title -->
            @error('min_height')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-3">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Max Height (cm)</label>
            <input type="number" name="max_height" value="{{ old('max_height', $fishs->max_height) }}" class="form-control @error('max_height') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Height (cm)">
            <!-- error message untuk title -->
            @error('max_height')
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
            <label for="exampleInputUsername1" class="form-label">Growing</label>
            <input type="text" name="growing" value="{{ old('growing', $fishs->growing) }}" class="form-control @error('Growing') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Growing">
            <!-- error message untuk title -->
            @error('growing')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          <div class="col-md-6">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Harvesting</label>
            <input type="text" name="harvesting" value="{{ old('harvesting', $fishs->harvesting) }}" class="form-control @error('harvesting') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Harvesting">
            <!-- error message untuk title -->
            @error('harvesting')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
          </div> 
          </div>

          </div>
          
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
            <textarea name="summary" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('fish_description',$fishs->summary) }}</textarea>
            <!-- error message untuk title -->
            @error('summary')
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
