<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SettingGeneral extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'general_title',
        'general_tagline',
        'general_description',
        'general_email',
        'general_phone',
        'general_theme',
        'general_logo',
        'general_favicon',
        'general_language',
        'general_timezone',
        'general_date_format',
        'general_time_format',
    ];
}
            