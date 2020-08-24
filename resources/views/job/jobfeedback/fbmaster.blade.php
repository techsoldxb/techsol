@extends('layouts.admin')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Items History

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>Status :</strong></label>
                                <select id='fb_comp_code' class="form-control" style="width: 200px">
                                    <option value="">--Select Status--</option>
                                    <option value="003">RMD</option>
                                    <option value="004">KKD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered data-table">
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
                                <th width="100px">Comp</th>
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
                url: "{{ route('jobfeedback.fbmaster') }}",
                data: function (d) {
                    d.fb_comp_code = $('#fb_comp_code').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'fb_number',
                    name: 'fb_number'
                },
                {
                    data: 'fb_job_number',
                    name: 'fb_job_number'
                },
                {
                    data: 'fb_name',
                    name: 'fb_name'
                },
                {
                    data: 'fb_mobile',
                    name: 'fb_mobile'
                },
                {
                    data: 'fb_experience',
                    name: 'fb_experience'
                },
                {
                    data: 'fb_comments',
                    name: 'fb_comments'
                },
                {
                    data: 'fb_coupon',
                    name: 'fb_coupon'

                },
                {
                    data: 'fb_coupon_exp',
                    name: 'fb_coupon_exp'
                },
                {
                    data: 'fb_comp_code',
                    name: 'status'
                }

            ]
        });

        $('#fb_comp_code').change(function () {
            table.draw();
        });

    });

</script>



@endsection
