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
                                    <a href="product_details.html">
                                    @if(!empty($item['image'] && file_exists('images/product_images/small/'.$item['image'])))
                                        <img src="{{ asset('images/product_images/small/'.$item['image'])}}" alt="">
                                    @else
                                        <img src="{{ asset('images/product_images/small/no_image.png')}}" alt="">
                                    @endif
                                    </a>
                                    <div class="caption">
                                        <h5>{{$item['name']}}</h5>
                                        <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">Rs.{{$item['price']}}</span></h4>
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
                        {{$product['code']}} ({{$product['color']}})
                    </p>
                    <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs.{{$product['price']}}</a></h4>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection