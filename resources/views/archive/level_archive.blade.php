@extends('main')
@section('archive')
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
                        <div class="row">
                            <div class="form-group col-md-3">
                                <form class="form-line" method="POST"
                                    action="{{ url('/level_archive/restore/' . $item->id) }}">
                                    @csrf
                                    <button class="btn btn-info btn-sm" type="sumbit" class="btn btn-danger">
                                        Restore</button>
                                </form>
                            </div>
                            <div class="form-group col-md-3">
                                <form class="form-line" method="POST"
                                    action="{{ URL('/level_archive/destroy/' . $item->id) }}">
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
        </table>
    </div>
</div>
@endsection
