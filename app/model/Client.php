<?php

namespace App\model;


use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name','password', 'email', 'birth_date', 'blood_id', 'phone_number','api_token', 'last_date', 'citie_id');

    public function notification()
    {
        return $this->belongsToMany('App\model\Notification');
    }

    public function bloodtypes()
    {
        return $this->belongsToMany('App\model\Blood');
    }

   
    public function posts()
    {
        return $this->belongsToMany('App\model\Post');
    }

   
    public function governorates()
    {
        return $this->belongsToMany('App\model\Governorate');
    }
    public function tokens()
    {
        return $this->hasMany('App\model\Token');
    }

   
    

    


    public function notifications()
   {
       return $this->belongsToMany('App\model\Notification');
   }

   

   public function orders()
   {
       return $this->hasMany('App\model\Order');
   }

   public function blood()
   {
       return $this->belongsTo('App\model\Blood');
   }

 

   public function city()
   {
       return $this->belongsTo('App\model\City');
   }



   

   protected $hidden =['password','api_token'];
  

}