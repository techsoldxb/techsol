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

@extends('layouts.admin')
@section('content')


<section class="content">

    <div class="form-group">
        <div class="row">
            <div class="col text-left">


                @if($account->th_comp_code =='3')
                <img src={{asset('dist/img/bashlogo12.png')}}>
                @elseif($account->job_comp_code =='4')
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

                @if($account->th_comp_code =='3')
                <img src={{asset('dist/img/bashlogotamil12.png')}}>
                @elseif($account->th_comp_code =='4')
                <img src={{asset('dist/img/techsolkkd_tamil11.png')}}>
                @else
                <img src={{asset('dist/img/printjarwani.png')}}>
                @endif



            </div>
        </div>

        <p class="text-center">
            <strong>

                @if($account->th_comp_code =='003')
                Mobile: 9944 942308, Email: bashcomputers@gmail.com, Opp. State Bank Of India, 103 Salai Street,
                Ramanathapuram
                @elseif($account->th_comp_code =='004')
                Tel: 233990, Mobile: 9600 3500 30, Email: techsolkkd@gmail.com, 315/1, Sekkalai Road, Karaikuddi.
                @endif


            </strong>
        </p>

        <div class="p-1 text-center">

            <h3 class="m-0  text-center"> <strong><u>Cash Payment Voucher</u></strong></h3>

        </div>
    </div>

    <div class="p-1 bg-transparent text-center">



    </div>



    <div class="container-fluid">
        <form class="needs-validation" novalidate method="post">
            @method('GET')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group">
                <div class="row">
                    <label class="col" for="">Doc No. </label>
                    <div class="col">


                        <label for=""> : &nbsp; {{ $account->th_tran_no }} </label>
                    </div>



                    <label class="col" for="">Date </label>
                    <div class="col">


                        <label for=""> : &nbsp; {{ date('d-m-Y', strtotime($account->created_at))  }} </label>

                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col" for="">Name </label>
                        <div class="col">


                            <label for=""> : &nbsp; {{ $account->th_supp_name }} </label>
                        </div>



                        <label class="col" for=""> </label>
                        <div class="col">




                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col" for="">Ref. No </label>
                            <div class="col">

                                <label for=""> : &nbsp; {{ $account->th_bill_no }} </label>
                            </div>



                            <label class="col" for="">Ref. Date</label>
                            <div class="col">


                                <label for=""> : &nbsp; {{ date('d-m-Y', strtotime($account->th_bill_dt))}}
                                </label>
                                <div class="clear-fix"></div>
                            </div>
                        </div>









                                   
                          <table class="table table-bordered">
                                <thead>
                                      <tr>

                                            <th class="col-6 text-center">Description</th>  
                                            <th class="col-2 text-center">Amount</th>
                                          </tr>
                                    </thead>
                                <tbody>    
                                <tr>
                                    <td class="col-6">{{ $account->th_purpose}}</td>
                                    <td class="col-2">{{ $account->th_bill_amt}}</td>
                                </tr>
                                     



                                       
                                   
                            </tbody>
                              </table>
                         


                        <div class="form-group">
                            <div class="row">
                                <label class="col" for="">Prepared By: &nbsp;&nbsp;{{ $account->th_emp_name}} </label>
                                <div class="col">




                                </div>






                                <label class="col" for="">Received Signature: &nbsp;</label>
                                <div class="col">

                                </div>
                            </div>


                        </div>


                        <div class="form-group">



                            <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>




                        </div>



        </form>
    </div>



</section>
@endsection
