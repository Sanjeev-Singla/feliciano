<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
  		<a class="navbar-brand" href="index.html">Feliciano</a>

	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav	" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="oi oi-menu"></span> Menu
	  	</button>
	
	  	<div class="collapse navbar-collapse" id="ftco-nav">
	    	<ul class="navbar-nav ml-auto">
	    		<li class="nav-item <?= (Request::segment(1)=='')?'active':''?>"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
	    		<li class="nav-item <?= (Request::segment(1)=='about')?'active':''?>"><a href="{{ url('about') }}" class="nav-link">About</a></li>
	    		<li class="nav-item <?= (Request::segment(1)=='menu')?'active':''?>"><a href="{{ url('menu') }}" class="nav-link">Menu</a></li>
	    		<li class="nav-item <?= (Request::segment(1)=='blogs' ||Request::segment(1)=='blog-single')?'active':''?>"><a href="{{ url('blogs') }}" class="nav-link">Stories</a></li>
	      		<li class="nav-item <?= (Request::segment(1)=='contact')?'active':''?>"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
	      		<li class="nav-item cta <?= (Request::segment(1)=='reservation')?'active':''?>"><a href="{{ url('reservation') }}" class="nav-link">Book a table</a></li>
	    	</ul>
	  	</div>
	</div>
	
</nav>
    <!-- END nav -->