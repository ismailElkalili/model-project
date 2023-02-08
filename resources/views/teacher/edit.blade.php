@extends('main')
@section('forms')
    {{-- @dd($teacher) --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit <strong>{{ $teacher->teacher_name }}</strong> info</h3>
        </div>
        @php
            $name = explode(' ', $teacher->teacher_name);
            $qualification = ['bachelor', 'Master', 'Phd'];
            $gender = ['male', 'female'];
        @endphp
        {{-- @if ($errors->any())
            @dd($errors)
        @endif --}}
        <form action="{{ URL('/teacher/update/' . $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group" style="margin-top: 10px">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            style="width: 200px; height: 200px;align-content: center;
                            justify-content: center;position: relative"
                            src="{{ asset('storage/' . $teacher->teacher_image) }}" alt="User profile picture">
                        <input hidden value="{{ $teacher->teacher_image }}" name="old_image">
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
                        @elseif($errors->has('teacher_First_Name'))
                            <input type="text" value="{{ $name[0] }}" class="form-control" id="teacher_First_Name"
                                name="teacher_First_Name" placeholder="Enter First Name" style="border-color: red">
                        @else
                            <input type="text" value="{{ $name[0] }}" class="form-control" id="teacher_First_Name"
                                name="teacher_First_Name" placeholder="Enter First Name">
                        @endif
                        @error('teacher_First_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        @if (is_null($name[1]))
                            <input type="text" class="form-control" id="teacher_second_Name" name="teacher_second_Name"
                                placeholder="Enter First Name">
                        @elseif($errors->has('teacher_First_Name'))
                            <input type="text" value="{{ $name[1] }}" class="form-control" id="teacher_second_Name"
                                name="teacher_second_Name" placeholder="Enter First Name" style="border-color: red">
                        @else
                            <input type="text" value="{{ $name[1] }}" class="form-control" id="teacher_second_Name"
                                name="teacher_second_Name" placeholder="Enter First Name">
                        @endif
                        @error('teacher_second_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        @if (is_null($name[2]))
                            <input type="text" class="form-control" id="teacher_third_Name" name="teacher_third_Name"
                                placeholder="Enter First Name">
                        @elseif($errors->has('teacher_First_Name'))
                            <input type="text" value="{{ $name[1] }}" class="form-control" id="teacher_third_Name"
                                name="teacher_third_Name" placeholder="Enter First Name" style="border-color: red">
                        @else
                            <input type="text" value="{{ $name[2] }}" class="form-control" id="teacher_third_Name"
                                name="teacher_third_Name" placeholder="Enter First Name">
                        @endif
                        @error('teacher_third_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        @if (is_null($name[3]))
                            <input type="text" class="form-control" id="teacher_Last_Name" name="teacher_Last_Name"
                                placeholder="Enter First Name">
                            teacher_third_Name
                        @elseif($errors->has('teacher_First_Name'))
                            <input type="text" value="{{ $name[1] }}" class="form-control" id="teacher_Last_Name"
                                name="teacher_Last_Name" placeholder="Enter First Name" style="border-color: red">
                        @else
                            <input type="text" value="{{ $name[3] }}" class="form-control"
                                id="teacher_Last_Name" name="teacher_Last_Name" placeholder="Enter First Name">
                        @endif
                        @error('teacher_Last_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    @if ($errors->has('email'))
                        <input type="text" value="{{ $teacher->teacher_email }}"class="form-control" id="email"
                            name="email" placeholder="Enter First Name" style="border-color: red">
                    @else
                        <input type="text" class="form-control" value="{{ $teacher->teacher_email }}" id="email"
                            name="email" placeholder="Enter Email">
                    @endif
                    @error('email')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        @if ($errors->has('dob'))
                            <input type="date" class="form-control" name="dob" id="dob"
                                value="{{ $teacher->Dob }}" placeholder="Date of birth" style="border-color: red">
                        @else
                            <input type="date" class="form-control" name="dob" id="dob"
                                value="{{ $teacher->Dob }}" placeholder="Date of birth">
                        @endif
                        @error('dob')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="teacher-phone_number">Phone Number</label>
                        @if ($errors->has('phone_number'))
                            <input type="text" value="{{ $teacher->teacher_phone_number }}"class="form-control"
                                id="phone_number" name="phone_number" placeholder="Enter Phone Number"
                                style="border-color: red">
                        @else
                            <input type="text" value="{{ $teacher->teacher_phone_number }}"class="form-control"
                                id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                        @endif
                        @error('phone_number')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gander</label>
                            @if ($errors->has('gender'))
                                <select class="form-control custom-select" name="gender" id="gender"
                                    style="border-color: red">
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
                            @else
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
                            @endif
                            @error('gender')
                                <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <label>Level</label>
                        @if ($errors->has('levelID'))
                            <select class="form-control custom-select" name="levelID" id="levelID">
                                @foreach ($level as $item)
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                @endforeach

                            </select>
                        @else
                            <select class="form-control custom-select" name="levelID" id="levelID">
                                @foreach ($level as $item)
                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                @endforeach

                            </select>
                        @endif
                        @error('levelID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6">
                        <label>qualification</label>
                        @if ($errors->has('qualification'))
                            <select class="form-control custom-select" style="border-color: red" name="qualification"
                                id="qualification">
                                @foreach ($qualification as $item)
                                    @if ($teacher->qualification == $item)
                                        <option selected value="{{ $item }}">{{ $item }}</option>
                                    @else
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @else
                            <select class="form-control custom-select" name="qualification" id="qualification">
                                @foreach ($qualification as $item)
                                    @if ($teacher->qualification == $item)
                                        <option selected value="{{ $item }}">{{ $item }}</option>
                                    @else
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endif
                                @endforeach


                            </select>
                        @endif
                        @error('qualification')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
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
