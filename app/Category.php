<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "Category";
    public function newstype()
    {
    	return $this->hasMany('App\NewsType','idCategory','id');
    }
    public function news()
    {
    	return $this->hasManyThrough('App\News','App\NewsType','idCategory','idNewsType','id');
    }
}
