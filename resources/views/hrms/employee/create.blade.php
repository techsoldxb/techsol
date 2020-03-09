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
            <h1 class="m-0 text-dark">Employee Details</h1>
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
     <div class="card bg-light text-dark">
      <p class="bg-primary text-white">Personal Details</p>
     <div class="form-group">
      
     <div class = "row">
     <label class = "col-lg-2" for=""> Employee Name</label>
     <div class = "col-lg-8">    
     <input type="text" class="form-control" id="validationCustom01" name="tb_cust_name" placeholder="Enter School / Company Name" required>
     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>

     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-2" for="">Current Address</label>
     <div class = "col-lg-8">    
     <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" placeholder="Enter School / Company Address" required>
     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>

     <div class="form-group">
      <div class = "row">
      <label class = "col-lg-2" for="">Permenent Address</label>
      <div class = "col-lg-8">    
      <input type="text" class="form-control" id="validationCustom02" name="tb_cust_addr" placeholder="Enter School / Company Address" required>
      <div class = "clear-fix"></div>
      </div>     
      </div>
      </div>
      

    

            <div class="form-group">

            <div class = "row">

            <label class = "col-lg-2" for="">Gender</label>            
            <div class = "col-lg-2 align-self-start">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_mobile" placeholder="Enter Mobile Number" required>
            </div>

            <label class = "col-lg-1" for="">Mobile Number</label>
            <div class = "col-lg-2">    
            <input type="text" class="form-control" id="validationCustom02" name="tb_cust_mobile" placeholder="Enter Mobile Number" required>
            </div>


            <label class = "col-lg-1" for="">Email</label>
            <div class = "col-lg-2">    
            <input type="email" class="form-control" id="validationCustom02" name="tb_cust_email" placeholder="Enter Email" required>           
            </div>     
            </div>
            </div>

             
          
                
                <div class="form-group">
                <div class = "row">
                <label class = "col-lg-2" for="">Date of Birth</label>
                <div class = "col-lg-2">    
                
                    <input class = "form-control datepicker" id="datepicker" name = "tb_date" placeholder="dd-mm-yyyy" required>  
             
                    <script>
                     $('#datepicker').datepicker({
                       format: 'dd-mm-yyyy',
                         uiLibrary: 'bootstrap4'
                     });
                 </script>


                </div>
                <label class = "col-lg-1" for="">Religion</label>
                <div class = "col-lg-2">    
                <input type="text" class="form-control" id="validationCustom02" name="tb_time" placeholder="Enter arrival time" required>     
                </div>     

                <label class = "col-lg-1" for="">Nationality</label>
                <div class = "col-lg-2">    
                <input type="text" class="form-control" id="validationCustom02" name="tb_time" placeholder="Enter arrival time" required>     
                </div>   

                
                </div>
                </div>

                      
                <div class="form-group">
                  <div class = "row">
                  <label class = "col-lg-2" for="">Civil ID #</label>
                  <div class = "col-lg-2">    
                  
                      <input class = "form-control datepicker" id="datepicker" name = "tb_date" placeholder="dd-mm-yyyy" required>  
               
                      <script>
                       $('#datepicker').datepicker({
                         format: 'dd-mm-yyyy',
                           uiLibrary: 'bootstrap4'
                       });
                   </script>
  
  
                  </div>
                  <label class = "col-lg-1" for="">Civil ID Expiry</label>
                  <div class = "col-lg-2">    
                  <input type="text" class="form-control" id="validationCustom02" name="tb_time" placeholder="Enter arrival time" required>     
                  </div>     
  
                  <label class = "col-lg-1" for=""></label>
                  <div class = "col-lg-2">    
                  
                  </div>   
  
                  
                  </div>
                  </div>

                  <div class="form-group">
                    <div class = "row">
                    <label class = "col-lg-2" for="">Passport #</label>
                    <div class = "col-lg-2">    
                    
                        <input class = "form-control datepicker" id="datepicker" name = "tb_date" placeholder="dd-mm-yyyy" required>  
                 
                        <script>
                         $('#datepicker').datepicker({
                           format: 'dd-mm-yyyy',
                             uiLibrary: 'bootstrap4'
                         });
                     </script>
    
    
                    </div>
                    <label class = "col-lg-1" for="">Passport Expiry</label>
                    <div class = "col-lg-2">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_time" placeholder="Enter arrival time" required>     
                    </div>     
    
                    <label class = "col-lg-1" for=""></label>
                    <div class = "col-lg-2">    
                    
                    </div>   
    
                    
                    </div>
                    </div>

                  

              </div>

              <div class="card bg-light text-dark">
                <p class="bg-primary text-white">Job Profile</p>

                    <div class="form-group">
                    <div class = "row">
                    <label class = "col-lg-2" for="">From Date</label>
                    <div class = "col-lg-3">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_kids" placeholder="Enter number of kids">
                    </div>
                    <label class = "col-lg-2" for="">Location</label>
                    <div class = "col-lg-3">    
                    <input type="text" class="form-control" id="validationCustom02" name="tb_adult" placeholder="Enter number of adults">           
                    </div>    
                    </div>
                    </div>

                    <div class="form-group">
                        <div class = "row">
                        <label class = "col-lg-2" for="">Department</label>
                        <div class = "col-lg-3">    
                        
                          <select class="custom-select" name="tb_pay_mode" required>
                            <option value="" selected disabled hidden>Please select</option>
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="Cheque">Cheque</option>                                        
                            <option value="Others">Others</option>                                        
                            
                          </select>

                        </div>
                        <label class = "col-lg-2" for="">Designation</label>
                        <div class = "col-lg-3">    

                          
                          <select class="custom-select" name="tb_reference" required>
                            <option value="" selected disabled hidden>Please select</option>
                            <option value="ICC">ICC</option>
                            <option value="Manal">Manal</option>
                            <option value="Gelan">Gelan</option>                                        
                            <option value="FOH">FOH</option>                                        
                                                                
                            
                          </select>

                        
                        </div>    
                        </div>
                        </div>

                        <div class="form-group">
                          <div class = "row">
                          <label class = "col-lg-2" for="">Grade</label>
                          <div class = "col-lg-3">    
                          
                            <select class="custom-select" name="tb_age" required>
                              <option value="" selected disabled hidden>Please select</option>
                              <option value="3-6">Kids 3-6 year</option>
                              <option value="7-12">Child 7-12 years</option>
                              <option value="13">Adult 13 and above</option>                                        
                                                                  
                              
                            </select>
  
                          </div>
                          <label class = "col-lg-2" for="">Tour Language</label>
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
                            <label class = "col-lg-2" for="">Category</label>
                            <div class = "col-lg-3">    
                            
                              <select class="custom-select" name="tb_category" required>
                                <option value="" selected disabled hidden>Please select</option>
                                <option value="Goverment">Goverment</option>
                                <option value="Private">Private</option>
                                <option value="Others">Others</option>                                        
                                                                    
                                
                              </select>
    
                            </div>
                            <label class = "col-lg-2" for="">Type</label>
                            <div class = "col-lg-3">    
    
                              
                              <select class="custom-select" name="tb_type" required>
                                <option value="" selected disabled hidden>Please select</option>
                                <option value="School Trip">School Trip</option>
                                <option value="Corporate Booking">Corporate Booking</option>
                                <option value="Events">Events</option>                                        
                                                                    
                                
                              </select>
    
                            
                            </div>    
                            </div>
                            </div>
   
                   

                            <div class="form-group">
                              <div class = "row">
                              <label class = "col-lg-2" for="">Comments</label>
                              <div class = "col-lg-8">    
                              <input type="text" class="form-control" id="validationCustom02"  name="tb_comment" placeholder="Enter comments">
                              <div class = "clear-fix"></div>
                              </div>     
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