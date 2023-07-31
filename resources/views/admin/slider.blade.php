
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"  src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="add.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin panel</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          <div class="info">
        </div>
          <a href="#" class="d-block">PRADEEP VALIA</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open category-menu">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Stores
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ url('admin/stores/list') }}" class="nav-link list-category">
                            <i class="fas fa-align-justify"></i>
                            <p>List</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stores.add') }}" class="nav-link">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <p>Add</p>
                        </a>
                    </li>
                </ul>


            </li>
          <li class="nav-item has-treeview menu-open category-menu">
            <a href="javascript:void(0)" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Product
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="{{ url('admin/product/list') }}" class="nav-link list-category">
                    <i class="fas fa-align-justify"></i>
                    <p>List</p>
                </a>

                </li>
                <li class="nav-item">
                  <a href="{{ route('product.add') }}" class="nav-link">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <p>Add</p>
                  </a>
                </li>
            </ul>


          </li>
            <li class="nav-item has-treeview menu-open category-menu">
                <a href="javascript:void(0)" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Stock
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ url('admin/stock/list') }}" class="nav-link list-category">
                            <i class="fas fa-align-justify"></i>
                            <p>List</p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('stock.add') }}" class="nav-link">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <p>Add</p>
                        </a>
                    </li>
                </ul>


            </li>

            <li class="nav-item has-treeview menu-open">
            <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        </ul>
      </nav>
    </div>
  </aside>
