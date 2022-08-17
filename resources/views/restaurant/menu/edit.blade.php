@extends('restaurant.dashboard')
@section('title')
Add Food
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="offset-3 col-md-5 my-lg-5">
            @if (Session::get('sms'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('sms')}}</strong>
                <button type="button" class="close" data-dissmiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header text-center">
                    Dish
                </div>
                <div class="card-body">
                    <form action="{{ route('dish_update', $dish->dish_id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="dish_name" value={{$dish->dish_name}}>
                        </div>
                        <div class="form-group">
                            <label>Detail</label>
                            <textarea type="text" class="form-control" name="dish_detail" rows="5">{{$dish->dish_detail}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" value="{{$dish->dish_price}}" name="dish_price">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="dish_image" value="{{asset('/adminDashboardSourceFiles')}}/dish_image">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <input type="radio" name="dish_status" value="1">Active
                                <input type="radio" name="dish_status" value="0">inactive
                            </div>
                        </div>
                        <button type="submit" name="btn" class="bn btn-outline-primary btn-block">Add Dish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection