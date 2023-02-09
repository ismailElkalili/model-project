@extends('main')
@section('profile')
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
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
                                <img class="profile-user-img img-fluid img-circle" style="width: 125px; height: 125px;"
                                    src="{{ asset('storage/' . $student->student_image) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $student->student_name }}</h3>
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
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#subject"
                                        data-toggle="tab">Subject</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#SubjectUnSubs" data-toggle="tab">Subjects
                                        UnSubs</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
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
                                                            <button disabled class="btn btn-danger btn-sm" type=""
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
                                            </tr>
                                            @foreach ($subjectsAccpet as $subjectsAccpetItem)
                                                <tr>
                                                    <td>{{ $subjectsAccpetItem->id }}</td>
                                                    <td>{{ $subjectsAccpetItem->subject_name }}</td>
                                                    <td>{{ $subjectsAccpetItem->teacher_name }}</td>
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
                                                            <form class="form-inline" method="POST"
                                                                action="{{ URL('/student/joinClass/' . $subUnJoin->classID . '/' . $student->id) }}">
                                                                @csrf

                                                                <button class="btn btn-danger btn-sm" type="sumbit"
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
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name">
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
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                    placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms
                                                            and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
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
@endsection
