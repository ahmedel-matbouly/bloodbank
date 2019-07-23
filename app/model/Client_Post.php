<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Client_Post extends Model 
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('favouites', 'client_id', 'post_id');

}