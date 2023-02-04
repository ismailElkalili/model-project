@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                teacher index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/teacher/create') }}"> create new teacher</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 40px">id</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>phone Number</th>
                    <th style="width: 250px">Actions</th>
                </tr>
                @foreach ($teachers as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->teacher_name }}</td>
                        <td>{{ $item->teacher_email }}</td>
                        @if (is_null($item->teacher_phone_number))
                            <td>not exist</td>
                        @else
                            <td>{{ $item->teacher_phone_number }}</td>
                        @endif
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url('/teacherprofile/' . $item->id) }}">
                                <i class="fas fa-user">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ url('/teacher/edit/' . $item->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <span>
                                <form style="display: inline" method="POST"
                                    action="{{ url('/teacher/destroy/' . $item->id) }}">
                                    @csrf
                                    <button type="sumbit" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                        </i><span>Delete</span></button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
