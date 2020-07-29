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
                    <h3 class="card-title">Enquiry
                        <a href="{{ route('showroom.enquiry.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th> Company </th>
                                <th> Enq No. </th>
                                <th> Name </th>

                                <th> Mobile </th>

                                <th> Visit Date </th>
                                <th> Visit Time </th>

                                <th> Purpose</th>
                                <th> Item Details</th>
                                <th> Group</th>
                                <th> Comments</th>

                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(count($enquiry))

                            @foreach($enquiry as $c)

                            <tr>
                                <td>{{ $c->enq_comp_name }}</td>
                                <td>{{ $c->enq_tran_no }}</td>
                                <td>{{ $c->enq_cust_name }}</td>

                                <td>{{ $c->enq_mobile }}</td>


                                <td>{{ date('d-m-Y', strtotime($c->enq_date)) }}</td>

                                <td>{{ $c->enq_time}}</td>
                                <td>{{ $c->enq_purpose}}</td>

                                <td> {{ $c->enq_item_details }} </td>
                                <td> {{ $c->enq_group }} </td>





                                <td> {{ $c->enq_comments}} </td>




                                <td>



                                    <a href="{{ route('foh.booking.edit',$c->id) }}">
                                        <i class="fa fa-edit"></i>

                                    </a>


                                    /




                                    <a data-catid={{$c->id}} data-toggle="modal" data-target="#delete">
                                        <i class="fa fa-trash text-red"></i>



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
                                <th> Company </th>
                                <th> Enq No. </th>
                                <th> Name </th>

                                <th> Mobile </th>

                                <th> Visit Date </th>
                                <th> Visit Time </th>

                                <th> Purpose</th>
                                <th> Item Details</th>
                                <th> Group</th>
                                <th> Comments</th>

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
            <form action="{{route('showroom.enquiry.destroy','test')}}" method="post">
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
