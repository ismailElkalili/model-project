@extends('main')
@section('forms')
    <form action="{{ URL('/exam/store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exam-name">Eaxm Name</label>
                @if ($errors->has('exam_name'))
                    <input type="text" style="border-color: red" class="form-control" id="exam_name" name="exam_name"
                        placeholder="Enter Exam Name">
                @else
                    <input type="text" class="form-control" id="exam_name" name="exam_name"
                        placeholder="Enter Exam Name">
                @endif
                @error('exam_name')
                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exam-name">start AT Date</label>
                @if ($errors->has('exam_startAtDate'))
                    <input style="border-color: red" type="datetime-local" class="form-control" id="exam_startAtDate"
                        name="exam_startAtDate" placeholder="Enter Exam date">
                @else
                    <input type="datetime-local" class="form-control" id="exam_startAtDate" name="exam_startAtDate"
                        placeholder="Enter Exam date">
                @endif
                @error('exam_startAtDate')
                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-group">
                <label for="exam-name"> Exam type</label>
                @if ($errors->has('exam_type'))
                    <select style="border-color: red" class="form-control custom-select" name="exam_type" id="duration">
                        <option value=0>choose type</option>
                        <option value='quiz'> quiz</option>
                        <option value='mid'> mid </option>
                        <option value='final'> final</option>
                    </select>
                @else
                    <select class="form-control custom-select" name="exam_type" id="duration">
                        <option value=0>choose type</option>
                        <option value='quiz'> quiz</option>
                        <option value='mid'> mid </option>
                        <option value='final'> final</option>
                    </select>
                @endif
                @error('exam_type')
                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exam-name"> Exam duration</label>
                @error('exam_duration')
                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                        {{ $message }}
                    </div>
                @enderror
                @if ($errors->has('exam_duration'))
                    <select style="border-color: red" class="form-control custom-select" name="exam_duration"
                        id="duration">
                        <option value=0>choose duration</option>
                        <option value=15> rquarter hour (15 min)</option>
                        <option value=30> half an hour (30 min) </option>
                        <option value=60> hour (60 min) </option>
                        <option value=90> hour and half (90 min)</option>
                        <option value=1200> 2hours (120 min)</option>
                    </select>
                @else
                    <select class="form-control custom-select" name="exam_duration" id="duration">
                        <option value=0>choose duration</option>
                        <option value=15> rquarter hour (15 min)</option>
                        <option value=30> half an hour (30 min) </option>
                        <option value=60> hour (60 min) </option>
                        <option value=90> hour and half (90 min)</option>
                        <option value=1200> 2hours (120 min)</option>
                    </select>
                @endif

            </div>
            <div class="form-group">
                <label>Classes</label>
                <select class="form-control custom-select" name="exam_class_id" id="class_id">
                    @if (empty($classes))
                        <option value=0>No Classes For You</option>
                    @else
                        @foreach ($classes as $classItem)
                            <option value={{ $classItem->id }}>{{ $classItem->class_name }}
                            </option>
                        @endforeach
                    @endif

                </select>
                @error('exam_class_id')
                    <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">create</button>
            <a href="{{ url('/exam/index') }}" class="btn btn-outline-danger ">cancel</a>
        </div>
    </form>
@endsection
