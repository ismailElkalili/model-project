@extends('main')
@section('forms')
    <div class="card" style="margin:15px 15px 15px 265px ;">
        <div class="card-header">
            <h3 class="card-title">Add Subscribition</h3>
        </div>
        <form action="{{ URL('/subscribtion/update/' .$subscribtion->id) }}" method="POST" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="subscribtionPlan">Subscribtion Plan</label>
                    <input type="text" class="form-control" value="{{$subscribtion->subscribtion_plan}}" id="subscribtionPlan" name="subscribtionPlan" placeholder="Enter Subscribtion Plan">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
