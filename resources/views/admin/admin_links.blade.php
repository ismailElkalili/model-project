@extends('main')
@section('admin')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ URL('/student/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Students
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/student/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/student/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Student</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ URL('/teacher/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Teachers
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/teacher/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/teacher/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Teacher</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{ URL('/subject/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Subjects
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/subject/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/subject/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Subject</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ URL('/classes/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Classes
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/classes/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/classes/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Class</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ URL('/level/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Level
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/level/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/level/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Level</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ URL('/subscribtion/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Subscribtion
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/subscribtion/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Index</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/subscribtion/create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Subscribtion</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ URL('/subscribtion/index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Archive
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ URL('/archive/student_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/teacher_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Teacher</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/class_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Classes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/level_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Level</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/exam_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Exam</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/std_subs_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Subs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/subject_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subject</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL('/archive/subscribition_archive') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Subscribition</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
@endsection
