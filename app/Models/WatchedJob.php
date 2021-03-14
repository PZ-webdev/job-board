<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedJob extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'jobs_id',
        'selection',
    ];
}
