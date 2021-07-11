@extends('layouts.empty')

@section('content')
<div class="card-body">
      <p class="login-box-msg">Войдите на сайт</p>
      @if(session('status'))
          <div class="alert alert-danger">
            {{session('status')}}
          </div>
      @endif
      @include('errors')
      {{ Form::open(['route' => 'login', 'method' => 'post'])}}
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Телефон" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Пароль" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
          </div>
        </div>
      {{ Form::close()}}
    </div>
@endsection