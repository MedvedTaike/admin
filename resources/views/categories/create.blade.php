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
            <h5>Создание категории</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
              <li class="breadcrumb-item active">Создание категории</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'categories.store', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Имя категории</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Введите имя категории" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Сортировка</label>
                    <input type="number" class="form-control" id="sorting" placeholder="Сортировка" name="sort" value="1">
                  </div>
                  <div class="form-group">
                    <label>Родительска категория</label>
                    {{Form::select('parent_id', 
                        $categories, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Выберите категорию'])
                      }}
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение категории</label>
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
                        <label for="checkbox">Отображение категории</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать категорию</button>
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