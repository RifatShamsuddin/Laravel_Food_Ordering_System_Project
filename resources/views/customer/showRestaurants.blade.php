<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:400,700");


        /* center container in the middle */
    </style>
    <!--  CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('welcome') }}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial:index.partial.html -->

    @foreach ($restaurants->chunk(3) as $chunk)
        <div class="container">
            <div class="card-group">
                @foreach ($chunk as $restaurant)
                    <div class="card"> <img
                            src="{{ asset('/adminDashboardSourceFiles/user_img/' . $restaurant->user_image) }}"
                            alt="" style="width: 240px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <p class="card-text">{{ $restaurant->user_address }}</p>
                            <a href="{{ route('showReservationForm', $restaurant->user_id) }}"
                                class="btn btn-primary">Reservation</a>
                            <a href="{{ route('show_dishes', $restaurant->user_id) }}" class="btn btn-danger">Order</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>

</html>
