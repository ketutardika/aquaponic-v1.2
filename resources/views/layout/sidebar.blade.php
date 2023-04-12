<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img class="logo" src="{{ url('assets/images/202206121143-aquamonia_logo_wide.png') }}" height="45px">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Manage Farm</li>
            <li class="nav-item {{ active_class(['farm-section']) }}">
                <a href="{{ route('farm-section.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Farm Section</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['farm-block']) }}">
                <a href="{{ route('farm-block.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Farm Block</span>
                </a>
            </li>
            <li class="nav-item nav-category">Manage Aquaponic</li>
            <li class="nav-item {{ active_class(['crops']) }}">
                <a href="{{ route('crops.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="compass"></i>
                    <span class="link-title">Manage Crop</span>
                </a>
            </li>
            <<!-- li class="nav-item {{ active_class(['fishs']) }}">
                <a href="{{ route('fishs.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="compass"></i>
                    <span class="link-title">Manage Fish</span>
                </a>
            </li> -->
            <li class="nav-item nav-category">Manage Sensor</li>
            <li class="nav-item {{ active_class(['sensor-device']) }}">
                <a href="{{ route('sensor-device.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Sensor Reading</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['sensor-device-auto']) }}">
            <a href="{{ route('sensor-device-auto.index') }}" class="nav-link">
                <i class="link-icon" data-feather="inbox"></i>
                <span class="link-title">Sensor Automatic</span>
            </a>
            </li>
            <li class="nav-item {{ active_class(['sensor-type']) }}">
                <a href="{{ route('sensor-type.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Sensor Type</span>
                </a>
            </li>
            <!-- <li class="nav-item nav-category">Task List</li>
            <li class="nav-item">
                <a href="{{ route('tasklist.show','1') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tasklist.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Manage Task List</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tasklist.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Create Task List</span>
                </a>
            </li> -->
            <li class="nav-item nav-category">Users</li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Manage Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Manage Roles</span>
                </a>
            </li>
            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="link-icon" data-feather="globe"></i>
                    <span class="link-title">Generals</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('clear-cache') }}" class="nav-link">
                    <i class="link-icon" data-feather="refresh-ccw"></i>
                    <span class="link-title">Clear Cache</span>
                </a>
            </li>
            <!-- <li class="nav-item">
        <a href="{{ route('reset-database') }}" class="nav-link">
          <i class="link-icon" data-feather="database"></i>
          <span class="link-title">Reset Database</span>
        </a>
      </li>   -->
            <li class="nav-item {{ active_class(['logout']) }}">
                <a href="{{ route('logout.perform') }}" class="nav-link">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
