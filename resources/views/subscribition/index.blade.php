@extends('main')
@section('tabels')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Subscribtion index
            </h3>
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
                            <form class="form-inline" method="POST" action="{{ URL('/subscribtion/destroy/' . $item->id) }}">
                                @csrf
                                {{--  <a class="btn btn-primary btn-sm" href="{{ url('/subscribtion/show/' . $item->id) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>  --}}

                                <a class="btn btn-info btn-sm" href="{{ url('/subscribtion/edit/' . $item->id) }}">
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
