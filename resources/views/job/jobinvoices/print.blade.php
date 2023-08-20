@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
    function myFunction() {
        window.print();
    }

</script>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('job.jobinvoice.index')}}">Invoice List</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row">
    <div class="col text-left">

        @if($jobcard->job_comp_code =='3')
        <img src={{asset('dist/img/bashlogo12.png')}}>
        @elseif($jobcard->job_comp_code =='4')
        <img src={{asset('dist/img/tc_logo_bg50.png')}}>
        @else
        <img src={{asset('dist/img/printjarwani.png')}}>
        @endif
    </div>
    <div class="col text-center">
        <img src={{asset('dist/img/tclogo12.png')}}>
        <P></P>
    </div>

    <div class="col text-right">

        <!-- /.content-header           
          <img src={{asset('dist/img/printaqua.png')}}>
          -->

        @if($jobcard->job_comp_code =='3')
        <img src={{asset('dist/img/bashlogotamil12.png')}}>
        @elseif($jobcard->job_comp_code =='4')
        <img src={{asset('dist/img/techsolkkd_tamil11.png')}}>
        @else
        <img src={{asset('dist/img/printjarwani.png')}}>
        @endif
    </div>
</div>

<p class="text-center">
    <strong>
        Mobile: 9944 942308, Email: bashcomputers@gmail.com, Opp. State Bank Of India, 103 Salai Street,
        Ramanathapuram
    </strong>
</p>

<div class="p-1  text-center">
    <h3 class="m-0  text-center"> <strong><u>Bill of Supply</u></strong></h3>
</div>

<div class="p-1 bg-transparent text-center">
</div>
<section class="content">
    <div class="container-fluid">
        <form class="needs-validation" novalidate method="post" action="{{ route('foh.booking.store') }}"
            enctype="multipart/form-data" autocomplete="off">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">

                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Number</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_invoice_number }} </label>
                        </div>
                        <label class="col-2" for="">Date</label>
                        <div class="col-4">
                            <label for=""> : &nbsp;{{ date('d-m-Y', strtotime($jobcard->job_invoice_date))}} </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Customer Name</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_cust_name }} </label>
                        </div>
                        <label class="col-2" for="">Mobile Number</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_cust_mobile }} </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Brand</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_brand }} </label>
                        </div>
                        <label class="col-2" for="">Model</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_model }} </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Item Details</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_details }} </label>
                        </div>
                        <label class="col-2" for="">Serial Number</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_serial }} </label>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Item Type</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_type }} </label>
                        </div>
                        <label class="col-2" for="">Job Type</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_type }} </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Fault Details</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_fault }} </label>
                        </div>
                        <label class="col-2" for="">Remarks</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_remark }} </label>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div id="invoice_textbox" class="row">
                        <label class="col-2" for="">Invoice Amount</label>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    :&nbsp;
                                    <span><i class="fa fa-inr"></i>
                                    </span>
                                </div>
                                <label for=""> . {{ $jobcard->job_invoice_amount }} </label>
                            </div>
                        </div>
                        <label class="col-2" for="">Job ID</label>
                        <div class="col-4">
                            <label for="">: <label for=""> . {{ $jobcard->job_enq_number }} </label></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <strong>
                        Terms & Conditions:
                    </strong>
                    <br>
                    <ol>
                        <li>The customer authorizes us to:
                            <ol>
                                <li type="a"> Carry out agreed work on the device ourselves</li>
                                <li type="a"> Carry out necessary troubleshooting by using our testing devices/items in
                                    connection with that work</li>
                            </ol>
                        </li>
                        <li>Every effort will be taken to complete the work within the estimated time. However, we are
                            not
                            responsible for delays due to non-availability of parts or materials, or for any
                            circumstances
                            beyond our reasonable control</li>
                        <li>Any initial estimate is based upon the visual inspection. If any additional required
                            repair(s) are
                            found during dismantling, a supplementary estimate will be issued for those repair(s).</li>
                        <li>Estimates are validfor 7 days from the date of receipt. We will carry out any work only
                            after the
                            customer’s approval of the estimate by written or SMS to the cell phone mentioned in the job
                            enquiry form authorization.</li>
                        <li>Displaced/replaced parts shall be disposed of immediately unless we are instructed by the
                            customer at the time of work authorization and must be collected along with te device. No
                            later claim will be considered/entertained</li>
                        <li>If we or our subcontractor inadvertently damage the device while carrying out the authorized
                            job/agreed work, we will repair the damage in the device at our cost. We DO NOT undertake
                            any other liability</li>
                        <li> Once the device is available for collection, the customer will be notified by telephone,
                            SMS or
                            email. The customer needs tobring the original job card slip. Failing to produce the
                            original job
                            card slip at the time of collection will result in denial to deliver the device. If the
                            person collecting
                            the device in not the registered owner, he or she must provide the original job card slip or
                            other suitable written authorization.</li>
                        <li>Unless agreed in advance, the customer is required to fully settle the invoice amount before
                            we return the device.</li>
                        <li>In the event of late or non-payment of any amount owed by the customer or failure to collect
                            the device within 15 days from the date fo job completion notification, the device will be
                            scrapped without any further notice to the customer and any later claim for the device will
                            not
                            be entertained.</li>
                        <li> On receipt of the device, the customer/person collects the device is required to inspect
                            and
                            notify us of any issue there itself. Should the customer take delivery of the device, it is
                            confirmed
                            that he/she is satisfied with the work and no subsequent claims will be
                            entertained/accepted.</li>
                    </ol>
                    <p align="center">Above said terms and conditions agreed and signed.</p>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col" for="">Prepared by: {{ $jobcard->job_inv_created_user }}</label>
                        <label class="col" for="">Signature: _____________________________</label>
                    </div>
                </div>
                <div class="form-group">
                    <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
                </div>
        </form>
    </div>
</section>
@endsection
