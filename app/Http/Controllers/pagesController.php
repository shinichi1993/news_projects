<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Slide;
use App\NewsType;
use App\News;

class pagesController extends Controller
{
	//共通情報を呼び出す
	function __construct(){
		$category = Category::all();
		$slide = Slide::all();
		view()->share('category',$category);
		view()->share('slide',$slide);
	}
    //ホームページを呼び出す
    function home(){
    	return view('pages.home');
    }
    //問い合わせページを呼び出す
    function contact(){
    	return view('pages.contact');
    }
    //ニュースの種類を呼び出す
    function newstype($id){
    	$newstype = NewsType::find($id);
    	$news = News::where('idNewsType',$id)->paginate(5);
    	return view('pages.newstype',['newstype'=>$newstype,'news'=>$news]);
    }
    //詳細ニュース
    function news($id){
    	$news = News::find($id);
    	$hightlight = News::where('Hightlight',1)->take(4)->get();
    	$relativeNews = News::where('idNewsType',$news->idNewsType)->take(4)->get();
    	return view('pages.news',['news'=>$news,'hightlight'=>$hightlight,'relativeNews'=>$relativeNews]);
    }
    function search(Request $request){
        $keyword = $request->keyword;
        $news = News::where('Tittle','like',"%$keyword%")->orWhere('Summary','like',"%$keyword%")->orWhere('Content','like',"%$keyword%")->take(50)->paginate(5);
        return view('pages.search',['news'=>$news,'keyword'=>$keyword]);
    }
}
