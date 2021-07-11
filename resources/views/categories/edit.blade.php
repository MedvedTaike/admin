@extends('layouts.main')

@section('content')
@section('special_css')
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
<div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Редактировать категорию</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Категории</a></li>
              <li class="breadcrumb-item active">Редактировать категорию</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="categoryName">Имя категории</label>
                    <input type="text" class="form-control" id="categoryName" name="name" value="{{ $category->name }}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Сортировка</label>
                    <input type="number" class="form-control" id="sorting" name="sort" value="{{ $category->sort }}">
                  </div>
                  <div class="form-group">
                    <label>Родительская категория</label>
                    {{Form::select('parent_id', 
                        $categories, 
                        $category->parent_id, 
                        ['class' => 'form-control', 'placeholder' => 'Нет категории'])
                      }}
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение категории</label>
                    <div class="product-img">
                      <img src="{{ $category->getImage() }}" alt="Category Image" class="img-size-100">
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'inputFile'])}}
                        <label class="custom-file-label" for="inputFile">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $category->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Оторажение категории</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Отредактировать категорию</button>
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
