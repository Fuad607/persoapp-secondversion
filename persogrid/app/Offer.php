<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'jobtitel', 'location', 'date', 'workload', 'branche', 'experience', 'education', 'degree', 'softskills', 'socialskills'


    ];
}

