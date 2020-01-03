<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    //
    protected $table = "NewsType";
    public function category()
    {
    	return $this->belongsTo('App\Category','idCategory','id');
    }
    public function news()
    {
    	return $this->hasMany('App\News','idNewsType','id');
    }
}
