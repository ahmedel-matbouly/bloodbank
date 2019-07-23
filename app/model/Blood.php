<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model 
{

    protected $table = 'bloods';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
   {
       return $this->belongsToMany('App\model\Client','client_id');
   }

   public function orders()
   {
       return $this->hasMany('App\model\Order');
   }

   public function client()
   {
       return $this->hasMany('App\model\Client','client_id');
   }


 

  

}