@extends('layouts.front_layout.layout')
@section('content')
<div class="span9">
    <div class="well well-small">
        <h4>Featured Products <small class="pull-right">{{$featuredCount}}+ featured products</small></h4>
        <div class="row-fluid">
            <div id="featured" class="{{ $featuredCount > 4 ? 'carousel slide' : ''}}">
                <div class="carousel-inner">
                @foreach($featureItemsChunk as $key => $featureItems)
                    <div class="item {{$key == 1 ? 'active' : ''}}">
                        <ul class="thumbnails">
                            @foreach($featureItems as $key => $item)
                            <li class="span3">
                                <div class="thumbnail">
                                    <i class="tag"></i>
                                    <a href="{{url('product/'.$item->id)}}">
                                    @if(!empty($item->image && file_exists('images/product_images/small/'.$item->image)))
                                        <img src="{{ asset('images/product_images/small/'.$item->image)}}" alt="">
                                    @else
                                        <img src="{{ asset('images/product_images/small/no_image.png')}}" alt="">
                                    @endif
                                    </a>
                                    <div class="caption">
                                        <h5>{{$item->name}}</h5>
                                        <p>
                                            @if($item->getDiscountedPrice() > 0)
                                            <strong><del>Rs.{{$item->price}}</del></strong>
                                            @if($item->discount > 0)
                                                <span class="badge badge-info" style="padding-top:5px;">{{$item->discount}}%</span>
                                            @else
                                            <span class="badge badge-info" style="padding-top:5px;">{{$item->category->discount}}%</span>
                                            @endif
                                            <strong>->({{$item->getDiscountedPrice()}})</strong>
                                            @else
                                            <strong>Rs.{{$item->price}}</strong>
                                            @endif
                                            <strong><a class="btn font-weight-bold" style="margin-top:5px;" href="{{url('product/'.$item->id)}}">VIEW</a></strong>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                </div>
                <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#featured" data-slide="next">›</a>
            </div>
        </div>
    </div>
    <h4>Latest Products </h4>
    <ul class="thumbnails">
        @foreach($latestProducts as $key => $product)
        <li class="span3">
            <div class="thumbnail">
                <a  href="{{url('product/'.$product->id)}}">
                @if(!empty($product->image && file_exists('images/product_images/small/'.$product->image)))
                    <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/'.$product->image)}}" alt="">
                @else
                    <img style="width: 160px; height: 140px;" src="{{ asset('images/product_images/small/no_image.png')}}" alt="">
                @endif
                </a>
                <div class="caption">
                    <h5>{{$product->name}}</h5>
                    <p>
                        {{$product->code}} ({{$product->color}})
                    </p>
                    <h4 style="text-align:center">
                        <a class="btn" href="{{url('product/'.$product->id)}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{url('product/'.$product->id)}}">Add to <i class="icon-shopping-cart"></i></a><br>
                        <a class="btn btn-primary" href="#">
                        @if($product->getDiscountedPrice() > 0)
                            <del>Rs.{{$product->price}}</del>
                            @if($product->discount > 0)
                            {{$product->discount}}%
                            @else
                            {{$product->discount}}%
                            @endif
                            ->({{$product->getDiscountedPrice()}})
                        @else
                            Rs.{{$product->price}}
                        @endif
                        </a>
                    </h4>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection