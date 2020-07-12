<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>

@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard - Customer Enquiry</h1>
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


                  {{$enqkkdtotal}}
                
                
                
                
                </h3>


                

                <p>Total Enquiry - KKD</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

                   
                

              <a href="{{route('showroom.enqkkdtotal')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                

              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                
                
                {{$enqkkdtoday}}
                
                
                
                </h3>

                <p>Today Enquiry - KKD</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
                
              </div>

              @if($user->user_type =='admin')       
                

              <a href="{{route('showroom.enqkkdtoday')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  
                  
                  @else
                  <a href="{{route('foh.pending.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  @endif


              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> 
                {{$enqrmdtotal}}
                </h3>

                <p>Total Enquiry - RMD</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              @if($user->user_type =='admin')       
                

              <a href="{{route('showroom.enqrmdtotal')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  
                  
                  @else
                  <a href="{{route('admin.advances.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                

                
                {{$enqrmdtoday}}

                
                
                
                </h3>

                <p>Today Enquiry - RMD</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('showroom.enqrmdtoday')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


   


  


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Showroom Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$enqkkdtotal}}</span>
                    <span>Techsol Computers - KKD</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted">Since beginning</span>
                  </p>

                  
                </div>

                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$enqrmdtotal}}</span>
                    <span>Bash Computers - RMD</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted">Since beginning</span>
                  </p>

                  

                  
                </div>

                
              


                
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="128"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"> OMR. {{ number_format($booking_total_amount,3) }}</span>

                    


                    <span>Total Sales</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted">Since beginning</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  

@endsection
