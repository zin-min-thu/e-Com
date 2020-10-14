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
                    <p>{{$product['fabric']}}</p>
                    <p>{{$product['sleeve']}}</p>
                    <p>{{$product['pattern']}}</p>
                    <p>{{$product['fit']}}</p>
                    <p>{{$product['occasion']}}</p>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <hr class="soft"/>
</div>