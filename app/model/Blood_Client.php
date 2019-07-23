<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Blood_Client extends Model 
{

    protected $table = 'blood_client';
    public $timestamps = true;
    protected $fillable = array('client_id', 'blood_id');

}