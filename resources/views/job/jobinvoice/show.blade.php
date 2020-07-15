@extends('layouts.admin')
@section('content')




<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
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

    <div class = "row">
        <div class = "col text-center">
          <img src={{asset('dist/img/printjarwani.png')}}>
        </div>
        <div class = "col">
        <h1 class="m-0 text-dark text-center">Techsol Group</h1>
        <h2 class="m-0 text-dark text-center">Bash Computers</h2>
        
        </div>
        <div class = "col text-center">
          
          
          
          <img src={{asset('dist/img/printaqua.png')}}>
          
        </div>
      </div>  

      <div class="p-1 bg-secondary text-center"> 

        <h4 class="m-0  text-center">Job Invoice</h4>
     
    </div> 

    <div class="p-1 bg-transparent text-center"> 



</div> 


    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" novalidate method = "post" action="{{ route('foh.booking.store') }}" 
     enctype="multipart/form-data" autocomplete="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">

  

        <div class="form-group">
        <div class = "row">
            <label class = "col" for="">Invoice Number</label>
        <div class = "col">    
            <input type="text" class="form-control" id="validationCustom01" name="job_enq_number" 
            value="{{ $jobcard->job_enq_number }}" disabled  >
        </div>
        <label class = "col" for="">Date</label>
        <div class = "col">    
        <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" value="{{ $jobcard->job_enq_date }}" disabled>           
        </div>     
        </div>
        </div>

        
        
        <div class="form-group">
        <div class = "row">
            <label class = "col" for="">Customer Name</label>
        <div class = "col">    
            <input type="text" class="form-control" id="validationCustom01" name="tb_cust_name" value="{{ $jobcard->job_cust_name }}" disabled  >
        </div>
        <label class = "col" for="">Mobile Number</label>
        <div class = "col">    
        <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" value="{{ $jobcard->job_cust_mobile }}" disabled>           
        </div>     
        </div>
        </div>

    



             

                
                <div class="form-group">
                <div class = "row">
                <label class = "col" for="">Brand</label>
                <div class = "col">    
                
                    <input class = "form-control datepicker" id="datepicker" name = "tb_date" value="{{ $jobcard->job_item_brand }}"  disabled>  
             


                </div>
                <label class = "col" for="">Model</label>
                <div class = "col">    
                <input type="text" class="form-control" id="validationCustom02" name="tb_time" value="{{ $jobcard->job_item_model }}" disabled>     
                
                
             
                  
                </div>     
                </div>
                </div>

                    <div class="form-group">
                    <div class = "row">
                    <label class = "col" for="">Item Details</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_kids" value="{{ $jobcard->job_item_details }}" disabled>
                    </div>
                    <label class = "col" for="">Serial Number</label>
                    <div class = "col">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_adult" value="{{ $jobcard->job_item_serial }}" disabled>           
                    </div>    
                    </div>
                    </div>


                       
                          <div class="form-group">
                            <div class = "row">
                            <label class = "col" for="">Item Type</label>
                            <div class = "col">                              
                                <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $jobcard->job_item_type }}" disabled>                              
                           
    
                            </div>
                            <label class = "col" for="">Job Type</label>
                            <div class = "col">    
                                <input type="text" class="form-control" id="validationCustom02" name="tb_reference" value="{{ $jobcard->job_type }}" disabled>                                                    
                           
                            </div>    
                            </div>
                            </div>


                       
                            <div class="form-group">
                            <div class = "row">
                            <label class = "col-lg-3" for="">Fault Details</label>
                            <div class = "col">                              
                            <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $jobcard->job_fault }}" disabled>                                                            
                            </div>                               
                            </div>
                            </div>

                            <div class="form-group">
                            <div class = "row">
                            <label class = "col-lg-3" for="">Remarks</label>
                            <div class = "col">                              
                            <input type="text" class="form-control" id="validationCustom02" name="tb_pay_mode"  value="{{ $jobcard->job_remarks }}" disabled>                                                           
                            </div>                               
                            </div>
                            </div>


                    
   
                      


     

     

      
<div class="container">
  <h6>Terms & Condition</h6>
  
  <ol>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

</div>






<div class="form-group">
      <div class = "row">
      <label class = "col" for="">Prepared by: {{ $jobcard->job_enq_created_user }}</label>
     
      <label class = "col" for="">Signature: _____________________________</label>
       
      </div>
      </div>

      

      <div class="form-group">
     
        <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
        
        </div>
   


     </form>
      </div>
    </section>
@endsection