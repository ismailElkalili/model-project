@extends('main')
@section('exam')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Exams
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 40px">id</th>
                    <th>Exam</th>
                    <th style="width: 250px">Actions</th>
                </tr>
                @foreach ($examsForStudent as $examIitem)
                    {{--  @php
                        $date = Carbon\Carbon::parse($examIitem->exam_duration)->format('Y-m-d');
                        $time = Carbon\Carbon::parse($examIitem->exam_duration)->format('H:i:s');
                        
                        $date_today = $date . ' ' . $time;
                    @endphp  --}}

                    <tr>
                        <td>{{ $examIitem->id }}</td>
                        <td>{{ $examIitem->exam_name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm"
                                href="{{ url('/student/class/examIndex/' . $examIitem->class_id . '/' . $examIitem->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{--  @foreach ($qAndOp as $qAndOpItem)
        <form action="/action_page.php">
            <p>{{$qAndOpItem->question_text}}</p>
            @foreach (json_decode($qAndOpItem->options, true) as $op)
                <input type="radio" id="html" name="fav_language" value="HTML">
                <label for="html">{{ $op }}</label><br>
            @endforeach
        </form>
        @endforeach  --}}

    {{--  <script type="text/javascript">
        
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
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

    @php
        echo '<p id="demo" ></p>';
    @endphp  --}}
@endsection
