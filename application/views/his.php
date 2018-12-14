<?php $this->load->view('layouts/includes/header1');?>
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

  <div class="limiter">
    <div class="container">
      <div class="wrap-table100">
        <div class="table100">
          <?php if($check_save_status==false):?>
            <div class="well"> No Loan History Yet</div>
          <?php else:?>
          <table>
            <h3>Loan History</h3>
            <thead>
              <tr class="table100-head">
                <th class="column1">Date</th>
                <th class="column2">Details</th>
                <th class="column3">Amount</th>
                <th class="column4">Interest</th>
                <th class="column5">Status</th>
                <th class="column6">Delete</th>

              </tr>
            </thead>
            <tbody>

            <?php foreach ($check_status as $status):?>
              <?php foreach ($monthlypercentage as $percentage):
    						$loanpercent=$percentage->loanpercentage;?>
              <?php if ($status->loan_type=='1' && $status->status=='1' && $status->is_delete=='0'):?>
                <tr>
                  <td class="column1"> <?= $status->returning_date;?></td>
                  <td class="column2">You paid(Loan) a total of </td>
                  <td class="column3">N<?= $status->amount; ?></td>
                  <td class="column4"><?=$loanpercent;?>%</td>
                  <td class="column5">Pending</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>

                </tr>
              <?php elseif($status->loan_type=='1' && $status->status=='2' && $status->is_delete=='0'):?>
                <tr>
                  <td class="column1"> <?= $status->returning_date;?></td>
                  <td class="column2">You paid(Loan) a total of </td>
                  <td class="column3">N<?= $status->amount; ?></td>
                  <td class="column4"><?=$loanpercent;?>%</td>
                  <td class="column5">Successful</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>
                </tr>
              <?php elseif($status->loan_type=='2' && $status->status=='1' && $status->is_delete=='0'):?>

              <tr>
                <td class="column1"> <?= $status->returning_date;?></td>
                <td class="column2">You requested for a loan of</td>
                <td class="column3">N<?= $status->amount; ?></td>
                <td class="column4"><?=$loanpercent;?>%</td>
                <td class="column5">Pending</td>
                <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>

              </tr>
            <?php elseif($status->loan_type='2' && $status->status=='2' && $status->is_delete=='0'):?>

              <tr>
                <td class="column1"> <?= $status->returning_date;?></td>
                <td class="column2">You requested for a loan of</td>
                <td class="column3">N<?= $status->amount; ?></td>
                <td class="column4"><?=$loanpercent;?>%</td>
                <td class="column5">Successful</td>
                <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>

              </tr>

            <?php elseif($status->loan_type='2' && $status->status=='3' && $status->is_delete=='0'):?>

              <tr>
                <td class="column1"> <?= $status->returning_date;?></td>
                <td class="column2">You requested for a loan of</td>
                <td class="column3">N<?= $status->amount; ?></td>
                <td class="column4"><?=$loanpercent;?>%</td>
                <td class="column5">Failed</td>
                <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>
              </tr>
            </tr>
          <?php elseif($status->loan_type=='1' && $status->status=='3' && $status->is_delete=='0'):?>
            <tr>
              <td class="column1"> <?= $status->returning_date;?></td>
              <td class="column2">You paid(Loan) a total of </td>
              <td class="column3">N<?= $status->amount; ?></td>
              <td class="column4"><?=$loanpercent;?>%</td>
              <td class="column5">Failed</td>
              <td class="column6"><a href="<?=base_url('');?>Loan/clear_each/<?= $status->id;?>">Delete</a></td>
            </tr>

            <?php endif;?>
          <?php endforeach;?>
            <?php endforeach;?>

            </tbody>
          </table>
          <?php endif;?>
                        <br>
                      <br>
        <?php if($check_save_status==false):?>
          <div class="well"> No Investment History Yet</div>
        <?php else:?>
          <table>
              <h3>Investment History</h3>
              <thead>
                <tr class="table100-head">
                  <th class="column1">Date</th>
                  <th class="column2">Details</th>
                  <th class="column3">Amount</th>
                  <th class="column4">Interest</th>
                  <th class="column5">Status</th>
                  <th class="column6">Monthly Earning</th>
                  <td class="column6">Delete</a></td>

                </tr>
              </thead>
            <tbody>


              <?php foreach ($check_save_status as $history ):?>
                <?php foreach ($monthlypercentage as $percentage):
      					$savepercent=$percentage->savepercentage/100;?>
                <?php if($history->amount_type=='1' && $history->status=='2' && $history->is_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You saved a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4"><?=$percentage->savepercentage;?>%</td>
                  <td class="column5">Successful</td>
                  <td class="column6"><?= $history->amount * $savepercent;?></td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each2/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php elseif($history->amount_type=='1' && $history->status=='1' && $history->is_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You requested to save a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4"><?=$percentage->savepercentage;?>%</td>
                  <td class="column5">Pending</td>
                  <td class="column6"><?= $history->amount * $savepercent; ?></td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each2/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php elseif($history->amount_type=='2' && $history->status=='2' && $history->is_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You withdrew a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">No interest</td>
                  <td class="column5">Successful</td>
                  <td class="column6">Withdrawal</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each2/<?= $history->id;?>">Delete</a></td>
                </tr>
            <?php elseif($history->amount_type=='2' && $history->status=='1' && $history->is_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You withdrew a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">No interest</td>
                  <td class="column5">Pending</td>
                  <td class="column6">Withdrawal</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_each2/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php endif;?>
            <?php endforeach;?>
            <?php endforeach;?>


            </tbody>
          </table>
            <?php endif;?>
           <br>
           <br>

           <?php if($check_save_status==false):?>
             <div class="well"> No Saving History Yet</div>
           <?php else:?>
          <table>
              <h3>Saving And Withdrawal History</h3>
              <thead>
                <tr class="table100-head">
                  <th class="column1">Date</th>
                  <th class="column2">Details</th>
                  <th class="column3">Amount</th>
                  <th class="column4">Interest</th>
                  <th class="column5">Status</th>

                  <td class="column6">Delete</td>

                </tr>
              </thead>
            <tbody>


              <?php foreach ($check_Rsave_status as $history ):?>
                <?php foreach ($monthlypercentage as $percentage):
               $savepercent=$percentage->savepercentage;?>
                <?php if($history->amount_type=='1' && $history->status=='2' && $history->user_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You saved a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">0%</td>
                  <td class="column5">Successful</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_Save/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php elseif($history->amount_type=='1' && $history->status=='1' && $history->user_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You requested to save a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">0%</td>
                  <td class="column5">Pending</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_Save/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php elseif($history->amount_type=='2' && $history->status=='2' && $history->user_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You withdrew a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">No interest</td>
                  <td class="column5">Successful</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_Save/<?= $history->id;?>">Delete</a></td>
                </tr>
            <?php elseif($history->amount_type=='2' && $history->status=='1' && $history->user_delete=='0'):?>
                <tr>
                  <td class="column1"><?= $history->date;?></td>
                  <td class="column2">You withdrew a total of </td>
                  <td class="column3"><?= $history->amount; ?></td>
                  <td class="column4">No interest</td>
                  <td class="column5">Pending</td>
                  <td class="column6"><a href="<?=base_url('');?>Loan/clear_Save/<?= $history->id;?>">Delete</a></td>
                </tr>
              <?php endif;?>
            <?php endforeach;?>
            <?php endforeach;?>


            </tbody>
          </table>
          <?php endif;?>





        </div>
      </div>
    </div>
  </div>



<!--Footer-part-->
<?php $this->load->view('layouts/includes/footer');?>
