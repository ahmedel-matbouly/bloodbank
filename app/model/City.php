<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\model\Governorate');
    }

    public function orders()
    {
        return $this->hasMany('App\model\Order');
    }

    public function clients()
    {
        return $this->hasMany('App\model\Client');
    }

}