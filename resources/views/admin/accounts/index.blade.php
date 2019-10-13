@extends('layouts.admin')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Accounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Accounts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      <p>
      <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Add New</a>
      </p>
        <table class = "table table-bordered table-striped">
          <tr>
                   
            <th> ID   </th>                       
            <th> Date </th>
            <th> Emp Name </th>
            <th> Dept </th>
            <th> Supplier Name </th>
            <th> Bill Date </th>
            <th> Bill Amount </th>
            <th> Payment Mode </th>
            <th> Purpose </th>
            <th> Item Type </th>
            <th> Action </th>
            </tr>
            @if(count($accounts))
            @foreach($accounts as $c)
            <tr>
            <td>{{ $c->id }}</td>
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>            
            <td>{{ $c->emp_name }}</td>
            <td>{{ $c->dept }}</td>
            <td>{{ $c->supp_name }}</td>
            <td>{{ $c->bill_date }}</td>
            <td class="text-right">{{ number_format($c->bill_amt,3) }}</td>
            <td>{{ $c->pay_mode }}</td>
            <td>{{ $c->purpose }}</td>
            <td>{{ $c->item_type }}</td>    

            <td> 
            
            <a href="{{ route('admin.accounts.edit',$c->id) }}" class="btn btn-success">Print</a>
            <a href="{{ route('admin.accounts.edit',$c->id) }}" class="btn btn-info">Edit</a>
            <a href="javascript:void(0)" onclick = "$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
            <form action = "{{ route('admin.accounts.destroy', $c->id)}}" method = "POST">
            @method('DELETE')
            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
            </form>
            
            </td>        
            
            </tr>
            @endforeach
            @else
            <tr><td colspan="11">No Record Found</td></tr>
            @endif
        </table>
      </div>
    </section>
@endsection