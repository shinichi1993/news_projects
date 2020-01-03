@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ユーザー
                    <small>{{$user->Name}}</small>
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
                <form action="admin/user/edit/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>ユーザー名</label>
                        <input class="form-control" name="name" placeholder="ユーザー名を入力してください" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="メールアドレスを入力してください" value="{{$user->email}}" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="changePassword" name="changePassword" >
                            パスワード変更
                        </label><br>
                        <label>パスワード</label>
                        <input type="password" class="form-control password" name="password" placeholder="パスワードを入力してください" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>再確認パスワード</label>
                        <input type="password" class="form-control password" name="passwordAgain" placeholder="もう一度パスワードを入力してください" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>権限</label>
                        <label class="radio-inline">
                            <input name="level" 
                            @if($user->level == 0)
                            {{"checked"}}
                            @endif
                            value="0" type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="level" 
                            @if($user->level == 1)
                            {{"checked"}}
                            @endif
                            value="1" type="radio">Admin
                        </label>                        
                    </div>
                    <button type="submit" class="btn btn-default">編集</button>
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

<!--パスワード変更をチェックしたらパスワード変更できる-->
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection