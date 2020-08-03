<form action="{{url('admin/update-category-status')}}" method="post">
    @csrf
    <input type="hidden" name="category_id" value="{{$category->id}}">
    <input type="hidden" name="status" value="{{$category->status}}">
    <a href="#" onclick="$(this).closest('form').submit();">
    @if($category->status == 1)
        <strong class="text-success">Active</strong>
    @else
        <strong class="text-red">Inactive</strong>
    @endif
    </a>
</form>