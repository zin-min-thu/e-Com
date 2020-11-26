@extends('layouts.front_layout.layout')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
        <li class="active">{!! $categoryDetails['breadCrumbs'] !!}</li>
    </ul>
    <h3> {{$categoryDetails['catDetails']['name']}} <small class="pull-right"> {{count($productLists)}} products are available </small></h3>
    <hr class="soft"/>
    <p>
       {{$categoryDetails['catDetails']['description']}}
    </p>
    <hr class="soft"/>
    <form class="form-horizontal span6">
        <input type="hidden" name="url" id="url" value="{{$url}}">
        <div class="control-group">
            <label class="control-label alignL">Sort By </label>
            <select name="sort" id="sort">
                <option value="" disabled selected>Select</option>
                <option value="latest" {{request('sort') == 'latest' ? 'selected' : ''}} >Latest Product</option>
                <option value="name_a_z" {{request('sort') == 'name_a_z' ? 'selected' : ''}} >Priduct name A - Z</option>
                <option value="name_z_a" {{request('sort') == 'name_z_a' ? 'selected' : ''}} >Priduct name Z - A</option>
                <option value="lowest_price" {{request('sort') == 'lowest_price' ? 'selected' : ''}}>Price Lowest first</option>
                <option value="higest_price" {{request('sort') == 'higest_price' ? 'selected' : ''}} >Price Higest first</option>
            </select>
        </div>
    </form>

    <br class="clr"/>
    <div class="tab-content filter_products">
        @include('front.products._products_listing')
    </div>
    <a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
    <div class="pagination">
        @if(isset($_GET['sort']) && !empty($_GET['sort']))
            {{$productLists->appends(['sort' => $_GET['sort']])->links()}}
        @else
            {{$productLists->links()}}
        @endif
    </div>
    <br class="clr"/>
</div>
@endsection