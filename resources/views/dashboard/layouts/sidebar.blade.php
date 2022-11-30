<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/home*') ? 'active' : '' }}" aria-current="page" href="/dashboard/home">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>

        @can('admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/certificates*') ? 'active' : '' }}" href="/dashboard/certificates">
            <span data-feather="award" class="align-text-bottom"></span>
            Certificates
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/member*') ? 'active' : '' }}" href="/dashboard/member">
            <span data-feather="users" class="align-text-bottom"></span>
            Member
          </a>
        </li>
        @endcan

      </ul>
    </div>
</nav>