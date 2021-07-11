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
            <h5>Создание товара</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Управление товарами</a></li>
              <li class="breadcrumb-item active">Создание товара</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'products.store', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="productName">Имя товара</label>
                    <input type="text" class="form-control" id="productName" placeholder="Введите имя товара" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="Description">Описание товара</label>
                    <input type="text" class="form-control" id="description" placeholder="Описание товара" name="description" value="{{ old('description') }}">
                  </div>
                  <div class="form-group">
                    <label for="price">Цена товара</label>
                    <input type="number" class="form-control" id="price" placeholder="Цена товара" name="price" value="{{ old('price') }}">
                  </div>
                  <div class="form-group">
                    <label for="weight">Вес товара</label>
                    <input type="number" class="form-control" id="weight" placeholder="Вес товара в граммах" name="weight" value="0">
                  </div>
                  <div class="form-group">
                    <label for="volume">Обьем товара</label>
                    <input type="number" class="form-control" id="volume" placeholder="Обьем товара в куб. см." name="volume" value="0">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Порядковый номер</label>
                    <input type="number" class="form-control" id="sorting" placeholder="Порядковый номер" name="sort" value="1">
                  </div>
                  <div class="form-group">
                    <label>Бренд товара</label>
                    {{Form::select('brand', 
                        $brands, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Бренд товара'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Поставщик товара</label>
                    {{Form::select('seller', 
                        $sellers, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Выберите поставщика'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Единица измерения</label>
                    {{Form::select('measure', 
                        $measure, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Единица измерения'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Упаковка товара</label>
                    {{Form::select('pack', 
                        $packing, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Упаковка товара'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Ценовая группа</label>
                    {{Form::select('price_group', 
                        $price_group, 
                        null, 
                        ['class' => 'form-control', 'placeholder' => 'Ценовая группа'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Выберите категорию товара</label>
                    <select name="category" class="form-control">
                        <option selected="selected" value>Выберите категорию</option>
                        @include('parts.prod_category', ['categories' => $categories])
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение товара</label>
                    <div class="input-group">
                      <div class="custom-file">
                        {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'inputFile'])}}
                        <label class="custom-file-label" for="inputFile">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="convertation">Конвертация</label>
                    <select class="form-control" name="convertation" id="convertation" >
                        <option value="1" selected="selected">Нет конвертации</option>
                        @for($i = 1; $i < 50; $i++)
                            <option value="{{ $i }}">{{ $i }} к одному!</option>
                        @endfor
                    </select>
                </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkbox" name="status" value="1">
                        <label for="checkbox">Отображение товара</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Создать товар</button>
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