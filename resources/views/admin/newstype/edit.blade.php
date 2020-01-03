@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ニュースの種類
                    <small>{{$newstype->Name}}</small>
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
                <form action="admin/newstype/edit/{{$newstype->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <select class="form-control" name="Category">
                            @foreach($category as $ct)
                                <option
                                @if($newstype->idCategory == $ct->id)
                                    {{"selected"}}
                                @endif
                                 value="{{$ct->id}}">{{$ct->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ニュースの種類名</label>
                        <input class="form-control" name="Name" placeholder="ニュースの種類名を入力してください" value="{{$newstype->Name}}"/>
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