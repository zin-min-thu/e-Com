<div class="tab-pane  active" id="blockView">
    <ul class="thumbnails">
        @foreach($productLists as $product)
        <li class="span3">
            <div class="thumbnail">
                <a href="{{url('product/'.$product['id'])}}">
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
                    <h4 style="text-align:center">
                        <a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a>
                        <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a>
                        <a class="btn btn-primary" href="#">
                            @if($product->getDiscountedPrice() > 0)
                                <del>Rs.{{$product['price']}}</del>
                                @if($product->discount > 0)
                                    {{$product->discount}}%
                                @else
                                    {{$product->category->discount}}%
                                @endif
                                ->({{$product->getDiscountedPrice()}})
                            @else
                                Rs.{{$product['price']}}
                            @endif
                        </a>
                    </h4>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <hr class="soft"/>
</div>