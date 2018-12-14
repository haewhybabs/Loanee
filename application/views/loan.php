  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
  </head>
  <body>

        <h2> Loan Owe: <b>-</b> <?= $loan_owe-$loan_pay;?></h2>

  	       <?php echo form_open_multipart('Loan/loan_request', ['role'=>'form']);?>
                    

                         
                               <label>Loan amount</label>
                               <input type="text" class="form-control" name="amount" placeholder="Enter The loan Amount">
                               <br>
                               <br>
                               <br>

                                 <select name="loan_type">
                                <option value="1">Loan Payment</option>
                                 
                                 <option value="2">Get a Loan</option>
                                
                                </select>
                                 
                         
                          
                          
                           <button type="submit" class="btn btn-primary">Make Request</button>

                           <?php echo 'Today is : ' ;?><?php echo $date_now; ?>

                           <a href="<?= base_url('loan/load_loan_payment');?>"><br>
                           	<br>Make Your LOan Payment</a>
                          <?php echo form_close(); ?>
  
  </body>
  </html>





                    