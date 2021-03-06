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
            <h3 class="card-title">Cheque Details
            <a href="{{ route('admin.cheque.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Cheque Number </th> 
                
                <th> Cheque Date </th>
                <th> Cheque Amount </th>
                
                <th> Reference</th>
                
                
                <th> Bank Name</th>
                <th> Status</th>
                
                <th> Created By</th>
                <th> Created Date</th>
                
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              
              @if(count($cheque))
          
          @foreach($cheque as $c)
          
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>  
            
            <td>{{ $c->chq_number}}</td>  
            
            
            <td>{{ date('d-m-Y', strtotime($c->chq_date)) }}</td>  
            <td>{{ number_format($c->chq_amount,3) }} </td> 
            
            
            
            
            <td>{{ $c->reference}}</td>  
          
            <td> {{ $c->bank_name }} </td>
            
            

            <td>  
              @if($c->status =='0')  
              <div class="text-primary">   
              Not Cleared
              </div>
              @elseif($c->status =='1')  
              <div class="text-success">   
              Cleared
              </div>    
              @elseif($c->status =='2')  
              <div class="text-warning">   
              Canceled
              </div>    
              @elseif($c->status =='3')  
              <div class="text-danger">   
              Bounced
              </div>         

              @endif            
            </td>
            
            <td> {{ $c->user_name }} </td>
             
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  
          
          
          <td>             
            
            <a href="{{ route('admin.cheque.show',$c->id) }}">
              <i class="fa fa-print text-green"></i>
              
              </a>

              /

          
          <a href="{{ route('admin.cheque.edit',$c->id) }}">
          <i class="fa fa-edit"></i>
          
          </a>

         
          /

          
 

<form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('admin.cheque.destroy',$c->id) }}" method="POST" >
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
                               
                                   
                <th> ID   </th>            
                <th> Name </th>            
                
                <th> Cheque Number </th> 
                
                <th> Cheque Date </th>
                <th> Cheque Amount </th>
                <th> Reference</th>
                
                <th> Bank Name</th>
                <th> Status</th>
                
                <th> Created By</th>
                <th> Created Date</th>
                
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

    