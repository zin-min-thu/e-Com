<form action="{{url('admin/update-section-status')}}" method="post">
    @csrf
    <input type="hidden" name="section_id" value="{{$section->id}}">
    <input type="hidden" name="status" value="{{$section->status}}">
    <a href="#" onclick="$(this).closest('form').submit();">
    @if($section->status == 1)
        <strong class="text-success">Active</strong>
    @else
        <strong class="text-red">Inactive</strong>
    @endif
    </a>
</form>