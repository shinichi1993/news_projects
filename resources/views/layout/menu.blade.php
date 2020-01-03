<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
        	メニュー
        </li>

        @foreach($category as $ct)
            <!--ニュースの種類がない場合カテゴリーを非表示-->
            @if(count($ct->NewsType) > 0)
                <li href="#" class="list-group-item menu1">
                	{{$ct->Name}}
                </li>
                <ul>
                    @foreach($ct->NewsType as $nt)
                		<li class="list-group-item">
                			<a href="newstype/{{$nt->id}}">{{$nt->Name}}</a>
                		</li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>