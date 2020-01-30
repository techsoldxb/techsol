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
              <h3 class="card-title">Cash Top Up
              <a href="{{ route('admin.cashtopups.create') }}" class="btn btn-primary btn-sm">Add Topup</a></h3>   
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                                   
                  <th> ID  </th>                       
                  <th> Tran Date </th>
                  <th> Amount </th>
                  <th> Cheque Date </th>
                  <th> Cheque No </th>
                  
                  <th> Bank Name </th>          
                  
                  <th> User Name </th>
                  <th> Remarks </th>
                  
                </tr>
                </thead>
                <tbody>
                
                @if(count($cashtopups))
            
            @foreach($cashtopups as $c)
            
            <tr>
              <td>{{ $c->id }}</td>            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>            
            <td class="text-right">{{ number_format($c->topup_amt,3) }}</td>
            <td>{{ date('d-m-Y', strtotime($c->topup_dt)) }}</td> 
                      
            
            <td>{{ $c->cheque_no }}</td>
            
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
            <th> Tran Date </th>
            <th> Amount </th>
            <th> Cheque Date </th>
            <th> Cheque No </th>
            
            <th> Bank Name </th>          
            
            <th> User Name </th>
            <th> Remarks </th>
            
                </tr>
                </tfoot>
              </table>

              <div class="row">
                <div class="col text-right">            
                <a href="{{route('admin.cashtopups.cashtopupexport')}}">             
                <i class="far fa-file-excel fa-2x text-green"></i>                  
                </a>      
                </div>
                </div>
              
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

    