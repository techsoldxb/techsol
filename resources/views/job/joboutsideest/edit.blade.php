@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- This script is used to allow only number in the bill amount field -->
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

</script>
<!-- End -->


<script>
    $(function () {
        $("#myform").validate({
            rules: {
                item: {
                    required: true
                }
            }
        });
    });

</script>





<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Job Card</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>

                    <li class="breadcrumb-item"><a href="{{ route('job.jobcard.index') }}">Job Card List</a></li>


                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">


        <form class="needs-validation" novalidate method="POST"
            action="{{ route('job.joboutsideest.update', $jobcard->id) }}">
            @method('PUT')


            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Customer Name</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" value="{{ $jobcard->job_cust_name}}"
                            id="validationCustom02" name="job_cust_name" readonly>
                    </div>
                    <label class="col-lg-2" for="">Job ID</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" value="{{ $jobcard->job_enq_number}}"
                            id="validationCustom02" name="job_enq_number" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Mobile Number</label>
                    <div class="col-lg-3">







                        <input type="text" class="form-control" value="{{ $jobcard->job_cust_mobile}}"
                            id="validationCustom02" name="job_cust_mobile" placeholder="Enter mobile number" readonly>

                    </div>
                    <label class="col-lg-2" for="">Email</label>
                    <div class="col-lg-3">
                        <input type="email" class="form-control" value="{{ $jobcard->job_cust_email}}"
                            id="validationCustom02" name="job_cust_email" placeholder="Enter Email" readonly>
                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Brand</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" value="{{ $jobcard->job_item_brand}}"
                            id="validationCustom02" name="job_item_brand" placeholder="Enter brand name" readonly>
                    </div>
                    <label class="col-lg-2" for="">Model</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" value="{{ $jobcard->job_item_model}}"
                            id="validationCustom02" name="job_item_model" placeholder="Enter model number" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Item Detail</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" value="{{ $jobcard->job_item_details}}"
                            id="validationCustom02" name="job_item_details" placeholder="Enter item details" readonly>

                    </div>
                    <label class="col-lg-2" for="">Serial Number</label>
                    <div class="col-lg-3">

                        <input type="text" class="form-control" value="{{ $jobcard->job_item_serial}}"
                            id="validationCustom02" name="job_item_serial" placeholder="Enter serial number" readonly>


                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Item Type</label>
                    <div class="col-lg-3">

                        <input type="text" class="form-control" value="{{ $jobcard->job_item_type}}"
                            id="validationCustom02" name="job_item_serial" placeholder="Enter serial number" readonly>


                    </div>
                    <label class="col-lg-2" for="">Job Type</label>
                    <div class="col-lg-3">

                        <input type="text" class="form-control" value="{{ $jobcard->job_type}}" id="validationCustom02"
                            name="job_item_serial" placeholder="Enter serial number" readonly>

                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Fault Details</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="{{ $jobcard->job_fault}}" id="validationCustom02"
                            name="job_fault" placeholder="Enter fault details" readonly>
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Remarks</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" value="{{ $jobcard->job_remark}}"
                            id="validationCustom02" name="job_remarks" placeholder="Enter remarks" readonly>
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Action</label>
                    <div class="col-lg-8">
                        <select class="custom-select" name="job_status_name" id="messagetype"
                            onchange="fun_showtextbox()" required>
                            <option value="" selected disabled hidden>Please select</option>
                            <option value="Outside_Received">Outside_Received</option>
                            <option value="Received_NR">Received - Not Repaired</option>
                        </select>
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>





            <div class="form-group">
                <input type="submit" class="btn btn-primary" Value="Save">
                <a href="{{route('job.joboutside.index')}}" class="btn btn-warning" role="button">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection
