@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- 内容 -->
            <div class="col-lg-9">

                <!-- タイトル -->
                <h1>{{$news->Tittle}}</h1>

                <!-- 投稿者 -->
                <p class="lead">
                    投稿者： Admin
                </p>

                <!-- イメージ -->
                <img class="img-responsive" src="upload/news/{{$news->Image}}" alt="">

                <!-- 投稿日時 -->
                <p><span class="glyphicon glyphicon-time"></span>投稿日時：{{$news->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$news->Content!!}</p>

                <hr>

                <!-- コメント -->

                <!-- コメントフォーム -->
                <div class="well">
                    @if(session('notice'))
                        <div class="alert alert-success">
                            {{session('notice')}}
                        </div>
                    @endif
                    <h4>コメント追加<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$news->id}}" role="form" method="Post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="Content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">ポスト</button>
                    </form>
                </div>

                <hr>

                <!-- コメントフォーム -->

                <!-- コメント -->
                @foreach($news->comment as $cm)
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">クエスト
                                <small>{{$cm->created_at}}</small>
                            </h4>{{$cm->Content}}
                        </div>
                    
                    </div>
                @endforeach

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">
                <!--関係があるニュース-->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>あわせて読みたい</b></div>
                    <div class="panel-body">
                        @foreach($relativeNews as $rn)
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="news/{{$rn->id}}">
                                        <img class="img-responsive" src="upload/news/{{$rn->Image}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="news/{{$rn->id}}"><b>{{$rn->Tittle}}</b></a>
                                </div>
                                <p style="padding-left: 5px;">{{$rn->Summary}}</p>
                                <div class="break"></div>
                            </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                <!--ハイライトニュース-->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>ハイライトニュース</b></div>
                    <div class="panel-body">
                        @foreach($hightlight as $hl)
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="news/{{$hl->id}}">
                                        <img class="img-responsive" src="upload/news/{{$hl->Image}}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="news/{{$hl->id}}"><b>{{$hl->Tittle}}</b></a>
                                </div>
                                <p style="padding-left: 5px;">{{$hl->Summary}}</p>
                                <div class="break"></div>
                            </div>
                            <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection