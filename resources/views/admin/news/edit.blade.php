@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ニュース
                    <small>{{$news->Tittle}}</small>
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
                <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <select id="Category" class="form-control" name='Category'>
                            @foreach($category as $ct)
                                <option 
                                @if($news->NewsType->Category->id == $ct->id){{"selected"}}
                                @endif
                                value="{{$ct->id}}">{{$ct->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ニュースの種類名</label>
                        <select id="NewsType" class="form-control" name='NewsType'>
                            @foreach($newstype as $nt)
                                <option 
                                @if($news->NewsType->id == $nt->id){{"selected"}}
                                @endif
                                value="{{$nt->id}}">{{$nt->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>タイトル</label>
                        <input class="form-control" name="Tittle" placeholder="タイトルを入力してください" value="{{$news->Tittle}}" />
                    </div>
                    <div class="form-group">
                        <label>サマリー</label>
                        <input class="form-control" name="Summary" placeholder="サマリーを入力してください" value="{{$news->Summary}}" />
                    </div>
                    <div class="form-group">
                        <label>内容</label>
                        <textarea id="demo" class="form-control ckeditor" name="Content" row="5">{{$news->Content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>イメージ</label>
                        <p>
                            <img width="400px" src="upload/news/{{$news->Image}}"><br>
                        </p>
                        <input type="file" name="Image" class="form-control" />
                    </div>
                    <div>
                        <label>ハイライト</label>
                        <label class="radio-inline">
                            <input name="Hightlight" value="0" 
                            @if($news->Hightlight == 0)
                                {{"checked"}}
                            @endif
                            checked="" type="radio">非表示
                        </label>
                        <label class="radio-inline">
                            <input name="Hightlight" value="1" 
                            @if($news->Hightlight == 1)
                                {{"checked"}}
                            @endif
                            type="radio">表示
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">編集</button>
                    <button type="reset" class="btn btn-default">リセット</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
        <!-- Comment Manage -->
                <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">コメント
                    <small>リスト</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ユーザー</th>
                        <th>内容</th>
                        <th>投稿日</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news->comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cm->id}}</td>
                            <td>クエスト</td>
                            <td>{{$cm->Content}}</td>
                            <td>{{$cm->created_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->id}}/{{$news->id}}"> 削除</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Row Comment Manage -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


@endsection
<!--カテゴリーと共にニュースの種類を変動する-->
@section('script')
    <script>
        $(document).ready(function(){
            $("#Category").change(function(){
                var idCategory = $(this).val();                
                $.get("admin/ajax/newstype/"+idCategory,function(data){
                    //alert(data);
                    $("#NewsType").html(data);
                });
            });
        })
    </script>
@endsection