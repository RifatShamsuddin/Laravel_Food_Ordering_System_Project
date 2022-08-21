<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bill Reciept in Laravel</title>
    <style>
        .result {
            color: red;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="mt-3">
        <div class="container-fluid">
            <h4 class="text-center" style="color:green"> Lara Res</h4>
            <div class="row">
                <div class="col-md-7  mt-4" style="background-color:#f5f5f5;">
                    <div class="p-4">
                        <div class="text-center">
                            <h4>Receipt</h4>
                        </div>
                        <span class="mt-4"> Time : </span><span class="mt-4" id="time"></span>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 ">
                                <span id="day"></span> : <span id="year"></span>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <p>Order No:1234</p>
                            </div>
                        </div>
                        <div class="row">
                            </span>
                            <table id="receipt_bill" class="table">
                                <thead>
                                    <tr>
                                        <th> No.</th>
                                        <th>Dish Name</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="new">

                                </tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td class="text-right text-dark">
                                        <h5><strong>Sub Total: Tk </strong></h5>
                                    </td>
                                    <td class="text-center text-dark">
                                        <h5> <strong><span id="subTotal"></strong></h5>
                                        <h5> <strong><span id="taxAmount"></strong></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td class="text-right text-dark">
                                        <h5><strong>Gross Total: Tk </strong></h5>
                                    </td>
                                    <td class="text-center text-danger">
                                        <h5 id="totalPayment"><strong> </strong></h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>
