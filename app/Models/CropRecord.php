<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_id', 'color', 'width', 'height', 'condition', 'notes','created_at', 'updated_at',
    ];
}
