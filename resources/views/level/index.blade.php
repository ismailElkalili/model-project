@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Level index
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 40px">id</th>
                    <th>name</th>
                    <th style="width: 250px">Actions</th>
                </tr>
                @foreach ($levels as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url('/level/show/' . $item->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ url('/level/edit/' . $item->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ url('/level/archive/' . $item->id) }}">
                                <i class="fas fa-trash">
                                </i>
                                Archive
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
