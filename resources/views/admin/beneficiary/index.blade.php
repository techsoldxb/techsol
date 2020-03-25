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
            <a href="{{ route('admin.beneficiary.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> ID   </th>            
                <th> Name </th>            
                <th> Contact </th>
                <th> Mobile </th> 
                
                <th> Email</th>
                
                
                <th> Relation</th>
                <th> Type</th>
                <th> Creaed By</th>
                <th> Created Date</th>
                <th>Status</th>
                <th> Action </th>
              </tr>
              </thead>
              <tbody>
              
              @if(count($admin_beneficiary))
          
          @foreach($admin_beneficiary as $c)
          
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->ben_name }}</td>  
            <td>{{ $c->ben_contact }}</td>  
            
            <td>{{ $c->ben_mobile }}</td>  
            
            
            
            <td>{{ $c->ben_email}}</td>  
            
            <td>{{ $c->ben_relation}}</td>  
          
            <td> {{ $c->ben_type }} </td>
            <td> {{ $c->ben_user_name }} </td>
            
            <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  

            <td>  
              @if($c->ben_status =='0')  
              <div class="text-primary">   
              Inactive
              </div>
              @elseif($c->ben_status =='1')  
              <div class="text-success">   
              Active
              </div>             

              @endif            
            </td>
            
             
            
          
          
          <td>             
            
            <a href="{{ route('admin.beneficiary.show',$c->id) }}">
              <i class="fa fa-print text-green"></i>
              
              </a>

              /

          
          <a href="{{ route('admin.beneficiary.edit',$c->id) }}">
          <i class="fa fa-edit"></i>
          
          </a>

         
          /

          
 

<form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('admin.beneficiary.destroy',$c->id) }}" method="POST" >
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
                
                <th> Mobile </th> 
                
                <th> Email</th>
                <th> Contact </th>
                
                <th> Relation</th>
                <th> Type</th>
                <th> Creaed By</th>
                <th> Created Date</th>
                <th>Status</th>
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

    