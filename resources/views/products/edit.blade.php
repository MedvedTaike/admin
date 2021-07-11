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
            <h5>Редактирование товара</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Управление товарами</a></li>
              <li class="breadcrumb-item active">{{ $product->name}} {{ $product->description }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['products.update', $product->id], 'method' => 'put', 'files' => true]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="productName">Имя товара</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}">
                  </div>
                  <div class="form-group">
                    <label for="Description">Описание товара</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                  </div>
                  @if($product->price_group == null)
                  <div class="form-group">
                    <label for="price">Цена товара</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="weight">Вес товара</label>
                    <input type="number" class="form-control" id="weight" name="weight" value="{{ $product->weight }}">
                  </div>
                  <div class="form-group">
                    <label for="volume">Обьем товара</label>
                    <input type="number" class="form-control" id="volume" name="volume" value="{{ $product->volume }}">
                  </div>
                  <div class="form-group">
                    <label for="sorting">Порядковый номер</label>
                    <input type="number" class="form-control" id="sorting" name="sort" value="{{ $product->sort }}">
                  </div>
                  <div class="form-group">
                    <label>Бренд товара</label>
                    {{Form::select('brand', 
                        $brands, 
                        $product->brand, 
                        ['class' => 'form-control', 'placeholder' => 'Нет бренда'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Поставщик товара</label>
                    {{Form::select('seller', 
                        $sellers, 
                        $product->seller, 
                        ['class' => 'form-control' , 'placeholder' => 'Нет поставщика'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Единица измерения</label>
                    {{Form::select('measure', 
                        $measure, 
                        $product->measure, 
                        ['class' => 'form-control', 'placeholder' => 'Нет'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Упаковка товара</label>
                    {{Form::select('pack', 
                        $packing, 
                        $product->pack, 
                        ['class' => 'form-control', 'placeholder' => 'Нет'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Ценовая группа</label>
                    {{Form::select('price_group', 
                        $price_group, 
                        $product->price_group, 
                        ['class' => 'form-control', 'placeholder' => 'Нет'])
                      }}
                  </div>
                  <div class="form-group">
                    <label>Выберите категорию товара</label>
                    <select name="category" class="form-control">
                        <option selected="selected" value="{{ $product->category }}">{{ $product->categories->name }}</option>
                        @include('parts.prod_category', ['categories' => $categories, 'product' => $product])
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputFile">Изображение товара</label>
                    <div class="product-img mb-3">
                      <img src="{{ $product->getImage()}}" class="img-size-150">
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'inputFile'])}}
                        <label class="custom-file-label" for="inputFile">Выберите изображение</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="convertation">Конвертация</label>
                    <select class="form-control" name="convertation" id="convert" >
                        <option value="{{ $product->convertation}}" selected="selected">
                            @if($product['convertation'] > 1)
                                {{ $product->convertation.'/1' }}
                            @else 
                                {{ 'Нет' }}
                            @endif
                        </option>
                        @for($i = 1; $i <= 50; $i++)
                        <option value="{{ $i }}">{{ $i.' к одному'}}</option>
                        @endfor
                    </select>
                </div>
                  <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        @php $product->status != null ? $status = 'checked' : $status = ''; @endphp
                        <input type="checkbox" id="checkbox" name="status" value="1" {{ $status }}>
                        <label for="checkbox">Отображение товара</label>
                      </div>
                    </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Отредактировать товар</button>
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