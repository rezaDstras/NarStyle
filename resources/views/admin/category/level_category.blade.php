<div class="form-group">
    <label>Category Level</label>
    <select id="parent_id" name="parent_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" >
        <option value="0"
        @if(isset($categoryData['parent_id']) && $categoryData['parent_id'] == 0)
            selected=""
                @endif
        >Main Category</option>
        @if(!empty($getCategories))
            @foreach($getCategories as $category)
                <option value="{{$category->id}}"
                        @if(isset($categoryData['parent_id']) && $categoryData['parent_id'] == $category['id'])
                        selected=""
                    @endif
                >{{$category->category_name}}</option>
                @if(!empty($category['subCategories']))
                    @foreach($category['subCategories'] as $subcategory)
                        <option value="{{$subcategory->id}}">&nbsp;&raquo;&raquo;
                            {{$subcategory->category_name}}</option>

                    @endforeach
                @endif
            @endforeach
        @endif
    </select>
</div>
