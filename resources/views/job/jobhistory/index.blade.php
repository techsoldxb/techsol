@extends('layouts.admin')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Items History
                        <a href="{{ route('job.jobcard.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>Status :</strong></label>
                                <select id='job_status_name' class="form-control" style="width: 200px">
                                    <option value="">--Select Status--</option>
                                    <option value="Received">Received</option>
                                    <option value="Inspected">Inspected</option>
                                    <option value="Work">Work In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Invoiced">Invoiced</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Job ID</th>
                                <th>Customer</th>
                                <th>Mobile</th>
                                <th>Item Type</th>
                                <th>Brand</th>
                                <th>Received Date</th>
                                <th>Inspected Date</th>
                                <th>WIP Date</th>
                                <th>Completed Date</th>
                                <th>Invoice Date</th>
                                <th>Invoice No</th>

                                <th width="100px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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

<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('job.jobhistory.index') }}",
                data: function (d) {
                    d.job_status_name = $('#job_status_name').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'job_enq_number',
                    name: 'job_enq_number'
                },
                {
                    data: 'job_cust_name',
                    name: 'job_cust_name'
                },
                {
                    data: 'job_cust_mobile',
                    name: 'job_cust_mobile'
                },
                {
                    data: 'job_item_type',
                    name: 'job_item_type'
                },
                {
                    data: 'job_item_brand',
                    name: 'job_item_brand'
                },
                {
                    data: 'job_enq_date',
                    name: 'job_enq_date'

                },
                {
                    data: 'job_ins_date',
                    name: 'job_ins_date'
                },
                {
                    data: 'job_work_date',
                    name: 'job_work_date'
                },
                {
                    data: 'job_completed_date',
                    name: 'job_completed_date'
                },
                {
                    data: 'job_invoice_date',
                    name: 'job_invoice_date'
                },
                {
                    data: 'job_invoice_number',
                    name: 'job_invoice_number'
                },

                {
                    data: 'job_status_name',
                    name: 'status'
                },
            ]
        });

        $('#job_status_name').change(function () {
            table.draw();
        });

    });

</script>



@endsection
