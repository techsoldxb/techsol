@extends('layouts.admin')
@section('content')

   <!-- This script is used to allow only number in the bill amount field -->
   <script>    
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
</script>

<script>
$(function()
{
    $("#myform").validate(
      {
        rules: 
        {
          item: 
          {
            required: true
          }
        }
      });	
});
</script>



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
  function calc1() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
  document.getElementById('student_amount').value = textValue1 * textValue2;   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

 

      document.getElementById('tb_total').value = textValue1 * textValue2 + textValue3 * textValue4 
      + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

   function calc2() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  
  var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

    
  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('teacher_amount').value = textValue3 * textValue4; 

  

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }   

  function calc3() 
  {


  var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;

  var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;


  document.getElementById('adult_amount').value = textValue5 * textValue6; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }

  function calc4() 
  {
    var textValue1 = document.getElementById('tb_student_qty').value;
  var textValue2 = document.getElementById('tb_student_price').value;
   

  var textValue3 = document.getElementById('tb_teacher_qty').value;
  var textValue4 = document.getElementById('tb_teacher_price').value;

  


    var textValue5 = document.getElementById('tb_adult_qty').value;
  var textValue6 = document.getElementById('tb_adult_price').value;



    var textValue7 = document.getElementById('tb_addon1_qty').value;
  var textValue8 = document.getElementById('tb_addon1_price').value;

  document.getElementById('addon1_amount').value = textValue7 * textValue8; 

      document.getElementById('tb_total').value = textValue1 * textValue2 
  + textValue3 * textValue4 + textValue5 * textValue6 + textValue7 * textValue8;
 
  }  
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
              
                  <li class="breadcrumb-item"><a href="{{route('foh.booking.index')}}">Booking</a></li>


            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" name="myform" id="myform" novalidate method = "post" action="{{ route('foh.booking.store') }}" 
     enctype="multipart/form-data" autocomplete="off" autofill="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-2" for="">Customer Name</label>
     <div class = "col-lg-8">    
     <input type="text" class="form-control" id="validationCustom01" name="job_cust_name" placeholder="Enter customer name" required>
     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>


            <div class="form-group">
            <div class = "row">
            <label class = "col-lg-2" for="">Mobile Number</label>
            <div class = "col-lg-3">    
            <input type="text" class="form-control" id="validationCustom02" name="job_cust_mobile" placeholder="Enter mobile number" required>
            </div>
            <label class = "col-lg-2" for="">Email</label>
            <div class = "col-lg-3">    
            <input type="email" class="form-control" id="validationCustom02" name="job_cust_email" placeholder="Enter Email" required>           
            </div>     
            </div>
            </div>

             


                    <div class="form-group">
                    <div class = "row">
                    <label class = "col-lg-2" for="">Brand</label>
                    <div class = "col-lg-3">    
                    <input type="text" class="form-control" id="validationCustom02" name="job_item_brand" placeholder="Enter brand name">
                    </div>
                    <label class = "col-lg-2" for="">Model</label>
                    <div class = "col-lg-3">    
                    <input type="text" class="form-control" id="validationCustom02" name="job_item_model" placeholder="Enter model number">           
                    </div>    
                    </div>
                    </div>

                    <div class="form-group">
                        <div class = "row">
                        <label class = "col-lg-2" for="">Item Detail</label>
                        <div class = "col-lg-3">    
                        <input type="text" class="form-control" id="validationCustom02" name="job_item_details" placeholder="Enter item details">

                        </div>
                        <label class = "col-lg-2" for="">Serial Number</label>
                        <div class = "col-lg-3">    

                        <input type="text" class="form-control" id="validationCustom02" name="job_item_serial" placeholder="Enter serial number">

                        
                        </div>    
                        </div>
                        </div>

                        <div class="form-group">
                          <div class = "row">
                          <label class = "col-lg-2" for="">Item Type</label>
                          <div class = "col-lg-3">    
                          
                            <select class="custom-select" name="tb_age" required>
                              <option value="" selected disabled hidden>Please select</option>
                              <option value="3-6">Kids 3-6 year</option>
                              <option value="7-12">Child 7-12 years</option>
                              <option value="13">Adult 13 and above</option>                                        
                                                                  
                              
                            </select>
  
                          </div>
                          <label class = "col-lg-2" for="">Job Type</label>
                          <div class = "col-lg-3">    
  
                            
                            <select class="custom-select" name="tb_language" required>
                              <option value="" selected disabled hidden>Please select</option>
                              <option value="English">English</option>
                              <option value="Arabic">Arabic</option>
                              <option value="No Tour">No Tour</option>                                        
                                                                  
                              
                            </select>
  
                          
                          </div>    
                          </div>
                          </div>

                         
                   

                            <div class="form-group">
                              <div class = "row">
                              <label class = "col-lg-2" for="">Fault Details</label>
                              <div class = "col-lg-8">    
                              <input type="text" class="form-control" id="validationCustom02"  name="job_fault" placeholder="Enter fault details">
                              <div class = "clear-fix"></div>
                              </div>     
                              </div>
                              </div>

                              
                            <div class="form-group">
                              <div class = "row">
                              <label class = "col-lg-2" for="">Remarks</label>
                              <div class = "col-lg-8">    
                              <input type="text" class="form-control" id="validationCustom02"  name="tb_comment" placeholder="Enter remarks">
                              <div class = "clear-fix"></div>
                              </div>     
                              </div>
                              </div>


     

     



     <div class="form-group">
     <input type="submit" class = "btn btn-primary" Value ="Save">
     <a href="{{route('foh.booking.index')}}" class="btn btn-warning" role="button">Cancel</a>
     </div>
     </form>
      </div>
    </section>
@endsection