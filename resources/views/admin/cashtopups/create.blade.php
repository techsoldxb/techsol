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



    <!-- End -->


@extends('layouts.admin')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Topup</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.cashtopups.index')}}">Topup</a></li>
              

              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form class="needs-validation" novalidate method = "post" action="{{ route('admin.cashtopups.store') }}" enctype="multipart/form-data" autocomplete="off">
      
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Source *</label>
     <div class = "col-lg-5">
     <input class="form-control" data-error="Please enter name field." type="text" name = "th_supp_name" class = "form-control" placeholder="Enter the place from where we received topup" required>
     <div class = "clear-fix"></div>
    </div>     
     </div>


     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Topup Date *</label>
     <div class = "col-lg-2">
     <input class = "form-control datepicker" id="datepicker" name = "topup_dt" placeholder="dd-mm-yyyy" required>  
         
     <script>
      $('#datepicker').datepicker({
        format: 'dd-mm-yyyy',
          uiLibrary: 'bootstrap4'
      });
  </script>
    
  </div>
     

     <label class = "col-lg-1" for="">Cheque # *</label>
     <div class = "col-lg-2">
     <input type="text" name = "cheque_no" onkeypress="return isNumberKey(event)" class = "form-control" placeholder="Enter cheque number">
     <div class = "clear-fix"></div>
    </div>
</div>
    
    <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Amount</label>
     <div class = "col-lg-2">
     
     <input type="text" name = "topup_amt" onkeypress="return isNumberKey(event)" class = "form-control "  placeholder="Enter amount" required> </div>
     

     <label class = "col-lg-1" for="">Payment Mode</label>
     <div class = "col-lg-2">
      <select class="custom-select" name="th_pay_mode">
        <option>Cash</option>
        <option>Cheque</option>
        <option>Others</option>        
      </select>
     <div class = "clear-fix"></div>
    </div>
    </div>

    <div class="form-group">
      <div class = "row">
      <label class = "col-lg-1" for="">Bank Name</label>
      <div class = "col-lg-2">
      
      <input type="text" name = "bank_name" class = "form-control "  placeholder="Enter bank name"> </div>
      
 
      <label class = "col-lg-1" for="">Delivered By</label>
      <div class = "col-lg-2">
       <select class="custom-select" name="th_pay_mode">
         <option>Ahmed</option>
         <option>Card</option>
         <option>Others</option>        
       </select>
      <div class = "clear-fix"></div>
     </div>
     </div>
 

    
            
  

  
<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name = "remarks" class="form-control" rows="2" id="comment" placeholder="Enter the remarks" required></textarea>
</div>


</div>
    

    <div class="form-group">
    <input type="submit" class = "btn btn-primary" Value ="Save">
    <a href="{{route('admin.cashtopups.index')}}" class="btn btn-warning" role="button">Cancel</a>
    </div>
     


     </form>
      </div>


      
    </section>
@endsection