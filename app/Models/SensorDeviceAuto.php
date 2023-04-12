<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SensorDeviceAuto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'device_id',
        'device_name',
        'device_notes',
        'device_last_value',
        'device_last_check',
        'device_status',
        'device_api_key',
        'type_id',
        'farm_id',
        'user_id'
    ];
}
