<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home">ニュース</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="contact">問い合わせ</a>
                </li>
            </ul>
            <!--検索-->
            <form action="search" method="post" class="navbar-form navbar-left" role="search">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
		        <div class="form-group">
		          <input type="text" name="keyword" class="form-control" placeholder="検索">
		        </div>
		        <button type="submit" class="btn btn-default">検索</button>
		    </form>
        </div>


        
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>