<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('body', 'title', 'order_id');

    public function client()
    {
        return $this->belongsToMany('App\model\Client');
    }

    public function order()
    {
        return $this->belongsTo('App\model\Order');
    }

}