<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\model\City');
    }
    public function clients()
    {
        return $this->belongsToMany('App\model\Client');
    }

}