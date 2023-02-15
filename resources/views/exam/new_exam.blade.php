@extends('main')
@section('exam')

    @if (!$isExpired)
        @php
            $timeE = Carbon\Carbon::parse($examTime->exam_duration)->addMinutes(720);
            $date = $timeE->format('Y-m-d');
            $time = $timeE->format('H:i:s');
            
            $date_today = $date . ' ' . $time;
        @endphp
        @if (empty($qAndOp))
            <h1>No exam</h1>
        @else
            <form>
                @foreach ($qAndOp as $qAndOpItem)
                    <p>{{ $qAndOpItem->question_text }}</p>

                    @foreach (json_decode($qAndOpItem->options, true) as $op)
                        {{--  <input onclick="display(this)" type="radio" id="{{ $qAndOpItem->id }}{{ $op }}"
                            name="{{ $op }}" />  --}}
                        <input onclick="display(this)" type="radio" id="{{ $qAndOpItem->id }}#{{ $op }}"
                            name="{{ $qAndOpItem->id }}" value="HTML">
                        <label for="html">{{ $op }}</label><br>
                    @endforeach
                    <br>
                @endforeach
            </form>


            <script type="text/javascript">
                var count_id = "@php echo $date_today; @endphp";
                var countDownDate = new Date(count_id).getTime();

                var x = setInterval(function() {
                    var now = new Date()
                        .getTime();
                    var distance = countDownDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").style.display = 'none';
                    }
                }, 1000);
            </script>

            @php
                echo '<p id="demo" ></p>';
            @endphp

            <script>
                var answers = [];
                function display(btn) {
                    var str = btn.id;
                    radio_id = str.split('#');
                    querstion_id = radio_id[0];
                    question_ansewr = radio_id[1];
                    answers[querstion_id] = question_ansewr;
                    console.log(answers);
                }
            </script>
        @endif
    @else
        <h1>NO Exam</h1>
    @endif


    {{--  $examTime  --}}

@endsection
