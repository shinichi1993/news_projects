<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "Comment";
    public function news()
    {
    	return $this->belongsTo('App\News','idNews','id');
    }
}
