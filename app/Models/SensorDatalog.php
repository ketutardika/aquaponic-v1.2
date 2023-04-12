<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorDatalog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'device_id',
        'data_reading',
        'data_measurement',
    ];

    public function sensordevices()
    {
        return $this->hasMany(SensorDevice::class);
    }
}
