@extends('layouts.main')

@section('content')
<div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Редактировать группу</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('price-groups.index') }}">Ценовые группы</a></li>
              <li class="breadcrumb-item active">Редактировать {{ $group->name}}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['price-groups.update', $group->id], 'method' => 'put']) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="name">Имя группы</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $group->name }}">
                  </div>
                  <div class="form-group">
                    <label for="value">Цена группы</label>
                    <input type="text" class="form-control" id="value" placeholder="Введите цену" name="value" value="@money($group->value)">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать группу</button>
                </div>
          {{ Form::close() }}
        </div>
    </div>
</div>
@endsection