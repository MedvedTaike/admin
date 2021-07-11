@extends('layouts.main')

@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Ценовые группы</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">Ценовые группы</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('price-groups.create') }}" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Добавить группу</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Ценовые группы</h3>
          </div>  
          <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($groups as $group)
                  <li class="item">
                    <div class="product-info ml-2">
                      <a href="{{ route('price-groups.edit', $group->id ) }}" class="product-title"><i class="fa fa-chevron-right btn-sm"></i>{{ $group->name }}</a>
                        <a href="{{ route('price-groups.show', $group->id )}}" class="btn btn-primary float-right">{{ $group->products->count() }}</a>
                        <button class="btn btn-success float-right mr-2">@money($group->value)</button>
                    </div>
                  </li>  
                @endforeach
                </ul>
           </div>
        </div>
    </section>
</container>
@endsection
