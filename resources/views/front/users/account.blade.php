@extends('layouts.front_layout.layout')

@section('content')
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
        <li class="active">Account</li>
    </ul>
    <h3> User Account</h3>	
    <hr class="soft"/>
    @include('validation_message')
    <div class="row">
        <div class="span4">
            <div class="well">
            <h5>YOUR ACCOUNT</h5><br/>
            Please fill below information to update an account.<br/><br/>
            <form id="accountForm" action="{{ url('user-account')}}" method="post">
                @csrf
                <input type="hidden" name="url" value="{{url()->current()}}">
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input class="span3"  type="text" value="{{$user->email}}" readonly>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="name" id="name" value="{{old('name') ? old('name') : $user->name}}" placeholder="Name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="mobile">Mobile</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="mobile" id="mobile" value="{{old('mobile') ? old('mobile') : $user->mobile}}" placeholder="Mobile">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="address" id="address" value="{{old('address') ? old('address') : $user->address}}" placeholder="Address">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="city">City</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="city" id="city" value="{{old('city') ? old('city') : $user->city}}" placeholder="City">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="state">State</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="state" id="state" value="{{old('state') ? old('state') : $user->state}}" placeholder="State">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="country">Country</label>
                    <div class="controls">
                        <select class="span3" name="country" id="country">
                            @foreach($countries as $country)
                                <option value="{{$country->nicename}}"
                                    {{$user->country == $country->nicename ? 'selected' : ''}}
                                >
                                    {{$country->nicename}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="pincode">Pincode</label>
                    <div class="controls">
                        <input class="span3"  type="text" name="pincode" id="pincode" value="{{old('pincode') ? old('pincode') : $user->pincode}}" placeholder="Pincode">
                    </div>
                </div>
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        </div>
        <div class="span1"> &nbsp;</div>
        <div class="span4">
            <div class="well">
            <h5>UPDATE YOUR PASSWORD ?</h5>
            <form id="resetForm" action="{{ url('update-password') }}" method="POST">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="current-password">Current Password</label>
                    <div class="controls">
                    <input class="span3"  type="text" name="current_password" id="current-password" placeholder="Current password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="new-password">New Password</label>
                    <div class="controls">
                    <input type="password" class="span3" name="new_password" id="new-password" placeholder="New Password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="confirm-password">Confirm Password</label>
                    <div class="controls">
                    <input type="password" class="span3" name="confirm_password" id="confirm-password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary">Update</button> <a href="{{url('forgot-password')}}">Forget password?</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>	
	
</div>
@endsection 