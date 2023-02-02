@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Subscribition</h3>
        </div>
        <form action="{{ URL('/level/update/' . $level->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="level-Name">level Name</label>
                    @if ($errors->any())
                        <input type="text" class="form-control" id="level_Name" name="level_Name"
                            placeholder="Enter level Name" style="border-color: red" >
                    @else
                    <input disabled hidden type="text" class="form-control" id="level_Name" name="level_Name" value="{{$level->name}}"
                            placeholder="Enter level Name">
                        <input type="text" class="form-control" id="level_Name" name="level_Name" value="{{$level->name}}"
                            placeholder="Enter level Name">
                    @endif
                    @error('level_Name')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
