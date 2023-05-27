<!DOCTYPE html>
<head>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 10px">
        <h2>Geekseat Saga : Return of the Coder</h2>
        <p>Input number of people, generate the form and submit it.</p>
        <p>For now it only 10 people allowed.</p>
        <form action="{{ route('counterWitch') }}" method="get">
            <div>
                <label for="people_number">
                    People number
                    <input type="text" name="people_number" id="people_number" />
                    <button type="button" id="generate_people_input" class="btn btn-primary btn-sm">GENERATE</button>
                </label>
            </div>
            <div id="people_number_target"></div>
            <div style="margin: 5px">
                <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
            </div>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div>
                @if (isset($data))
                    @foreach ($data['killNotes'] as $note)
                        <li>{{ $note }}</li>
                    @endforeach
                    <p>Average kill number is : {{$data['averageKillNumber']}}</p>
                @endif
            </div>
        </form>
    </div>
</body>
<script>
    $(function(){
        $("#generate_people_input").click(function(){
            var peopleNumber = $("#people_number").val();
            if (peopleNumber > 10) {
                alert("Whoops, for now it only number below or equals to 10 is allowed");
                return false;
            }
            $("#people_number_target").html("");
            for (var i = 1; i <= peopleNumber; i++) {
                var div = document.createElement("div");
                div.setAttribute("class",'person_row');
                var divLabel = document.createElement('div');
                var label = document.createElement('label');
                $(label).html("Person " + i + " ");
                $(div).append(label);
                var inputYOB = document.createElement('INPUT');
                inputYOB.setAttribute('name', 'person_year_of_birth[]');
                inputYOB.setAttribute('placeholder', 'year of birth');
                $(div).append(inputYOB);
                var inputYOD = document.createElement('INPUT');
                inputYOD.setAttribute('name', 'person_year_of_death[]');
                inputYOD.setAttribute('placeholder', 'year of death');
                $(div).append(inputYOD);
                $("#people_number_target").append(div);
            }
        });
    });
</script>
