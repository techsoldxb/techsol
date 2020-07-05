@extends('layouts.admin')
@section('content')



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>
var _data = {};
        var _data = {"Acc":{"dev":"Laptop Accessories","test":"Other Accessories"},
        "Cab":{"dev":"Power Cables","test":"UTP Cables"},
        "Per":{"cpu":"CPU","hdd":"HDD","mon":"Monitor","ram":"RAM","mbr":"Motherboard"},
        "Lac":{"adp":"Adapter","scr":"Screen","kbr":"Keyboard","tab":"Table","bod":"Body"},
        "Pri":{"print":"Printer","car":"Cartridge","ton":"Toner","pow":"Powder","rib":"Ribbon"},
        "Lap":{"dev":"Desktop","test":"Laptop"}};
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#env-select').on('change', function(e){
        var source = $(this),
            val = $.trim(source.val()),
            target = $('#env_ddl');
			$(target).empty();
        if(typeof(_data[val]) != "undefined"){
            var options = (typeof(_data[val]) != "undefined") ? _data[val] : {};
			 $('<option>-- Select --</option>').appendTo(target);
            $.each( options , function(value, index) {
                    $('<option value="' + value + '">' + index + '</option>').appendTo(target);
            });
        }

    });
  });
</script>


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
            <h1 class="m-0 text-dark">Customer Enquiry Form</h1>
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
     <form  class="needs-validation" name="myform" id="myform" novalidate method = "post" action="{{ route('showroom.enquiry.store') }}" 
     enctype="multipart/form-data" autocomplete="off" autofill="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     
    

     
     <div class="form-group">
            <div class = "row">
            <label class = "col-lg-2" for="">Customer Name</label>
            <div class = "col-lg-3">    
            <input type="text" class="form-control" id="validationCustom02" name="enq_cust_name" placeholder="Enter customer name" required>
            </div>
            <label class = "col-lg-2" for="">Gender</label>
            <div class = "col-lg-3">    
           
     
            <select class="custom-select" name="enq_gender" required>
                                <option value="" selected disabled hidden>Please select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                                                  
                                                                    
                                
                              </select>

            </div>     
            </div>
            </div>


            <div class="form-group">
            <div class = "row">
            <label class = "col-lg-2" for="">Mobile Number</label>
            <div class = "col-lg-3">    

           

            
                  <input type="text" class="form-control" name="enq_mobile" placeholder="Enter mobile number">
                



          
            </div>
            <label class = "col-lg-2" for="">Email</label>
            <div class = "col-lg-3">    
            
           
                  <input type="email" class="form-control" name="enq_email" placeholder="Email">
                

            </div>     
            </div>
            </div>

             

                
                <div class="form-group">
                <div class = "row">
                <label class = "col-lg-2" for="">Date of Visit</label>
                <div class = "col-lg-3">    
                
                    <input class = "form-control datepicker" id="datepicker" name = "enq_date" value = "{{ date('d-m-Y') }}" required>  
             
                    <script>
                     $('#datepicker').datepicker({
                       format: 'dd-mm-yyyy',
                         uiLibrary: 'bootstrap4'
                     });
                 </script>


                </div>
                <label class = "col-lg-2" for="">Time</label>
                <div class = "col-lg-3">    
                <input type="time" class="form-control" id="validationCustom02" name="enq_time" placeholder="Enter arrival time" required> 
           <script>
              $('.datetimepicker').datetimepicker({
                  autoclose: true,
                  showMeridian:false
              }); 
           </script>
                
                
                
             
                  
                </div>     
                </div>
                </div>


                    <div class="form-group">
                        <div class = "row">
                        <label class = "col-lg-2" for="">Purpose Of Visit</label>
                        <div class = "col-lg-3">    

                        
        
                        
          
                        <select class="custom-select" name="enq_purpose" required>
                                <option value="" selected disabled hidden>Please select</option>
                                <option value="New Purchase / Follow Up">New Purchase / Follow Up</option>
                                <option value="New Service / Follow Up">New Service / Follow Up</option>
                                <option value="Others">Others</option>
                                                                  
                                                                    
                                
                              </select>

                        </div>
                        <label class = "col-lg-2" for="">Item Details</label>
                        <div class = "col-lg-3">    

                        <input type="text" class="form-control" id="validationCustom02" name="enq_item_details" placeholder="Enter reference" required>

                        
                        </div>    
                        </div>
                        </div>

                        <div class="form-group">
                          <div class = "row">
                          <label class = "col-lg-2" for="">Group</label>
                          <div class = "col-lg-3">    
                          
          
                          <select class="custom-select" id="env-select" name="enq_group" required>
                                <option value="" selected disabled hidden>Please select</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Laptop Accessories">Laptop Accessories</option>                               
                                <option value="Laptop Desktop">Laptop & Desktop</option>
                                <option value="Cable">Cable</option>                                
                                <option value="Peripherals">Peripherals</option>
                                <option value="Printers & Consumables">Printers & Consumables</option>
                                                                  
                                                                    
                                
                              </select>
  
                          </div>
                          <label class = "col-lg-2" for="">Category</label>
                          <div class = "col-lg-3">    
  
                          <select class="form-control"  id="env_ddl">
                          <option value="">-- Select --</option>
                          </select>
  
                          
                          </div>    
                          </div>
                          </div>

                       
   
                   

                            <div class="form-group">
                              <div class = "row">
                              <label class = "col-lg-2" for="">Comments</label>
                              <div class = "col-lg-8">    
                              <input type="text" class="form-control" id="validationCustom02"  name="enq_comments" placeholder="Enter comments">
                              <div class = "clear-fix"></div>
                              </div>     
                              </div>
                              </div>


     

     



     <div class="form-group">
     <input type="submit" class = "btn btn-primary" Value ="Save">
     <a href="{{route('showroom.enquiry.index')}}" class="btn btn-warning" role="button">Cancel</a>
     </div>
     </form>
      </div>
    </section>

 

@endsection