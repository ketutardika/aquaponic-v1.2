<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskList extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tasklist_name', 'tasklist_description','interval_value','interval_date','start_date','end_date'
    ];

     /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];
}