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
              <h3 class="card-title">Unpaid Bills
              <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary btn-sm">Add Bill</a></h3>   
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                </thead>
                <tbody>
                
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
              <a href="{{ route('admin.accounts.print', $c) }}" >
              
              <i class="fa fa-print text-green" aria-hidden="true"></i>
              
              </a>
              /
           

            
            <a href="{{ route('admin.accounts.edit',$c->th_tran_no) }}">
            <i class="fa fa-edit"></i>
            
            </a>

            /

            

            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$c->id}})" 
              data-target="#DeleteModal">
              
              <i class="fa fa-trash text-red"></i >
              
            </a>
  
              <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                <div class="modal-dialog ">
                  <!-- Modal content-->
                  <form action="" id="deleteForm" method="post">
                      <div class="modal-content">
                          <div class="modal-header bg-danger">                            
                              <h5 class="modal-title text-center">Delete Confirmation</h5>
                          </div>
                          <div class="modal-body">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <p class="text-center">Are You Sure Want To Delete ?</p>
                          </div>
                          <div class="modal-footer">
                              
                                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>  
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                  
                              
                          </div>
                      </div>
                  </form>
                </div>
               </div>
  
               <script type="text/javascript">
                function deleteData(id)
                {
                    var id = id;
                    var url = '{{ route('admin.accounts.destroy', $c->id) }}';
                    url = url.replace(':id', id);
                    $("#deleteForm").attr('action', url);
                }
           
                function formSubmit()
                {
                    $("#deleteForm").submit();
                }
             </script>










          </td>                
            
            </tr>
            @endforeach
            
            @else
            <tr><td colspan="11">No Record Found</td></tr>
            @endif

                </tbody>
                <tfoot>
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

    