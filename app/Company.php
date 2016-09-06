<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_admin_email', 'logo', 'email', 'phone', 'address', 'stand_id','documents' ];
}
