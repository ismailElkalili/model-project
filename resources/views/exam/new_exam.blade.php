@extends('main')
@section('exam')
    @foreach ($qAndOp as $qAndOpItem)
        <form action="/action_page.php">
            <p>{{$qAndOpItem->question_text}}</p>
            @foreach (json_decode($qAndOpItem->options, true) as $op)
                <input type="radio" id="html" name="fav_language" value="HTML">
                <label for="html">{{ $op }}</label><br>
            @endforeach
        </form>
        @endforeach
@endsection
