<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SensorDevice extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'device_id',
        'device_name',
        'device_notes',
        'device_last_value',
        'device_last_check',
        'device_status',
        'device_active',
        'device_api_key',
        'type_id',
        'section_id',
        'farm_id',
        'user_id'
    ];

    public function farmsections()
    {
        return $this->belongsTo(FarmSection::class,'sensor_devices');
    }
    public function sensortypes()
    {
        return $this->belongsTo(SensorType::class);
    }
    public function crops()
    {
        return $this->belongsTo(Crop::class);
    }
    public function fishs()
    {
        return $this->belongsTo(Fish::class);
    }
    public function sensordatalogs()
    {
        return $this->belongsTo(SensorDatalog::class);
    }
    public function sensordatas()
    {
        return $this->hasMany(SensorDatalog::class, 'device_id');
    }
    public function sensorfarmdevices()
    {
        return $this->belongsToMany(FarmSection::class, 'sensor_device_farm','section_id','device_id');
    }
}
