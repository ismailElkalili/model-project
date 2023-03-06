@extends('main')
@section('exam')
    @php
        $date = Carbon\Carbon::parse($examForStudent->exam_startAt)->format('Y-m-d');
        $time = Carbon\Carbon::parse($examForStudent->exam_startAt)->format('H:i:s');
        
        $date_today = $date . ' ' . $time;
    @endphp
    <h1>{{ $examForStudent->exam_name }}</h1>
    <h1>{{ $examForStudent->exam_startAt }}</h1>

    @if ($isSubmited)
        <form action="{{ URL('/exam/class/OldExam/' . $classID . '/' . $examForStudent->id) }}" method="GET">
            <button type="submit" class="btn btn-primary">View</button>
        </form>
    @elseif (!$isExpired)
        <form action="{{ URL('/exam/class/' . $classID . '/' . $examForStudent->id) }}" method="GET">
            <button type="submit" class="btn btn-primary" id="attemp">Attempt</button>
        </form>
    @elseif($isExpired)
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
                    // document.getElementById("demo").style.display = 'none';
                    // window.alert('please reload the page');
                    location.reload();
                }
            }, 1000);
        </script>
        @php
            echo '<p id="demo" ></p>';
        @endphp
    @endif
@endsection
