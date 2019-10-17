@extends('layouts.admin')
@section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reimbursement Request</h1>
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
      <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary btn-sm">Add New</a>
      </p>
    
        <table class = "table table-bordered table-striped">
          <tr>
                   
            <th> Tran No.   </th>                       
            <th> Tran Date </th>
            <th> Supplier Name </th>
            <th> Bill Date </th>
            <th> Bill No. </th>
            <th> Bill Amount </th>
            <th> Purpose </th>
            <th> Employee Name</th>
            <th> Action </th>
            </tr>
            @if(count($accounts))
            @foreach($accounts as $c)
            <tr>
            <td>{{ $c->th_tran_no }}</td>
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>            
            <td>{{ $c->th_supp_name }}</td>
            <td>{{ $c->th_bill_dt }}</td>
            <td>{{ $c->th_bill_no }}</td>
            <td class="text-right">{{ number_format($c->th_bill_amt,3) }}</td>
            <td>{{ $c->th_purpose }}</td>
            <td>{{ $c->th_emp_name }}</td>
            <td>             
            <a href="{{ route('admin.accounts.edit',$c->id) }}" class="btn btn-success btn-sm">View</a>
            <a href="{{ route('admin.accounts.edit',$c->id) }}" class="btn btn-info btn-sm">Edit</a>
            <a href="javascript:void(0)" onclick = "$(this).parent().find('form').submit()" class="btn btn-danger btn-sm">Delete</a>
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
        {{ $accounts->render() }}
      </div>
    </section>
@endsection