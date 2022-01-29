<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
</head>

<body>
    <select name="countries" id="" onclick="send(event)" style="margin: 100px">
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>
    <select name="cities" id="cities" style="margin: 100px">
    </select>
</body>
</html>
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         'Content-Type': 'application/json'
    //     }
    // });

    $.ajax({
        type: 'GET',
        // url: 'filter?loc=' + event.target.value,
        url: 'cities',
        data: ({
            country: {{$first->id}}
            // _method: 'post'
        }),
        success: function(res) {
            var cities = $('#cities');
            cities.empty();
            for (var i in res) {
                $('#cities').append('<option value=' + res[i].name + '>' + res[i].name + '</option>');
            }
        }
    });

    function send(event) {
        $.ajax({
            type: 'GET',
            // url: 'filter?loc=' + event.target.value,
            url: 'cities',
            data: ({
                country: event.target.value
                // _method: 'post'
            }),
            success: function(res) {
                // var cities = document.getElementById('cities');
                var cities = $('#cities');
                cities.empty();
                for (var i in res) {
                    $('#cities').append('<option value=' + res[i].name + '>' + res[i].name + '</option>');
                }
                // cities[0].val(res[i].name);
                // table.style.background = 'red';
                // $(document.body).append(res);
                // console.log('d');
                // let citites = JSON.parse(res);
                // alert(res.data);
                // for (let i = 0; i < res.length; i++) {
                //     console.log(JSON.stringify(res[i].name));
                // }
                // alert('d');
            }
        });
    }
</script>
