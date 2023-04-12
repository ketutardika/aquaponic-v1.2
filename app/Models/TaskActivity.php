<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskActivity extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'activity_name',
        'activity_description',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
