@extends('main')
@section('tabels')
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
                                @if ($levels->count() == 0)
                                    <td>No level</td>
                                @else
                                    @foreach ($levels as $itemLevel)
                                        @if ($itemLevel->id == $item->level_id)
                                            <td>{{ $itemLevel->name }}</td>
                                        @elseif($itemLevel->id != $item->level_id && $itemLevel->id != null)
                                            <td>No level</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                            <td>
                                <form class="form-inline" method="POST"
                                    action="{{ URL('/student_archive/archive/' . $item->id) }}">
                                    @csrf
                                    <a class="btn btn-primary btn-sm" href="{{ url('/student/profile/' . $item->id) }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>

                                    <a class="btn btn-info btn-sm" href="{{ url('/student/edit/' . $item->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" type="sumbit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>
    @if (Session::has('mes'))
        <label class="alert alert-success text-right" id="success-alert">
            {{ Session::get('mes') }}
            <button style="margin-left: 5px" type="button" class="close" data-dismiss="alert">&times;</button>
        </label>
    @endif
    <script type="text/javascript">
        setTimeout(function() {
            // Closing the alert
            $('.alert').alert('close');
        }, 3000);
    </script>
@endsection
