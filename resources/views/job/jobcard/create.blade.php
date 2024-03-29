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
        <form class="needs-validation" name="myform" id="myform" novalidate method="post"
            action="{{ route('job.jobcard.store') }}" enctype="multipart/form-data" autocomplete="off" autofill="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Customer Name</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control text-capitalize" id="validationCustom01"
                            name="job_cust_name" placeholder="Enter customer name" required>
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>



            <div class="form-group" class="input-group">
                <div class="row">

                    <label class="col-lg-2" for="">Mobile Number</label>
                    <div class="col-lg-3">

                        <div class="input-group">
                            <div class="input-group-prepend">

                                <span class="input-group-text"><i class="fa fa-whatsapp"></i></i></span>



                            </div>
                            <input type="text" class="form-control" onkeypress="return isNumberKey(event)"
                                id="validationCustom02" name="job_cust_mobile" placeholder="Enter mobile number"
                                required>
                            <span class="text-danger"> {{$errors->first('job_cust_mobile')}} </span>
                        </div>







                    </div>
                    <label class="col-lg-2" for="">Email</label>
                    <div class="col-lg-3">

                        <div class="input-group">
                            <div class="input-group-prepend">

                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>

                            </div>
                            <input type="email" class="form-control" id="validationCustom02" name="job_cust_email"
                                placeholder="Enter email">
                        </div>



                    </div>
                </div>
            </div>





            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Brand</label>
                    <div class="col-lg-3">




                        <select class="custom-select" name="job_item_brand">
                            <option value="" selected disabled hidden>Please select</option>
                            <option value="HP">HP</option>
                            <option value="Dell">Dell</option>
                            <option value="Acer">Acer</option>
                            <option value="Lenovo">Lenovo</option>
                            <option value="Toshiba">Toshiba</option>
                            <option value="Epson">Epson</option>
                            <option value="Canon">Canon</option>
                            <option value="Brother">Brother</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Numeric">Numeric</option>
                            <option value="Zebronic">Zebronic</option>
                            <option value="Microtek">Microtek</option>
                            <option value="Imagestar">Image Star</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Iphone">Iphone</option>
                            <option value="Oppo">Oppo</option>
                            <option value="MI">MI</option>
                            <option value="Poco">Poco</option>
                            <option value="Redmi">Redmi</option>
                            <option value="Realme">Realme</option>
                            <option value="One Plus">One Plus</option>
                            <option value="Itel">Itel</option>
                            <option value="Huawei">Huawei</option>
                            <option value="Vivo">Vivo</option>
                            <option value="Nokia">Nokia</option>
                            <option value="Micromax">Micromax</option>
                            <option value="Alcatel">Alcatel</option>
                            <option value="ZTE">ZTE</option>
                            <option value="Lava">Lava</option>
                            <option value="JBL">JBL</option>
                            <option value="Tplink">TP-Link</option>
                            <option value="Sony">Sony</option>
                            <option value="Infinity">Infinity</option>
                            <option value="Onsor">Onsor</option>
                            <option value="APC">APC</option>
                            <option value="Phlips">Phlips</option>

                            <option value="Assembled">Assembled</option>
                            <option value="Others">Others</option>
                        </select>



                    </div>
                    <label class="col-lg-2" for="">Model</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="job_item_model" name="job_item_model" maxlength="15"
                            placeholder="Enter model number" required>
                    </div>
                    <script>
                        $("#job_item_model").keypress(function (e) {
                            $("#error_sp_msg").remove();
                            var k = e.keyCode,
                                $return = ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (
                                    k >= 48 && k <= 57));
                            if (!$return) {
                                $("<span/>", {
                                    "id": "error_sp_msg",
                                    "html": "Special characters not allowed"
                                }).insertAfter($(this));
                                return false;
                            }

                        })

                    </script>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Item Type</label>
                    <div class="col-lg-3">
                        <select class="custom-select" name="job_item_type" required>
                            <option value="" selected disabled hidden>Please select</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Play Station">Play Station</option>
                            <option value="Router">Router</option>

                            <option value="Laptop">Laptop</option>
                            <option value="Desktop">Desktop</option>
                            <option value="Printer">Printer</option>
                            <option value="Monitor">Monitor</option>

                            <option value="Toner">Toner</option>
                            <option value="Camera">Camera</option>
                            <option value="Speaker">Speaker</option>
                            <option value="UPS">UPS</option>
                            <option value="HDD">HDD</option>
                            <option value="AIO">AIO</option>
                            <option value="AIO">Adapter</option>
                            <option value="Other">Other</option>
                        </select>

                    </div>
                    <label class="col-lg-2" for="">Serial Number</label>
                    <div class="col-lg-3">

                        <input type="text" class="form-control" id="validationCustom02" name="job_item_serial"
                            placeholder="Enter serial number">


                    </div>
                </div>
            </div>






            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Fault Type</label>
                    <div class="col-lg-8">
                        <select class="custom-select" name="job_fault_price" id="job_fault_price" required>
                            <option value="" selected disabled hidden>Please select</option>
                            @foreach($faults as $f)
                            <option value="{{ $f->job_fault_price}}">{{ $f->job_fault_desc}}</option>
                            @endforeach

                        </select>

                        <input type="hidden" id="job_type" name="job_type">

                        <script>
                            $('#job_fault_price').on('change', function () {
                                var selectedName = $('#job_fault_price option:selected').text();
                                $('#job_type').val(selectedName);
                            })

                        </script>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Fault Details</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="validationCustom02" name="job_fault"
                            placeholder="Enter fault details">
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <label class="col-lg-2" for="">Remarks</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="validationCustom02" name="job_remark"
                            placeholder="Enter remarks">
                        <div class="clear-fix"></div>
                    </div>
                </div>
            </div>








            <div class="form-group">
                <input type="submit" class="btn btn-primary" Value="Save">
                <a href="{{route('job.jobcard.index')}}" class="btn btn-warning" role="button">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection
