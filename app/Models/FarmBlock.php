<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmBlock extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'section_id', 'block_name','block_description','user_id'
    ];

    public function farmsections()
    {
        return $this->belongsTo(FarmSection::class, 'section_id');
    }

    public function crops()
    {
        return $this->hasOne(Crop::class, 'block_id');
    }
}