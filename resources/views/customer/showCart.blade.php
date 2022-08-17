<!DOCTYPE html>
<html>
  <head>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/adminDashboardSourceFiles')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/adminDashboardSourceFiles')}}/dist/css/adminlte.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td,
      th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <h2>Cart</h2>
    <form action="{{route('orderConfirm')}}" method="POST"> 
      @csrf 
      <div class="container">
        <table>
          <tr>
            <th>Dishes</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr> @if ($count>0) @foreach($data as $data) <tr>
            <td>
              <input type="text" name="dishname[]" value="{{$data->dish_name}}" hidden="">
              {{$data->dish_name}}
            </td>
            <td>
              <input type="text" name="dishprice[]" value="{{$data->dish_price}}" hidden="">
              {{$data->dish_price}}
            </td>
            <td>
              <input type="text" name="dishquantity[]" value="{{$data->quantity}}" hidden="">
              {{$data->quantity}}
            </td>
            <td>
              <a href="{{route('dish_cart_delete',[$data->cart_id])}}" class="btn btn-outline-danger">
                <i class="fas fa-trash" title="Click to Delete"></i>
              </a>
            </td>
          </tr> 
          <input type="text" name="restaurant_id" value="{{$data->restaurant_id}}" hidden="">
          @endforeach
          @endif
        </table>


        <div class="center">
          <button class="btn btn-primary" id="order" type="button">
            Order
          </button>
        </div>
      </div>

      <div id="appear" class="container" style="display:none;">
        <div class="row">
          <div class="offset-3 col-md-5 my-lg-5">
            <div class="card">
              <div class="card-header text-center"> Order </div>
              <div class="card-body"> @csrf <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea type="text" class="form-control" name="address" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" name="phone">
                </div>
                <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Confirm Order</button>
                <button class="btn btn-outline-danger" id="close">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>


    <script type="text/javascript">
      $("#order").click(function() {
        $("#appear").show();
      });
      $("#close").click(function() {
        $("#appear").hide();
      });
    </script>
  </body>
</html>