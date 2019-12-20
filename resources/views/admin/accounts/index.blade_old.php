@extends('layouts.admin')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

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
            
            <th> Action </th>
            </tr>
            @if(count($accounts))
            
            @foreach($accounts as $c)
            
            <tr>
            <td><a href="{{ url('storage/categories/'.$c->th_attach) }}" target="_blank">{{ $c->th_tran_no }}</a></td>
            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>            
            <td>{{ $c->th_supp_name }}</td>
            <td>{{ date('d-m-Y', strtotime($c->th_bill_dt)) }}</td>
            <td>{{ $c->th_bill_no }}</td>
            <td class="text-right">{{ number_format($c->th_bill_amt,3) }}</td>
            <td>{{ $c->th_purpose }}</td>
            
            
            <td>             
              <a href="{{ route('admin.accounts.print', $c) }}" class="btn btn-success btn-sm">View</a>
           

            
            <a href="{{ route('admin.accounts.edit',$c->th_tran_no) }}" class="btn btn-info btn-sm">Edit</a>
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

      <div class="container">
    
        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
       
    </body>
       
    <script type="text/javascript">
      $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'user_type', name: 'user_type'},
                {data: 'mobile', name: 'mobile'},            
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
      });
    </script>
    
    </section>
@endsection



    

</html>