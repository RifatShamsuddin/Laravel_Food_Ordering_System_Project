<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--  CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Lara Res</title>
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
                <ul class="nav justify-content-end">
                    @if (Route::has('login'))
                        @auth
                            @csrf
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ 'Logout' }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"></form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Log in </a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> Register </a>
                                </li>
                            @endif
                        @endauth
                </ul>
            </div>
        </nav>
    </div>
    @endif
</header>

<body class="antialiased">
    <div class="jumbotron feature">
        <div class="banner-text">
            <div class="container">
                <h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
                <div class="agileits_search">
                    @if (Route::has('login'))
                        @auth
                            @csrf
                            <form action="{{ route('showRestaurants') }}">
                                <input type="submit" value="Click to Search">
                            </form>
                        @else
                            <form action="{{ route('login') }}">
                                <input type="submit" value="Click to Search">
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 footer-info-item">
                        <h3>Information</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Customer Service</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Sitemap</a>
                            </li>
                            <li>
                                <a href="#">Orders &amp; Returns</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-info-item">
                        <h3>My Account</h3>
                        <ul class="list-unstyled">
                            <li>
                                <a href="##">Sign In</a>
                            </li>
                            <li>
                                <a href="##">View Cart</a>
                            </li>
                            <li>
                                <a href="##">My Wishlist</a>
                            </li>
                            <li>
                                <a href="##">Track My Order</a>
                            </li>
                            <li>
                                <a href="##">Help</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-info-item">
                        <h3>
                            <span class="glyphicon glyphicon-list-alt"></span> Newsletter
                        </h3>
                        <p>Sign up for exclusive offers.</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email address">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"> Subscribe! </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-print">
            <div class="container">
                <p>
                    <a href="##">Terms &amp; Conditions</a> | <a href="##">Privacy Policy</a> | <a
                        href="##">Contact</a>
                </p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
