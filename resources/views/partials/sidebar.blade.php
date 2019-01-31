@inject('request', 'Illuminate\Http\Request')
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="{{ url('/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    {{-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>Questions</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Login Screens:</h6>
        <a class="dropdown-item" href="login.html">Login</a>
        <a class="dropdown-item" href="register.html">Register</a>
        <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">Other Pages:</h6>
        <a class="dropdown-item" href="404.html">404 Page</a>
        <a class="dropdown-item" href="blank.html">Blank Page</a>
      </div>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="{{ route('questions.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>Questions</span></a>
    </li>
    @if(Auth::user()->isAdmin())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-users"></i>
        <span>User Management</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
            <a class="dropdown-item" href="{{ route('user_actions.index') }}">User Actions</a>
       </div>
    </li>
        <li class="nav-item" class="{{ $request->segment(1) == 'professors' ? 'active active-sub' : '' }}">
            <a class="nav-link" href="{{ route('professors.index') }}">
                <i class="fa fa-user"></i>
                <span>Professors</span></a>
            </a>
        </li>
    </ul>
    </li>
    @endif
  </ul>