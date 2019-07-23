<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');

    public function categories()
    {
        return $this->hasMany('App\model\Post');
    }

}