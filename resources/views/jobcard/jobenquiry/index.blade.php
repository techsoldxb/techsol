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
            <h3 class="card-title">Booking Details
            <a href="{{ route('jobcard.jobenquiry.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> Job ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Date </th>
                
                
                <th>Item Details</th>
                <th>Job Desc</th>
                <th>Remarks</th>
                <th>Created User</th>
                
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              
              @if(count($jobcard))
          
          @foreach($jobcard as $c)
          
          <tr>
            <td>{{ $c->job_enq_number }}</td>
            <td>{{ $c->job_cust_name }}</td>  
            
            <td>{{ $c->job_cust_mobile }}</td>  
            
            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  

            <td>{{ $c->job_item_details }}</td>  
            
            
            <td>{{ $c->job_desc}}</td>  
          
            <td> {{ $c->job_remarks }} </td>

            <td> {{ $c->job_enq_created_user }} </td>
            
        

            
          
          
          <td>             
            
            <a href="{{ route('foh.booking.show',$c->id) }}">
              <i class="fa fa-print text-green"></i>
              
              </a>

              /

          
          <a href="{{ route('foh.booking.edit',$c->id) }}">
          <i class="fa fa-edit"></i>
          
          </a>

         
          /

          
 

<form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('foh.booking.destroy',$c->id) }}" method="POST" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="DELETE" />  
  <button type="submit"><i class="fa fa-trash text-red" /></i></button>

  

  </form>
         



        </td>                
          
          </tr>
          @endforeach
          
          @else
          <tr><td colspan="11">No Record Found</td></tr>
          @endif

              </tbody>
              <tfoot>
              <tr>
                                                               
                <th> Job ID   </th>            
                <th> Name </th>            
                
                <th> Mobile </th> 
                
                <th> Date </th>
                
                
                <th>Item Details</th>
                <th>Job Desc</th>
                <th>Remarks</th>
                <th>Created User</th>
                
                <th> Action </th>
                
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

    