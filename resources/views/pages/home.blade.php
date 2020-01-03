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
	            		<h2 style="margin-top:0px; margin-bottom:0px;">人気ニュース</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($category as $ct)
	            			<!--ニュースの種類がない場合カテゴリーを非表示-->
	            			@if(count($ct->NewsType) > 0)
			            		<!-- item -->
							    <div class="row-item row">
				                	<h3>
				                		<a href="category.html">{{$ct->Name}}</a> | 	
				                		@foreach($ct->NewsType as $nt)
				                			<small><a href="newstype/{{$nt->id}}"><i>{{$nt->Name}}</i></a>/</small>
				                		@endforeach
				                	</h3>
				                	<?@php
				                		$data = $ct->News->where('Hightlight',1)->sortByDesc('created_at')->take(5);
				                		//一つのニュースをとる
				                		$news1 = $data->shift();
				                	?>
				                	@endphp
				                	<!--左のハイライト-->

				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="news/{{$news1['id']}}">
					                            <img class="img-responsive" src="upload/news/{{$news1['Image']}}" alt="">
					                        </a>
					                    </div>

					                    <div class="col-md-7">
					                        <h3>{{$news1['Titlle']}}</h3>
					                        <p>{{$news1['Summary']}}</p>
					                        <a class="btn btn-primary" href="news/{{$news1['id']}}">見る<span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>

				                	</div>
				                    
				                	<!--右のハイライト-->
									<div class="col-md-4">
										@foreach($data->all() as $news4)
											<a href="news/{{$news1['id']}}">
												<h4>
													<span class="glyphicon glyphicon-list-alt"></span>{{$news4['Tittle']}}
												</h4>
											</a>
										@endforeach
									</div>
									
									<div class="break"></div>
				                </div>
			                	<!-- end item -->
			                @endif
		                @endforeach
					</div>
	            </div>
	    	</div>
	    </div>
	    <!-- /.row -->
	</div>
	<!-- end Page Content -->
@endsection