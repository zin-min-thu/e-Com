@extends('layouts.front_layout.layout')
@section('content')
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
        <li><a href="{{url($productDetail['category']['url'])}}">{{$productDetail['category']['name']}}</a> <span class="divider">/</span></li>
        <li class="active">{{$productDetail['name']}}</li>
    </ul>
    <div class="row">
        <div id="gallery" class="span3">
            <a href="{{ asset('images/product_images/large/'.$productDetail['image'])}}" title="Blue Casual T-Shirt">
                <img src="{{ asset('images/product_images/large/'.$productDetail['image'])}}" style="width:100%" alt="Blue Casual T-Shirt"/>
            </a>
            <div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($productDetail['images'] as $image)
                        <a href="{{ asset ('images/product_images/large/'.$image['image'])}}"> <img style="width:29%" src="{{ asset ('images/product_images/large/'.$image['image'])}}" alt=""/></a>
                        @endforeach
                    </div>
                </div>
                <!--
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                -->
            </div>
            
            <div class="btn-toolbar">
                <div class="btn-group">
                    <span class="btn"><i class="icon-envelope"></i></span>
                    <span class="btn" ><i class="icon-print"></i></span>
                    <span class="btn" ><i class="icon-zoom-in"></i></span>
                    <span class="btn" ><i class="icon-star"></i></span>
                    <span class="btn" ><i class=" icon-thumbs-up"></i></span>
                    <span class="btn" ><i class="icon-thumbs-down"></i></span>
                </div>
            </div>
        </div>
        <div class="span6">
            @if(session('success_message'))
            <div class="alert alert-success" role="alert">
                {{session('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('error_message'))
            <div class="alert alert-danger" role="alert">
                {{session('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h3>{{$productDetail['name']}}</h3>
            <small>- {{$productDetail['brand']['name']}}</small>
            <hr class="soft"/>
            <small>{{$total_stock}} items in stock</small>
            <form action="{{url('add-to-cart')}}" method="post" class="form-horizontal qtyFrm">
                @csrf
                <input type="hidden" name="product_id" value="{{$productDetail['id']}}">
                <div class="control-group">
                    <h4 class="change-price">
                    @if($productDetail->getDiscountedPrice() > 0)
                        <del>Rs.{{$productDetail['price']}}</del>
                        @if($productDetail->discount > 0)
                            {{$productDetail->discount}}%
                        @else
                            {{$productDetail->category->first()->discount}}%
                        @endif
                        ->({{$productDetail->getDiscountedPrice()}})
                    @else
                        Rs.{{$productDetail['price']}}
                    @endif
                    </h4>
                        <select name="size" id="change-size" product-id="{{$productDetail['id']}}" class="span2 pull-left" required>
                            <option selected disabled>Slect Product Size</option>
                            @foreach($productDetail['attributes'] as $attribute)
                            <option value="{{$attribute['size']}}">{{$attribute['size']}}</option>
                            @endforeach
                        </select>
                        <input type="number" name="quantity" class="span1" placeholder="Qty." required/>
                        <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                    </div>
                </div>
            </form>
        
            <hr class="soft clr"/>
            <p class="span6">
                {{$productDetail['description']}}
            </p>
            <a class="btn btn-small pull-right" href="#detail">More Details</a>
            <br class="clr"/>
            <a href="#" name="detail"></a>
            <hr class="soft"/>
        </div>
        
        <div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <h4>Product Information</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">{{$productDetail['brand']['name']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Code:</td><td class="techSpecTD2">{{$productDetail['code']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2">{{$productDetail['color']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Fabric:</td><td class="techSpecTD2">{{$productDetail['fabric']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Sleeve:</td><td class="techSpecTD2">{{$productDetail['sleeve']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Fit:</td><td class="techSpecTD2">{{$productDetail['fit']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Pattern:</td><td class="techSpecTD2">{{$productDetail['pattern']}}</td></tr>
                            <tr class="techSpecRow"><td class="techSpecTD1">Occasion:</td><td class="techSpecTD2">{{$productDetail['occasion']}}</td></tr>
                        </tbody>
                    </table>
                    
                    <h5>Washcare</h5>
                    <p>{{$productDetail['wash_care']}}</p>
                    <h5>Disclaimer</h5>
                    <p>
                        There may be a slight color variation between the image shown and original product.
                    </p>
                </div>
                <div class="tab-pane fade" id="profile">
                    <div id="myTab" class="pull-right">
                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                    </div>
                    <br class="clr"/>
                    <hr class="soft"/>
                    <div class="tab-content">
                        <div class="tab-pane" id="listView">
                            @foreach($relatedProducts as $product)
                            <div class="row">
                                <div class="span2">
                                    <a  href="{{url('product/'.$product['id'])}}">
                                    @if(!empty($product['image'] && file_exists('images/product_images/small/'.$product['image'])))
                                        <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/'.$product['image'])}}" alt="">
                                    @else
                                        <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/no_image.png')}}" alt="">
                                    @endif
                                    </a>
                                </div>
                                <div class="span4">
                                    <h3>{{$product['name']}}</h3>
                                    <hr class="soft"/>
                                    <p>
                                        {{$product['code']}}
                                    </p>
                                    <a class="btn btn-small pull-right" href="product_details.html">View Details</a>
                                    <br class="clr"/>
                                </div>
                                <div class="span3 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> Rs.{{$product['price']}}</h3>
                                        <label class="checkbox">
                                            <input type="checkbox">  Adds product to compair
                                        </label><br/>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                            <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft"/>
                            @endforeach
                        </div>
                        <div class="tab-pane active" id="blockView">
                            <ul class="thumbnails">
                                @foreach($relatedProducts as $product)
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a  href="{{url('product/'.$product['id'])}}">
                                        @if(!empty($product['image'] && file_exists('images/product_images/small/'.$product['image'])))
                                            <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/'.$product['image'])}}" alt="">
                                        @else
                                            <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/no_image.png')}}" alt="">
                                        @endif
                                        </a>
                                        <div class="caption">
                                            <h5>{{$product['name']}}</h5>
                                            <p>
                                                {{$product['code']}}
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
                    <br class="clr">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection