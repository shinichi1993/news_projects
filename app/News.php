<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "News";
    public function newstype()
    {
    	return $this->belongsTo('App\NewsType','idNewsType','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\Comment','idNews','id');
    }
}
