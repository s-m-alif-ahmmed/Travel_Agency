<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Document</title>
    <style>
        *
        {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .col-1{ width: 8.33%;}
        .col-2{ width: 16.66%;}
        .col-3{ width: 25%;}
        .col-4{ width: 33.33%;}
        .col-5{ width: 41.66%;}
        .col-6{ width: 50%;}
        .col-7{ width: 58.33%;}
        .col-8{ width: 66.66%;}
        .col-9{ width: 75%;}
        .col-10{ width: 83.33%;}
        .col-11{ width: 91.66%;}
        .col-12{ width: 100%;}

        [class*='col-']
        {
            float: left;
        }

        .row{ position: relative; }

        .row:after{
            content: '';
            clear: both;
            display: block;
        }

        .container
        {
            width: 90%;
            height: auto;
            margin: 0 auto;
        }
        .logo-image{
            height: 80px;
        }
        .py-20{ padding-top: 20px; padding-bottom: 20px;}
        .px-20{ padding-left: 20px; padding-right: 20px;}
        .bg-color{ background-color: goldenrod;}
        .bg-red{ background-color: red;}
        .card
        {
            padding: 5px;
            padding-right: 0px;
        }
        .table{ width: 40%;}
        .table th{
            padding: 5px 5px 5px 0;
        }
        .float-right{ float: right;}
        .text-white{ color: white;}
        .invoice{
            font-size: 60px;
        }
        .text-left{ text-align: left;}
        .table-two
        {
            width: 100%;
            text-align: center;
            padding: 10px;
            padding-right: 0px;
            border-collapse: collapse;
        }
        .table-two th
        {
            background-color: goldenrod;
            padding: 10px;
        }
        .table-two td
        {
            padding: 5px;
        }
        .table-three
        {
            width: 100%;
            border-collapse: collapse;
        }

        .table-three thead
        {
            background-color: goldenrod;
        }

        .table-three th
        {
            padding: 10px;
        }
        .table-three td
        {
            padding: 10px;
        }
        .table-four
        {
            width: 50%;
            border-collapse: collapse;
            float: right;
            margin-top: 50px;
            text-align: center;
        }
        .table-four td
        {
            padding: 5px;
        }
    </style>
</head>
<body>
<header class="">
    <div class="container bg-color py-20 px-20">
        <div class="row">
            <div class="col-6">
                <h1 class="text-white invoice">INVOICE</h1>
            </div>
            <div class="col-6">
                <img src="{{asset('/')}}front/img/whitelogo.png" alt="" class="logo-image float-right"/>
            </div>
        </div>
    </div>
</header>

<section class="py-20">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <h2 style="margin-bottom: 10px;">Invoice To</h2>
                    <table class="table">
                        <tr class="text-left">
                            <th>Name</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Address</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Phone Number</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Email Address</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Date</th>
                            <td>: Example</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <h2 style="margin-bottom: 10px;">Invoice Detail</h2>
                    <table class="table-two">
                        <tr>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Total Date</th>
                        </tr>
                        <tr>
                            <td>sadas</td>
                            <td>sadas</td>
                            <td>sadas</td>
                        </tr>
                    </table>
                    <table class="table-two">
                        <tr>
                            <th>Travel Date</th>
                            <th>No. of Travelers</th>
                            <th>Destination</th>
                        </tr>
                        <tr>
                            <td>sadas</td>
                            <td>sadas</td>
                            <td>sadas</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table-three">
                    <thead>
                    <tr>
                        <th>Package Name</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Cost</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: lightpink">
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A enim facere facilis illo iusto nulla repellendus.</td>
                        <td style="text-align: center;">12.21.2029</td>
                        <td style="text-align: center;">Spain</td>
                        <td style="text-align: center;">Spain14,000</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A enim facere facilis illo iusto nulla repellendus.</td>
                        <td style="text-align: center;">12.21.2029</td>
                        <td style="text-align: center;">Spain</td>
                        <td style="text-align: center;">Spain14,000</td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A enim facere facilis illo iusto nulla repellendus.</td>
                        <td style="text-align: center;">12.21.2029</td>
                        <td style="text-align: center;">Spain</td>
                        <td style="text-align: center;">Spain14,000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="py-20">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <h2 style="margin-bottom: 10px; color: blue">Payment Method</h2>
                    <table class="table">
                        <tr class="text-left">
                            <th>Payment Status</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Payment Method</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Phone Number</th>
                            <td>: Example</td>
                        </tr>
                        <tr class="text-left">
                            <th>Date</th>
                            <td>: Example</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <table class="table-four">
                        <tbody>
                        <tr>
                            <th>Sub Total</th>
                            <td>14000</td>
                        </tr>
                        <tr>
                            <th>Tax (5%)</th>
                            <td>700</td>
                        </tr>
                        </tbody>
                        <tfoot style="background-color: goldenrod;">
                        <tr>
                            <th>Grand Total</th>
                            <td>14700</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
