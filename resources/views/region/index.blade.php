@extends('layouts.main')

@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Управление регионами</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item active">Регионы</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('regions.create') }}" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Добавить регион</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Районы</h3>
          </div>  
          <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($regions as $region)
                  <li class="item">
                    <div class="product-info ml-2">
                      <a href="{{ route('regions.edit', $region->id ) }}" class="product-title"><i class="fa fa-chevron-right btn-sm"></i>{{ $region->name }}
                        <a href="{{ route('regions.show', $region->id )}}" class="btn btn-success float-right">{{ $region->users->count() }}</span></a>
                    </div>
                  </li>  
                @endforeach
                </ul>
           </div>
        </div>
    </section>
</container>
@endsection
