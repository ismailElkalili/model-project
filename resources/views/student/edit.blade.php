@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <form action="{{ URL('/student/update/'.$student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @php
                $name = explode(' ', $student->student_name);
            @endphp

            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label for="student-Name">First Name</label>
                        <input value="{{ $name[0] }}" type="text" class="form-control" id="student_First_Name"
                            name="student_First_Name" placeholder="Enter First Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        <input value="{{ $name[1] }}" type="text" class="form-control" id="student_Father_Name"
                            name="student_Father_Name" placeholder="Enter Father Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        <input value="{{ $name[2] }}" type="text" class="form-control" id="student_Grandfather_Name"
                            name="student_Grandfather_Name" placeholder="Enter Grandfather Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        <input value="{{ $name[3] }}" type="text" class="form-control" id="student_Last_Name"
                            name="student_Last_Name" placeholder="Enter Last Name">
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    <input value="{{ $student->student_email }}" type="text" class="form-control" id="email"
                        name="email" placeholder="Enter Email">
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        <input value="{{ $student->student_dob }}" type="date" class="form-control" name="dob"
                            id="dob" placeholder="Date of birth">
                    </div>
                    <div class="col-6">
                        <label for="student-phone_number">Phone Number</label>
                        <input value="{{ $student->student_phone_number }}" type="text" class="form-control"
                            id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">

                    <div class="col-sm-6">
                        <div class="form-group custom-select">
                            <label>Gander</label>
                            <select class="form-control" name="gender" id="gender">
                                @if ($student->gender == 0)
                                    <option selected value=0>Male</option>
                                    <option value=1>Female</option>
                                @else
                                    <option value=0>Male</option>
                                    <option selected value=1>Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Level</label>
                        <select class="form-control custom-select" name="levelID" id="levelID">
                            @foreach ($levels as $item)
                                @if ($item->id == $student->level_id)
                                    <option selected value={{ $item->id }}>{{ $item->name }}</option>
                                @else
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                @endif
                            @endforeach

                        </select>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url('/student/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
