<div class="form-group">
    <label>Select Category Level</label>
    <select name="parent_id" id="parent-id" class="form-control select2" style="width: 100%;">
    <option selected="selected" value="0">Main Category</option>
    @if(!empty($categories))
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @if(!empty($category->subcategories))
                @foreach($category->subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">&nbsp;&nbsp;&raquo;&nbsp;{{$subcategory->name}}</option>
                @endforeach
            @endif
        @endforeach
    @endif
    </select>
</div>