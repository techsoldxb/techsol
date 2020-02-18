     <!-- This script is used to allow only number in the bill amount field -->
     <script>    
      function isNumberKey(evt)
      {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
          && (charCode < 48 || charCode > 57))
          return false;
          return true;
      }  
</script>

<script>
  function myFunction() {
    window.print();

    
  }
  </script>



<script>
  function calc1() 
  {
  var fifty_qty = document.getElementById('fifty_qty').value;
  document.getElementById('fifty_amount').value = fifty_qty * 50;   

  var twenty_qty = document.getElementById('twenty_qty').value;
  document.getElementById('twenty_amount').value = twenty_qty * 20;   

  var ten_qty = document.getElementById('ten_qty').value;
  document.getElementById('ten_amount').value = ten_qty * 10;   

  var five_qty = document.getElementById('five_qty').value;
  document.getElementById('five_amount').value = five_qty * 5;   

  var one_qty = document.getElementById('one_qty').value;
  document.getElementById('one_amount').value = one_qty * 1;  

  var baisa_qty = document.getElementById('baisa_qty').value;
  document.getElementById('baisa_amount').value = baisa_qty * .100;  

  document.getElementById('total').value = fifty_qty * 50 + twenty_qty * 20 + ten_qty * 10 + five_qty * 5 + one_qty * 1 + baisa_qty * .100;
 


 
  }

  

  
</script>

<!-- End -->

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
            <h3 class="card-title">

              <div style="text-align:center" class="font-weight-bold">

                @if(auth()->user()->company =='1')   
                Al Jarwani
              @elseif(auth()->user()->company =='2')
                Muscat Mall
              @elseif(auth()->user()->company =='3')
                Oman Aquarium
              @endif
               
                
              </div>

              <div style="text-align:center">
                Cash On Hand Report
              </div>

              <div style="text-align:center">
                {{$ldate = date('d-m-Y')}}
                
              </div>
            
           
          </h3>
              


            
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

        <div class="card">
          <div class="card-header">
            
            <h3 class="card-title">
            <div style="text-align:center">
              Cash Denomination  
            </div>  
            </h3>  
            
            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
              <tr>
                                 
                         
                <th class="text-center">Currency</th>            
                <th class="text-center"> Quantity </th> 
                <th class="text-center"> Amount </th> 
                
              
              </tr>
              </thead>
              <tbody>
                    <tr>
                        <td class="font-weight-bold text-center">
                            50.000 
                        </td>
                        <td>
                          <input class="form-control text-center" type="text" name = "fifty_qty" id="fifty_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                        </td>
                        <td class="font-weight-bold text-right">
                          <input class="form-control font-weight-bold text-center" type="text" name = "fifty_amount" id="fifty_amount" disabled>
                      </td>
                        
                    </tr>

                    <tr>
                      <td class="font-weight-bold text-center">
                        20.000 
                    </td>
                    <td>
                      <input class="form-control text-center" type="text" name = "twenty_qty" id="twenty_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                    </td>
                    <td class="font-weight-bold text-right">
                      <input class="form-control font-weight-bold text-center" type="text" name = "twenty_amount" id="twenty_amount" disabled>
                  </td>
                        
                    </tr>

                    <tr>
                      <td class="font-weight-bold text-center">
                        10.000 
                    </td>
                    <td>
                      <input class="form-control text-center" type="text" name = "ten_qty" id="ten_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                    </td>
                    <td class="font-weight-bold text-right">
                      <input class="form-control font-weight-bold text-center" type="text" name = "ten_amount" id="ten_amount" disabled>
                  </td>
                        
                    </tr>

                    <tr>
                      <td class="font-weight-bold text-center">
                        5.000 
                    </td>
                    <td>
                      <input class="form-control text-center" type="text" name = "five_qty" id="five_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                    </td>
                    <td class="font-weight-bold text-right">
                      <input class="form-control font-weight-bold text-center" type="text" name = "five_amount" id="five_amount" disabled>
                  </td>
                      
                  </tr>

                  <tr>
                    <td class="font-weight-bold text-center">
                      1.000 
                  </td>
                  <td>
                    <input class="form-control text-center" type="text" name = "one_qty" id="one_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                  </td>
                  <td class="font-weight-bold text-right">
                    <input class="form-control font-weight-bold text-center" type="text" name = "one_amount" id="one_amount" disabled>
                </td>
                    
                </tr>

                
                <tr>
                  <td class="font-weight-bold text-center">
                    0.100 
                </td>
                <td>
                  <input class="form-control text-center" type="text" name = "baisa_qty" id="baisa_qty" onkeypress="return isNumberKey(event)" onkeyup="calc1()" >
                </td>
                <td class="font-weight-bold text-right">
                  <input class="form-control font-weight-bold text-center" type="text" name = "baisa_amount" id="baisa_amount" disabled>
              </td>
                  
              </tr>

             
              </tbody>

              <tfoot>
                <tr>
                    <th></th>            
                    <th class="text-right">Total</th>   
                  <th class="font-weight-bold text-right">
                    <input class="form-control font-weight-bold text-center" type="text" name = "total" id="total" disabled>
                 </th>            
                             
                  
                  
                  
                </tr>
                </tfoot>
 
            </table>

            
            
          </div>
          <!-- /.card-body -->
        </div>
        <div class="row form-group">
  
      
            <div>
              <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
            </div>
          

          <div class = "col"style="text-align:right">
            Printed By: {{ Auth::user()->name }}
          </div>
  
            
         
    
           </div>

        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


  
@endsection
