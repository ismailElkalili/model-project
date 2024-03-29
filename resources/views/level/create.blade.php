@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Level</h3>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="{{ URL('/level/store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="level-Name">level Name</label>
                    @if ($errors->any())
                        <input type="text" class="form-control" id="level_Name" name="level_Name"
                            placeholder="Enter level Name" style="border-color: red">
                    @else
                        <input type="text" class="form-control" id="level_Name" name="level_Name"
                            placeholder="Enter level Name">
                    @endif
                    @error('level_Name')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">create</button>
                <a href="{{ url('/level/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
