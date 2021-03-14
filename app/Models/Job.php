<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

     public $job_type_array = array('Full Time', 'Part Time');

     public $job_experience_array = array('Junior', 'Mid', 'Senior');
}
