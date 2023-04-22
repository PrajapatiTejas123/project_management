<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  

<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
    <div class="dropdown-menu">
    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
  </div>
  </button>
</div>

          <li class="nav-item">
            <a href="{{'/admin/dashboard'}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{'/admin/user/list'}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{'/admin/project/list'}}" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Project Management
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{'/admin/task/list'}}" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Task Management
              </p>
            </a>
          </li>

        </ul>
      </nav>
    </div>
   
  </aside>