@extends('main')
@section('forms')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Subscribition</h3>
        </div>
        <form action="{{ URL('/subscribtion/store') }}" method="POST" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="subscribtionPlan">Subscribtion Plan</label>
                    <input type="text" class="form-control" id="subscribtionPlan" name="subscribtionPlan" placeholder="Enter Subscribtion Plan">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
