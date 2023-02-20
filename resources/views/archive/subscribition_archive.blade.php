@extends('main')
@section('archive')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Subscribtion index
            </h3>
            <a class="btn btn-info btn-sm float-right" href="{{ url('/subscribtion/create') }}"> create new Subscribtion</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 40px">id</th>
                    <th>Subscribtion Plan</th>
                    <th style="width: 250px">Actions</th>
                </tr>
                @foreach ($subscribtion as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->subscribtion_plan }}</td>
                        <td>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <form class="form-line" method="POST"
                                        action="{{ URL('/subscribition_archive/restore/' . $item->id) }}">
                                        @csrf
                                        <button class="btn btn-info btn-sm" type="sumbit" class="btn btn-danger">
                                            Restore</button>
                                    </form>
                                </div>
                                <div class="form-group col-md-3">
                                    <form class="form-line" method="POST"
                                        action="{{ URL('/subscribition_archive/destroy/' . $item->id) }}">
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
