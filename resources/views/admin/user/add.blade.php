@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ユーザー
                    <small>追加</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <!-- エラーがある場合表示する -->
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <!-- 編集終わった後メッセージを出す-->
                @if(session('notice'))
                    <div class="alert alert-success">
                        {{session('notice')}}
                    </div>
                @endif
                <form action="admin/user/add" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>ユーザー名</label>
                        <input class="form-control" name="name" placeholder="ユーザー名を入力してください" />
                    </div>
                    <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="メールアドレスを入力してください" />
                    </div>
                    <div class="form-group">
                        <label>パスワード</label>
                        <input type="password" class="form-control" name="password" placeholder="パスワードを入力してください" />
                    </div>
                    <div class="form-group">
                        <label>再確認パスワード</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="もう一度パスワードを入力してください" />
                    </div>
                    <div class="form-group">
                        <label>権限</label>
                        <label class="radio-inline">
                            <input name="level" checked="" value="0" type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">Admin
                        </label>                        
                    </div>
                    <button type="submit" class="btn btn-default">追加</button>
                    <button type="reset" class="btn btn-default">リセット</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection