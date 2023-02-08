@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add teacher</h3>
        </div>
        <form action="{{ URL('/teacher/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle fas fa-user"
                        style="width: 200px; height: 200px;align-content: center;justify-content: center;position: relative"
                        alt="No image">
                    <div class="row" style="margin-top: 20px">
                        <div class=" col-md-12 custom-file from-control text-center">
                            <label class="block mb-4">
                                <span class="sr-only">click here to uplaod your image profile</span>
                                @if ($errors->has('image'))
                                    <input type="file" name="image"
                                        class="custom-file from-control text-center"style="border-color: red" />
                                @else
                                    <input type="file" name="image" class="custom-file from-control text-center" />
                                @endif
                                @error('image')
                                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">

                    <div class="col-3">
                        <label for="teacher-first-Name">First Name</label>
                        @if ($errors->any())
                            <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                                placeholder="Enter First Name" style="border-color: red">
                        @else
                            <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                                placeholder="Enter First Name">
                        @endif
                        @error('teacher_First_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        @if ($errors->any())
                            <input type="text" class="form-control" id="teacher_second_Name" name="teacher_second_Name"
                                placeholder="Enter Father Name" style="border-color: red">
                        @else
                            <input type="text" class="form-control" id="teacher_second_Name" name="teacher_second_Name"
                                placeholder="Enter Father Name">
                        @endif
                        @error('teacher_second_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        @if ($errors->any())
                            <input type="text" class="form-control" id="teacher_third_Name" name="teacher_third_Name"
                                placeholder="Enter Grandfather Name" style="border-color: red">
                        @else
                            <input type="text" class="form-control" id="teacher_third_Name" name="teacher_third_Name"
                                placeholder="Enter Grandfather Name">
                        @endif
                        @error('teacher_third_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        @if ($errors->any())
                            <input type="text" class="form-control" id="teacher_Last_Name" name="teacher_Last_Name"
                                placeholder="Enter Last Name" style="border-color: red">
                        @else
                            <input type="text" class="form-control" id="teacher_Last_Name" name="teacher_Last_Name"
                                placeholder="Enter Last Name">
                        @endif
                        @error('teacher_Last_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    @if ($errors->any())
                        <input type="text" class="form-control" id="email" name="email"placeholder="Enter Email"
                            style="border-color: red">
                    @else
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    @endif
                    @error('teacher_email')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        @if ($errors->any())
                            <input type="date" class="form-control" name="dob" id="dob"
                                placeholder="Date of birth" style="border-color: red">
                        @else
                            <input type="date" class="form-control" id="dob" name="dob"
                                placeholder="Date of birth">
                        @endif
                        @error('dob')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="col-6">
                        <label for="teacher-phone_number">Phone Number</label>
                        @if ($errors->any())
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Enter Phone Number" style="border-color: red">
                        @else
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Enter Phone Number">
                        @endif
                        @error('teacher_phone_number')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gander</label>
                            @error('gender')
                                <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if ($errors->any())
                                <select class=" form-control custom-select" name="gender"
                                    style="border-color: red;margin-top: 15px;" id="gender">
                                    <option value=0>Male</option>
                                    <option value=1>Female</option>
                                </select>
                            @else
                                <select class="form-control custom-select" name="gender" id="gender">
                                    <option value=0>Male</option>
                                    <option value=1>Female</option>
                                </select>
                            @endif

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Level</label>
                        @if ($errors->any())
                            <select class=" form-control custom-select" name="levelID"
                                style="border-color: red;margin-top: 15px;">
                                <option value="">choose level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select class=" form-control custom-select" name="levelID" style="margin-top: 15px">
                                <option value="">choose level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        @error('levelID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6">
                        <label>qualification</label>
                        @error('qualification')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                        @if ($errors->any())
                            <select class=" form-control custom-select" name="qualification"
                                style="border-color: red;margin-top: 15px;" id="qualification">
                                <option value="bachelor">bachelor</option>
                                <option value="master">Master</option>
                                <option value="phd">Phd</option>
                            </select>
                        @else
                            <select class="form-control custom-select" name="qualification" id="qualification">
                                <option value="bachelor">bachelor</option>
                                <option value="master">Master</option>
                                <option value="phd">Phd</option>
                            </select>
                        @endif

                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">create</button>
                <a href="{{ url('/teacher/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
