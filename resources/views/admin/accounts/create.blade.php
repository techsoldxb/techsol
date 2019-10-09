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
     <form class="needs-validation" novalidate method = "post" action="{{ route('admin.accounts.store') }}">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Supplier Name *</label>
     <div class = "col-lg-5">
     <input class="form-control" data-error="Please enter name field." type="text" name = "supp_name" class = "form-control" placeholder="Enter Supplier name" required>
     <div class = "clear-fix"></div>
    </div>     
     </div>


     <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Bill Date *</label>
     <div class = "col-lg-2">
     <input class = "form-control" id="datepicker"  name = "bill_date" placeholder="Enter bill date" required>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script></div>


     

     <label class = "col-lg-1" for="">Bill Number *</label>
     <div class = "col-lg-2">
     <input type="text" name = "bill_no" class = "form-control" placeholder="Enter bill number" required>
     <div class = "clear-fix"></div>
    </div>
</div>
    
    <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Bill Amount *</label>
     <div class = "col-lg-2">
     <input type="text" name = "bill_amt" class = "form-control" placeholder="Enter bill amount" required> </div>
     

     <label class = "col-lg-1" for="">Payment Mode</label>
     <div class = "col-lg-2">
     <input type="text" name = "pay_mode" class = "form-control" placeholder="Enter Cash / Card">
     <div class = "clear-fix"></div>
    </div>
    </div>

    <div class="form-group">
     <div class = "row">
     <label class = "col-lg-1" for="">Emp Name *</label>
     <div class = "col-lg-2">
     <input type="text" name = "emp_name" class = "form-control" placeholder="Employe Name" required> </div>
     

     <label class = "col-lg-1" for="">Type</label>
     <div class = "col-lg-2">
     <input type="text" name = "item_type" class = "form-control" placeholder="Enter Asset / Others">
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
        <td ><input type="email" class="form-control" id="email"></td>
        <td ><input type="email" class="form-control text-center" id="email"></td>
        <td ><input type="email" class="form-control text-right" id="email"></td>
        <td ><input type="email" class="form-control text-right" id="email"></td>
      </tr>
 
       <tr>
        <td class="text-center">2</td>
        <td><input type="email" class="form-control" id="email"></td>
        <td><input type="email" class="form-control text-center" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
      </tr>
       <tr>
        <td class="text-center">3</td>
        <td><input type="email" class="form-control" id="email"></td>
        <td><input type="email" class="form-control text-center" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
      </tr>
       <tr>
        <td class="text-center">4</td>
        <td><input type="email" class="form-control" id="email"></td>
        <td><input type="email" class="form-control text-center" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
      </tr>
          <tr>
        <td class="text-center">5</td>
        <td><input type="email" class="form-control" id="email"></td>
        <td><input type="email" class="form-control text-center" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
        <td><input type="email" class="form-control text-right" id="email"></td>
      </tr>
    </tbody>
  </table>
  
<div class="form-group">
  <label for="comment">Comment:</label>
  <textarea name = "purpose" class="form-control" rows="2" id="comment" placeholder="Enter the purpose of the purchase" required></textarea>
</div>


</div>
    

<div class="form-group">
     <input type="submit" class = "btn btn-info" Value ="Save">
     </div>
     


     </form>
      </div>


      
    </section>
@endsection