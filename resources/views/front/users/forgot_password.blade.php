@extends('layouts.front_layout.layout')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Login</li>
    </ul>
    <h3> Forgot Password</h3>
    <hr class="soft"/>
    @include('validation_message')
    <div class="row">
        <div class="span4">
            <div class="well">
            <h5>Reset Password</h5><br/>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ url('forgot-password') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                    <p>
                    @error('email')
                        <span style="color:red;" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </p>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password') }}
                    </button>
                </div>
            </form>
        </div>
        </div>
        <div class="span1"> &nbsp;</div>
        </div>
    </div>
</div>
@endsection