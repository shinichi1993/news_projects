<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class userController extends Controller
{
    //Slideリスト画面を呼び出す
    public function getList(){
    	$user = User::all();
    	return view('admin.user.list',['user'=>$user]);
    }
    //Slide追加画面を呼び出す
    public function getAdd(){
    	return view('admin.user.add');
    }
    //データベースに値を追加
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'name'=>'required|min:3',
    			'email'=>'required|email|unique:users,email',
    			'password'=>'required|min:6|max:35',
    			'passwordAgain'=>'required|same:password',
    		],
    		[
    			'name.required'=>'ユーザー名は必須です',
    			'name.min'=>'ユーザー名は３文字以上で入力してください',
    			'email.required'=>'メールアドレスは必須です',
    			'email.email'=>'メールアドレスではないです',
    			'email.unique'=>'メールアドレスが存在しました',
    			'password.required'=>'パスワード必須です',
    			'paswword.min'=>'パスワードは６文字以上で入力してください',
    			'password.max'=>'パスワードは３２文字以下で入力してください',
    			'passwordAgain.required'=>'再確認パスワードは必須です',
    			'passwordAgain.same'=>'パスワードと再確認パスワードは統一ではないです'
    		]);
    	$user = new User;
    	$user->name =$request->name;
    	$user->email =$request->email;
    	$user->password = bcrypt($request->password);
    	$user->level =$request->level;
    	$user->save();
    	return redirect('admin/user/add')->with('notice','ユーザーが追加できました');
    }
    //編集画面を呼び出す
    public function getEdit($id){
    	$user = User::find($id);
    	return view('admin.user.edit',['user'=>$user]);
    }
    //編集した後データベースに保存
    public function postEdit(Request $request, $id){
    	$this->validate($request,
    		[
    			'name'=>'required|min:3',
    		],
    		[
    			'name.required'=>'ユーザー名は必須です',
    			'name.min'=>'ユーザー名は３文字以上で入力してください',
    		]);
    	$user = User::find($id);
    	$user->name =$request->name;
    	$user->level =$request->level;
    	$user->save();
    	//パスワード変更チェックされる場合
    	if($request->changePassword == "on")
    	{
    		$this->validate($request,
    		[
    			'password'=>'required|min:6|max:35',
    			'passwordAgain'=>'required|same:password',
    		],
    		[
    			'password.required'=>'パスワード必須です',
    			'paswword.min'=>'パスワードは６文字以上で入力してください',
    			'password.max'=>'パスワードは３２文字以下で入力してください',
    			'passwordAgain.required'=>'再確認パスワードは必須です',
    			'passwordAgain.same'=>'パスワードと再確認パスワードは統一ではないです'
    		]);
    		$user->password = bcrypt($request->password);
    	}
    	$user->save();
    	return redirect('admin/user/edit/'.$id)->with('notice','編集できました');
    }
    //削除
    public function getDelete($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/list')->with('notice','ユーザーが削除できました');
    }
    //
    public function getLoginAdmin(){
        return view('admin.login');
    }
    //
    public function postLoginAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.requied'=>'メールアドレスは必須です',
                'password'=>'パスワードは必須です'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {            
            return redirect('admin/category/list');
        }
        else
        {
            return redirect('admin/login')->with('notice','アカウント情報が存在しません');
        }
    }

    //ログアウト
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}

