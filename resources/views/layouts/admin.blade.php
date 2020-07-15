
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
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

  <!-- daterangepicker -->


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
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

      
    <img src={{asset('dist/img/tclogo.PNG class=brand-image img-circle elevation-3 style=opacity: .8')}}>
    
     <span >Techsol Group</span>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
              $segment = Request::segment(2);     
                   
            ?>
             @can('isAdmin')
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
             
             
              @endcan

          @can('isUser')
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
          
          @endcan



      

          
          

        
          <li class="nav-item has-treeview">
           
            <ul class="nav nav-treeview">

              @if(Gate::check('isUser') || Gate::check('isAdmin'))
           

              


       

        
          @endif


              
            
              @can('isAdmin')
              <li class="nav-item">
                
                <a href="{{route('admin.unpaidbills.index')}}" class="nav-link 
                
                @if($segment=='unpaidbills')                
                active
                @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unpaid Bills - All</p>
                </a>
              </li>          
           
              <li class="nav-item">
                <a href="{{route('admin.allpaidbills.index')}}" class="nav-link
                @if($segment=='allpaidbills')                
                active
                @endif                
                ">
                  
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Paid Bills - All</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.advanceall.index')}}" class="nav-link
                @if($segment=='advanceall')                
                active
                @endif                
                ">
                  
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Advance Request</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.advancesettlement.index')}}" class="nav-link
                @if($segment=='advancesettlement')                
                active
                @endif                
                ">
                  
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Advance Settlement</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="{{route('admin.advancehistory.index')}}" class="nav-link
                @if($segment=='advancehistory')                
                active
                @endif                
                ">
                  
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Advance History</p>
                </a>
              </li>

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

          @can('isAdmin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              

              <p>
                Job Contract
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('job.jobcard.create')}}"  class="nav-link
                @if($segment=='jobcard')                
                active
                @endif">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Job Enquiry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cheque.index')}}"  class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Received</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cheque.index')}}"  class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Inspected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cheque.index')}}"  class="nav-link">
                <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Waiting for Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cheque.index')}}"  class="nav-link">
                <i class="nav-icon far fa-circle text-sucess"></i>
                  <p>Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cheque.index')}}"  class="nav-link">
                <i class="nav-icon far fa-circle text-secondary"></i>
                  <p>Completed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('job.jobinvoice.index')}}" class="nav-link">
                <i class="nav-icon fas fa-circle text-primary"></i>
                  <p>Invoiced</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                <i class="nav-icon fas fa-circle text-info"></i>
                  <p>Returned</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                <i class="nav-icon fas fa-circle text-success"></i>
                  <p>Not Repaired</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                <i class="nav-icon fas fa-circle text-warning"></i>
                  <p>Not Approved</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                <i class="nav-icon fas fa-circle text-danger"></i>
                  <p>Quit Job</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                FOH
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('foh.booking.create')}}"  class="nav-link
                ">
                  <i class="nav-icon fas fa-file"></i>
                  <p>New Booking</p>
                </a>
              </li>

           


              <li class="nav-item">
                <a href="{{route('foh.booking.index')}}"  class="nav-link
                ">
                <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Booking Details</p>
                </a>
              </li>

            


              <li class="nav-item">
                <a href="{{route('foh.bookinghistory.index')}}" class="nav-link
                @if($segment=='bookinghistory')
                active
                @endif">
                <i class="nav-icon far fa-circle "></i>
                
                  <p>Booking History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href='{!! url('/calendar') !!}' class="nav-link">
                  <i class="far fa fa-calendar-alt nav-icon"></i>
                  <p>Calendar</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                BOH
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fish Movement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fish Collection</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                IT
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Support</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Access Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ route('users') }}" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Users</p>
                </a>
              </li>
              
            </ul>
          </li>

        
          @endcan

          @can('isAccess')
          <li class="nav-item">
            <a href="{{route('hrms.locker.index')}}" class="nav-link
            @if($segment=='locker')
            active
            @endif            
            ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Locker
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endcan

          
        
          

          <li class="nav-header">SHOWROOM</li>
          <li class="nav-item">
            <a href="{{route('admin.accounts.create')}}"  class="nav-link
            @if($segment=='accounts1')
            active
            @endif">
            <i class="nav-icon far fa-circle text-info"></i>
              <p>Add Expenses</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.accounts.index')}}"  class="nav-link
            @if($segment=='accounts')
            active
            @endif">
            <i class="nav-icon far fa-circle text-danger"></i>
              <p>Expense Details</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.categories.index')}}"  class="nav-link
            @if($segment=='categories')
            active
            @endif">
            <i class="nav-icon far fa-circle text-warning"></i>
              <p>Expense Category</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('showroom.cash.index')}}"  class="nav-link
            @if($segment=='cash')
            active
            @endif">
            
            <i class="far fa-circle nav-icon"></i>

            
              <p>WOB Details</p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{route('cash')}}"  class="nav-link
            
            @if($segment=='coh')
            active
            @endif">
            
            <i class="nav-icon fas fa-circle text-info"></i>

            
              <p>Cash On Hand</p>
            </a>
          </li>

         

          <li class="nav-item">
            <a href="{{route('showroom.enquiry.index')}}"  class="nav-link
            @if($segment=='cancelled')
            active
            @endif">
            <i class="nav-icon fas fa-users"></i>
            

              <p>Customer Enquiry</p>
            </a>
          </li>




          <li class="nav-item">
            <a href=" {{ route('users') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              
              
              <p>Users</p>
            </a>
          </li>

          
       

          
          
         
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
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">

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
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
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
