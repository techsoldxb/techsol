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
            <h3 class="card-title">Booking Cancelled
            <a href="{{ route('foh.booking.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Visit Date </th>
                
                
                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Cancelled By</th>
                <th> Cancelled Date</th>
                
                
                
                <th> Reason for Cancel </th>
              </tr>
              </thead>
              <tbody>
              
              @if(count($booking))
          
          @foreach($booking as $c)
          
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->tb_cust_name }}</td>  
            
            <td>{{ $c->tb_cust_mobile }}</td>  
            
            
            <td>{{ date('d-m-Y', strtotime($c->tb_date)) }}</td>  
            
            
            <td>{{ $c->tb_reference}}</td>  
          
            <td> {{ $c->tb_user_name }} </td>
            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  
            <td> {{ $c->tb_flex3 }} </td>

            <td>{{ date('d-m-Y', strtotime($c->updated_at)) }}</td>  
            
            
            <td> {{ $c->tb_flex2 }} </td>
            
            
             
            
          
          
                        
          
          </tr>
          @endforeach
          
          @else
          <tr><td colspan="11">No Record Found</td></tr>
          @endif

              </tbody>
              <tfoot>
              <tr>
                               
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Visit Date </th>
                
                
                <th> Reference</th>
                <th> User</th>
                <th> Booking Date</th>
                <th> Cancelled By</th>
                <th> Cancelled Date</th>
                
                
                
                <th> Reason for Cancel </th>
                
              </tr>
              </tfoot>
            </table>
            
          </div>
          <!-- /.card-body -->

                <div class="row">
                <div class="col text-right">            
                <a href="{{route('foh.booking.bookingexport')}}">             
                <i class="far fa-file-excel fa-2x text-green"></i>                  
                </a>      
                </div>
                </div>


        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
   

@endsection

    