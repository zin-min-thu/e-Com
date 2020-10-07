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
        <div class="control-group">
            <label class="control-label alignL">Sort By </label>
            <select>
                <option>Priduct name A - Z</option>
                <option>Priduct name Z - A</option>
                <option>Priduct Stoke</option>
                <option>Price Lowest first</option>
            </select>
        </div>
    </form>
    
    <div id="myTab" class="pull-right">
        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
    </div>
    <br class="clr"/>
    <div class="tab-content">
        <div class="tab-pane" id="listView">
            @foreach($productLists as $product)
            <div class="row">
                <div class="span2">
                @if(!empty($product['image']) && file_exists('images/product_images/small/'.$product['image']))
                    <img src="{{url('images/product_images/small/'.$product['image'])}}" style="width: 80px; height: 100px;" alt="">
                @else
                    <img src="{{url('images/no_image.png')}}" style="width: 80px; height: 100px;" alt="">
                @endif
                </div>
                <div class="span4">
                    <h3>{{$product['brand']['name']}}</h3>
                    <hr class="soft"/>
                    <h5>{{$product['name']}}</h5>
                    <p>
                        {{$product['description']}}
                    </p>
                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                    <br class="clr"/>
                </div>
                <div class="span3 alignR">
                    <form class="form-horizontal qtyFrm">
                        <h3> ${{$product['price']}}.00</h3>
                        <label class="checkbox">
                            <input type="checkbox">  Adds product to compair
                        </label><br/>
                        
                        <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                        <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                        
                    </form>
                </div>
            </div>
            <hr class="soft"/>
            @endforeach
        </div>
        <div class="tab-pane  active" id="blockView">
            <ul class="thumbnails">
                @foreach($productLists as $product)
                <li class="span3">
                    <div class="thumbnail">
                        <a href="product_details.html">
                            @if(!empty($product['image']) && file_exists('images/product_images/small/'.$product['image']))
                                <img src="{{url('images/product_images/small/'.$product['image'])}}" style="width: 80px; height: 100px;" alt="">
                            @else
                                <img src="{{url('images/no_image.png')}}" style="width: 80px; height: 100px;" alt="">
                            @endif  
                        </a>
                        <div class="caption">
                            <h5>{{$product['name']}}</h5>
                            <p>
                                {{$product['brand']['name']}}
                            </p>
                            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs.{{$product['price']}}</a></h4>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <hr class="soft"/>
        </div>
    </div>
    <a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
    <div class="pagination">
        {{$productLists->links()}}
        <!-- {{$productLists->appends(['sort' => 'price_lowest'])->links()}} -->
    </div>
    <br class="clr"/>
</div>
@endsection