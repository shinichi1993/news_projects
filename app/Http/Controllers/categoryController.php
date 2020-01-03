<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class categoryController extends Controller
{
    //カテゴリーリスト画面を呼び出す
    public function getList(){
    	$category = Category::all();
    	return view('admin.category.list',['category' => $category]);
    }
    //カテゴリ―追加画面を呼び出す
    public function getAdd(){
    	return view('admin.category.add');

    }
    //データベースに値を追加
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'Name' => 'required|unique:Category,Name|min:1|max:100'
    		],
    		[
    			'Name.required' => 'カテゴリー名が必須です',
                'Name.unique' =>'カテゴリー名が存在しました',
                'Name.min' => 'カテゴリー名が１文字から１００文字まで入力してください',
                'Name.max' => 'カテゴリー名が１文字から１００文字まで入力してください'
    		]
    	);
    	$category = new Category;
    	$category->Name = $request->Name;
    	$category->save();
    	return redirect('admin/category/add')->with('notice',"正常にカテゴリ―「".$category->Name."」が追加できました");
    }
    //編集画面を呼び出す
    public function getEdit($id){
        $category = Category::find($id);
        return view('admin.category.edit',['category' => $category]);
    }
    //編集した後データベースに保存
    public function postEdit(Request $request, $id){
        $category = Category::find($id);
        $this->validate($request,
            [
                'Name' => 'required|unique:Category,Name|min:1|max:100'
            ],
            [
                'Name.required' => 'カテゴリー名が必須です',
                'Name.unique' =>'カテゴリー名が存在しました',
                'Name.min' => 'カテゴリー名が１文字から１００文字まで入力してください',
                'Name.max' => 'カテゴリー名が１文字から１００文字まで入力してください'
            ]
        );
        $category->Name = $request->Name;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('notice',$category->Name.'に変更できました');
    }
    //削除
    public function getDelete($id){
        $category = Category::find($id);
        $name = $category->Name;
        $category->delete();
        return redirect('admin/category/list')->with('notice',$name.'が削除できました');
    }
}
