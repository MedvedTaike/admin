@extends('layouts.main')

@section('content')
<container>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>{{ $region->name }}</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Упр. клиентами</a></li>
              <li class="breadcrumb-item active">{{ $region->name }}</li>
            </ol>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="{{ route('users.create') }}" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Добавить клиента</a>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Кол. клиентов {{ $region->users->count() }}</h3>
          </div>  
          <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($users as $user)
                  <li class="item">
                    <div class="product-info ml-2">
                        <div>
                            @php $user->status != null ? $status = 'btn-success' : $status = 'btn-danger'; @endphp
                            <p class="product-title mb-1">{{$user->magazin}} <a href="{{route('users.edit', $user->id) }}" class="btn float-right {{ $status }}"><i class="fa fa-edit"></i></a></p>
                            <p class="mb-1">Имя клиента {{ $user->name }} / Адрес {{ $user->address }} / Телефон {{ $user->phone }}</p>
                        </div>
                    </div>
                  </li>  
                @endforeach
                </ul>
           </div>
        </div>
    </section>
</container>
@endsection
