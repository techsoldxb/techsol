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
                <h1 class="m-0 text-dark">Dashboard - Job Contract</h1>
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


                            {{$receivedtotalkkd}}




                        </h3>




                        <p>Total Service Received - KKD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>




                    <a href="{{route('showroom.enqkkdtotal')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>




                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>


                            {{$invoicedkkd}}



                        </h3>

                        <p>Total Invoiced - KKD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>

                    </div>

                    @if($user->user_type =='admin')


                    <a href="{{route('showroom.enqkkdtoday')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>


                    @else
                    <a href="{{route('foh.pending.index')}}" class="small-box-footer">More info <i
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
                            {{$quitkkd + $returnkkd + $deliveredkkd}}
                        </h3>

                        <p>Total Return, Quit & Delivered - KKD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    @if($user->user_type =='admin')


                    <a href="{{route('showroom.enqrmdtotal')}}" class="small-box-footer">More info <i
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



                            {{$receivedtotalkkd - $invoicedkkd- $quitkkd - $returnkkd -$deliveredkkd}}




                        </h3>

                        <p>Pending - KKD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('showroom.enqrmdtoday')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">


                        <h3>


                            {{$receivedtotalrmd}}




                        </h3>




                        <p>Total Service Received - RMD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>




                    <a href="{{route('showroom.enqkkdtotal')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>




                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>


                            {{$invoicedrmd}}



                        </h3>

                        <p>Total Invoiced - RMD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>

                    </div>

                    @if($user->user_type =='admin')


                    <a href="{{route('showroom.enqkkdtoday')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>


                    @else
                    <a href="{{route('foh.pending.index')}}" class="small-box-footer">More info <i
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
                            {{$quit + $return + $delivered}}
                        </h3>

                        <p>Total Return, Quit & Delivered - RMD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    @if($user->user_type =='admin')


                    <a href="{{route('showroom.enqrmdtotal')}}" class="small-box-footer">More info <i
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



                            {{$receivedtotalrmd - $invoicedrmd- $quit - $return - $delivered}}




                        </h3>

                        <p>Pending - RMD</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('showroom.enqrmdtoday')}}" class="small-box-footer">More info <i
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
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Job Status</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>RMD</th>
                                        <th>KKD</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><span class="badge badge-primary">RECEIVED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$received}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$receivedkkd}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-success">INSPECTED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$inspected}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$inspectedkkd}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-info">WORK IN PROGRESS</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$work}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$workkkd}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-warning">COMPLETED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$completed}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$completedkkd}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-danger">INVOICED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$invoiced}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$invoicedkkdtoday}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-primary">WAITING FOR PARTS</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$wfp}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$wfpkkd}}</a></th>



                                    </tr>
                                    <tr>
                                        <th><span class="badge badge-success">RETURNED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$return}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$returnkkd}}</a></th>
                                    </tr>

                                    <tr>
                                        <th><span class="badge badge-danger">QUIT</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$quit}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$quitkkd}}</a></th>
                                    </tr>

                                    <tr>
                                        <th><span class="badge badge-info">WAITING FOR QUOTE</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$outside}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$outsidekkd}}</a></th>
                                    </tr>

                                    <tr>
                                        <th><span class="badge badge-secondary">ESTIMATION</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$outside_est}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$outside_estkkd}}</a></th>
                                    </tr>

                                    <tr>
                                        <th><span class="badge badge-light">DELIVERED</span></th>
                                        <th><a href="pages/examples/invoice.html">{{$delivered}}</a></th>
                                        <th><a href="pages/examples/invoice.html">{{$deliveredkkd}}</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New
                            Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                            Orders</a>
                    </div>
                    <!-- /.card-footer -->
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
                                <span class="text-bold text-lg"> OMR.
                                    0</span>




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
