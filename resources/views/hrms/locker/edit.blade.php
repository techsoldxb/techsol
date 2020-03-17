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
            <h1 class="m-0 text-dark">Edit lockerDetail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              
              
                  <li class="breadcrumb-item"><a href="{{route('admin.advances.index')}}">Advance</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" novalidate method = "POST" 
     action="{{ route('hrms.locker.update', $locker->id) }}">
     @method('PUT')
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-md-3" for="">Locker ID</label>
     <div class = "col-md-3">
    
     <input type="text" class="form-control" id="validationCustom01" name="lockerid" placeholder="First name" value="{{ $locker->lockerid}}"  disabled>
     <div class = "clear-fix"></div>
     </div>     
     </div>

     <div class = "row">
      <label class = "col-md-3" for="">Name</label>
      <div class = "col-md-3">
     
      <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="Full Name" value="{{ $locker->name}}" required>
      <div class = "clear-fix"></div>
      </div>     
      </div>

      <div class = "row">
        <label class = "col-md-3" for="">Title</label>
        <div class = "col-md-3">
       
        <input type="text" class="form-control" id="validationCustom01" name="title" placeholder="Job Title" value="{{ $locker->title}}" >
        <div class = "clear-fix"></div>
        </div>     
        </div>
         
    
       

       <div class = "row">
        <label class = "col-md-3" for="">Department</label>
        <div class = "col-md-3">

          <select class="custom-select" name="department" >
            <option value="" selected disabled hidden>Please select</option>
            <option value="FOH">FOH</option>
            <option value="BOH">BOH</option>
            <option value="Security">Security</option>                                        
            <option value="Management">Management</option>                                        
            
            
          </select>

       
        
        <div class = "clear-fix"></div>
        </div>     
        </div>

        <div class = "row">
            <label class = "col-md-3" for="">Locker Number</label>
            <div class = "col-md-3">
           
            <input type="text" class="form-control" id="validationCustom01" name="lockerno" placeholder="Locker Number" value="{{ $locker->lockerno}}" >
            <div class = "clear-fix"></div>
            </div>     
            </div>

            <div class = "row">
                <label class = "col-md-3" for="">Issued Date</label>
                <div class = "col-md-3">               
                
                
                    <input class = "form-control datepicker" id="datepicker" name = "issued_date" placeholder="dd-mm-yyyy" value="{{ date('d-m-Y', strtotime($locker->issued_date))}}" required>  
             
                    <script>
                     $('#datepicker').datepicker({
                       format: 'dd-mm-yyyy',
                         uiLibrary: 'bootstrap4'
                     });
                 </script>

                <div class = "clear-fix"></div>
                </div>     
                </div>

                <div class = "row">
                    <label class = "col-md-3" for="">Remarks</label>
                    <div class = "col-md-3">
                   
                    <input type="text" class="form-control" id="validationCustom01" name="remarks" placeholder="Remarks" value="{{ $locker->remarks}}" >
                    <div class = "clear-fix"></div>
                    </div>     
                    </div>
         
    
       </div>


       
      
    

    

    
     <div class="form-group">
     <input type="submit" class = "btn btn-primary" Value ="Save">
     <a href="{{route('hrms.locker.index')}}" class="btn btn-warning" role="button">Cancel</a>
     
     </div>
     </form>
      </div>
    </section>
@endsection