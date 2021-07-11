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
            <h5>Редактирование бренда</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Управление брендами</a></li>
              <li class="breadcrumb-item active">Редактирование {{ $brand->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['brands.update', $brand->id], 'method' => 'put', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="brandName">Имя бренда</label>
                    <input type="text" class="form-control" id="brandName" name="name" value="{{ $brand->name }}">
                  </div>
                  <div class="form-group">
                    <label>Категория бренда</label>
                    {{Form::select('id_category', 
                        $categories, 
                        $brand->id_category, 
                        ['class' => 'form-control', 'placeholder' => 'Категория бренда'])
                      }}
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение бренда</label>
                    <div class="product-img mb-3">
                      <img src="{{ $brand->getImage()}}" class="img-size-150">
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
                        @php $brand->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Отображение бренда</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать {{ $brand->name}}</button>
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