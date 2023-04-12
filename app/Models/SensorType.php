<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SensorType extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sensor_type_name',
        'sensor_type_code',
        'sensor_type_measurement',
        'sensor_type_measurement_code',
        'sensor_type_description',
        'user_id'
    ];
    public function sensordevices()
    {
        return $this->hasMany(SensorDevice::class);
    }
    
}
