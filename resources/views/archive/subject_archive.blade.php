@extends('main')
@section('archive')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                subjects index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/subject/create') }}"> create new subject</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                @if ($subjects->count() == 0)
                    <tr>
                        <th>No Data</th>
                    </tr>
                @else
                    <tr>
                        <th style="width: 40px">id</th>
                        <th>sbuject name</th>
                        <th>level name</th>
                        <th style="width: 250px">Actions</th>
                    </tr>
                    @foreach ($subjects as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->subject_name }}</td>
                            @if (is_null($item->level_id))
                                <td> not assign yet</td>
                            @else
                                @foreach ($levels as $level)
                                    @if ($item->level_id == $level->id)
                                        <td> {{ $level->name }} </td>
                                    @else
                                        <td> not assign yet</td>
                                    @endif
                                @endforeach
                            @endif
                            <td>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ url('/subject_archive/restore/' . $item->id) }}">
                                            @csrf
                                            <button class="btn btn-info btn-sm" type="sumbit" class="btn btn-danger">
                                                Restore</button>
                                        </form>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <form class="form-line" method="POST"
                                            action="{{ URL('/subject_archive/destroy/' . $item->id) }}">
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
