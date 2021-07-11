<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Администрация</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->getImage() }}" class="img-circle elevation-2" alt="Admin Image">
        </div>
        <div class="info">
          <a href="/admin" class="d-block">Привет {{ Auth::user()->name }}</a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ route('logout') }}" class="d-block"><i class="fas fa-sign-out-alt"></i>Выйти</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header">Управление</li>
          <li class="nav-item">
            <a href="/categories" class="nav-link">
              <i class="nav-icon fab fa-elementor"></i>
              <p>
                Категории
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/products" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Товары
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/orders" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Заказы
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Клиенты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/brands" class="nav-link">
              <i class="nav-icon far fa-copyright"></i>
              <p>
                Бренды
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/sellers" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Поставщики
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/regions" class="nav-link">
              <i class="nav-icon fas fa-globe-americas"></i>
              <p>
                Районы
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/price-groups" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Ценовые группы
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>