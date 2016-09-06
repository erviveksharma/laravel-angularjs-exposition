<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $fillable =["code","price","real_image","event_id"];

    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}
