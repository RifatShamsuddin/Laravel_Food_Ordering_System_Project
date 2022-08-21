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
    @foreach ($dishes->chunk(10) as $chunk)
        <div class="container">
            <div class="card-group">
                @foreach ($chunk as $dish)
                    <form action="{{ route('addcart', $dish->dish_id) }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="images">
                                <img src="{{ asset($dish->dish_image) }} " width="300" height="250">
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
        </div>
    @endforeach
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
