@extends('main')
@section('exam')
    @php
        
        $studentAnswer = json_decode($answersStudent->student_answer, true);
        
    @endphp
    <form disabled method="POST">
        @csrf

        @for ($x = 0; $x < count($qAndOp); $x++)
            <p>{{ $qAndOp[$x]->question_text }}</p>
            @php
                
                $options = json_decode($qAndOp[$x]->options, true);
                
            @endphp
            @for ($i = 0; $i < count($options); $i++)
                @if ($options[$i] == $studentAnswer[$qAndOp[$x]->id])
                    <input checked disabled type="radio" value="HTML">
                    <label disabled for="html">{{ $options[$i] }}</label><br>
                @else
                    <input disabled type="radio" value="HTML">
                    <label disabled for="html">{{ $options[$i] }}</label><br>
                @endif
            @endfor
            <br>
            @foreach ($qAndOpWithAnswers as $answers)
                @if ($answers->question_id == $qAndOp[$x]->question_id)
                    <label disabled for="html">{{ json_decode($answers->options, true) }}</label><br>
                @endif
            @endforeach
        @endfor
    </form>


@endsection
