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
            <h3 class="card-title">Cash On Hand </h3>   
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
              <tr>
                                 
                         
                <th> Detail</th>            
                <th> Debit </th> 
                <th> Credit </th> 
                <th> Balance</th>
              
              </tr>
              </thead>
              <tbody>
                    <tr>
                        <td>
                            Cash Topup
                        </td>
                        <td>
                            {{ number_format($topup,3) }}
                        </td>
                        <td>
                           
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            Paid Bills
                        </td>
                        <td></td>
                        <td>
                            {{ number_format($paid,3) }}
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            Advance Paid
                        </td>
                        <td></td>
                        <td>
                            {{ number_format($advancepaid,3) }}
                        </td>
                        <td></td>
                    </tr>

             
              </tbody>

              <tfoot>
                <tr>
                    <th>Total</th>            
                  <th> {{ number_format($topup,3) }}   </th>            
                  <th> {{ number_format($paid + $advancepaid,3) }}</th>            
                  <th> {{ number_format($topup -$paid - $advancepaid,3) }} </th> 
                  
                  
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
