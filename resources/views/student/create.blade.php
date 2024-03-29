@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <form action="{{ URL('/student/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="custom-file text-left">
                    <label class="block mb-4">
                        <span class="sr-only">Choose File</span>
                        <input type="file" name="image"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        @error('image')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </label>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="student-Name">First Name</label>
                        <input type="text" class="form-control" id="student_First_Name" name="student_First_Name"
                            placeholder="Enter First Name">
                        @error('student_First_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        <input type="text" class="form-control" id="student_Father_Name" name="student_Father_Name"
                            placeholder="Enter Father Name">
                        @error('student_Father_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        <input type="text" class="form-control" id="student_Grandfather_Name"
                            name="student_Grandfather_Name" placeholder="Enter Grandfather Name">
                        @error('student_Grandfather_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        <input type="text" class="form-control" id="student_Last_Name" name="student_Last_Name"
                            placeholder="Enter Last Name">
                        @error('student_Last_Name')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    @error('email')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" name="dob" id="dob"
                            placeholder="Date of birth">
                        @error('dob')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="student-phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            placeholder="Enter Phone Number">

                    </div>
                </div>

                <div class="row" style="margin-top: 10px">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gander</label>
                            <select class="form-control custom-select" name="gender" id="gender">
                                <option value=0>Male</option>
                                <option value=1>Female</option>
                            </select>
                            @error('gender')
                                <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label>Level</label>
                        <select class="form-control custom-select" name="levelID" id="levelID">
                            @foreach ($levels as $item)
                                <option value={{ $item->id }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('levelID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">create</button>
                <a href="{{ url('/student/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
