@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add subject</h3>
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
        <form action="{{ URL('/subject/store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="level-Name">subject Name</label>
                    @if ($errors->any())
                        <input type="text" class="form-control" id="subject_name" name="subject_name"
                            placeholder="Enter level Name" style="border-color: red">
                    @else
                        <input type="text" class="form-control" id="subject_name" name="subject_name"
                            placeholder="Enter level Name">
                    @endif
                    @error('subject_name')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}</div>
                    @enderror
                    @if ($errors->any())
                        <select class=" form-control custom-select" name="subject_level"
                            style="border-color: red;margin-top: 15px;">
                            <option value="">choose level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <select class=" form-control custom-select" name="subject_level" style="margin-top: 15px">
                            <option value="">choose level</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    @error('subject_level')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">create</button>
                <a href="{{ url('/subject/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
