<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{

    protected $fillable = [
        'name', 'location', 'size', 'plz', 'website', 'email', 'telnr', 'street', 'businessName'


    ];
    //
}
