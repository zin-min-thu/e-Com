<form action="{{url('admin/update-product-status')}}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <input type="hidden" name="status" value="{{$product->status}}">
    <a href="#" onclick="$(this).closest('form').submit();">
    @if($product->status == 1)
        <strong class="text-success">Active</strong>
    @else
        <strong class="text-red">Inactive</strong>
    @endif
    </a>
</form>