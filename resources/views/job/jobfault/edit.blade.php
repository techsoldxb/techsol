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
            <h1 class="m-0 text-dark">Edit Expense Group</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Engineering</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" novalidate method = "POST" 
     action="{{ route('admin.categories.update', $category->id) }}">
     @method('PUT')
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">
     <div class = "row">
     <label class = "col-md-3" for="">Expense Group Name</label>
     <div class = "col-md-6">
    
     <input type="text" class="form-control" id="validationCustom01" name="exp_group_name" placeholder="First name" value="{{ $category->exp_group_name}}" required>
     <div class = "clear-fix"></div>
     </div>     
     </div>

     <div class = "row">
      <label class = "col-md-3" for="">Expense Group Desctiption</label>
      <div class = "col-md-6">
     
      <input type="text" class="form-control" id="validationCustom01" name="exp_group_desc" placeholder="First name" value="{{ $category->exp_group_desc}}" required>
      <div class = "clear-fix"></div>
      </div>     
      </div>

      <div class = "row">
        <label class = "col-md-3" for="">Expense Group Status</label>
        <div class = "col-md-6">
       
          <label><input type="radio" Value = '1' name='exp_group_status' >Active</label>
          <label><input type="radio" Value = '0' name='exp_group_status'>Inactive</label>
          
        <div class = "clear-fix"></div>
        </div>     
        </div>

    </div>
     <div class="form-group">
     

     <input type="submit" class = "btn btn-primary" Value ="Save">
     <a href="{{route('admin.categories.index')}}" class="btn btn-warning" role="button">Cancel</a>


     </div>
     </form>
      </div>
    </section>
@endsection