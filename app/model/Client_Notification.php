<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Client_Notification extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('client_id', 'notification_id', 'is_read');

}