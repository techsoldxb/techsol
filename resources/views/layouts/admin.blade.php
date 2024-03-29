<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Techsol</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });

    </script>

    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />

    <!-- daterangepicker -->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />






    <!-- daterangepicker -->


    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->

    <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">





        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href=" {{ route('home') }}" class="nav-link">Home</a>
                </li>



            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fas fa-globe" style="color:blue"></i>
                        {{ __('Notifications') }}
                        <span class="badge">{{ count(auth()->user()->unreadNotifications)}}</span>

                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>

                            @foreach(auth()->user()->unreadNotifications as $notifications)
                            <a href="#">{{$notifications->type}}</a>
                            @endforeach
                        </li>

                    </ul>



                </li>

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off" style="color:red"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                </li>



                <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href=" {{ route('home') }}" class="brand-link">


                <img src={{asset('dist/img/tclogo.PNG class=brand-image img-circle elevation-3 style=opacity:.8')}}>

                <span>Techsol Group</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="image">

                        @if(auth()->user()->company =='3')
                        <img src={{asset('dist/img/tclogo.PNG class=img-circle elevation-2 alt=Logo')}}>
                        @elseif(auth()->user()->company =='2')

                        <img src={{asset('dist/img/malllogonew.PNG class=img-circle elevation-2 alt=MallLogo')}}>
                        @else
                        <img src={{asset('dist/img/tclogo.PNG class=img-circle elevation-2 alt=Logo')}}>
                        @endif





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



                        <li class="nav-item">
                            <a href="{{route('admin.cashtopups.index')}}" class="nav-link
        @if($segment=='cashtopups')                
        active
        @endif                
        "> <i class="fa fa-gas-pump nav-icon"></i>
                                <p>Cash Topup</p>
                            </a>
                        </li>




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

                        <li class="nav-item">
                            <a href="{{route('job.jobinvoices.index')}}" class="nav-link
                @if($segment=='jobinvoices')                
                active
                @endif">
                                <i class="nav-icon fas fa-circle text-primary"></i>
                                <p>Invoices</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{route('job.joball.index')}}" class="nav-link
                @if($segment=='joball')                
                active
                @endif">
                                <i class="nav-icon fas fa-circle text-primary"></i>
                                <p>Job Card</p>
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



        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.0
            </div>
            <strong>Copyright &copy; 2019-2020 <a href="http://techsolme.com">Techsol Group</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <!-- jQuery -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>


    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Daterange picker -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>

    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>


    <!-- AdminLTE for demo purposes -->

    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "order": [
                    [0, "desc"]
                ],
                "info": true,
                "autoWidth": true,
            });

            $('#example3').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "order": [
                    [1, "desc"]
                ],
                "info": true,
                "autoWidth": true,
            });
        });

    </script>

    <script>
        $('#delete').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var cat_id = button.data('catid')
            var modal = $(this)

            modal.find('.modal-body #cat_id').val(cat_id);
        })

    </script>

    @include('sweetalert::alert')

</body>






</html>
