@extends('main')
@section('tabels')
    <div class="card-header">
        Exam Details
    </div>
    <div class="card-body">
        <h1>exam name: {{ $exam->exam_name }}</h1>
        <h4>exam code: {{ $exam->exam_code }}</h4>
        <h4>exam duration: {{ $exam->exam_duration }}</h4>
        <h4>exam type: {{ $exam->exam_type }}</h4>
        <h4>exam start at: {{ $exam->exam_startAt }}</h4>
        <a class="btn btn-sm btn-outline-danger" href="{{ url()->previous() }}"> back</a>
    </div>
@endsection
