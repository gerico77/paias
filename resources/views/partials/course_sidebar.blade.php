@inject('request', 'Illuminate\Http\Request')
<ul class="sidebar navbar-nav">

    <li class="nav-item {{ $request->segment(1) == 'home' || $request->segment(1) == '' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item dropdown {{ $request->segment(1) == 'subject' ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fa fa-book"></i>
            <span>My subjects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            @if (count($subjects) > 0)
                @foreach ($subjects as $subject)
                    <a class="dropdown-item" href="{{ route('roles.index') }}">{{ $subject->title }}</a>
                @endforeach
            @endif
        </div>
    </li>

    @if(Auth::user()->isAdmin())
        <li class="nav-item dropdown {{ $request->segment(1) == 'roles' || $request->segment(1) == 'users' || $request->segment(1) == 'user_actions' ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-users"></i>
                <span>User maintenance</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                <a class="dropdown-item" href="{{ route('user_actions.index') }}">User Actions</a>
            </div>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'departments' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('departments.index') }}">
                    <i class="fas fa-building"></i>
                    <span>Departments</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'courses' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('courses.index') }}">
                    <i class="fas fa-book-open"></i>
                    <span>Courses</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'subjects' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subjects.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Subjects</span></a>
            </a>
        </li>
    @endif
</ul>