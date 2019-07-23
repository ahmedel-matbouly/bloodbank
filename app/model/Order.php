<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name','client_id', 'age', 'blood_id', 'number_bogs', 'hospital_name', 'hospital_address', 'phone_number', 'notes', 'citie_id', 'latitude', 'longitude');

    public function blood()
    {
        return $this->belongsTo('App\model\Blood');
    }

    public function client()
    {
        return $this->belongsTo('App\model\Client');
    }

    public function city()
    {
        return $this->belongsTo('App\model\City','citie_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\model\Notification');
    }

}