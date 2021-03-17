<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateCV extends Model
{
    use HasFactory;

     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'text',
        'cv_url',
    ];

    protected $table = 'created_cv';
}
