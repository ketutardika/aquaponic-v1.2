<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Crop extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'crop_name', 'crop_description', 'qty_plant', 'block_id', 'section_name', 'summary',
        'growing', 'harvesting', 'day_min_air_temperature', 'day_max_air_temperature',
        'night_min_air_temperature', 'night_max_air_temperature',
        'min_humidity', 'max_humidity', 'min_water_temperature',
        'max_water_temperature', 'min_ph', 'max_ph', 'min_growing_time',
        'max_growing_time', 'min_width', 'max_width', 'min_height',
        'max_height', 'nutrient_needs', 'high_risk', 'disease', 'user_id'
    ];

    public function farmblocks()
    {
        return $this->belongsTo(FarmBlock::class, 'block_id');
    }
    public function section()
    {
        return $this->hasManyThrough(
            FarmSection::class,
            FarmBlock::class,
            'id', // Foreign key on crops table
            'id', // Foreign key on blocks table
            'block_id', // Local key on crops table
            'section_id' // Local key on blocks table
        );
    }
    public function farmsections()
    {
        return $this->belongsTo(FarmSection::class, 'section_id');
    }
    public function sensordevices()
    {
        return $this->hasMany(SensorDevice::class);
    }
}
