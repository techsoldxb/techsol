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

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Advance Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Advance</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" novalidate method = "POST" 
     action="{{ route('admin.advances.update', $advance->id) }}">
     @method('PUT')
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-md-3" for="">Advance Date</label>
     <div class = "col-md-6">
    
     <input type="text" class="form-control" id="validationCustom01" name="exp_group_name" placeholder="First name" value="{{ date('d-m-Y', strtotime($advance->ca_adv_date))}}"  disabled required>
     <div class = "clear-fix"></div>
     </div>     
     </div>

     <div class = "row">
      <label class = "col-md-3" for="">Advance Amount</label>
      <div class = "col-md-6">
     
      <input type="text" class="form-control" id="validationCustom01" name="exp_group_desc" placeholder="First name" value="{{ $advance->ca_adv_amt}}" disabled required>
      <div class = "clear-fix"></div>
      </div>     
      </div>

      <div class = "row">
        <label class = "col-md-3" for="">Purpose</label>
        <div class = "col-md-6">
       
        <input type="text" class="form-control" id="validationCustom01" name="exp_group_desc" placeholder="First name" value="{{ $advance->ca_purpose}}" disabled required>
        <div class = "clear-fix"></div>
        </div>     
        </div>
         
    
       </div>

       
      <div class="form-group">
        <div class = "row">

        <label class = "col-lg-1" for="">Action</label>
        <div class = "col-lg-2">                                           
         

          <label><input type="radio" Value = '1' name='ca_pay_status' checked>Paid</label>
          <label><input type="radio" Value = '2' name='ca_pay_status'>Rejected</label>
        
        </div>             
        
    
        <label class = "col-lg-1" for="">Payment Date</label>
        <div class = "col-lg-2">    
          <input type="text" name = "ca_pay_tran_date"  class = "form-control" placeholder="dd-mm-yyyy">
        </div>     
          
       <label class = "col-lg-1" for="">Remarks</label>
       <div class = "col-lg-2">
       <input type="text" name = "ca_pay_remarks"  class = "form-control" placeholder="Enter Remarks">
       <div class = "clear-fix"></div>

      </div>     
    </div>    
    
    

    <div class="form-group">
      <div class = "row">

      <label class = "col-lg-1" for="">Settlement</label>
      <div class = "col-lg-2">                                           
       

        

        <input class="form-check-input" type="hidden"  Value = '0' name='ca_status'>    
      <input class="form-check-input" type="checkbox"  Value = '1' name='ca_status'>    
      
      </div>             
      
  
   

    </div>     
  </div>     



    </div>

    
     <div class="form-group">
     <input type="submit" class = "btn btn-info" Value ="Save">
     <a><label class="breadcrumb-item"><a href="{{route('admin.advanceall.index')}}">No Save</a>
     </div>
     </form>
      </div>
    </section>
@endsection