<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\News;
use App\Category;
use App\NewsType;
use App\Comment;

class newsController extends Controller
{
    //カテゴリーリスト画面を呼び出す
    public function getList(){
    	$news = News::orderby('id','desc')->get();
    	return view('admin.news.list',['news'=>$news]);
    }
    //カテゴリ―追加画面を呼び出す
    public function getAdd(){
    	$category = Category::all();
    	$newstype = NewsType::all();
    	return view('admin.news.add',['category'=>$category,'newstype'=>$newstype]);
    }
    //データベースに値を追加
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'Category'=>'required',
                'Tittle'=>'required|min:3|unique:News,Tittle',
                'Summary'=>'required',
                'Content'=>'required'
            ],
            [
                'Category.required'=>'カテゴリーは必須です',
                'Tittle.required'=>'タイトルは必須です',
                'Tittle.min'=>'タイトルは３文字から入力してください',
                'Tittle.unique'=>'タイトルが存在しました',
                'Summary.required'=>'サマリーは必須です',
                'Content.required'=>'内容は必須です'
            ]);
        $news = new News;
        $news->Tittle = $request->Tittle;
        $news->idNewsType = $request->NewsType;
        $news->Summary = $request->Summary;
        $news->Content = $request->Content;
        $news->Views = 0;
        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            //
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != "jpeg")
            {
                return redirect('admin/news/add')->with('img_error','イメージファイルしかアップロードできません');
            }
            $fileName = $file->getClientOriginalName();
            //ランダムファイルネームを作成
            $newFileName = Str::random(4)."_".$fileName;
            //新ファイルネームが存在したら統一しないまでもう一回ランダム
            while(file_exists("upload/news/".$newFileName))
            {
                $newFileName = Str::random(4)."_".$fileName;
            }
            $file->move("upload/news",$newFileName);
            $news->Image = $newFileName;
        }
        else
        {
            $news->Image = "";
        }
        $news->save();
        return redirect('admin/news/add')->with('notice','追加できました');
    }
    //編集画面を呼び出す
    public function getEdit($id){
        $category = Category::all();
        $newstype = NewsType::all();
        $news = News::find($id);
        return view('admin.news.edit',['news'=>$news,'category'=>$category,'newstype'=>$newstype]);
    }
    //編集した後データベースに保存
    public function postEdit(Request $request, $id){
        $news = News::find($id);
        $this->validate($request,
            [
                'Category'=>'required',
                'Tittle'=>'required|min:3|unique:News,Tittle',
                'Summary'=>'required',
                'Content'=>'required'
            ],
            [
                'Category.required'=>'カテゴリーは必須です',
                'Tittle.required'=>'タイトルは必須です',
                'Tittle.min'=>'タイトルは３文字から入力してください',
                'Tittle.unique'=>'タイトルが存在しました',
                'Summary.required'=>'サマリーは必須です',
                'Content.required'=>'内容は必須です'
            ]);
        $news->Tittle = $request->Tittle;
        $news->idNewsType = $request->NewsType;
        $news->Summary = $request->Summary;
        $news->Content = $request->Content;
        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            //
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != "jpeg")
            {
                return redirect('admin/news/add')->with('img_error','イメージファイルしかアップロードできません');
            }
            $fileName = $file->getClientOriginalName();
            //ランダムファイルネームを作成
            $newFileName = Str::random(4)."_".$fileName;
            //新ファイルネームが存在したら統一しないまでもう一回ランダム
            while(file_exists("upload/news/".$newFileName))
            {
                $newFileName = Str::random(4)."_".$fileName;
            }
            //新しいイメージを移動
            $file->move("upload/news",$newFileName);

            //旧イメージを削除
            if($news->Image != "")
            {
                unlink("upload/news/".$news->Image);
            }
            $news->Image = $newFileName;
        }
        $news->save();
        return redirect('admin/news/edit/'.$id)->with('notice','修正できました');
    }
    //削除
    public function getDelete($id){
        $news = News::find($id);
        //イメージを削除
        if($news->Image != "")
        {
            unlink("upload/news/".$news->Image);
        }
        $news->delete();
        return redirect('admin/news/list')->with('notice','削除できました');
    }
}
