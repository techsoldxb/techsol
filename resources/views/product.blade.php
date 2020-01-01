<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Calculator</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>





<script>



$(function(){
            $('#cost_aed, #tax_per,#profit_perc,#profit_perc,#courier').keyup(function(){
               var cost_aed = parseFloat($('#cost_aed').val()) || 0;
               var tax_per = 5;
			   var tax_amount = (cost_aed*tax_per)/100;
               $('#tax_amount').val(tax_amount);
			   var cost_aed_tax = cost_aed + tax_amount;
			   $('#cost_aed_tax').val(cost_aed_tax);
   			   

var cost_omr = parseFloat(Number(cost_aed_tax / 9.5).toFixed(3));  


   			   $('#cost_omr').val(cost_omr);			   
                var profit_perc = parseFloat($('#profit_perc').val()) || 0;				
		
			
var profit_amount = parseFloat(Number((cost_omr * profit_perc)/100).toFixed(3));  
			

  			   $('#profit_amount').val(profit_amount);	
                 var courier = parseFloat($('#courier').val()) || 0;					 
   		   

var selling_price = parseFloat(Number(cost_omr + profit_amount + courier).toFixed(3));  

   	   			
			var profit_perc_val = $("#profit_perc").val();
if(jQuery.trim(profit_perc_val).length > 0)
{
     $('#selling_price').val(selling_price);	
	 
	 
}
				 			
			   

				
							  
            });
         });
</script>
		 




</head>

<body>

<div class="container">
         <div class="row">
            <div class="col-sm-5 col-sm-offset-3 well">
               <h4 class="text-center">Selling Price Calculator - Oman </h4> <hr/>
               <form class="form-horizontal">
                  <div class="form-group">

                     <div class="col-sm-10">
<p class="bg-info text-white">Cost AED (Without Tax)
                        <input type="number" name="cost_aed" id="cost_aed" class="form-control" min="0" placeholder="Enter Cost in AED" required />
</p>
                     </div>
                  </div>
            
				 
				  
              
				  
				     <div class="form-group">

                     <div class="col-sm-10">

<p class="bg-secondary text-white">Cost OMR
                        <input type="number" name="cost_omr" tabindex="-1" id="cost_omr" class="form-control" readonly />
</p>
                     </div>
                  </div>
				  
				          <div class="form-group">

                     <div class="col-sm-10">
<p class="bg-info text-white">Profit Percentage
                        <input type="number" name="profit_perc" id="profit_perc" class="form-control" min="0" placeholder="Enter Profit Percentage" required />
</p>
                     </div>
                  </div>
				  
				    <div class="form-group">

                     <div class="col-sm-10">
<p class="bg-secondary text-white">Profit Amount
                        <input type="number" tabindex="-1" name="profit_amount" id="profit_amount" class="form-control" readonly />
</p>
                     </div>
                  </div>
				  
				       <div class="form-group">

                     <div class="col-sm-10">
<p class="bg-info text-white">Courier
                        <input type="number" name="courier" id="courier" class="form-control" min="0" placeholder="Enter Courier Charge" required />
</p>
                     </div>
                  </div>
				  
				   <div class="form-group">
                    
                     <div class="col-sm-10">

<p class="bg-danger text-white">Selling Price 

                        <input type="number" name="selling_price" id="selling_price" class="form-control" readonly />


</p>
                     </div>
                  </div>
				  
				  
	<a href="#" class="text-danger"> </a></p>		
				  
				  
               </form>
            </div>
         </div>
      </div>





</body>
</html>
