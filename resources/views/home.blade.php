@extends('layouts.admin')

@section('content')

<form action="{{ route('order') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Place Order</button>
</form>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard - WOB</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@if($user->user_type =='user')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">


            <h3>


              {{ number_format($wob-$expense) }}
              





            </h3>




            <p>Cash On Hand</p>
          </div>
          <div class="icon">
            
            <i class="fas fa-rupee-sign"></i>
          </div>

          


          <a href="#" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>




        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>


            {{ number_format($expense) }}


            </h3>

            <p>Expense Amount</p>
          </div>
          <div class="icon">
            
            <i class="ion ion-bag"></i>
          </div>

          


          <a href="{{route('admin.accounts.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>





        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
            {{ number_format($wob) }}

            


            </h3>

            <p>WOB Amount</p>
          </div>
          <div class="icon">
            
            <i class="ion ion-stats-bars"></i>
          </div>
          


          <a href="{{route('showroom.cash.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>





           0
           



            </h3>

            <p>Cash Topup</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endif



@if($user->user_type =='admin')

<!-- Karaikuddi-->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1">
         
          <i class="fas fa-rupee-sign"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Cash On Hand - KKD</span>
            <span class="info-box-number">

              @if($user->user_type =='admin')


              {{ number_format($wobkkd-$expenseskkd) }}




            </span>
            
            <a href="#" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
          
          <i class="ion ion-bag"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Expense Amount - KKD</span>
            <span class="info-box-number">
            
            
            @if($user->user_type =='admin')


{{ number_format($expenseskkd) }}


            
            </span>
            <a href="{{route('showroom.accountskkd.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-coins"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">WOB Amount - KKD</span>
            <span class="info-box-number">
            
            @if($user->user_type =='admin')


{{ number_format($wobkkd) }}


            </span>
            <a href="{{route('showroom.cashkkd.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number">{{$users}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    
    <!-- /.row -->
  </div>


<!-- Chenai-->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1">
         
          <i class="fas fa-rupee-sign"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Cash On Hand - RMD</span>
            <span class="info-box-number">

              @if($user->user_type =='admin')


              {{ number_format($wobbash-$expensesbash) }}




            </span>
            
            <a href="#" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
          
          <i class="ion ion-bag"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Expense Amount - RMD</span>
            <span class="info-box-number">
            
            
            @if($user->user_type =='admin')


{{ number_format($expensesbash) }}


            
            </span>
            <a href="{{route('admin.accounts.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-coins"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">WOB Amount - RMD</span>
            <span class="info-box-number">
            
            @if($user->user_type =='admin')


{{ number_format($wobbash) }}


            </span>
            <a href="{{route('showroom.cash.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number">{{$users}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    
    <!-- /.row -->
  </div>

  

<!-- Chenai-->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1">
         
          <i class="fas fa-rupee-sign"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Cash On Hand - Chennai</span>
            <span class="info-box-number">

              @if($user->user_type =='admin')


              {{ number_format($wobche-$expensesche) }}




            </span>
            
            <a href="#" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
          
          <i class="ion ion-bag"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Expense Amount - Chennai</span>
            <span class="info-box-number">
            
            
            @if($user->user_type =='admin')


{{ number_format($expensesche) }}


            
            </span>
            <a href="{{route('showroom.accountskkd.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-coins"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">WOB Amount - Chennai</span>
            <span class="info-box-number">
            
            @if($user->user_type =='admin')


{{ number_format($wobche) }}


            </span>
            <a href="{{route('showroom.cashkkd.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
              @endif
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number">{{$users}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>

    
    <!-- /.row -->
  </div>



  @endif


  @endsection