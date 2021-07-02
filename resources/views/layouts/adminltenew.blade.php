<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->




                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                @if(auth()->user()->company =='3')
                <img src={{asset('dist/img/tclogo.PNG class=img-circle elevation-2 alt=Logo')}}>
                @elseif(auth()->user()->company =='2')

                <img src={{asset('dist/img/malllogonew.PNG class=img-circle elevation-2 alt=MallLogo')}}>
                @else
                <img src={{asset('dist/img/tclogo.PNG class=img-circle elevation-2 alt=Logo')}}>
                @endif
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <?php
               $segment = Request::segment(2);   
              ?>




                        @if(Gate::check('isAdmin'))

                        <li class="nav-item">
                            <a href=" {{ route('home') }}" class="nav-link 
                 @if(!$segment)
                 active
                 @endif            
                 ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard WOB
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href=" {{ route('homeicc') }}" class="nav-link
                 @if($segment =='homeicc')                
                 active
                 @endif            
                 ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard Cust Enquiry
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href=" {{ route('homejob') }}" class="nav-link
                 @if($segment =='homejob')                
                 active
                 @endif            
                 ">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Dashboard Job Contract
                                </p>
                            </a>

                        </li>


                        @endif



                        @if(Gate::check('isUser') || Gate::check('isSuper_User'))




                        <li class="nav-item">
                            <a href=" {{ route('home') }}" class="nav-link
             @if(!$segment)
             active
             @endif            
             ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>

                        @endif









                        <li class="nav-item has-treeview">
                            <ul class="nav nav-treeview">
                                @if(Gate::check('isUser') || Gate::check('isAdmin'))

                                @endif

                                @can('isAdmin')








                                <li class="nav-item">
                                    <a href="{{route('admin.cashtopups.index')}}" class="nav-link
                 @if($segment=='cashtopups')                
                 active
                 @endif                
                 ">

                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Cash Topup</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('cash')}}" class="nav-link
                 @if($segment=='coh')                
                 active
                 @endif                
                 ">

                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Cash On Hand</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.expense.index')}}" class="nav-link
                 @if($segment=='expense')                
                 active
                 @endif                
                 ">

                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Expanse Analysis</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.categories.index')}}" class="nav-link
                 @if($segment=='categories')                
                 active
                 @endif                
                 ">

                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.beneficiary.index')}}" class="nav-link
                 @if($segment=='beneficiary')                
                 active
                 @endif                
                 ">

                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Beneficiary</p>
                                    </a>
                                </li>





                                <li class="nav-item">
                                    <a href="{{route('admin.cheque.index')}}" class="nav-link 
                 @if($segment=='cheque')                
                 active
                 @endif ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cheque</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>







                        @if(Gate::check('isUser') || Gate::check('isSuper_User'))



                        <li class="nav-header">SHOWROOM</li>

                        @can('isSuper_User')
                        <li class="nav-item">
                            <a href="{{route('admin.cashpayment.create')}}" class="nav-link">
                                <i class="nav-icon fa fa-check text-danger"></i>
                                <p>Payment</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.cashpayment.index')}}" class="nav-link
             @if($segment=='cashpayment')
             active
             @endif">
                                <i class="nav-icon fab fa-paypal text-success"></i>
                                <p>Payment Details</p>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href="{{route('pos.suppliers.index')}}" class="nav-link
             @if($segment=='suppliers')
             active
             @endif">
                                <i class="nav-icon far fa-building"></i>


                                <p>Suppliers</p>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="{{route('admin.accounts.create')}}" class="nav-link
             @if($segment=='accounts1')
             active
             @endif">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.accounts.index')}}" class="nav-link
             @if($segment=='accounts')
             active
             @endif">
                                <i class="nav-icon fab fa-etsy text-danger"></i>
                                <p>Expense Details</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.categories.index')}}" class="nav-link
             @if($segment=='categories')
             active
             @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Expense Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('showroom.cash.index')}}" class="nav-link
             @if($segment=='cash')
             active
             @endif">

                                <i class="far fa-circle nav-icon"></i>


                                <p>WOB Details</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('cash')}}" class="nav-link
             
             @if($segment=='coh')
             active
             @endif">

                                <i class="nav-icon fas fa-circle text-info"></i>


                                <p>Cash On Hand</p>
                            </a>
                        </li>

                        @can('isSuper_User')

                        <li class="nav-item">
                            <a href="{{route('admin.cashtopups.index')}}" class="nav-link
         @if($segment=='cashtopups')                
         active
         @endif                
         "> <i class="fa fa-gas-pump nav-icon"></i>
                                <p>Cash Topup</p>
                            </a>
                        </li>

                        @endcan


                        <li class="nav-item">
                            <a href="{{route('showroom.enquiry.index')}}" class="nav-link
             @if($segment=='enquiry')
             active
             @endif">
                                <i class="nav-icon fas fa-users"></i>


                                <p>Customer Enquiry</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobfeedback.index')}}" class="nav-link
                             @if($segment=='jobfeedback')                
                             active
                             @endif">

                                <i class="nav-icon fas fa-tags"></i>

                                <p>Coupon</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{route('job.jobwfp.index')}}" class="nav-link
             @if($segment=='jobwfp')
             active
             @endif">
                                <i class="nav-icon fas fa-hourglass-half"></i>


                                <p>Waiting for Parts</p>
                            </a>
                        </li>



                        @if(Gate::check('isAdmin') || Gate::check('isService'))

                        <li class="nav-header">JOB CONTRACT</li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcard.create')}}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Job Enquiry</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcard.index')}}" class="nav-link
                 @if($segment=='jobcard')                
                 active
                 @endif">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Received</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job.jobinspect.index')}}" class="nav-link
                 @if($segment=='jobinspect')                
                 active
                 @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Inspected</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcomplete.index')}}" class="nav-link
                 @if($segment=='jobcomplete')                
                 active
                 @endif">
                                <i class="nav-icon far fa-circle text-secondary"></i>
                                <p>Completed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job.jobinvoice.index')}}" class="nav-link
                 @if($segment=='jobinvoice')                
                 active
                 @endif">
                                <i class="nav-icon fas fa-circle text-primary"></i>
                                <p>Invoiced</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle text-danger"></i>
                                <p>Quit</p>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href=" {{ route('users') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>


                                <p>Users</p>
                            </a>
                        </li>

                        @endif
                        @endcan



                        @if(Gate::check('isAdmin') || Gate::check('isService'))
                        <li class="font-weight-bold nav-header">JOB CONTRACT</li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcard.create')}}" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Job Enquiry
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcard.index')}}" class="nav-link
       @if($segment=='jobcard')                
       active
       @endif">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>Received
                                    <span class="right badge badge-primary">{{$received}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job.jobinspect.index')}}" class="nav-link
       @if($segment=='jobinspect')                
       active
       @endif">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Inspected
                                    <span class="right badge badge-success">{{$inspected}}</span>
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('job.jobwork.index')}}" class="nav-link
                             @if($segment=='jobwork')                
                             active
                             @endif">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Work In Progress
                                    <span class="right badge badge-info">{{$work}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobcomplete.index')}}" class="nav-link
       @if($segment=='jobcomplete')                
       active
       @endif">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Completed
                                    <span class="right badge badge-warning">{{$completed}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job.jobinvoice.index')}}" class="nav-link
       @if($segment=='jobinvoice')                
       active
       @endif">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Invoiced
                                    <span class="right badge badge-danger">{{$invoiced}}</span>
                                </p>
                            </a>
                        </li>

                        <div class="border-top my-3"></div>


                        <li class="nav-item">
                            <a href="{{route('job.jobwfp.index')}}" class="nav-link
                             @if($segment=='jobwfp')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-primary"></i>
                                <p>Waiting for Parts
                                    <span class="right badge badge-primary">{{$wfp}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.jobreturn.index')}}" class="nav-link
                             @if($segment=='jobreturn')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-success"></i>
                                <p>To Be Return
                                    <span class="right badge badge-success">{{$return}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('jobcard.quit')}}" class="nav-link
                             @if($segment=='jobquit')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-danger"></i>
                                <p>Quit
                                    <span class="right badge badge-danger">{{$quit}}</span>
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('jobcard.delivered')}}" class="nav-link
                             @if($segment=='jobdelivered')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-info"></i>
                                <p>Delivered
                                    <span class="right badge badge-info">{{$delivered}}</span>
                                </p>
                            </a>
                        </li>





                        <li class="font-weight-bold nav-header">OUTSIDE SERVICE</li>

                        <li class="nav-item">
                            <a href="{{route('job.joboutside.index')}}" class="nav-link
                             @if($segment=='joboutside')                
                             active
                             @endif">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Waiting for Quote
                                    <span class="right badge badge-info">{{$outside}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('job.joboutsideest.index')}}" class="nav-link
                             @if($segment=='joboutsideest')                
                             active
                             @endif">
                                <i class="nav-icon far fa-circle text-secondary"></i>
                                <p>Estimation
                                    <span class="right badge badge-secondary">{{$outside_est}}</span>
                                </p>
                            </a>
                        </li>

                        <li class="font-weight-bold nav-header">MASTER</li>


                        <li class="nav-item">
                            <a href="{{route('job.jobfault.index')}}" class="nav-link
                             @if($segment=='jobfault')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-success"></i>
                                <p>Fault Master</p>
                            </a>
                        </li>




                        @endif
                        @if(Gate::check('isAdmin'))
                        <li class="nav-item">
                            <a href="{{route('job.jobhistory.index')}}" class="nav-link
                             @if($segment=='jobhistory')                
                             active
                             @endif">
                                <i class="nav-icon fas fa-circle text-warning"></i>
                                <p>Job History</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href=" {{ route('users') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>


                                <p>Users</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.expense.index')}}" class="nav-link
         @if($segment=='expense')                
         active
         @endif                
         ">

                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Expanse Analysis</p>
                            </a>
                        </li>


                        @endif








                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('flash-message')
            @yield('content')
        </div>


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
</body>

</html>
