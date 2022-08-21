@extends('restaurant.dashboard')
@section('title')
    Reservations
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reservations</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Restaurant Name</th>
                        <th>Used Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $restaurant_name }}</td>
                            <td>
                                {{ $reservation->reservation_name }}
                            </td>
                            <td>
                                {{ $reservation->reservation_phone }}
                            </td>
                            <td>
                                {{ $reservation->reservation_status }}
                            </td>
                            <td>{{ $reservation->reservation_details }}</td>
                            <td>
                                {{ $reservation->reservation_date }}
                            </td>
                            <td> <a class="btn btn-outline-danger"
                                    href="{{ route('reservation_delete', ['reservation_id' => $reservation->reservation_id]) }}">
                                    <i class="fas fa-trash" title="Click to Delete"></i>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
