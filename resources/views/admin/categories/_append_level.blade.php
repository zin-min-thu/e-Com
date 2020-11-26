<div class="form-group">
    <label>Select Category Level</label>
    <select name="parent_id" id="parent-id" class="form-control select2" style="width: 100%;">
    @if(!empty($category))
        <option selected="selected" value="0" {{$category->parent_id == 0 ? 'selected' : ''}}>Main Category</option>
    @else
        <option selected="selected" value="0">Main Category</option>
    @endif
    @if(!empty($getCategories))
        @foreach($getCategories as $category_level)
            @if(!empty($category))
            <option value="{{$category_level->id}}" {{$category->parent_id == $category_level->id ? 'selected' : ''}}>
                {{$category_level->name}}
            </option>
            @else
            <option value="{{$category_level->id}}">
                {{$category_level->name}}
            </option>
            @endif
            @if(!empty($category_level->subcategories))
                @foreach($category_level->subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">&nbsp;&nbsp;&raquo;&nbsp;{{$subcategory->name}}</option>
                @endforeach
            @endif
        @endforeach
    @endif
    </select>
</div>