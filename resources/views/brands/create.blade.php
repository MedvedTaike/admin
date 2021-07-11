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
            <h5>Создание бренда</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Управление брендами</a></li>
              <li class="breadcrumb-item active">Создание бренда</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'brands.store', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="brandName">Имя бернда</label>
                    <input type="text" class="form-control" id="brandName" placeholder="Введите имя бренда" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label>Категория бренда</label>
                    {{Form::select('id_category', 
                        $categories, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Категория бренда'])
                      }}
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение бренда</label>
                    <div class="input-group">
                      <div class="custom-file">
                        {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'inputFile'])}}
                        <label class="custom-file-label" for="inputFile">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение бренда</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать бренд</button>
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