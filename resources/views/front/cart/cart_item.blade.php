<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Description</th>
            <th colspan="2">Quantity/Update</th>
            <th>Price</th>
            <th>Discount Amount</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $totals = 0; $total_discount = 0;?>
        @foreach($productItems as $item)
        <tr>
            <td> <img width="60" src="{{asset('images/product_images/small/'.$item['product']['image'])}}" alt=""/></td>
            <td colspan="2">
                {{$item->product->name}}({{$item->product->code}})<br/>
                Color : {{$item->product->color}}<br/>
                Size : {{$item['size']}}
            </td>
            <td>
            <div class="input-append">
                <input class="span1" style="max-width:34px" value="{{$item->quantity}}" id="appendedInputButtons" size="16" type="text">
                <button class="btn updateCartQuantity qtyMinus" cartId="{{$item->id}}" type="button"><i class="icon-minus"></i></button>
                <button class="btn updateCartQuantity qtyPlus" cartId="{{$item->id}}" type="button"><i class="icon-plus"></i></button>
                <button class="btn btn-danger deleteCartQuantity" cartId="{{$item->id}}" type="button"><i class="icon-remove icon-white"></i></button>
            </div>
            </td>
            <td>MMK {{$item->getCalculatedProduct()['discounted_price']}}</td>
            <td>MMK {{$item->getCalculatedProduct()['discount']}}.00</td>
            <td>MMK {{$item->quantity * $item->getCalculatedProduct()['discounted_price']}}.00</td>
        </tr>
        <?php
            $totals = $totals+($item->quantity * $item->getCalculatedProduct()['discounted_price']);
            $total_discount = $total_discount+$item->getCalculatedProduct()['discount'];
        ?>
        @endforeach
			
        <tr>
            <td colspan="6" style="text-align:right">Total Price:	</td>
            <td> MMK {{$totals}}.00</td>
        </tr>
            <tr>
            <td colspan="6" style="text-align:right">Total Discount:	</td>
            <td> MMK {{$total_discount}}.00</td>
        </tr>
        <tr>
            <td colspan="6" style="text-align:right"><strong>TOTAL (MMK) =</strong></td>
            <td class="label label-important" style="display:block"> <strong> MMK {{$totals}}.00 </strong></td>
        </tr>
    </tbody>
</table>