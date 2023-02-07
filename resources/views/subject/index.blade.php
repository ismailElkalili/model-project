@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                subjects index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/subject/create') }}"> create new subject</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
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
                                @endif
                            @endforeach
                        @endif
                        <td>
                            {{-- <a class="btn btn-primary btn-sm" href="{{ url('/level/show/' . $item->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> --}}
                            <a class="btn btn-info btn-sm" href="{{ url('/subject/edit/' . $item->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <span>
                                <form style="display: inline" method="POST"
                                    action="{{ url('/subject/archive/' . $item->id) }}">
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
