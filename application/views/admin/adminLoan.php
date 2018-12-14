
<!--===============================================================================================-->
<style type="text/css">
.container-table100 { margin: 75px 75px 75px 75px;

                      width: 50%;


}
.table100{
  width: 75%;
  margin: 75px 75px 75px 75px;
}


</style>

<?php $this->load->view('layouts/includes/adminHeader');?>






<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>History table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Details</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>

                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                <tr class="odd gradeX">
                  <td>You requested  for loan</td>
                  <td>50000</td>
                  <td>2017-09-29 01:22</td>

                  <div><td class="btn btn-success">Approve</td> <td class="btn btn-danger">Unapprove</td></div>
                  <td class="center"><button class="btn-danger" >Delete</button></td>
                </tr>
                <tr class="odd gradeC">
                  <td>You requested  for loan</td>
                  <td>50000</td>
                  <td>2017-09-29 01:22</td>

                  <div><td class="btn btn-success">Approve</td> <td class="btn btn-danger">Unapprove</td></div>
                  <td class="center"><button class="btn-danger" >Delete</button></td>
                </tr>
                <tr class="odd gradeA">
                  <td>You requested  for loan</td>
                  <td>50000</td>
                  <td>2017-09-29 01:22</td>
                  <div><td class="btn btn-success">Approve</td> <td class="btn btn-danger">Unapprove</td></div>
                  <td class="center"><button class="btn-danger" >Delete</button></td>
                </tr>
                <tr class="odd gradeX">
                  <td>You requested  for loan</td>
                  <td>50000</td>
                  <td>2017-09-29 01:22</td>
                  <div><td class="btn btn-success">Approve</td> <td class="btn btn-danger">Unapprove</td></div>
                  <td class="center"><button class="btn-danger" >Delete</button></td>
                </tr>
                             </tbody>
            </table>
          </div>
        </div>



<!--Footer-part-->

 <?php $this->load->view('layouts/includes/footer');?>
