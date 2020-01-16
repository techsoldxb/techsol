@extends('layouts.admin')
@section('content')



   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
         
            <!-- /.card-header -->
        
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cash Advance
              <a href="{{ route('admin.advances.create') }}" class="btn btn-primary btn-sm">Advance Request</a></h3>   
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                                   
                  <th> ID  </th>                       
                  <th> Request Date </th>                  
                  <th> Amount </th>             
                  <th> User Name </th>
                  <th> Remarks </th>                  
                </tr>
                </thead>
                <tbody>
                
                @if(count($advances))
            
            @foreach($advances as $c)
            
            <tr>
              <td>{{ $c->id }}</td>            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>            
            
            <td>{{ date('d-m-Y', strtotime($c->topup_dt)) }}</td>           
            
            <td>{{ $c->cheque_no }}</td>
            <td class="text-right">{{ number_format($c->topup_amt,3) }}</td>
            <td>{{ $c->bank_name }}</td>
            <td>{{ $c->emp_name }}</td>
            <td>{{ $c->remarks }}</td>
            
            
                         
            
            </tr>
            @endforeach
            
            @else
            <tr><td colspan="11">No Record Found</td></tr>
            @endif

                </tbody>
                <tfoot>
                <tr>
                                 
                  <th> ID  </th>                       
                  <th> Request Date </th>                  
                  <th> Amount </th>                
                  
                  <th> User Name </th>
                  <th> Remarks </th>
            
                </tr>
                </tfoot>
              </table>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   

@endsection

    