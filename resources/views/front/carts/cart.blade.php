@extends('layouts.front_layout.layout')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>{{$productItems->count()}} Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
	<hr class="soft"/>
	@if(session('success_message'))
	<div class="alert alert-success" role="alert">
		{{session('success_message')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr>
			@if(Auth::check())
			<td>
				<div class="control-group">
					<label class="control-label" for="name">Name</label>
					<div class="controls">
						<input type="text" value="{{auth()->user()->name}}" readonly>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input type="text" value="{{auth()->user()->email}}" readonly>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<a href="{{route('password.request')}}" style="">Forgot password ?</a>
					</div>
				</div>
			</td>
			@else
			<td>
				<form class="form-horizontal" id="loginForm" action="{{ url('login') }}" method="POST">
					@csrf
					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<input type="text" name="email" id="email" placeholder="Email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" name="password" id="password" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn btn-primary">Sign in</button> OR <a href="{{route('front.login')}}" class="btn">Register Now!</a>
						</div>
					</div>
				</form>
			</td>
			@endif
		  </tr>
	</table>		
			
	<div id="appendCartItem">
		@include('front.carts.cart_item')
	</div>
			
	<table class="table table-bordered">
		<tbody>
			<tr>
				<td> 
					<form class="form-horizontal">
						<div class="control-group">
							<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
							<div class="controls">
								<input type="text" class="input-medium" placeholder="CODE">
								<button type="submit" class="btn"> ADD </button>
							</div>
						</div>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
@endsection
