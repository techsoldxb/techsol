<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



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

<script>
    $(function () {
        $('#cost_aed, #tax_per,#profit_perc,#profit_perc,#courier').keyup(function () {
            var cost_aed = parseFloat($('#cost_aed').val()) || 0;
            var tax_per = 5;
            var tax_amount = (cost_aed * tax_per) / 100;
            $('#tax_amount').val(tax_amount);
            var cost_aed_tax = cost_aed + tax_amount;
            $('#cost_aed_tax').val(cost_aed_tax);


            var cost_omr = parseFloat(Number(cost_aed_tax / 9.5).toFixed(3));


            $('#cost_omr').val(cost_omr);
            var profit_perc = parseFloat($('#profit_perc').val()) || 0;


            var profit_amount = parseFloat(Number((cost_omr * profit_perc) / 100).toFixed(3));


            $('#profit_amount').val(profit_amount);
            var courier = parseFloat($('#courier').val()) || 0;


            var selling_price = parseFloat(Number(cost_omr + profit_amount + courier).toFixed(3));


            var profit_perc_val = $("#profit_perc").val();
            if (jQuery.trim(profit_perc_val).length > 0) {
                $('#selling_price').val(selling_price);


            }

        });
    });

</script>


<!-- End -->
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



<!-- End -->


@extends('layouts.admin')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cash Payment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.cashpayment.index')}}">CPV</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.accounts.index')}}">EXPJV</a></li>



                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <form class="needs-validation" novalidate method="post" action="{{ route('admin.cashpayment.store') }}"
            enctype="multipart/form-data" autocomplete="off">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">



            <div class="form-group">
                <div class="row">
                    <label class="col-lg-1" for="">Name</label>
                    <div class="col-lg-5">



                        <select class="custom-select" id="th_supp_name" name="th_supp_name" required>
                            <option value="" selected disabled hidden>Please select</option>

                            @foreach($supplier as $c)
                            <option value="{{ $c->supp_name}}">{{ $c->supp_name}}</option>
                            @endforeach

                        </select>

                        <script>
                            $(document).ready(function () {
                                $('.js-example-basic-multiple').select2();
                            });

                        </script>


                    </div>
                    <div class="clear-fix"></div>
                </div>


                <div class="my-3"></div>


                <div class="form-group">
                    <div class="row">
                        <label class="col-lg-1" for="">Amount</label>
                        <div class="col-lg-2">

                            <input type="text" name="th_bill_amt" tabindex="2" onkeypress="return isNumberKey(event)"
                                class="form-control " placeholder="Enter payment amount" required> </div>

                        <label class="col-lg-1" for="">Payment Date</label>
                        <div class="col-lg-2">
                            <input class="form-control datepicker" id="datepicker" name="th_pay_date"
                                value="{{ date('d-m-Y') }}" required>

                            <script>
                                $('#datepicker').datepicker({
                                    format: 'dd-mm-yyyy',
                                    uiLibrary: 'bootstrap4'
                                });

                            </script>

                        </div>


                    </div>

                    <div class="my-3"></div>

                    <div class="form-group">
                        <div class="row">

                            <label class="col-lg-1" for="">Invoice Number</label>
                            <div class="col-lg-2">
                                <input type="text" name="th_bill_no" tabindex="3" class="form-control"
                                    placeholder="Enter invoice number">
                                <div class="clear-fix"></div>
                            </div>


                            <label class="col-lg-1" for="">Invoice Date</label>
                            <div class="col-lg-2">
                                <input class="form-control datepicker" id="datepicker1" name="th_bill_dt"
                                    value="{{ date('d-m-Y') }}" required>

                                <script>
                                    $('#datepicker1').datepicker({
                                        format: 'dd-mm-yyyy',
                                        uiLibrary: 'bootstrap4'
                                    });

                                </script>

                            </div>



                        </div>

                        <div class="my-3"></div>


                        <div class="form-group">
                            <div class="row">

                                <label class="col-lg-1" for="">Attach Bill</label>
                                <div class="col-md-6">
                                    <input type="file" id="validationCustom01" name="th_attach">
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="form-group">
                            <label for="comment">Narration:</label>
                            <textarea name="th_purpose" tabindex="4" class="form-control col-lg-6" rows="2" id="comment"
                                placeholder="Enter the narration in detail"></textarea>
                        </div>


                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" Value="Save">
                        <a href="{{route('admin.cashpayment.index')}}" class="btn btn-warning" role="button">Cancel</a>
                    </div>



        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $("#th_supp_name").select2();

    </script>

</section>
@endsection
