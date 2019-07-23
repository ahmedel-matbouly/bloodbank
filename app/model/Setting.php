<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about_us', 'facebook_url', 'twitter_url', 'youtube_url', 'instagram_url', 'whatsapp_url', 'google_url');

}