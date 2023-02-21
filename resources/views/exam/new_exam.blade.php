@extends('main')
@section('exam')
    @php
        $timeE = Carbon\Carbon::parse($examTime->exam_startAt)->addMinutes($examTime->exam_duration);
        $date = $timeE->format('Y-m-d');
        $time = $timeE->format('H:i:s');
        
        $date_today = $date . ' ' . $time;
    @endphp
    @if (!$isExpired)
        @if (empty($qAndOp))
            <h1>No exam</h1>
        @else
            <form id="sub-anwser" action="{{ URL('/exam/class/answersStoer') }}" method="POST">
                @csrf
                @foreach ($qAndOp as $qAndOpItem)
                    <p>{{ $qAndOpItem->question_text }}</p>
                    @foreach (json_decode($qAndOpItem->options, true) as $op)
                        <input onclick="display(this)" type="radio" id="{{ $qAndOpItem->question_id }}#{{ $op }}"
                            name="{{ $qAndOpItem->question_id }}" value="HTML">
                        <label for="html">{{ $op }}</label><br>
                    @endforeach
                    <br>
                @endforeach
                <input hidden id="classID" name="classID" value="{{ $classID }}"> 
                <input hidden id="examID" name="examID" value="{{ $qAndOp[0]->exam_id }}">
                <button type="submit" id="test1" class="btn btn-primary">Submit</button>
            </form>

            @php
                echo '<p id="demo" ></p>';
            @endphp
        @endif
    @else
        <h1>NO Exam</h1>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        var answers = {};

        function display(btn) {
            var str = btn.id;
            radio_id = str.split('#');
            querstion_id = radio_id[0];
            question_ansewr = radio_id[1];
            answers[querstion_id] = question_ansewr;
        }
        var exam = document.getElementById("examID").value;
        var classID = document.getElementById("classID").value;
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

                $(document).ready(function() {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/exam/class/answersStoer',
                        type: 'POST',
                        data: {
                            'datas': answers,
                            '_token': '<?= csrf_token() ?>',
                            'exam': exam,
                            'classID':classID
                        },
                        success: function(data) {
                            top.location.href = "http://127.0.0.1:8000/student/index";
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                    return false;
                })
                
            }
        }, 1000);

        $(document).ready(function() {
            $("#sub-anwser").submit(function(e) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/exam/class/answersStoer',
                    type: 'POST',
                    data: {
                        'datas': answers,
                        '_token': '<?= csrf_token() ?>',
                        'exam': exam,
                        'classID':classID
                    },
                    success: function(data) {
                        top.location.href = "http://127.0.0.1:8000/student/index";
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                return false;
            });
        })
    </script>
@endsection
