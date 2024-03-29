@extends('second-main-panel.second-main')
@section('exam')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Exams
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                @if (count($examsForStudent) == 0)
                    <tr>
                        <th>No Data</th>
                    </tr>
                @else
                    <tr>
                        <th style="width: 40px">id</th>
                        <th>Exam</th>
                        <th style="width: 250px">Actions</th>
                    </tr>
                    @foreach ($examsForStudent as $examIitem)
                        <tr>
                            <td>{{ $examIitem->id }}</td>
                            <td>{{ $examIitem->exam_name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm"
                                    href="{{ url('/std/exam/class/examIndex/' . $examIitem->class_id . '/' . $examIitem->id) }}">
                                    <i>
                                    </i>
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>

@endsection
