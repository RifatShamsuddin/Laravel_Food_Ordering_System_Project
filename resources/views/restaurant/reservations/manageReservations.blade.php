@extends('restaurant.dashboard')
@section('title')
    Manage Orders
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Orders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>reservation_name</th>
                        <th>reservation_status</th>
                        <th>reservation_details</th>
                        <th>reservation_date</th>
                        <th>customer_id</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reservation->reservation_name }}</td>
                            <td>{{ $reservation->reservation_status }}</td>
                            <td>{{ $reservation->reservation_details }}</td>
                            <td>{{ $reservation->reservation_date }}</td>
                            <td>{{ $reservation->customer_id }}</td>
                            <td>{{ $reservation->created_at }}</td>
                            <td>
                                <a class="btn btn-outline-danger" href="#">
                                    <i class="fas fa-trash" title="Click to Delete"></i>
                                </a>
                                <a class="btn btn-outline-dark"
                                    href="{{ route('approveReservation', $reservation->reservation_id) }}">
                                    <i class="fas fa-edit" title="Click to Edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
