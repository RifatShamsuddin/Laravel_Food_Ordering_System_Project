<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="./style.css">
    <!--  CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato:400,700");

        /* center container in the middle */
        html {
            display: grid;
            min-height: 100%;
        }

        body {
            display: grid;
            background: #006400;
            font-family: "Lato", sans-serif, sans-serif;
            text-transform: uppercase;
        }

        .container {
            position: relative;
            margin: auto;
            overflow: hidden;
            width: 520px;
            height: 350px;
            background: #F5F5F5;
            box-shadow: 5px 5px 15px rgba(0, 100, 0, 0.5);
            border-radius: 10px;
        }

        p {
            font-size: 0.6em;
            color: #006400;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 1.2em;
            color: #4E4E4E;
            margin-top: -5px;
        }

        h2 {
            color: #FFFFF;
            margin-top: -5px;
        }

        img {
            width: 290px;
            margin-top: 47px;
        }

        .slideshow-buttons {
            top: 70%;
            display: none;
        }

        .one,
        .two,
        .three,
        .four {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #006400;
        }

        .one {
            left: 22%;
        }

        .two {
            left: 27%;
        }

        .three {
            left: 32%;
        }

        .four {
            left: 37%;
        }

        .product {
            position: absolute;
            width: 40%;
            height: 100%;
            top: 10%;
            left: 60%;
        }

        .desc {
            text-transform: none;
            letter-spacing: 0;
            margin-bottom: 17px;
            color: #4E4E4E;
            font-size: 0.7em;
            line-height: 1.6em;
            margin-right: 25px;
            text-align: justify;
        }

        button {
            background: #003100;
            padding: 10px;
            display: inline-block;
            outline: 0;
            border: 0;
            margin: -1px;
            border-radius: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #F5F5F5;
            cursor: pointer;
        }

        button:hover {
            background: #006400;
            transition: all 0.4s ease-in-out;
        }

        .add {
            width: 67%;
        }

        .like {
            width: 22%;
        }

        .sizes {
            display: grid;
            color: #00FF00;
            grid-template-columns: repeat(auto-fill, 30px);
            width: 60%;
            grid-gap: 4px;
            margin-left: 20px;
            margin-top: 5px;
        }

        .sizes:hover {
            cursor: pointer;
        }

        .pick {
            margin-top: 11px;
            margin-bottom: 0;
            margin-left: 20px;
        }

        .size {
            padding: 9px;
            border: 1px solid #006400;
            font-size: 0.7em;
            text-align: center;
        }

        .size:hover {
            background: #006400;
            color: #F5F5F5;
            transition: all 0.4s ease-in-out;
        }

        .focus {
            background: #006400;
            color: #F5F5F5;
        }

        footer {
            position: absolute;
            bottom: 0;
            right: 0;
            font-size: 0.8em;
            text-transform: uppercase;
            padding: 10px;
        }

        footer p {
            letter-spacing: 3px;
        }

        footer a {
            color: #ffffff;
            text-decoration: none;
        }

        footer a:hover {
            color: #7d7d7d;
        }
    </style>
</head>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Lara Res</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('welcome') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav right-aligned">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('showcart', Auth::user()->user_id) }}">Show Cart <span
                                class="sr-only">(current)</span> </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<body>
    @foreach ($dishes->chunk(3) as $chunk)
        <div class="card-group">
            @foreach ($chunk as $dish)
                <form action="{{ route('addcart', $dish->dish_id) }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="images">
                            <img src="{{ asset($dish->dish_image) }}">
                        </div>
                        <div class="product">
                            <p>Food</p>
                            <h1>{{ $dish->dish_name }}</h1>
                            <h2>Tk {{ $dish->dish_price }}</h2>
                            <p class="desc"> {{ $dish->dish_detail }}</p>
                            <div class="buttons">
                                <input type="number" name="quantity" min="1" value="1">
                                <button class="submit">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    @endforeach
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</html>
