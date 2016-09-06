<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'lat', 'long', 'locatoin', 'start_date' , 'end_date'];

    public function stands()
    {
        return $this->hasMany('App\Stand');
    }
}
