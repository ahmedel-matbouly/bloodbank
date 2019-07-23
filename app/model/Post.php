<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'body', 'img', 'category_id');
    protected $appeands=['is_favourite'];

    public function category()
    {
        return $this->belongsTo('App\model\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\model\Client');
    }
 
 
    public function getIsFavouriteAttribute ()
    {
        if(auth('api')->user()){
            $id=auth('api')->user()->id;
            $client=Client::find($id);
            $postsids=$client->posts()->pluck('post_id')->toArray();
            if(in_array($this->id, $postsids)){
           return $value=true;
            }
            else{
                return $value=false;
            }
            
        }
    }
}