<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="./index.html" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="{{asset('backEnd/dist/assets/img/AdminLTELogo.png')}}"
          alt="AdminLTE Logo"
          class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">AdminLTE 4</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Dashboard
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./widgets/small-box.html" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Categories
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Create Category</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>List Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Tours
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tours.create')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Create Tour</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tours.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>List Tour</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="{{route('bookings.index')}}" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                Bookings
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-speedometer"></i>
              <p>
                News
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('news.create')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Create new</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('news.index')}}" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>List new</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>