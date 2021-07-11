@extends('layouts.main')
@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Управление брендами</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Упр. брендами</a></li>
              <li class="breadcrumb-item active">{{ $brand->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h8 class="card-title">Товары бренда {{ $brand->name }}</h8>
          </div>  
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                 @foreach($products as $product)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{ $product->getImage()}}" class="img-size-50">
                    </div>
                    <div class="product-info">
                      @php $product->status == null ? $status = 'text-danger' : $status = ''; @endphp
                      <a href="{{ route('products.edit', [$product->id]) }}" class="product-title {{ $status }}">{{ $product->name }}
                        <span class="badge badge-warning float-right">@money($product->price) сом</span></a>
                      <span class="product-description">
                        {{ $product->description }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
    </section>
</container>
@endsection