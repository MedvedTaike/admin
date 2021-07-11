@foreach($categories as $category)
    @if(!$category->isLeaf())
    <option disabled>{{ str_repeat('--', $category->depth)}}{{ $category->name }}</option>
    @else
    <option value="{{ $category->id }}">{{ str_repeat('--', $category->depth)}}{{ $category->name }}</option>
    @endif
    @if(count($category->children) > 0)
        @include('parts.prod_category', ['categories' => $category->children])
    @endif
@endforeach

