<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmSection extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'section_name', 'section_type','section_description','farm_id','sensor_devices','user_id'
    ];

    public function farmblocks()
    {
        return $this->hasMany(FarmSection::class, 'section_id');
    }
    public function farmblocksections()
    {
        return $this->hasManyThrough(Crop::class,FarmBlock::class,'section_id','block_id','id','id');
    }
    public function sensordevices()
    {
        return $this->hasMany(SensorDevice::class,'id');
    }
    public function crops()
    {
        return $this->hasOne(Crop::class, 'section_id');
    }
    public function fishs()
    {
        return $this->hasMany(Fish::class);
    }
    public function setCatAttribute($value)
    {
        $this->attributes['sensor_devices'] = json_encode($value);
    }
    public function getCatAttribute($value)
    {
        return $this->attributes['sensor_devices'] = json_decode($value);
    }
    public function sensordevicefarms()
    {
        return $this->belongsToMany(SensorDevice::class, 'sensor_device_farm','section_id','device_id');
    }
}
