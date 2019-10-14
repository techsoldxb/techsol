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

<!-- This below code is used to calculate the amount field  -->

<script>
    function calc1() 
    {
    var textValue1 = document.getElementById('qty1').value;
    var textValue2 = document.getElementById('price1').value;
    document.getElementById('amount1').value = textValue1 * textValue2;
    }   

    function calc2() 
    {
      var textValue3 = document.getElementById('qty2').value;
    var textValue4 = document.getElementById('price2').value;
    document.getElementById('amount2').value = textValue3 * textValue4;
    }   

    function calc3() 
    {
      var textValue5 = document.getElementById('qty3').value;
    var textValue6 = document.getElementById('price3').value;
     document.getElementById('amount3').value = textValue5 * textValue6;
    } 
    </script>
    <!-- End -->
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
    <!-- End -->

    <script>    
			function bill_total()
			{
				var textValue1 = document.getElementById('qty1').value;
        var textValue2 = document.getElementById('price1').value;
        var textValue3 = document.getElementById('qty2').value;
        var textValue4 = document.getElementById('price2').value;
        var textValue5 = document.getElementById('qty3').value;
        var textValue6 = document.getElementById('price3').value;
        
        var firsttotal = textValue1 * textValue2;  
        var secondtotal = textValue3 * textValue4;
        var thirdtotal = textValue5 * textValue6;
        document.getElementById('total').value = textValue1;
			}  
    </script>

    <!-- End -->


@extends('layouts.admin')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Bill</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Bill</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form class="needs-validation" novalidate method = "post" action="{{ route('admin.accounts.store') }}" enctype="multipart/form-data">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Supplier Name *</label>
     <div class = "col-lg-5">
     <input class="form-control" data-error="Please enter name field." type="text" name = "th_supp_name" class = "form-control" placeholder="Enter Supplier name" required>
     <div class = "clear-fix"></div>
    </div>     
     </div>


     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Bill Date *</label>
     <div class = "col-lg-2">
     <input class = "form-control" id="datepicker" data-date-format="dd/mm/yyyy" name = "th_bill_date" placeholder="Enter bill date" required>  
     
     
     
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    
  </div>
     

     <label class = "col-lg-1" for="">Bill Number *</label>
     <div class = "col-lg-2">
     <input type="text" name = "th_bill_no" class = "form-control" placeholder="Enter bill number" required>
     <div class = "clear-fix"></div>
    </div>
</div>
    
    <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Bill Amount *</label>
     <div class = "col-lg-2">
     
     <input type="text" name = "th_bill_amt" onkeypress="return isNumberKey(event)" class = "form-control "  placeholder="Enter bill amount" required> </div>
     

     <label class = "col-lg-1" for="">Payment Mode</label>
     <div class = "col-lg-2">
     <input type="text" name = "th_pay_mode" class = "form-control" placeholder="Enter Cash / Card">
     <div class = "clear-fix"></div>
    </div>
    </div>

    <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Emp Name *</label>
     <div class = "col-lg-2">
     <input type="text" name = "th_emp_name" class = "form-control" placeholder="Employe Name" required> </div>
     

     <label class = "col-lg-1" for="">Type</label>
     <div class = "col-lg-2">
     <input type="text" name = "th_item_type" class = "form-control" placeholder="Enter Asset / Others">
     <div class = "clear-fix"></div>
    </div>
    </div>

            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th >S.No</th>
        <th class="w-50">Item Description</th>
        <th class="w-20">Quantity</th>
        <th class="w-20">Unit Price</th>
        <th class="w-20">Amount</th>
      </tr>
    </thead>
    <tbody>    
      <tr>       
        <td class="text-center">1</td>        
        <td ><input type="text" class="form-control" name = "td_item_desc[]" id="row1"></td>
        <td ><input class="form-control text-center" type="text" onkeypress="return isNumberKey(event)" name="td_qty[]"  id="qty1" onkeyup="calc1()" value=""></td>
        <td ><input class="form-control text-right" type="text" onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price1" onkeyup="calc1()" value=""></td>
        <td > <input class="form-control text-right" type="text" name="td_unit_amt" id="amount1" value="" disabled></td>
      </tr> 
       <tr>
        <td class="text-center">2</td>        
        <td ><input type="text" class="form-control" name = "td_item_desc[]" id="row2"></td>
        <td ><input class="form-control text-center" type="text" onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty2" onkeyup="calc2()" value=""></td>
        <td ><input class="form-control text-right" type="text" onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price2" onkeyup="calc2()" value=""></td>        
        <td > <input class="form-control text-right" type="text" name="amount" id="amount2" value="" disabled></td>
      </tr>
       <tr>
       <td class="text-center">3</td>        
        <td ><input type="text" class="form-control" name = "td_item_desc[]" id="row3"></td>
        <td ><input class="form-control text-center" type="text" onkeypress="return isNumberKey(event)" name="td_qty[]" id="qty3" onkeyup="calc3()" value=""></td>
        <td ><input class="form-control text-right" type="text" onkeypress="return isNumberKey(event)" name="td_unit_price[]" id="price3" onkeyup="calc3()" value=""></td>
        <td > <input class="form-control text-right" type="text" name="amount" id="amount3" value="" disabled></td>
      </tr>
        

        <tr>
        <td class="text-center"></td>
        <td class="text-right" colspan="3"><label>Total</label></td>
        <td><input  type="text" class="form-control text-right" onkeyup="bill_total()" name = "total" id="td_total" disabled></td>        
      </tr>

    </tbody>
  </table>

<div class="form-group">
     <div class = "row">
     
     <label class = "col-lg-1" for="">Attach Bill</label>
     <div class = "col-md-6">    
     <input type="file" id="validationCustom01" name="th_attach">
     <div class = "clear-fix"></div>
     </div>     
     </div>
     </div>
  
<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name = "th_purpose" class="form-control" rows="2" id="comment" placeholder="Enter the purpose of the purchase" required></textarea>
</div>


</div>
    

    <div class="form-group">
    <input type="submit" class = "btn btn-info" Value ="Save">
    </div>
     


     </form>
      </div>


      
    </section>
@endsection