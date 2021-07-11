@extends('layouts.main')

@section('content')
<div class="container">
<div class="row">
    <div class="col-12">
        <h5 class="m-2">Админ панель</h5>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-parachute-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Поставщики</span>
                <span class="info-box-number">{{ $sellers }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-product-hunt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Всего товаров</span>
                <span class="info-box-number">{{ $product }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Всего заказов</span>
                <span class="info-box-number">{{ $order }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Всего пользователей</span>
                <span class="info-box-number">{{ $users }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    </div>
</div>
@endsection