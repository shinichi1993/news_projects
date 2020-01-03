@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!--メニュー-->
        @include('layout.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>{{$newstype->Name}}</b></h4>
                </div>

                @foreach($news as $ns)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="news/{{$ns->id}}">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="upload/news/{{$ns->Image}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{{$ns->Tittle}}</h3>
                        <p>{{$ns->Summary}}</p>
                        <a class="btn btn-primary" href="news/{{$ns->id}}">見る<span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach


                <!-- Pagination -->
                <div style="text-align: center">
                    {{$news->links()}}
                </div>
                <!-- /.row -->

            </div>
        </div> 

    </div>

</div>
<!-- end Page Content -->
@endsection