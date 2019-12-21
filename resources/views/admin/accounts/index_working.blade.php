@extends('layouts.admin')
@section('content')


  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--  <h1 class="m-0 text-dark">Customer List</h1> -->
            
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid" >
      
     

      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pending Customer List           
              <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
            <!-- /.card-header -->
            <div class="card-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th> ID </th>                      
                <th> Tran No.   </th>                       
            <th> Tran Date </th>
            <th> Supplier Name </th>
            <th> Bill Date </th>
            <th> Bill No. </th>
            <th> Bill Amount </th>
            <th> Purpose </th>
            <th> Action </th>
                </tr>
                </thead>
                <tbody>

                @if(count($accounts))
            
            @foreach($accounts as $c)
            
            <tr>
            <td>{{ $c->id }}</td>     
            
            <td>{{ $c->th_tran_no }}</td>            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>
            <td>{{ $c->th_supp_name }}</td>
            <td>{{ date('d-m-Y', strtotime($c->th_bill_dt))}}</td>   

            <td>{{ $c->th_bill_no }}</td>
            <td class="text-right">{{ number_format($c->th_bill_amt,3) }}</td>
            <td>{{ $c->th_purpose }}</td>     
            

            
            
            
            <td>             
                      

            
            <a href="{{ route('admin.accounts.print',$c->th_tran_no) }}">
            <i class="fa fa-print text-green" aria-hidden="true"></i>
            </a>
            /

            <a href="{{ route('admin.accounts.edit',$c->th_tran_no) }}">
            
            
            
            <i class="fa fa-edit"></i>
            </a>
            /

            <a href="javascript:void(0)" onclick = "$(this).parent().find('form').submit()">
            <i class="fa fa-trash text-red"></i >
            </a>
            <form action = "{{ route('admin.accounts.destroy', $c->id)}}" method = "POST">
            @method('DELETE')
            <input type="hidden" name="_token" value = "{{ csrf_token() }}">

            
            </form>
          </td>                
            
            </tr>
            @endforeach
            @endif
            
               
                </tbody>
                <tfoot>
                <tr>
                <th> ID </th>                      
                <th> Tran No.   </th>                       
            <th> Tran Date </th>
            <th> Supplier Name </th>
            <th> Bill Date </th>
            <th> Bill No. </th>
            <th> Bill Amount </th>
            <th> Purpose </th>
            <th> Action </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

 
        
      </div>
    </section>
@endsection