<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsType;
use App\Category;

class newstypeController extends Controller
{
    //ニュースの種類リスト画面を呼び出す
    public function getList(){
    	$newstype = NewsType::all();
    	return view('admin.newstype.list',['newstype' => $newstype]);
    }
    //ニュースの種類追加画面を呼び出す
    public function getAdd(){
    	$category = Category::all();
    	return view('admin.newstype.add',['category'=>$category]);

    }
    //データベースに値を追加
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'Name'=>'required|unique:NewsType,Name|min:1|max:100',
    			'Category'=>'required'
    		],
    		[
    			'Name.required'=>'ニュースの種類名は必須です',
    			'Name.unique'=>'ニュースの種類名は存在しました',
    			'Name.min'=>'ニュースの種類名は１文字から１００文字まで入力してください',
    			'Name.max'=>'ニュースの種類名は１文字から１００文字まで入力してください',
    			'Category.required'=>'カテゴリー名は必須です'
    		]);
    	$newstype= new NewsType;
    	$newstype->Name = $request->Name;
    	$newstype->idCategory = $request->Category;
    	$newstype->save();
    	return redirect('admin/newstype/add')->with('notice','正常にニュースの種類「'.$newstype->Name.'」が追加できました');
    }
    //編集画面を呼び出す
    public function getEdit($id){
    	$newstype = NewsType::find($id);
    	$category = Category::all();
    	return view('admin.newstype.edit',['newstype'=>$newstype,'category'=>$category]);
    }
    //編集した後データベースに保存
    public function postEdit(Request $request, $id){
    	$this->validate($request,
    		[
    			'Name'=>'required|min:1|max:100',
    			'Category'=>'required'
    		],
    		[
    			'Name.required'=>'ニュースの種類名は必須です',
    			'Name.min'=>'ニュースの種類名は１文字から１００文字まで入力してください',
    			'Name.max'=>'ニュースの種類名は１文字から１００文字まで入力してください',
    			'Category.required'=>'カテゴリー名は必須です'
    		]);
    	$newstype = NewsType::find($id);
    	$newstype->Name = $request->Name;
    	$newstype->idCategory = $request->Category;
    	$newstype->save();
    	return redirect('admin/newstype/edit/'.$id)->with('notice',$newstype->Name."に変更できました");
    }
    //削除
    public function getDelete($id){
    	$newstype = NewsType::find($id);
    	$name = $newstype->Name;
    	$newstype->delete();
    	return redirect('admin/newstype/list')->with('notice',$name.'が削除できました');
    }
}
