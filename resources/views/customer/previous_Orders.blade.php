@extends('customer.dashboard')
@section('title')
    Orders
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
                        <th>Dishes</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>Restuarant</th>
                        <th>order status</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {!! preg_replace('/,/', '<br/>', $order->dishname) !!}
                            </td>
                            <td>
                                {!! preg_replace('/,/', '<br/>', $order->quantity) !!}
                            </td>
                            <td>
                                {!! preg_replace('/,/', '<br/>', $order->price) !!}
                            </td>
                            <td>{{ $restaurant_name }}</td>
                            <td>
                                {{ $order->order_status }}
                            </td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
