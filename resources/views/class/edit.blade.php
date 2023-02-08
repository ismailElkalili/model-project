@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Classes</h3>
        </div>
        <form action="{{ URL('/classes/update/' . $classes->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="classesName">Name</label>
                    @if ($errors->has('classesName'))
                        <input type="text" name="classesName" class="form-control" id="classesName"
                            style="border-color: red"placeholder="Enter classes Name" value="{{ $classes->class_name }}" />
                    @else
                        <input type="text" class="form-control" value="{{ $classes->class_name }}" id="classesName"
                            name="classesName" placeholder="Enter classes Name">
                    @endif
                    @error('classesName')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Teachers</label>
                        @if ($errors->has('teacherID'))
                            <select class=" form-control custom-select" name="teacherID" style="border-color: red;">
                                @foreach ($teachers as $teacherItem)
                                    @if ($classes->teacher_id == $teacherItem->id)
                                        <option selected value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}
                                        </option>
                                    @else
                                        <option value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}</option>
                                    @endif
                                @endforeach
                            @else
                                <select class="form-control custom-select" name="teacherID" id="teacherID">
                                    @foreach ($teachers as $teacherItem)
                                        @if ($classes->teacher_id == $teacherItem->id)
                                            <option selected value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}
                                            </option>
                                        @else
                                            <option value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        @endif
                        @error('teacherID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-sm-6">
                        <label>Subjects</label>
                        <select class="form-control custom-select" name="subjectID" id="subjectID">
                            @foreach ($subjects as $subjectItem)
                                @if ($classes->subject_id == $subjectItem->id)
                                    <option selected value={{ $subjectItem->id }}>{{ $subjectItem->subject_name }}
                                    </option>
                                @else
                                    <option value={{ $subjectItem->id }}>{{ $subjectItem->subject_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label>State</label>
                    <select class="form-control custom-select" name="state" id="state">
                        @if ($classes->state == 0)
                            <option selected value=0>OPEN</option>
                            <option value=1>CLOSE</option>
                        @else
                            <option value=0>OPEN</option>
                            <option selected value=1>CLOSE</option>
                        @endif

                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/classe/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
