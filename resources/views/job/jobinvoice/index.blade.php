@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="font-weight-bold text-left text-primary">
                            Today Invoice:
                        </div>
                        <div class="font-weight-bold text-left" style="font-size:18px;color:red">
                            {{ number_format($sc_inv_today,3) }}
                            <i class="fa fa-rupee" style="font-size:18px;color:red"></i>
                        </div>
                        <div>/ </div>

                        <div class="font-weight-bold text-left text-muted">
                            Cash Invoice:
                        </div>
                        <div class="font-weight-bold text-left" style="font-size:18px;color:blue">
                            {{ number_format($sc_inv_cash,3) }}
                            <i class="fa fa-rupee" style="font-size:18px;color:blue"></i>
                        </div>
                        <div>/ </div>
                        <div class="font-weight-bold text-left text-muted">
                            Online Invoice:
                        </div>
                        <div class="font-weight-bold text-left" style="font-size:18px;color:blue">
                            {{ number_format($sc_inv_online,3) }}
                            <i class="fa fa-rupee" style="font-size:18px;color:blue"></i>
                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No. </th>
                                <th> Invoice Date </th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Fault</th>

                                <th>Job ID</th>
                                <th>Amount</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($jobcard))
                            @foreach($jobcard as $c)
                            <tr>
                                <td>{{ $c->job_invoice_number }}</td>
                                <td>{{ date('d-m-Y h:i A', strtotime($c->job_invoice_date)) }}</td>
                                <td>{{ $c->job_cust_name }}</td>
                                <td>{{ $c->job_cust_mobile }}</td>
                                <td>{{ $c->job_item_type }}</td>
                                <td>{{ $c->job_item_brand }}</td>
                                <td>{{ $c->job_item_model }}</td>
                                <td>{{ $c->job_fault}}</td>

                                <td> {{ $c->job_enq_number }} </td>
                                <td class="font-weight-bold text-right text-primary">
                                    {{ number_format($c->job_invoice_amount,3) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('job.jobinvoice.print',$c) }}">
                                        <i class="fa fa-print text-green"></i>
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
                                <th> Invoice No. </th>
                                <th> Invoice Date </th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Fault</th>

                                <th>Job ID</th>
                                <th>Amount</th>
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
