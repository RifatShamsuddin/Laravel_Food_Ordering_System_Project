<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Form</title>
    <!--  CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    Reservation
                </div>
                <div class="card-body">
                    <form action="{{ Route('saveReservation', $restaurant_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="reservation_name">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea type="text" class="form-control" name="reservation_details" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="reservation_date">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="restaurant_id "
                                value="{{ $restaurant_id }}">
                        </div>

                        <button type="submit" name="btn" class="bn btn-outline-primary btn-block">Confirm
                            Reservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
