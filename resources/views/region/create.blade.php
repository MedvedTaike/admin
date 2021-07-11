@extends('layouts.main')

@section('content')
<div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Добавить район</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Упр. районами</a></li>
              <li class="breadcrumb-item active">Добавить район</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => 'regions.store']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="regionName">Имя района</label>
                    <input type="text" class="form-control" id="regionName" placeholder="Введите имя района" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Описание района</label>
                    <input type="text" class="form-control" id="description" placeholder="Введите описание" name="description" value="{{old('description')}}">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Добавить район</button>
                </div>
          {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
