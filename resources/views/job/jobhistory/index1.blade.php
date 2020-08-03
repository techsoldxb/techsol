<!DOCTYPE html>
<html>

<head>
    <title>Laravel Datatables Filter with Dropdown Example - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Laravel Datatables Filter with Dropdown Example - ItSolutionStuff.com</h1>

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
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="100px">Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>

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
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'job_cust_name',
                    name: 'job_cust_name'
                },
                {
                    data: 'job_enq_number',
                    name: 'job_enq_number'
                },
                {
                    data: 'job_status_name',
                    name: 'job_status_name'
                },
            ]
        });

        $('#job_status_name').change(function () {
            table.draw();
        });

    });

</script>

</html>
