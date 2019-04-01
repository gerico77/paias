@inject('request', 'Illuminate\Http\Request')
<ul class="sidebar navbar-nav">

    <li class="nav-item {{ $request->segment(1) == 'home' || $request->segment(1) == '' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item {{ $request->segment(1) == 'exams' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('exams.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Exam</span>
        </a>
    </li>
    <li class="nav-item {{ $request->segment(1) == 'results' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('results.index') }}">
            <i class="fas fa-poll"></i>
            <span>Results</span></a>
        </a>
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
        @endif

        @if(Auth::user()->isDepartmentHead() || Auth::user()->isAdmin())
        <li class="nav-item {{ $request->segment(1) == 'courses' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('courses.index') }}">
                    <i class="fas fa-book-open"></i>
                    <span>Courses</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'professors' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('professors.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Professors</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'students' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('students.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Students</span></a>
            </a>
        </li>
    @endif

    @if(!Auth::user()->isStudent())
        {{-- <li class="nav-item {{ $request->segment(1) == 'tasks' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tasks.index') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Tasks</span></a>
            </a>
        </li> --}}
        {{-- <li class="nav-item {{ $request->segment(1) == 'download' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('download.viewfile') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Download Files</span></a>
            </a>
        </li> --}}
        <li class="nav-item {{ $request->segment(1) == 'enrolls' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('enrolls.index') }}">
                    <i class="fas fa-user-plus"></i>
                    <span>Enroll</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'subjects' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subjects.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Subjects</span></a>
            </a>
        </li>
        <li class="nav-item {{ $request->segment(1) == 'questions' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('questions.index') }}">
                <i class="fas fa-fw fa-question-circle"></i>
                <span>Question Bank</span></a>
            </a>
        </li>
        {{-- <li class="nav-item {{ $request->segment(1) == 'questions_options' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('questions_options.index') }}">
                <i class="fas fa-question"></i>
                <span>Questions Options</span></a>
            </a>
        </li> --}}
    @endif
</ul>