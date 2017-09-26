<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <title>Laundry Management</title>

    <link href="{{asset('../assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('../assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('../assets/js/modernizr.min.js')}}"></script>


</head>


<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="#" class="logo"><span>Laundry<span>Management</span></span></a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">



                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                            <img src="{{asset('../assets/images/users/avatar-1.jpg')}}" alt="user-img" class="img-circle user-img">
                            <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{url('auth/logout')}}"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li>
                        <a href="{{url('/QualityControl')}}"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-view-list"></i> <span> Laundry </span> </a>
                        <ul class="submenu">

                            <li><a href="{{url('/QualityControl/launderers')}}">Launderers</a></li>
                        </ul>
                    </li>


                    <li class="has-submenu">
                        <a href="{{url('/QualityControl/viewOrders')}}"><i class="zmdi zmdi-collection-item"></i><span> Job orders </span> </a>

                    </li>



                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->

<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">

                <h4 class="page-title">Job orders</h4>
            </div>
        </div>
        @if(Session::has('message'))

            <div class="alert alert-success">
                <p>{{Session::get('message')}}!</p>
            </div>
        @endif


        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">





                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Order date</th>
                            <th>Delivery date</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>{{$order->fname}} {{$order->lname}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->delivery_date}}</td>
                                <td>{{array_sum($order->quantity($order->customer_id))}}</td>
                                <td>₦{{array_sum($order->total($order->customer_id))}}</td>

                                <td>{{$order->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> <span class="fa fa-gears">&nbsp;&nbsp;</span> <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('/QualityControl/viewOrder/'.$order->customer_id)}}">View</a></li>
                                            <li><a href="{{url('/QualityControl/assignLaunderer/'.$order->customer_id)}}">Assign Launderer</a></li>
                                            <li><a href="{{url('/QualityControl/markCompleted/'.$order->customer_id)}}">Mark as completed</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->


        </div>
        <!-- End row -->



        <!-- Footer -->
        <footer class="footer text-right">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        2017 © Laundry management system.
                    </div>

                </div>
            </div>
        </footer>
        <!-- End Footer -->

    </div>
    <!-- end container -->





</div>



<!-- jQuery  -->
<script src="{{asset('../assets/js/jquery.min.js')}}"></script>
<script src="{{asset('../assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('../assets/js/detect.js')}}"></script>
<script src="{{asset('../assets/js/fastclick.js')}}"></script>
<script src="{{asset('../assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('../assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('../assets/js/waves.js')}}"></script>
<script src="{{asset('../assets/js/wow.min.js')}}"></script>
<script src="{{asset('../assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('../assets/js/jquery.scrollTo.min.js')}}"></script>


<!-- App js -->
<script src="{{asset('../assets/js/jquery.core.js')}}"></script>
<script src="{{asset('../assets/js/jquery.app.js')}}"></script>

</body>
</html>