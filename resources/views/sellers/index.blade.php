@extends('layouts.main')

@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Управление поставщиками</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">Упр. поставщиками</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('sellers.create') }}" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Добавить поставщика</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Поставщики</h3>
          </div>  
          <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($sellers as $seller)
                <li class="item">
                    <div class="product-info ml-3">
                      @php $seller->status == null ? $status = 'text-warning' : $status = ''; @endphp
                      <a href="{{ route('sellers.edit', $seller->id)}}" class="product-title {{ $status }}">{{$seller->name}}</a>
                        <a href="{{ route('sellers.show', $seller->id) }}" class="btn btn-success float-right">{{ $seller->products->count() }}</a>
                      <span class="product-description">
                        Адрес: {{ $seller->address }} / Телефон: {{ $seller->phone }}
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
