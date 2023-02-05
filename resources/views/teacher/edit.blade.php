@extends('main')
@section('forms')
    {{-- @dd($teacher) --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit <strong>{{ $teacher->teacher_name }}</strong> info</h3>
        </div>
        @php
            $name= explode(' ', $teacher->teacher_name);
            $qualification = ['bachelor', 'Master', 'Phd'];
            $gender = ['male', 'female'];
        @endphp

        <form action="{{ URL('/teacher/update/' . $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group" style="margin-top: 10px">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            style="width: 200px; height: 200px;align-content: center;justify-content: center;position: relative"
                            src="{{ asset('storage/' . $teacher->teacher_image) }}" alt="User profile picture">
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="custom-file from-control text-center">
                        <label class="block mb-4">
                            <span class="sr-only">Choose File</span>
                            <input type="file" name="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">

                        <label for="teacher-first-Name">First Name</label>
                        @if (is_null($name[0]))
                            <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                                placeholder="Enter First Name">
                        @else
                            <input type="text" value="{{ $name[0] }}" class="form-control" id="teacher_First_Name"
                                name="teacher_First_Name" placeholder="Enter First Name">
                        @endif
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        @if (is_null($name[1]))
                            <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                                placeholder="Enter First Name">
                        @else
                            <input type="text" value="{{ $name[1] }}" class="form-control" id="teacher_First_Name"
                                name="teacher_First_Name" placeholder="Enter First Name">
                        @endif
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        @if (is_null($name[2]))
                        <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                            placeholder="Enter First Name">
                    @else
                        <input type="text" value="{{ $name[2] }}" class="form-control" id="teacher_First_Name"
                            name="teacher_First_Name" placeholder="Enter First Name">
                    @endif
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        @if (is_null($name[3]))
                            <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                                placeholder="Enter First Name">
                        @else
                            <input type="text" value="{{ $name[3] }}" class="form-control" id="teacher_First_Name"
                                name="teacher_First_Name" placeholder="Enter First Name">
                        @endif
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" value="{{ $teacher->teacher_email }}" id="email"
                        name="email" placeholder="Enter Email">
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="{{ $teacher->Dob }}"
                            placeholder="Date of birth">
                    </div>
                    <div class="col-6">
                        <label for="teacher-phone_number">Phone Number</label>
                        <input type="text" value="{{ $teacher->teacher_phone_number }}"class="form-control"
                            id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gander</label>
                            <select class="form-control custom-select" name="gender" id="gender">
                                @if ($teacher->gender == 0)
                                    <option value=0>Male</option>
                                    <option selected value=1>Female</option>
                                @elseif($teacher->gender == 1)
                                    <option selected value=0>Male</option>
                                    <option value=1>Female</option>
                                @else
                                    <option value=" "> </option>
                                    <option value=0>Male</option>
                                    <option value=1>Female</option>
                                @endif


                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Level</label>
                        <select class="form-control custom-select" name="levelID" id="levelID">
                            @foreach ($level as $item)
                                <option value={{ $item->id }}>{{ $item->name }}</option>
                            @endforeach

                        </select>

                    </div>

                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6">
                        <label>qualification</label>
                        <select class="form-control custom-select" name="qualification" id="levelID">
                            @foreach ($qualification as $item)
                                @if ($teacher->qualification == $item)
                                    <option selected value="{{ $item }}">{{ $item }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endif
                            @endforeach


                        </select>

                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">update</button>
                <a href="{{ url('/teacher/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
