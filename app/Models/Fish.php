<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Fish extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'fish_name', 'fish_description', 'qty_fish', 'average_weight','habitat','growth_weeks','harvest_weight','daily_feeding_rate','section_id','min_air_temperature','max_air_temperature','min_humidity','max_humidity','min_turbidity','max_turbidity','min_tds','max_tds','min_water_temperature','max_water_temperature','min_ph','max_ph','min_width','max_width','min_height','max_height','min_fcr','max_fcr','min_protein','max_protein','min_dissolved_oxygen','max_dissolved_oxygen','growing','harvesting','summary','user_id',
    ];
    public function farmsections()
    {
        return $this->belongsTo(FarmSection::class, 'section_id');
    }
    public function sensordevices()
    {
        return $this->hasMany(SensorDevice::class);
    }
    
}
