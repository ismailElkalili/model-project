@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add teacher</h3>
        </div>
        <form action="{{ URL('/teacher/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-3">
                        <label for="teacher-first-Name">First Name</label>
                        <input type="text" class="form-control" id="teacher_First_Name" name="teacher_First_Name"
                            placeholder="Enter First Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Father Name</label>
                        <input type="text" class="form-control" id="teacher_second_Name" name="teacher_second_Name"
                            placeholder="Enter Father Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Grandfather Name</label>
                        <input type="text" class="form-control" id="teacher_third_Name" name="teacher_third_Name"
                            placeholder="Enter Grandfather Name">
                    </div>
                    <div class="col-3">
                        <label for="student-Name">Last Name</label>
                        <input type="text" class="form-control" id="teacher_Last_Name" name="teacher_Last_Name"
                            placeholder="Enter Last Name">
                    </div>

                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" name="dob" id="dob"
                            placeholder="Date of birth">
                    </div>
                    <div class="col-6">
                        <label for="teacher-phone_number">Phone Number</label>
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
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label>Level</label>
                        <select class="form-control custom-select" name="levelID" id="levelID">
                            @foreach ($levels as $item)
                                <option value={{ $item->id }}>{{ $item->name }}</option>
                            @endforeach

                        </select>

                    </div>

                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6">
                        <label>qualification</label>
                        <select class="form-control custom-select" name="qualification" id="levelID">
                            <option value="bachelor">bachelor</option>
                            <option value="master">Master</option>
                            <option value="phd">Phd</option>
                        </select>

                    </div>

                </div>
                <div class="row" style="margin-top: 10px">
                    <div class=" col-md-12 custom-file from-control text-left">
                        <label class="block mb-4">
                            <span class="sr-only">Choose File</span>
                            <input type="file" name="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </label>
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
