@php
	$sections = App\Section::sections();
	$sections = json_decode(json_encode($sections));
	// echo "<pre>"; print_r($sections);die;
@endphp
<div id="sidebar" class="span3">
    <div class="well well-small">
        <a id="myCart" href="{{url('cart')}}"><img src="{{ asset('images/front_images/ico-cart.png')}}" alt="cart"><span class="get-cart-count"></span> Items in your cart</a>
    </div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        @foreach($sections as $section)
        @if(count($section->categories) > 0)
        <li class="subMenu"><a>{{$section->name}}</a>
            <ul>
                @foreach($section->categories as $category)
                <li><a href="{{url($category->url)}}"><i class="icon-chevron-right"></i><strong>{{$category->name}}</strong></a></li>
                    @foreach($category->subcategories as $subcategory)
                    <li><a href="{{url($subcategory->url)}}"><i class="icon-chevron-right"></i>{{$subcategory->name}}</a></li>
                    @endforeach
                @endforeach
            </ul>
        </li>
        @endif
        @endforeach
    </ul>
    <br/>
    @if(isset($listing) && $listing=='listing')
        <div class="well well-small">
            <h5>Fabric</h5>
            @foreach($data['fabricArray'] as $fabric)
                <input style="margin-top: -5px;" type="checkbox" name="fabric[]" class="fabric" id="{{$fabric}}" value="{{$fabric}}"> &nbsp;&nbsp;{{$fabric}} <br>
            @endforeach
        </div>
        <div class="well well-small">
            <h5>Sleeve</h5>
            @foreach($data['sleeveArray'] as $sleeve)
                <input style="margin-top: -5px;" type="checkbox" name="sleeve[]" class="sleeve" id="{{$sleeve}}" value="{{$sleeve}}"> &nbsp;&nbsp;{{$sleeve}} <br>
            @endforeach
        </div>
        <div class="well well-small">
            <h5>Pattern</h5>
            @foreach($data['patternArray'] as $pattern)
                <input style="margin-top: -5px;" type="checkbox" name="pattern[]" class="pattern" id="{{$pattern}}" value="{{$pattern}}"> &nbsp;&nbsp;{{$pattern}} <br>
            @endforeach
        </div>
        <div class="well well-small">
            <h5>Fit</h5>
            @foreach($data['fitArray'] as $fit)
                <input style="margin-top: -5px;" type="checkbox" name="fit[]" class="fit" id="{{$fit}}" value="{{$fit}}"> &nbsp;&nbsp;{{$fit}} <br>
            @endforeach
        </div>
        <div class="well well-small">
            <h5>Occasion</h5>
            @foreach($data['occasionArray'] as $occasion)
                <input style="margin-top: -5px;" type="checkbox" name="occasion[]" class="occasion" id="{{$occasion}}" value="{{$occasion}}"> &nbsp;&nbsp;{{$occasion}} <br>
            @endforeach
        </div>
    @endif
    <div class="thumbnail">
        <img src="{{ asset('images/front_images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>