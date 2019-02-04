@inject('request', 'Illuminate\Http\Request')
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'tests' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tests.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Exam</span>
        </a>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'results' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('results.index') }}">
            <i class="fas fa-poll"></i>
            <span>Results</span></a>
        </a>
    </li>

    @if(Auth::user()->isAdmin())

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="fa fa-users"></i>
        <span>User Management</span>
      </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
            <a class="dropdown-item" href="{{ route('user_actions.index') }}">User Actions</a>
        </div>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'courses' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('courses.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Courses</span></a>
        </a>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'subjects' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('subjects.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Subjects</span></a>
        </a>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'questions' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('questions.index') }}">
            <i class="fas fa-fw fa-question-circle"></i>
            <span>Questions</span></a>
        </a>
    </li>
    <li class="nav-item" class="{{ $request->segment(1) == 'questions_options' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('questions_options.index') }}">
            <i class="fas fa-question"></i>
            <span>Questions Options</span></a>
        </a>
    </li>
</ul>
@endif