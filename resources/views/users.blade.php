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
              <h3 class="card-title">User List</h3>   
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                                   
                               
            <th> User Name </th>
            <th> Email </th>
            <th> Company Code </th>
            <th> Type </th>
            <th> Status </th>
            <th> Last Seen </th>
            
            <th> Created Date </th>
         
            
         
                </tr>
                </thead>
                <tbody>
                
                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->company}}</td>
                                        <td>{{$user->user_type}}</td>

                                        
                                        <td>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>   
                                    </tr>
                                @endforeach

                

                </tbody>
                <tfoot>
                <tr>
                                 
                                          
                    <th> User Name </th>
                    <th> Email </th>
                    <th> Company Code </th>
                    <th> Type </th>
                    <th> Status </th>
            <th> Last Seen </th>
                    
                    <th> Created Date </th>
                  
                    
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

    