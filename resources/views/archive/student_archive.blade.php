@extends('main')
@section('archive')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                student index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/student/create') }}"> create new student</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                @if ($students->count() == 0)
                    <tr>
                        <th>No Data</th>
                    </tr>
                @else
                    <tr>
                        <th style="width: 40px">id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Level</th>
                        <th style="width: 250px">Actions</th>
                    </tr>
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->student_name }}</td>
                            <td>{{ $item->student_email }}</td>
                            <td>{{ $item->student_dob }}</td>
                            @if ($item->gender == 0)
                                <td>Male</td>
                            @else
                                <td>Female</td>
                            @endif

                            @if (is_null($item->student_phone_number))
                                <td>No number</td>
                            @else
                                <td>{{ $item->student_phone_number }}</td>
                            @endif

                            @if (is_null($item->level_id))
                                <td>No level</td>
                            @else
                                @foreach ($levels as $itemLevel)
                                    @if ($itemLevel->id == $item->level_id)
                                        <td>{{ $itemLevel->name }}</td>
                                    @endif
                                @endforeach
                            @endif

                            <td>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ URL('/student_archive/restore/' . $item->id) }}">
                                            @csrf
                                            <button class="btn btn-info btn-sm" type="sumbit" class="btn btn-danger">
                                                Restore</button>
                                        </form>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ URL('/student_archive/destroy/' . $item->id) }}">
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="sumbit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                                Delete</button>
                                        </form>
                                    </div>

                                </div>

                            </td>

                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>
@endsection
