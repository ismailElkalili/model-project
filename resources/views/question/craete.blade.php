@extends('main')
@section('exam')
    <div class="card-header">
        <h2> please make sure put the exam code in the first cloumn in the excel file</h2>
        <h4 style="font-style: normal;font-weight: bold;">the exam code : {{ $exam_code }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input onchange="getUploadName()" id="customFile" type="file" name="file"><br>
            <span id="file_name">file name</span>
            <br>
            <button disabled id="upload_file_btn" class="btn btn-success" style="margin-top: 15px">
                uplaod question file
            </button>
        </form>
    </div>
@endsection
