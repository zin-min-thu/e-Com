@php
	$sections = App\Section::sections();
	$sections = json_decode(json_encode($sections));
	// echo "<pre>"; print_r($sections);die;
@endphp
<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Welcome!<strong> {{ auth()->user() ? auth()->user()->name : ""}}</strong></div>
			<div class="span6">
				<div class="pull-right">
					<a href="{{url('cart')}}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <span class="get-cart-count"></span> ] Items in your cart </span> </a>
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<section id="navbar">
		  <div class="navbar">
		    <div class="navbar-inner">
		      <div class="container">
		        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </a>
		        <a class="brand" href="{{url('/')}}">kz-Ecom</a>
		        <div class="nav-collapse">
		          <ul class="nav">
		            <li class="active"><a href="#">Home</a></li>
					@foreach($sections as $section)
					<li class="dropdown">
		              @if(count($section->categories) > 0)
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{$section->name}} <b class="caret"></b></a>
		              <ul class="dropdown-menu">
		              	<li class="divider"></li>
						@foreach($section->categories as $category)
							<li class="nav-header"><a href="{{url($category->url)}}">{{$category->name}}</a></li>
							@foreach($category->subcategories as $subcategory)
								<li><a href="{{url($subcategory->url)}}">{{$subcategory->name}}</a></li>
							@endforeach
							<li class="divider"></li>
						@endforeach
		              </ul>
					  @endif
		            </li>
					@endforeach
		            <li><a href="#">About</a></li>
		          </ul>
		          <form class="navbar-search pull-left" action="#">
		            <input type="text" class="search-query span2" placeholder="Search"/>
		          </form>
		          <ul class="nav pull-right">
		            <li><a href="#">Contact</a></li>
		            <li class="divider-vertical"></li>
					@if(Auth::check())
					<li><a href="{{ url('cart')}}"> <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}} |</a></li>
					<li><a href="{{ url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
					@else
		            <li><a href="{{ route('front.login')}}">Login/Register</a></li>
					@endif
		          </ul>
		        </div><!-- /.nav-collapse -->
		      </div>
		    </div><!-- /navbar-inner -->
		  </div><!-- /navbar -->
		</section>
	</div>
</div>