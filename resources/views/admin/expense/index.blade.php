@extends('layouts.admin')
@section('content')



<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- /.card-header -->

                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Expense Group Analysis
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>


                                <th> Category Name</th>
                                <th> Amount </th>


                            </tr>
                        </thead>
                        <tbody>

                            @if(count($accounts))

                            @foreach($accounts as $c)

                            <tr>





                                <td>{{ $c->th_exp_cat_name }}</td>
                                <td>{{ number_format($c->total,3) }}</td>







                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="11">No Record Found</td>
                            </tr>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>


                                <th> Category Name</th>
                                <th> Amount </th>

                            </tr>
                        </tfoot>
                    </table>

                    <div class="row">
                        <div class="col text-right">
                            <a href="{{route('admin.cashtopups.cashtopupexport')}}">
                                <i class="far fa-file-excel fa-2x text-green"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


@endsection
