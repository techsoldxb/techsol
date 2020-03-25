@extends('layouts.admin')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<style>
  
</style>

  

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
            <h1 class="m-0 text-dark">Cheque Details</h1>
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
     <form  class="needs-validation" name="myform" id="myform" novalidate method = "post" action="{{ route('admin.cheque.store') }}" 
     enctype="multipart/form-data" autocomplete="off" autofill="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-2" for="">Beneficiary Name</label>
     <div class = "col-lg-8">    
     
      
     <select class="form-control select2"  name="name" required>
      <option value="" selected disabled hidden>Please select</option>
      
      @foreach($admin_beneficiary as $c)
      <option value="{{ $c->ben_name}}">{{ $c->ben_name}}</option>
      @endforeach   
      
      </select>

      <script>
        $('.select2').select2();
    </script>

      




     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>

     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-2" for="">Bank</label>
     <div class = "col-lg-8">    
     <input type="text" class="form-control" id="validationCustom02" name="bank_name" placeholder="Select Bank" required>
     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>



             

                
               
         

                    
   
                   

                            <div class="form-group">
                              <div class = "row">
                              <label class = "col-lg-2" for="">Narration</label>
                              <div class = "col-lg-8">    
                              <input type="text" class="form-control" id="validationCustom02"  name="narration" placeholder="Enter comments">
                              <div class = "clear-fix"></div>
                              </div>     
                              </div>
                              </div>

                            <table class="table table-bordered">
                              <thead>
                              <tr>
                                                 
                                         
                                <th class="text-center"> Cheque Number</th>            
                                <th class="text-center"> Cheque Date</th> 
                                <th class="text-center"> Cheque Amount </th> 
                                <th class="text-center"> Reference</th>
                              
                              </tr>
                              </thead>
                              <tbody>
                                    <tr>
                                        <td>
                                            
                                            <input type="text" class="form-control text-center"  id="chq_number" name="chq_number[]" 
                                          onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="" required>

                                        </td>
                                        <td>

                                            <input class = "form-control datepicker" id="datepicker" name = "chq_date[]" placeholder="dd-mm-yyyy" required>  
             
                                            <script>
                                             $('#datepicker').datepicker({
                                               format: 'dd-mm-yyyy',
                                                 uiLibrary: 'bootstrap4'
                                             });
                                         </script>


                                          
                                        </td>
                                        <td>
                                          
                                            <input type="text" class="form-control text-center" id="chq_amount"  name = "chq_amount[]"
                                          onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="" required>
                                            
                                         
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-left" id="reference" name="reference[]" placeholder="" >
                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control text-center"  id="chq_number" name="chq_number[]" 
                                          onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="" >
                                        </td>
                                        <td>
                                            <input class = "form-control datepicker" id="datepicker1" name = "chq_date[]" placeholder="dd-mm-yyyy" >  
             
                                            <script>
                                             $('#datepicker1').datepicker({
                                               format: 'dd-mm-yyyy',
                                                 uiLibrary: 'bootstrap4'
                                             });
                                         </script>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" id="tb_teacher_price" name="chq_amount[]"
                                          onkeypress="return isNumberKey(event)" onkeyup="calc2()">
                                        </td>
                                        <td>
                                           
                                            <input type="text" class="form-control text-left"  id="tb_student_qty" name="reference[]"  >
                                            

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="text" class="form-control text-center"  id="tb_student_qty" name="chq_number[]" 
                                          onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="" >
                                        </td>
                                        <td>
                                            <input class = "form-control datepicker" id="datepicker2" name = "chq_date[]" placeholder="dd-mm-yyyy" >  
             
                                            <script>
                                             $('#datepicker2').datepicker({
                                               format: 'dd-mm-yyyy',
                                                 uiLibrary: 'bootstrap4'
                                             });
                                         </script>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" id="tb_teacher_price" name="chq_amount[]"
                                          onkeypress="return isNumberKey(event)" onkeyup="calc2()">
                                        </td>
                                        <td>
                                           
                                            <input type="text" class="form-control text-left"  id="tb_student_qty" name="reference[]"  >
                                            

                                        </td>
                                    </tr>
                
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control text-center"  id="tb_student_qty" name="chq_number[]" 
                                            onkeypress="return isNumberKey(event)" onkeyup="calc1()" placeholder="" >
                                        </td>
                                        <td>
                                            <input class = "form-control datepicker" id="datepicker3" name = "chq_date[]" placeholder="dd-mm-yyyy" >  
             
                                            <script>
                                             $('#datepicker3').datepicker({
                                               format: 'dd-mm-yyyy',
                                                 uiLibrary: 'bootstrap4'
                                             });
                                         </script>
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-center" id="tb_adult_price" name="chq_amount[]" 
                                          onkeypress="return isNumberKey(event)" onkeyup="calc3()" placeholder="" >
                                        </td>
                                        <td>
                                          <input type="text" class="form-control text-left" id="adult_amount" name="reference[]" >
                                          
                                        </td>
                                    </tr>


                                

                                    <tr>
                                      <td>
                                          
                                      </td>
                                      <td>
                                        Total OMR 
                                      </td>
                                      <td class="font-weight-bold text-right">
                                        
                                        <input type="text" class="form-control font-weight-bold  text-right" id="tb_total" 
                                        name="tb_total" placeholder="" disabled>
                                      </td>
                                      <td>
                                        
                                      </td>
                                  </tr>
                
                             
                              </tbody>
                
                              
                 
                            </table>

     

     



     <div class="form-group">
     <input type="submit" class = "btn btn-primary" Value ="Save">
     <a href="{{route('admin.cheque.index')}}" class="btn btn-warning" role="button">Cancel</a>
     </div>
     </form>
      </div>
    </section>
@endsection