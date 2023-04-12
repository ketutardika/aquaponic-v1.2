@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Crops</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Data Crops</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Data Crops</h6>

                <form class="forms-sample" action="{{ route('crops.update', $crops->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Crops Name</label>
                                <input type="text" name="crop_name" value="{{ old('crop_name', $crops->crop_name) }}" class="form-control @error('crop_name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Crops Name">
                                <!-- error message untuk title -->
                                @error('crop_name')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">How Many Plants</label>
                                <input type="text" name="qty_plant" value="{{ old('qty_plant', $crops->qty_plant) }}" class="form-control @error('qty_plant') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="How Many Plants">
                                <!-- error message untuk title -->
                                @error('qty_plant')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="BlockID" class="form-label">Section Farm</label>
                                <select class="form-select" id="BlockID" name="farm_block">
                                    @ @foreach ($farmblocks as $farmblock)
                                    <option value="{{$farmblock->id}}" <?php if($farmblock->id==$crops->block_id) echo "selected"; ?>>{{$farmblock->block_name}}</option>
                                    @endforeach
                                </select>
                                @error('block_id')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Crops Description</label>
                        <textarea name="crop_description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('crop_description',$crops->crop_description) }}</textarea>
                        <!-- error message untuk title -->
                        @error('crop_description')
                        <p class="mb-3">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Day Min Air Temp (°C)</label>
                                <input type="number" name="day_min_air_temperature" value="{{ old('day_min_air_temperature', $crops->day_min_air_temperature) }}" class="form-control @error('day_min_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Day Min Air Temp (°C)">
                                <!-- error message untuk title -->
                                @error('day_min_air_temperature')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Day Max Air Temp (°C)</label>
                                <input type="number" name="day_max_air_temperature" value="{{ old('day_max_air_temperature', $crops->day_max_air_temperature) }}" class="form-control @error('day_max_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Day Max Air Temp (°C)">
                                <!-- error message untuk title -->
                                @error('day_max_air_temperature')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Night Min Air Temp (°C)</label>
                                <input type="number" name="night_min_air_temperature" value="{{ old('night_min_air_temperature', $crops->night_min_air_temperature) }}" class="form-control @error('night_min_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Night Air Temp (°C)">
                                <!-- error message untuk title -->
                                @error('night_min_air_temperature')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Night Max Air Temp (°C)</label>
                                <input type="number" name="night_max_air_temperature" value="{{ old('night_max_air_temperature', $crops->night_max_air_temperature) }}" class="form-control @error('night_max_air_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Night Max Air Temp (°C)">
                                <!-- error message untuk title -->
                                @error('night_max_air_temperature')
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
                                <label for="exampleInputUsername1" class="form-label">Min Humidity (%)</label>
                                <input type="number" name="min_humidity" value="{{ old('min_humidity', $crops->min_humidity) }}" class="form-control @error('min_humidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Humidity (%)">
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
                                <input type="number" name="max_humidity" value="{{ old('max_humidity', $crops->max_humidity) }}" class="form-control @error('max_humidity') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Humidity (%)">
                                <!-- error message untuk title -->
                                @error('max_humidity')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Min Water Temp</label>
                                <input type="number" name="min_water_temperature" value="{{ old('min_water_temperature', $crops->min_water_temperature) }}" class="form-control @error('min_water_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Water Temp (°C)">
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
                                <label for="exampleInputUsername1" class="form-label">Max Water Temp</label>
                                <input type="number" name="max_water_temperature" value="{{ old('max_water_temperature', $crops->max_water_temperature) }}" class="form-control @error('max_water_temperature') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Water Temp (°C)">
                                <!-- error message untuk title -->
                                @error('max_water_temperature')
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
                                <label for="exampleInputUsername1" class="form-label">Min Ph (ph)</label>
                                <input type="number" name="min_ph" value="{{ old('min_ph', $crops->min_ph) }}" class="form-control @error('min_ph') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Ph (ph)">
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
                                <input type="number" name="max_ph" value="{{ old('max_ph', $crops->max_ph) }}" class="form-control @error('max_ph') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Ph (ph)">
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

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Min Growing Time</label>
                                <input type="number" name="min_growing_time" value="{{ old('min_growing_time', $crops->min_growing_time) }}" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Min Growing Time">
                                <!-- error message untuk title -->
                                @error('min_growing_time')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Max Growing Time</label>
                                <input type="number" name="max_growing_time" value="{{ old('max_growing_time', $crops->max_growing_time) }}" class="form-control @error('max_growing_time') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Growing Time">
                                <!-- error message untuk title -->
                                @error('max_growing_time')
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
                                <input type="number" name="min_width" value="{{ old('min_width', $crops->min_width) }}" class="form-control @error('min_width') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Width (cm)">
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
                                <input type="number" name="max_width" value="{{ old('max_width', $crops->max_width) }}" class="form-control @error('max_width') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Width (cm)">
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
                                <input type="number" name="min_height" value="{{ old('min_height', $crops->min_height) }}" class="form-control @error('min_height') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Min Height (cm)">
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
                                <input type="number" name="max_height" value="{{ old('max_height', $crops->max_height) }}" class="form-control @error('max_height') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Max Height (cm)">
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
                                <input type="text" name="growing" value="{{ old('growing', $crops->growing) }}" class="form-control @error('growing') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Growing">
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
                                <input type="text" name="harvesting" value="{{ old('harvesting', $crops->harvesting) }}" class="form-control @error('harvesting') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Harvesting">
                                <!-- error message untuk title -->
                                @error('harvesting')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Nutrient Needs</label>
                                <input type="text" name="nutrient_needs" value="{{ old('nutrient_needs', $crops->nutrient_needs) }}" class="form-control @error('nutrient_needs') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Nutrient Needs">
                                <!-- error message untuk title -->
                                @error('nutrient_needs')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">High Risk</label>
                                <input type="text" name="high_risk" value="{{ old('high_risk', $crops->high_risk) }}" class="form-control @error('high_risk') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="High Risk">
                                <!-- error message untuk title -->
                                @error('high_risk')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Diseases</label>
                                <input type="text" name="disease" value="{{ old('disease', $crops->disease) }}" class="form-control @error('disease') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Disease">
                                <!-- error message untuk title -->
                                @error('disease')
                                <p class="mb-3">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                        <textarea name="summary" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('summary',$crops->summary) }}</textarea>
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
