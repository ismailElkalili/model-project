@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Students Classe sindex
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                @if ($studentsClassReq->count() == 0)
                    <tr>
                        <th>No Data</th>
                    </tr>
                @else
                    <tr>
                        <th style="width: 40px">id</th>
                        <th>Student Name</th>
                        <th>Classs Name</th>
                        <th style="width: 250px">Actions</th>
                    </tr>
                    @foreach ($studentsClassReq as $studentsClassReqItem)
                        <tr>
                            <td>{{ $studentsClassReqItem->id }}</td>
                            <td>{{ $studentsClassReqItem->student_name }}</td>
                            <td>{{ $studentsClassReqItem->class_name }}</td>
                            <td>
                                <form style="display: inline" method="POST"
                                    action="{{ url('/acceptStudent/' . $studentsClassReqItem->id) }}">
                                    @csrf
                                    <button type="sumbit" class="btn btn-success btn-sm"><i class="fas fa-trash">
                                        </i><span>Accept</span></button>
                                </form>
                                </span>

                                <span>
                                    <form style="display: inline" method="POST"
                                        action="{{ url('/rejectStudent/' . $studentsClassReqItem->id) }}">
                                        @csrf
                                        <button type="sumbit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                            </i><span>Reject</span></button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection
