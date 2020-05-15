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
            <h3 class="card-title">With Out Bill Details
            </h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                                 
                <th> Company  </th>            
                <th> Tran Code </th>        
                
                <th> Document Number </th> 
                
                <th> Document Date </th>
                <th> Reference </th>
                
                <th> Amount</th>
                <th> Description</th>
                <th> Created User</th>
                <th> Created Date</th>

              </tr>
              </thead>
              <tbody>
              
              @if(count($cash))
          
          @foreach($cash as $c)
          
          <tr>
            <td>{{ $c->td_comp_code }}</td>
            <td>{{ $c->td_tran_code }}</td>  
            
            <td>{{ $c->td_doc_no }}</td>  
            
            
            <td>{{ date('d-m-Y', strtotime($c->td_doc_dt)) }}</td>  
            <td>{{ $c->td_doc_ref}}</td>  
            
            <td>{{ $c->td_doc_amt}}</td>  
          
            <td> {{ $c->td_desc }} </td>
            <td> {{ $c->td_cr_uid }} </td>
            
            <td>{{ date('d-m-Y', strtotime($c->td_cr_dt)) }}</td>  

                 
            
          
                      
          
          </tr>
          @endforeach
          
          @else
          <tr><td colspan="11">No Record Found</td></tr>
          @endif

              </tbody>
              <tfoot>
              <tr>
                               
               
              <th> Company  </th>            
                <th> Tran Code </th>        
                
                <th> Document Number </th> 
                
                <th> Document Date </th>
                <th> Reference </th>
                
                <th> Amount</th>
                <th> Description</th>
                <th> Created User</th>
                <th> Created Date</th>
                
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

    