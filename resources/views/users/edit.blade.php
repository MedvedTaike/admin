@extends('layouts.main')

@section('special_css')
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
<div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Редактирование клиента</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Управление клиентами</a></li>
              <li class="breadcrumb-item active">{{$user->magazin}} {{ $user->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['users.update',$user->id], 'method' => 'put', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="clientName">Имя клиента</label>
                    <input type="text" class="form-control" id="clientName" name="name" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="magazin">Имя магазина</label>
                    <input type="text" class="form-control" id="magazin" name="magazin" value="{{$user->magazin}}">
                  </div>
                  <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Телефон 2</label>
                    <input type="number" class="form-control" id="phone_2" name="phone_2" value="{{$user->phone_2}}">
                  </div>
                  <div class="form-group">
                    <label for="watsapp">Watsapp номер</label>
                    <input type="number" class="form-control" id="watsapp" name="watsapp" value="{{$user->watsapp}}">
                  </div>
                  <div class="form-group">
                    <label for="social">Соцсети</label>
                    <input type="text" class="form-control" id="social" name="social" value="{{$user->social}}">
                  </div>
                  <div class="form-group">
                    <label for="password">Новый пароль</label>
                    <input type="text" class="form-control" id="password" name="password" value="">
                  </div>
                  <div class="form-group">
                    <label>Категория клиента</label>
                    {{Form::select('role', 
                        $roles, 
                        $user->role, 
                        ['class' => 'form-control'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Район</label>
                    {{Form::select('region', 
                        $regions, 
                        $user->region, 
                        ['class' => 'form-control'])
                      }}
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $user->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Статус клиента</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать клиента</button>
                </div>
          {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

@section('custom_script')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endsection