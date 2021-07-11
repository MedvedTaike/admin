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
            <h5>Добавить поставщика</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sellers.index') }}">Управление поставщиками</a></li>
              <li class="breadcrumb-item active">Добавить поставщика</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'sellers.store']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="sellerName">Имя поставщика</label>
                    <input type="text" class="form-control" id="sellerName" placeholder="Введите имя поставщика" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="address">Адрес поставщика</label>
                    <input type="text" class="form-control" id="address" placeholder="Введите адрес поставщика" name="address" value="{{old('address')}}">
                  </div>
                  <div class="form-group">
                    <label for="phone">Телефон поставщика</label>
                    <input type="text" class="form-control" id="phone" placeholder="Введите телефон поставщика" name="phone" value="{{old('phone')}}">
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение поставщика</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Добавить поставщика</button>
                </div>
          {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
