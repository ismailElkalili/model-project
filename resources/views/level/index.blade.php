@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Level index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{url('/level/create')}}"> create new level</a>
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
                            {{-- <a class="btn btn-primary btn-sm" href="{{ url('/level/show/' . $item->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> --}}
                            <a class="btn btn-info btn-sm" href="{{ url('/level/edit/' . $item->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <span>
                            <form style="display: inline"  method="POST" action="{{ url('/level/destroy/' . $item->id) }}">
                                @csrf
                                <button type="sumbit" class="btn btn-danger btn-sm" ><i class="fas fa-trash">
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
