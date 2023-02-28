  @extends('second-main')
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
                          <li class="breadcrumb-item active">teacher Profile</li>
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
                                      style="width: 200px; height: 200px;align-content: center;justify-content: center;position: relative"
                                      src="{{ asset('storage/' . $teacher->teacher_image) }}" alt="User profile picture">
                              </div>
                              <h3 class="profile-username text-center">{{ $teacher->teacher_name }}</h3>
                              <p class="text-muted text-center">{{ $teacher->teacher_email }}</p>
                              <p class="text-muted text-center"> level :{{ $level->name }}</p>

                          </div>

                      </div>


                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">About Me</h3>
                          </div>

                          <div class="card-body">
                              <strong><i class="fas fa-calendar-alt mr-1"></i> Date pf birth</strong>
                              <p class="text-muted">
                                  {{ $teacher->Dob }} </p>
                              <hr>
                              <strong><i class="far fa-user   mr-1"></i> gender</strong>
                              <p class="text-muted">
                                  @if ($teacher->gender == '1')
                                      Female
                                  @else
                                      Male
                                  @endif
                              </p>
                              <hr>
                              <strong><i class="fas fa-book mr-1"></i> qualification</strong>
                              @if (is_null($teacher->qualification))
                                  <p class="text-muted">no qualification added </p>
                              @else
                                  <p class="text-muted">{{ $teacher->qualification }}</p>
                              @endif


                          </div>

                      </div>

                  </div>


                  <div class="col-md-9">
                      <div class="card">
                          <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                  <li class="nav-item"><a class="nav-link active" href="#subject"
                                          data-toggle="tab">Subject</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#exams" data-toggle="tab">Exams</a>
                                  </li>
                                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="active tab-pane" id="subject">
                                      @if (empty($classes))
                                          <td>No Classes For You</td>
                                      @else
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th style="width: 40px">id</th>
                                                  <th>Class</th>
                                                  <th>Subject</th>
                                                  <th style="width: 250px">Actions</th>
                                              </tr>
                                              @foreach ($classes as $classItem)
                                                  <tr>
                                                      <td>{{ $classItem->id }}</td>
                                                      <td>{{ $classItem->class_name }}</td>
                                                      <td>{{ $classItem->subject_name }}</td>
                                                      <td> <a class="btn btn-primary btn-sm"
                                                              href="{{ URL('/requestSubjcteStudent/' . $classItem->teacher_id . '/' . $classItem->id . '/' . $classItem->sub_id) }}">
                                                              <i class="fas fa-user">
                                                              </i>
                                                              View student class
                                                          </a></td>
                                                  </tr>
                                              @endforeach
                                          </table>
                                      @endif

                                  </div>
                                  <div class="tab-pane" id="exams">
                                      <a style="margin-bottom: 8px;" class="btn btn-info btn-sm float-right"
                                          href="{{ url('/exam/create') }}"> create
                                          new exam</a>
                                      @if (empty($exams))
                                          <td>there is no exams added until now </td>
                                      @else
                                          <table class="table table-bordered">
                                              <tr>
                                                  <th style="width: 40px">id</th>
                                                  <th>exam name</th>
                                                  <th>Subject</th>
                                                  <th>class name</th>
                                                  <th>exam code</th>
                                                  <th>Actions</th>
                                              </tr>
                                              @foreach ($exams as $exam)
                                                  <tr>
                                                      <td>{{ $exam->id }}</td>
                                                      <td>{{ $exam->exam_name }}</td>
                                                      <td>{{ $exam->subject_name }}</td>
                                                      <td>{{ $exam->class_name }}</td>
                                                      <td>{{ $exam->exam_code }}</td>
                                                      <td> <a class="btn btn-info btn-sm"
                                                              href="{{ url('/file-import/' . $exam->exam_code) }}">uplaod
                                                              question file</a>
                                                          <a class=" fas fa-user btn btn-primary btn-sm"
                                                              href="{{ url('/exam/show/' . $exam->id) }}">view details</a>
                                                      </td>
                                                  </tr>
                                              @endforeach
                                          </table>
                                      @endif
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
