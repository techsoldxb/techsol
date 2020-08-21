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
                    <h3 class="card-title">Feedback Details </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th> FB ID </th>
                                <th>Job ID</th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th>Experience</th>
                                <th>Comments</th>
                                <th>Coupon</th>
                                <th>Expiry Date</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($feedback))
                            @foreach($feedback as $c)

                            <tr>

                                <td>{{ date('d-m-Y h:i A', strtotime($c->created_at)) }}</td>
                                <td>{{ $c->fb_number }}</td>
                                <td>{{ $c->fb_job_number }}</td>
                                <td>{{ $c->fb_name }}</td>
                                <td>{{ $c->fb_mobile }}</td>
                                <td>{{ $c->fb_experience }}</td>
                                <td>{{ $c->fb_comments }}</td>
                                <td class="text-primary">{{ $c->fb_coupon }}</td>
                                <td>{{ $c->fb_coupon_exp}}</td>







                                <td>




                                    <a href="{{ route('job.jobinspect.edit',$c->id) }}">
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

                                <th>Date</th>
                                <th> FB ID </th>
                                <th>Job ID</th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th>Experience</th>
                                <th>Comments</th>
                                <th>Coupon</th>
                                <th>Expiry Date</th>
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
