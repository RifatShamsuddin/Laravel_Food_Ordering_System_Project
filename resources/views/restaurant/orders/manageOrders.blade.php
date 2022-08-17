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
            <th>Dishes</th>
            <th>quantity</th>
            <th>phone</th>
            <th>address</th>
            <th>order status</th>
            <th>Added On</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->dishname}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->order_status}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a class="btn btn-outline-danger" href="#">
                        <i class="fas fa-trash" title="Click to Delete"></i>
                    </a>
                    <a class="btn btn-outline-dark" href="#">
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
