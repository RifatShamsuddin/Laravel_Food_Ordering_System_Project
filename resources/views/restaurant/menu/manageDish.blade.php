@extends('restaurant.dashboard')
@section('title')
Manage dish
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>Dish Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Image</th>
            <th>Added On</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$dish->dish_name}}</td>
                <td>{{$dish->dish_detail}}</td>
                <td>{{$dish->dish_price}}</td>
                <td>{{$dish->dish_image}}</td>
                <td>{{$dish->created_at}}</td>
                <td>
                    <a class="btn btn-outline-danger" href="{{route('dish_delete',['dish_id'=>$dish->dish_id])}}">
                        <i class="fas fa-trash" title="Click to Delete"></i>
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
