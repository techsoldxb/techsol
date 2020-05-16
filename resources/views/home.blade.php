@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
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


              {{ number_format($wob) }}
              





            </h3>




            <p>WOB Amount</p>
          </div>
          <div class="icon">
            
            <i class="fas fa-rupee-sign"></i>
          </div>

          @if($user->user_type =='admin')


          <a href="{{route('admin.unpaidbills.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.accounts.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif


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

          @if($user->user_type =='admin')


          <a href="{{route('admin.allpaidbills.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.paidbills.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif



        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>
            {{ number_format($wob-$expense) }}

            


            </h3>

            <p>Cash Balance</p>
          </div>
          <div class="icon">
            
            <i class="ion ion-stats-bars"></i>
          </div>
          @if($user->user_type =='admin')


          <a href="{{route('admin.advanceall.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>


          @else
          <a href="{{route('admin.advances.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endif
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
          <a href="{{route('admin.cashtopups.index')}}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->





<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Cash On Hand</span>
            <span class="info-box-number">

              @if($user->user_type =='admin')


              {{ number_format($topup - $paid - $advancepaid,3) }}

              @else
              Please check with Accounts Dept
              @endif



            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Categories</span>
            <span class="info-box-number">{{ $categories}}</span>
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
            <span class="info-box-text">Accounts User</span>
            <span class="info-box-number">{{$accusers}}</span>
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






  @endsection