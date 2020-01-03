@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ニュース
                    <small>リスト</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <!-- 削除終わった後メッセージを出す-->
            <div class="col-lg-7">
                @if(session('notice'))
                    <div class="alert alert-success">
                        {{session('notice')}}
                    </div>
                @endif
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>イメージ</th>
                        <th>タイトル</th>
                        <th>サマリー</th>
                        <th>カテゴリー</th>
                        <th>ニュースの種類</th>
                        <th>ビュー数</th>
                        <th>ハイライト</th>
                        <th>削除</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $ns)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ns->id}}</td>
                            <td><img width="100px" src="upload/news/{{$ns->Image}}"></td>
                            <td>{{$ns->Tittle}}</td>
                            <td>{{$ns->Summary}}</td>
                            <td>{{$ns->NewsType->Category->Name}}</td>
                            <td>{{$ns->NewsType->Name}}</td>
                            <td>{{$ns->Views}}</td>
                            <td>
                                @if($ns->Hightlight == 0)
                                {{'非表示'}}
                                @else
                                {{'表示'}}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$ns->id}}"> 削除</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$ns->id}}">編集</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection