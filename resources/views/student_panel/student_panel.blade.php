<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>students</title>

    <link rel="stylesheet" href="{{ asset('cp_assets/bootstrap.min.css') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>


<body class="hold-transition sidebar-mini layout-fixed" style="background-color: rgb(230, 230, 230);">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Workhouse" height="60"
                width="60">
        </div>
        <!-- Navbar -->
        <nav class=" navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main content -->
        <div style="padding-top: 10px;padding-bottom: 15px ">
            <div class="content card card-primary card-outline" style="margin: 0px 70px 0px 70px;">
                <div class="container-fluid">
                    <div class="row " style="position: static;  display: inline; ">
                        <section class="">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h3>Profile</h3>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Student Profile</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle"
                                                        style="width: 150px; height: 150px;"
                                                        src="{{ asset('storage/' . $student->student_image) }}"
                                                        alt="User profile picture">
                                                </div>
                                                <h3 class="profile-username text-center">{{ $student->student_name }}
                                                </h3>
                                                <p class="text-muted text-center">{{ $student->student_email }}</p>
                                                <p class="text-muted text-center">Level :{{ $level->name }}</p>
                                            </div>

                                        </div>

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">About Me</h3>
                                            </div>

                                            <div class="card-body">
                                                <strong><i class="fas fa-calendar-alt mr-1"></i> Date pf birth</strong>
                                                <p class="text-muted">
                                                    {{ $student->student_dob }} </p>
                                                <hr>
                                                <strong><i class="far fa-user   mr-1"></i> gender</strong>
                                                <p class="text-muted">
                                                    @if ($student->gender == '1')
                                                        Female
                                                    @else
                                                        Male
                                                    @endif
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-book mr-1"></i> Phone</strong>
                                                @if (is_null($student->student_phone_number))
                                                    <p class="text-muted">no phone added </p>
                                                @else
                                                    <p class="text-muted">{{ $student->student_phone_number }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="card card-primary card-outline">
                                            <div class="card-header p-2">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item"><a class="nav-link active" href="#subject"
                                                            data-toggle="tab">Subject</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="#SubjectUnSubs"
                                                            data-toggle="tab">Subjects
                                                            UnSubs</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                                            data-toggle="tab">Settings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="active tab-pane" id="subject">
                                                        {{--  /////////////////////// Subject Accpteed  /////////////////////// --}}
                                                        @if (empty($subjectsJoin))
                                                            <h1>No Classes Witting</h1>
                                                        @else
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th style="width: 40px">id</th>
                                                                    <th>Name</th>
                                                                    <th>Teacher</th>
                                                                    <th style="width: 250px">Actions</th>
                                                                </tr>
                                                                @foreach ($subjectsJoin as $item)
                                                                    <tr>
                                                                        <td>{{ $item->id }}</td>
                                                                        <td>{{ $item->subject_name }}</td>
                                                                        <td>{{ $item->teacher_name }}</td>
                                                                        <td>
                                                                            <form class="form-inline" method="POST">
                                                                                @csrf
                                                                                <button disabled
                                                                                    class="btn btn-danger btn-sm"
                                                                                    type=""
                                                                                    class="btn btn-danger">
                                                                                    <i class="fas fa-folder"></i>
                                                                                    Witting</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endif
                                                        {{--  /////////////////////// Subject Accpteed  /////////////////////// --}}
                                                        @if (empty($subjectsAccpet))
                                                            <h1>No Classes For Student</h1>
                                                        @else
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th style="width: 40px">id</th>
                                                                    <th>Name</th>
                                                                    <th>Teacher</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                                @foreach ($subjectsAccpet as $subjectsAccpetItem)
                                                                    <tr>
                                                                        <td>{{ $subjectsAccpetItem->id }}</td>
                                                                        <td>{{ $subjectsAccpetItem->subject_name }}
                                                                        </td>
                                                                        <td>{{ $subjectsAccpetItem->teacher_name }}
                                                                        </td>
                                                                        <td> <a class="btn btn-primary btn-sm"
                                                                                href="{{ URL('/exam/show/' . $subjectsAccpetItem->id . '/' . $student->id) }}">
                                                                                <i class="fas fa-user">
                                                                                </i>
                                                                                View class
                                                                            </a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        @endif




                                                    </div>


                                                    <div class="tab-pane" id="SubjectUnSubs">
                                                        <div class="active tab-pane" id="subject">
                                                            @if (empty($subjectsUnJoin))
                                                                <h1>No Subjects For Student</h1>
                                                            @else
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th style="width: 40px">id</th>
                                                                        <th>Name</th>
                                                                        <th>Teacher</th>
                                                                        <th style="width: 250px">Actions</th>
                                                                    </tr>
                                                                    @foreach ($subjectsUnJoin as $subUnJoin)
                                                                        <tr>
                                                                            <td>{{ $subUnJoin->classID }}</td>
                                                                            <td>{{ $subUnJoin->subject_name }}</td>
                                                                            <td>{{ $subUnJoin->teacher_name }}</td>
                                                                            <td>
                                                                                <form class="form-inline"
                                                                                    method="POST"
                                                                                    action="{{ URL('/student/joinClass/' . $subUnJoin->classID . '/' . $student->id) }}">
                                                                                    @csrf

                                                                                    <button
                                                                                        class="btn btn-danger btn-sm"
                                                                                        type="sumbit"
                                                                                        class="btn btn-danger">
                                                                                        <i class="fas fa-folder"></i>
                                                                                        Join</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </table>
                                                            @endif

                                                        </div>


                                                    </div>

                                                    <div class="tab-pane" id="settings">
                                                        <form class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="inputName"
                                                                    class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control"
                                                                        id="inputName" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputEmail"
                                                                    class="col-sm-2 col-form-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="email" class="form-control"
                                                                        id="inputEmail" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName2"
                                                                    class="col-sm-2 col-form-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="inputName2" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputExperience"
                                                                    class="col-sm-2 col-form-label">Experience</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputSkills"
                                                                    class="col-sm-2 col-form-label">Skills</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="inputSkills" placeholder="Skills">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox"> I agree to the <a
                                                                                href="#">terms
                                                                                and conditions</a>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Workhouse App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- Workhouse for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('scripts/file_name_script.js') }}"></script>

</html>
