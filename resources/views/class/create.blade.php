@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Classes</h3>
        </div>
        <form action="{{ URL('/classes/store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="classesName">Name</label>
                    @if ($errors->has('classesName'))
                        <input type="text" name="classesName" class="form-control" id="classesName"
                            style="border-color: red"placeholder="Enter classes Name" />
                    @else
                        <input type="text" class="form-control" id="classesName" name="classesName"
                            placeholder="Enter classes Name">
                    @endif
                    @error('classesName')
                        <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Teachers</label>
                        @if ($errors->has('teacherID'))
                            <select class=" form-control custom-select" name="teacherID"
                                style="border-color: red;">
                                <option value=''> choose teacher</option>
                                @foreach ($teachers as $teacherItem)
                                    <option value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control custom-select" name="teacherID" id="teacherID">
                                <option value=''> choose teacher</option>
                                @foreach ($teachers as $teacherItem)
                                    <option value={{ $teacherItem->id }}>{{ $teacherItem->teacher_name }}</option>
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
                                <option value="{{$subjectItem->id}}|{{$subjectItem->level_id}}">{{ $subjectItem->subject_name }}</option>
                            @endforeach
                        </select>


                    <div class="form-group col-md-6" >
                        <label>Subjects</label>
                        @if ($errors->has('subjectID'))
                            <select class=" form-control custom-select" name="subjectID"
                                style="border-color: red;">
                                <option value=''> choose subject</option>
                                @foreach ($subjects as $subjectItem)
                                    <option value={{ $subjectItem->id }}>{{ $subjectItem->subject_name }}</option>
                                @endforeach
                            </select>
                        @else
                            <select class="form-control custom-select" name="subjectID" id="subjectID">
                                <option value=''> choose subject</option>
                                @foreach ($subjects as $subjectItem)
                                    <option value={{ $subjectItem->id }}>{{ $subjectItem->subject_name }}</option>
                                @endforeach
                            </select>
                        @endif
                        @error('subjectID')
                            <div class="text-danger" style="font-size: 12px; margin: 0px 10px 0px 10px;">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>
                <div class="form-group">
                    <label>State</label>
                    @if ($errors->has('state'))
                        <select class=" form-control custom-select" name="state"
                            style="border-color: red;">
                            <option value=''>choose state</option>
                            <option value=0>OPEN</option>
                            <option value=1>CLOSE</option>
                        </select>
                    @else
                        <select class="form-control custom-select" name="state" id="state">
                            <option value=''>choose state</option>
                            <option value=0>OPEN</option>
                            <option value=1>CLOSE</option>
                        </select>
                    @endif
                    @error('state')
                        <div class="text-danger" style="font-size: 12px; margin: 15px 10px 0px 10px;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/classe/index') }}" class="btn btn-outline-danger ">cancel</a>
            </div>
        </form>
    </div>
@endsection
