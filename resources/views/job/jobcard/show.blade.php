@extends('layouts.admin')
@section('content')




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

                    <li class="breadcrumb-item"><a href="{{route('job.jobcard.index')}}">Job Enquiry List</a></li>


                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="form-group">
    <div class="row">
        <div class="col text-left">


            @if($jobcard->job_comp_code =='3')
            <img src={{asset('dist/img/bashlogo12.png')}}>
            @elseif($jobcard->job_comp_code =='4')
            <img src={{asset('dist/img/tc_logo_bg50.png')}}>
            @elseif($jobcard->job_comp_code =='5')
            <img src={{asset('dist/img/techsol_ruwi_logo.png')}}>
            @elseif($jobcard->job_comp_code =='6')
            <img src={{asset('dist/img/techsol_ruwi_logo.png')}}>
            @else
            <img src={{asset('dist/img/mcclogonew.png')}}>
            @endif

        </div>
        <div class="col text-center">
            <h3 class="m-0  text-center"> <strong><u>Job Card</u></strong></h3>
            <P></P>

        </div>
        <div class="col text-right">

            @if($jobcard->job_comp_code =='3')
            <img src={{asset('dist/img/bashlogotamil12.png')}}>
            @elseif($jobcard->job_comp_code =='4')
            <img src={{asset('dist/img/techsolkkd_tamil11.png')}}>
            @elseif($jobcard->job_comp_code =='5')
            <img src={{asset('dist/img/TECHSOL_ARA1.png')}}>
            @elseif($jobcard->job_comp_code =='6')
            <img src={{asset('dist/img/TECHSOL_ARA1.png')}}>
            @else
            <img src={{asset('dist/img/mcclogonew.png')}}>
            @endif



        </div>
    </div>

    <p class="text-center">
        <strong>

            @if($jobcard->job_comp_code =='003')
            Mobile: 9042886233, Email: bashcomputers@gmail.com, Opp. State Bank Of India, 103 Salai Street,
            Ramanathapuram
            @elseif($jobcard->job_comp_code =='004')
            Tel: 233990, Mobile: 9042886255, Email: techsolkkd@gmail.com, 315/1, Sekkalai Road, Karaikuddi.
            @elseif($jobcard->job_comp_code =='005')
            Tel: +968 98295550, Email: sales@techsolme.com, P.O.Box: 254, Opp Al Maha Super Market, Al Buraimi, Sultanat
            of Oman.
            @elseif($jobcard->job_comp_code =='006')
            Tel: +968 24832720, Email: sales@techsolme.com, Souq Ruwi Street, Ruwi, Sultanat of Oman.
            @endif


        </strong>
    </p>

    <div class="p-1 text-center">



    </div>
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
                        <label class="col-2" for="">Job ID</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_enq_number }} </label>

                        </div>
                        <label class="col-2" for="">Date</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ date('d-m-Y', strtotime($jobcard->created_at))}} </label>

                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Customer Name</label>
                        <div class="col-4">
                            <label for="">
                                : &nbsp; {{ $jobcard->job_cust_name }}
                            </label>

                        </div>
                        <label class="col-2" for="">Mobile Number</label>
                        <div class="col-4">
                            <label for="">: &nbsp; {{ $jobcard->job_cust_mobile }} </label>
                        </div>
                    </div>
                </div>








                <div class="form-group">
                    <div class="row">
                        <label class="col-2" for="">Brand</label>
                        <div class="col-4">
                            <label for=""> : &nbsp; {{ $jobcard->job_item_brand }}</label>





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
                            <label for="">: &nbsp; {{ $jobcard->job_item_type }} </label>



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
                            <label for="">: &nbsp; {{ $jobcard->job_remark }} </label>


                        </div>
                    </div>
                </div>















                <div class="form-group">

                    <p align="left">I agree the Terms and Conditions printed overleaf.</p>

                </div>






                <div class="form-group">
                    <div class="row">
                        <label class="col" for="">Signature of customer: _____________________________</label>
                        <label class="col" for="">Received by: {{ $jobcard->job_enq_created_user }}</label>



                    </div>
                </div>



                <div class="form-group">

                    <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>

                </div>



        </form>
    </div>
</section>
@endsection
