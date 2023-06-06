<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.student_index')}}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Students
        </p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="{{route('admin.seat_index')}}" class="nav-link">
        <i class="bi bi-table pr-2" style="font-size: 20px"></i>
        <p>
          Seats
        </p>
      </a>
    </li> --}}
    {{-- <li class="nav-item">
      <a href="{{route('admin.class_index')}}" class="nav-link">
        <i class="nav-icon fas fa-pencil-ruler"></i>
        <p>
          Students Classes
        </p>
      </a>
    </li> --}}
    <li class="nav-item">
      <a href="{{route('admin.subject_index')}}" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Students Subject
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.attendance_index')}}" class="nav-link">
        <i class="bi bi-clipboard-check pr-2" style="font-size: 20px"></i>
        <p>
          Attendance
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{route('admin.routine_index')}}" class="nav-link">
        <i class="bi bi-card-list pr-2" style="font-size: 20px"></i>
        <p>
          Routine setup
        </p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Layout Options
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right">6</span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="pages/layout/top-nav.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Top Navigation</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Top Navigation + Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/boxed.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Boxed</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Sidebar <small>+ Custom Area</small></p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-topnav.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Navbar</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/fixed-footer.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Fixed Footer</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Collapsed Sidebar</p>
          </a>
        </li>
      </ul>
    </li> --}}
  
  </ul>