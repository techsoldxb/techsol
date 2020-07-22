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
                    <h3 class="card-title">To Be Return
                        <a href="{{ route('job.jobcard.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Job ID </th>
                                <th> Date </th>
                                <th> Name </th>

                                <th> Mobile </th>




                                <th>Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Fault</th>


                                <th>Status</th>

                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($jobcard))

                            @foreach($jobcard as $c)

                            <tr>
                                <td>{{ $c->job_enq_number }}</td>

                                <td>{{ date('d-m-Y h:i A', strtotime($c->job_ins_date)) }}</td>
                                <td>{{ $c->job_cust_name }}</td>

                                <td>{{ $c->job_cust_mobile }}</td>




                                <td>{{ $c->job_item_type }}</td>
                                <td>{{ $c->job_item_brand}}</td>
                                <td>{{ $c->job_item_model}}</td>


                                <td>{{ $c->job_fault}}</td>




                                <td> {{ $c->job_status_name }} </td>






                                <td>

                                    <a href="{{ route('job.jobcard.show',$c->id) }}">
                                        <i class="fa fa-print text-green"></i>

                                    </a>

                                    /


                                    <a href="{{ route('job.jobreturn.edit',$c->id) }}">
                                        <i class="fa fa-edit"></i>

                                    </a>





                                </td>

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

                                <th> Job ID </th>
                                <th> Date </th>
                                <th> Name </th>

                                <th> Mobile </th>





                                <th>Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Fault</th>


                                <th>Status</th>

                                <th> Action </th>

                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-left" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{route('job.jobcard.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-left">
                        Are you sure you want to delete this transaction?
                    </p>
                    <input type="hidden" name="category_id" id="cat_id" value="">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
