@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
        @include('layout.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <!--メニュー-->
            @include('layout.menu')

            <div class="col-md-9">
                <div class="panel panel-default">            
                	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
                		<h2 style="margin-top:0px; margin-bottom:0px;">問い合わせ</h2>
                	</div>

                	<div class="panel-body">
                		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> 問い合わせ情報</h3>
    				    
                        <div class="break"></div>
    				   	<h4><span class= "glyphicon glyphicon-home "></span>　住所：</h4>
                        <p>　９００－００１２　沖縄県那覇市小禄２－１２－３</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span>　メールアドレ：</h4>
                        <p>　news@gmail.com</p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span>　電話番号：</h4>
                        <p>　080-1111-1111</p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span>Google Map</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.1484889630024!2d127.6835469153946!3d26.224364345694767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5697dafaeb5f3%3A0x44e799a7f1d6b8ad!2s900-0012%2C%20Japan!5e0!3m2!1sen!2s!4v1577969184807!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

    				</div>
                </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection