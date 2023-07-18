<nav id="sidebarMenu" class="col-sm-2 bg-body-tertiary sidebar d-md-block collapse">
  <div class="position-sticky pt-4 pt-sm-5 fs-6">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <div class="d-flex align-items-center">
            <span data-feather="home" class="me-2"></span>
            <span>Dashboard</span>
          </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <div class="d-flex align-items-center mb-sm-1 mb-2">
            <span data-feather="file-text" class="me-2"></span>
            <span>My Post</span>
          </div>
        </a>
      </li>
      @can('superAdmin')
        <h6 class="sidebar-heading fw-bold d-flex justify-content-between align-items-center px-3 pt-3 pt-sm-4 text-muted fs-6">
          <span>ADMINISTRATOR</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <div class="d-flex align-items-center">
              <span data-feather="grid" class="me-2"></span>
              <span>Post Categories</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <div class="d-flex align-items-center">
              <span data-feather="users" class="me-2"></span>
              <span>User List</span>
            </div>
          </a>
        </li>
      @endcan

      @can('admin')
        <h6 class="sidebar-heading fw-bold d-flex justify-content-between align-items-center px-3 pt-3 pt-sm-4 text-muted fs-6">
          <span>ADMINISTRATOR</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <div class="d-flex align-items-center">
              <span data-feather="grid" class="me-2"></span>
              <span>Post Categories</span>
            </div>
          </a>
        </li>
      @endcan

    </ul>
    <ul class="nav flex-column mt-auto ms-3">
      <li class="nav-item">
        <button type="submit" class="btn btn-dark px-3 my-4">
          <div class="d-flex align-items-center">
            <span data-feather="log-out" class="me-2"></span>
            <a href="/" style="text-decoration: none" class="text-white">Home</a>
          </div>
        </button>
      </li>
    </ul>
  </div>
</nav>
