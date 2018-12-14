                              
 <?php echo form_open_multipart('loan/loan_payment', ['role'=>'form']);?>

                               <label>Loan amount</label>
                               <input type="text" class="form-control" name="amount" placeholder="Enter The loan Amount">
                               <br>
                               <br>
                               <br>
                                <select name="status">
                                <option value="1">Loan Payment</option>
                                
                                </select>


                           <button type="submit" class="btn btn-primary">save</button>

                                            