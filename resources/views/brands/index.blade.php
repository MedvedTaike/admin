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
              <li class="breadcrumb-item active">Упр. брендами</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('brands.create') }}" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Добавить бренд</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Бренды</h3>
          </div>  
          <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($brands as $brand)
                <li class="item">
                    <div class="product-img">
                        <img src="{{ $brand->getImage() }}" alt="Brand Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      @php $brand->status == null ? $status = 'text-warning' : $status = ''; @endphp
                      <a href="{{ route('brands.edit', $brand->id)}}" class="product-title {{ $status }}">{{$brand->name}}</a>
                        <a href="{{ route('brands.show', $brand->id) }}" class="btn btn-success float-right">{{ $brand->products->count() }}</a>
                      <span class="product-description">
                        {{ $brand->category->name }}
                      </span>
                    </div>
                </li>
                @endforeach
                </ul>
           </div>
        </div>
    </section>
</container>
@endsection
