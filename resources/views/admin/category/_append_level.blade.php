<div class="form-group">
    <label>Select Category Level</label>
    <select name="parent_id" id="parent-id" class="form-control select2" style="width: 100%;">
    <option selected="selected" value="0" {{$category->parent_id == 0 ? 'selected' : ''}}>Main Category</option>
    @if(!empty($getCategories))
        @foreach($getCategories as $category_level)
            <option value="{{$category_level->id}}" {{$category->parent_id == $category_level->id ? 'selected' : ''}}>
                {{$category_level->name}}
            </option>
            @if(!empty($category_level->subcategories))
                @foreach($category_level->subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">&nbsp;&nbsp;&raquo;&nbsp;{{$subcategory->name}}</option>
                @endforeach
            @endif
        @endforeach
    @endif
    </select>
</div>