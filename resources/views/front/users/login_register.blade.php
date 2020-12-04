@extends('layouts.front_layout.layout')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Login</li>
    </ul>
    <h3> Login</h3>	
    <hr class="soft"/>
	@include('validation_message')
    <div class="row">
        <div class="span4">
            <div class="well">
            <h5>CREATE YOUR ACCOUNT</h5><br/>
            Please fill below information to create an account.<br/><br/>
            <form id="registerForm" action="{{ url('register')}}" method="post">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="name" id="name" value="{{old('name')}}" placeholder="Name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mobile">Mobile</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="mobile" id="mobile" value="{{old('mobile')}}" placeholder="Mobile">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="email" id="email" value="{{old('email')}}" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input class="span3"  type="password" name="password" id="password" value="{{old('password')}}" placeholder="Password">
                    </div>
                </div>
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Create Your Account</button>
                </div>
            </form>
        </div>
        </div>
        <div class="span1"> &nbsp;</div>
        <div class="span4">
            <div class="well">
            <h5>ALREADY REGISTERED ?</h5>
            <form id="loginForm" action="{{ url('login') }}" method="POST">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                    <input class="span3"  type="text" name="email" id="email" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword1">Password</label>
                    <div class="controls">
                    <input type="password" class="span3" name="password" id="inputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary">Sign in</button> <a href="forgetpass.html">Forget password?</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>	
	
</div>
@endsection