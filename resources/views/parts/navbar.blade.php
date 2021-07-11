<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Админ панель</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @foreach($usersInfo as $userInfo)
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$userInfo->magazin}}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">{{ $userInfo->name}} {{$userInfo->address }}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 часа</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          @endforeach
          <a href="#" class="dropdown-item dropdown-footer">Посмотреть все сообщения</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{ $ordersInfo->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Новые заказы</span>
          <div class="dropdown-divider"></div>
          <a href="/orders" class="dropdown-item">
            <i class="fas fa-cart-plus mr-2"></i> Новых заказов {{ $ordersInfo->count() }}
            <span class="float-right text-muted text-sm">4 часа</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/orders" class="dropdown-item">
            <i class="fas fa-shipping-fast mr-2"></i>Срочных заказов {{ $ordersInfo->whereStrict('type','speed')->count() }}
          </a>
          <div class="dropdown-divider"></div>
          <a href="/orders" class="dropdown-item">
            <i class="fas fa-truck mr-2"></i> Не срочных заказов {{ $ordersInfo->whereStrict('type','usual')->count() }}
             
          </a>
          <div class="dropdown-divider"></div>
          <a href="/orders" class="dropdown-item dropdown-footer">Посмотреть все заказы</a>
        </div>
      </li>
    </ul>
  </nav>