@extends('main')
@section('exam')

<form disabled method="POST">
    @csrf
    @foreach ($qAndOp as $qAndOpItem)
        <p>{{ $qAndOpItem->question_text }}</p>
        @foreach (json_decode($qAndOpItem->options, true) as $op)
            <input disabled type="radio" value="HTML">
            <label disabled for="html">{{ $op }}</label><br>
        @endforeach
        <br>
    @endforeach

</form>


@endsection