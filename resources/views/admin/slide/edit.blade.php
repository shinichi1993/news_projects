@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">スライド
                    <small>{{$slide->Name}}</small>
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
                <!-- 編集終わった後イメージファイルじゃない場合メッセージを出す-->
                @if(session('img_error'))
                    <div class="alert alert-danger">
                        {{session('img_error')}}
                    </div>
                @endif
                <form action="admin/slide/edit/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>スライド名</label>
                        <input class="form-control" name="Name" placeholder="スライド名を入力してください" value="{{$slide->Name}}" />
                    </div>
                    <div class="form-group">
                        <label>内容</label>
                        <textarea id="demo" class="form-control ckeditor" name="Content" row="5">{{$slide->Content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>リンク</label>
                        <input class="form-control" name="Link" placeholder="リンクを入力してください" value="{{$slide->Link}}" />
                    </div>
                    <div class="form-group">
                        <label>イメージ</label>
                        <p><img width="400px" src="upload/slide/{{$slide->Image}}"></p>
                        <input type="file" name="Image" class="form-control" />
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