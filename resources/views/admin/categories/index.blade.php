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
              <h3 class="card-title">Expenditure Group
              <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add New</a></h3>   
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                                   
                  <th> ID   </th>            
                  <th> Group Name </th>            
                  <th> Group Desctiption </th> 
                  <th> Status </th> 
                  <th> Created User </th>
                  <th> Created Date </th>
                  <th> Updated Date </th>
                  <th> Action </th>
                </tr>
                </thead>
                <tbody>
                
                @if(count($categories))
            
            @foreach($categories as $c)
            
            <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->exp_group_name }}</td>  
              <td>{{ $c->exp_group_desc }}</td>  
              <td> 
                
                @if($c->exp_group_status =='0') 
                <div class="text-danger">
                Inactive    
              </div>                         
                @elseif($c->exp_group_status =='1')   
                Active
                @else   
                Status Error  
                @endif
              
              </td>
              <td> {{ $c->created_name }} </td>
              
              <td>{{ date('d-m-Y', strtotime($c->created_at)) }}</td>  
              <td>{{ date('d-m-Y', strtotime($c->updated_at)) }}</td>  
              
            
            
            <td>             
              
           

            
            <a href="{{ route('admin.categories.edit',$c->id) }}">
            <i class="fa fa-edit"></i>
            
            </a>

           

            <a href="javascript:void(0)" onclick = "$(this).parent().find('form').submit()" >
            
            <!-- /.Delete <i class="fa fa-trash text-red"></i > -->
            
            
            </a>
            <form action = "{{ route('admin.categories.destroy', $c->id)}}" method = "POST">
            @method('DELETE')
            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
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
                  <th> Group Name </th>            
                  <th> Group Desctiption </th> 
                  <th> Status </th> 
                  <th> Created User </th>
                  <th> Created Date </th>
                  <th> Updated Date </th>
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

    