<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'fish_id', 'width', 'height', 'condition', 'notes','created_at', 'updated_at',
    ];
}
