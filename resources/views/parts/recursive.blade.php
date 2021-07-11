@foreach($categories as $category)
@php 
$category->status == null ? $status = 'btn-danger' : $status = '';
@endphp
<div class="card card-primary collapsed-card m-0">
    <div class="card-header pl-1">
      <h3 class="card-title ml-{{$loop->depth + 1}}"><a href="{{ route('categories.edit', $category->id) }}" class="mr-2 {{ $status }}"><i class="fas fa-pen btn-sm"></i></a>{{ $category->name }}</h3>
      @if(!$category->isLeaf())
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
      </div>
      @endif
    </div>
    @if($category->children())
    <div class="card-body p-0" style="display: none;">
       @include('parts.recursive', ['categories' => $category->children])
    </div>
    @endif
</div>
@endforeach

