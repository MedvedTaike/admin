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
            <h5>Создание клиента</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Управление клиентами</a></li>
              <li class="breadcrumb-item active">Создание клиента</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'users.store', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="clientName">Имя клиента</label>
                    <input type="text" class="form-control" id="clientName" placeholder="Введите имя клиента" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="magazin">Имя магазина</label>
                    <input type="text" class="form-control" id="magazin" placeholder="Имя магазина" name="magazin" value="{{ old('magazin') }}">
                  </div>
                  <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" placeholder="Введите адрес" name="address" value="{{ old('address') }}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="number" class="form-control" id="phone" placeholder="Введите телефон" name="phone" value="{{ old('phone') }}">
                  </div>
                  <div class="form-group">
                    <label for="phone_2">Телефон 2</label>
                    <input type="number" class="form-control" id="phone_2" placeholder="Введите запасной телефон" name="phone_2" value="{{ old('phone_2') }}">
                  </div>
                  <div class="form-group">
                    <label for="watsapp">Watsapp номер</label>
                    <input type="number" class="form-control" id="watsapp" placeholder="Ватсап номер если есть" name="watsapp" value="{{ old('watsapp') }}">
                  </div>
                  <div class="form-group">
                    <label for="social">Соцсети</label>
                    <input type="text" class="form-control" id="social" placeholder="Никнейм в соцсетях" name="social" value="{{ old('social') }}">
                  </div>
                  <div class="form-group">
                    <label>Категория клиента</label>
                    {{Form::select('role', 
                        $roles, 
                        null, 
                        ['class' => 'form-control'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Район</label>
                    {{Form::select('region', 
                        $regions, 
                        null, 
                        ['class' => 'form-control'])
                      }}
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
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