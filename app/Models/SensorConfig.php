<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SensorConfig extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'device_id',
        'min_value',
        'max_value',
        'read_sensor_time',
        'send_sensor_time',
        'deepsleep_time',
    ];
}
