<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav position-fixed">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Forms</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Teachers</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Student</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Class</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Form elements</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tech" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Teachers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tech">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role_as == 0)
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/addteacher') }}"> Add Teachers
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/teacher') }}"> Teachers </a></li>
                    @elseif(Auth::user()->role_as == 1)
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/teacher') }}"> Teachers </a></li>
                    @endif
                    {{-- <li class="nav-item"> <a class="nav-link" href="#"> Add Teachers </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Teachers </a></li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#stu" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="stu">
                <ul class="nav flex-column sub-menu">
                    @if (Auth::user()->role_as == 1 or Auth::user()->role_as == 0)
                        <li class="nav-item"> <a class="nav-link" href="#"> Add Students </a></li>
                        <li class="nav-item"> <a class="nav-link" href="#"> Students </a></li>
                    @else
                        <li class="nav-item"> <a class="nav-link" href="#"> Students </a></li>
                    @endif
                    {{-- <li class="nav-item"> <a class="nav-link" href="#"> Add Students </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Students </a></li> --}}
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#class" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-chair-school menu-icon"></i>
                <span class="menu-title">Class</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="class">
                <ul class="nav flex-column sub-menu">
                    {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen
                        </a></li> --}}
                </ul>
            </div>
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
