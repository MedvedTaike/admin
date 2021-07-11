@foreach($categories as $category)
@php 
$category->status == null ? $status = 'text-warning' : $status = '';
@endphp
<div class="card card-primary collapsed-card m-0">
    <div class="card-header pl-1">
      <h3 class="card-title ml-2 {{$status}}">{{ str_repeat('--', $category->depth) }} {{ $category->name }}</h3>
      @if(!$category->isLeaf())
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
      </div>
      @elseif($category->isLeaf())
      <div class="card-tools">
        <span class="btn btn-warning btn-sm">{{ $category->products->count() }}</span>
        <a  href="{{ route('products.show', $category->id) }}" class="btn btn-success btn-sm"><i class="fas fa-arrow-right"></i></a>
      </div>
      @endif
    </div>
    @if(count($category->children) > 0)
    <div class="card-body p-0" style="display: none;">
       @include('parts.products_rec', ['categories' => $category->children])
    </div>
    @endif
</div>
@endforeach

