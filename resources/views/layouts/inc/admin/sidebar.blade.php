<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav position-fixed">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            @if (Auth::user()->role_as == 0 || Auth::user()->role_as == 1)
                <a class="nav-link" href="{{ route('teacher.display_teacher') }}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Teachers</span>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (Auth::user()->role_as == 0 || Auth::user()->role_as == 1)
                <a class="nav-link" href="{{ route('student.student_display') }}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Students</span>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (Auth::user()->role_as == 0 || Auth::user()->role_as == 1)
                <a class="nav-link" href="{{ route('class.class') }}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Class</span>
                </a>
            @endif
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        mdi mdi-chair-school
        <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen
                        </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li> --}}
    </ul>
</nav>
