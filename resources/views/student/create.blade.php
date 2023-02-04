@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <form action="{{ URL('/student/store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="student-Name">student Name</label>
                    <input type="text" class="form-control" id="student_Name" name="student_Name"
                        placeholder="Enter student Name" style="border-color: red">
                    <input type="text" class="form-control" id="student_Name" name="student_Name"
                        placeholder="Enter student Name">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">create</button>
                <a href="{{ url('/student/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
