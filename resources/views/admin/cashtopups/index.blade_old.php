@extends('layouts.admin')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Engineering</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Engineering</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      <p>
      <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New</a>
      </p>
        <table class = "table table-bordered table-striped">
          <tr>
                   
            <th> ID   </th>            
            <th> Title </th>            
            <th> Date </th>
            <th> Action </th>
            </tr>
            @foreach($categories as $c)
            <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->title }}</td>  
            <td>{{ $c->created_at }}</td>            
            <td> 
            <a href="{{ route('admin.categories.edit',$c->id) }}" class="btn btn-info">Edit</a>
            <a href="javascript:void(0)" onclick = "$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
            <form action = "{{ route('admin.categories.destroy', $c->id)}}" method = "POST">
            @method('DELETE')
            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
            </form>
            
            </td>
            </tr>
            @endforeach
        </table>
      </div>
    </section>
@endsection