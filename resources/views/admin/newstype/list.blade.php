@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ニュースの種類
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
                        <th>名前</th>
                        <th>カテゴリー名</th>
                        <th>削除</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newstype as $nt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$nt->id}}</td>
                            <td>{{$nt->Name}}</td>
                            <td>{{$nt->category->Name}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/newstype/delete/{{$nt->id}}">削除</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/newstype/edit/{{$nt->id}}">編集</a></td>
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