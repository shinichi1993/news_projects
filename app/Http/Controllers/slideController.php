<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Slide;

class slideController extends Controller
{
    //Slideリスト画面を呼び出す
    public function getList(){
    	$slide = Slide::all();
    	return view('admin.slide.list',['slide'=>$slide]);
    }
    //Slide追加画面を呼び出す
    public function getAdd(){
    	return view('admin.slide.add');
    }
    //データベースに値を追加
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'Name'=>'required|unique:Slide,Name|min:3|max:100',
    			'Content'=>'required',
    			'Link'=>'required'
    		],
    		[
    			'Name.required'=>'スライド名は必須です',
    			'Name.unique'=>'スライド名が存在しました',
    			'Name.min'=>'スライド名は３文字から１００文字まで入力してください',
    			'Name.max'=>'スライド名は３文字から１００文字まで入力してください',
    			'Content.required'=>'内容は必須です',
    			'Link.required'=>'リンクは必須です'
    		]);
    	$slide = new Slide;
    	$slide->Name = $request->Name;
    	$slide->Content = $request->Content;
    	if($request->has('Link'))
    		$slide->Link = $request->Link;
    	if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            //
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != "jpeg")
            {
                return redirect('admin/slide/add')->with('img_error','イメージファイルしかアップロードできません');
            }
            $fileName = $file->getClientOriginalName();
            //ランダムファイルネームを作成
            $newFileName = Str::random(4)."_".$fileName;
            //新ファイルネームが存在したら統一しないまでもう一回ランダム
            while(file_exists("upload/slide/".$newFileName))
            {
                $newFileName = Str::random(4)."_".$fileName;
            }
            $file->move("upload/slide",$newFileName);
            $slide->Image = $newFileName;
        }
        else
        {
            $slide->Image = "";
        }
        $slide->save();
        return redirect('admin/slide/add')->with('notice','追加できました');
    }
    //編集画面を呼び出す
    public function getEdit($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.edit',['slide'=>$slide]);
    }
    //編集した後データベースに保存
    public function postEdit(Request $request, $id){
    	$this->validate($request,
    		[
    			'Name'=>'required|unique:Slide,Name|min:3|max:100',
    			'Content'=>'required',
    			'Link'=>'required'
    		],
    		[
    			'Name.required'=>'スライド名は必須です',
    			'Name.unique'=>'スライド名が存在しました',
    			'Name.min'=>'スライド名は３文字から１００文字まで入力してください',
    			'Name.max'=>'スライド名は３文字から１００文字まで入力してください',
    			'Content.required'=>'内容は必須です',
    			'Link.required'=>'リンクは必須です'
    		]);
    	$slide = Slide::find($id);
    	$slide->Name = $request->Name;
    	$slide->Content = $request->Content;
    	if($request->has('Link'))
    		$slide->Link = $request->Link;
    	if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            //
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != "jpeg")
            {
                return redirect('admin/slide/add')->with('img_error','イメージファイルしかアップロードできません');
            }
            $fileName = $file->getClientOriginalName();
            //ランダムファイルネームを作成
            $newFileName = Str::random(4)."_".$fileName;
            //新ファイルネームが存在したら統一しないまでもう一回ランダム
            while(file_exists("upload/slide/".$newFileName))
            {
                $newFileName = Str::random(4)."_".$fileName;
            }
            $file->move("upload/slide",$newFileName);
            //旧イメージ削除
            if($slide->Image != "")
            {
                unlink("upload/slide/".$slide->Image);
            }
            $slide->Image = $newFileName;
        }
        $slide->save();
        return redirect('admin/slide/edit/'.$id)->with('notice','編集できました');
    }
    //削除
    public function getDelete($id){
    	$slide = Slide::find($id);
    	//イメージ削除
    	if($slide->Image != "")
        {
            unlink("upload/slide/".$slide->Image);
        }
    	$slide->delete();
    	return redirect('admin/slide/list')->with('notice','削除できました');
    }
}
