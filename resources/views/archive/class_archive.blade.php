@extends('main')
@section('archive')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                classes index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/classes/create') }}"> create new classes</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                @if ($classes->count() == 0)
                    <tr>
                        <th>No Data</th>
                    </tr>
                @else
                    <tr>
                        <th style="width: 40px">id</th>
                        <th>Name</th>
                        <th>Teacher</th>
                        <th>Subject</th>
                        <th>State</th>
                        <th style="width: 250px">Actions</th>
                    </tr>
                    @foreach ($classes as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->class_name }}</td>
                            @if (is_null($item->teacher_id))
                                <td>No Teacher</td>
                            @else
                                @foreach ($teachers as $teacherItem)
                                    @if ($item->teacher_id == $teacherItem->id)
                                        <td>{{ $teacherItem->teacher_name }}</td>
                                    @endif
                                @endforeach
                            @endif

                            @if (is_null($item->subject_id))
                                <td>No Subject</td>
                            @else
                                @foreach ($subjects as $subjectItem)
                                    @if ($item->subject_id == $subjectItem->id)
                                        <td>{{ $subjectItem->subject_name }}</td>
                                    @endif
                                @endforeach
                            @endif

                            @if ($item->state == 0)
                                <td>Open</td>
                            @else
                                <td>Close</td>
                            @endif

                            <td>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ url('/class_archive/restore/' . $item->id) }}">
                                            @csrf
                                            <button class="btn btn-info btn-sm" type="sumbit" class="btn btn-danger">
                                                Restore</button>
                                        </form>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ URL('/class_archive/destroy/' . $item->id) }}">
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
