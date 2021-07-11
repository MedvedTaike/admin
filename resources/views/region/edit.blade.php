@extends('layouts.main')

@section('content')
<div class="container">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Редактировать район</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{ route('regions.index') }}">Упр. районами</a></li>
              <li class="breadcrumb-item active">Редактировать {{ $region->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
        <div class="col-12">
        @include('errors')
        {{ Form::open(['route' => ['regions.update' , $region->id], 'method' => 'put' ]) }}
            <div class="card-body">
                  <div class="form-group">
                    <label for="regionName">Имя района</label>
                    <input type="text" class="form-control" id="regionName" name="name" value="{{ $region->name }}">
                  </div>
                  <div class="form-group">
                    <label for="description">Описание района</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $region->description}}">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редактировать район</button>
                </div>
          {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
