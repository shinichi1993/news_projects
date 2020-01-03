<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class commentController extends Controller
{
    //
    public function getDelete($id,$idNews){
    	$comment = Comment::find($id);
    	$comment->delete();
    	return redirect('admin/news/edit/'.$idNews)->with('notice','コメント削除できました');
    }
    //
    public function postComment(Request $request,$id){
    	$idNews = $id;
    	$comment = new Comment;
    	$comment->idNews = $idNews;
    	$comment->Content = $request->Content;
    	$comment->save();
    	return redirect("news/$id")->with('notice','コメント追加できました');
    }
}
