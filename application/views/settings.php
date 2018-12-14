<?php $this->load->view('layouts/includes/header1');?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Change Password</a> <a href="#" class="current">Change Password</a> </div>
    <h1>Change Password</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Form wizard &amp; validation</h5>
          </div>
          <div class="widget-content nopadding">
          	 <?php if($msg=$this->session->flashdata('alert alert-success alert-dismissible')):?>
                             <div class="alert alert-success alert-dismissible">
                               <?php echo $msg;?>
                             </div>
                     <?php endif;?>
           <?php echo form_open_multipart('Dashboard/Setting', ['class'=>'form-horizonal'], ['id'=>'form-wizard']);?>
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Username</label>
                  <div class="controls">
                    <input id="username" type="text" name="username" />
                  </div>
                </div>
                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                <div class="control-group">
                  <label class="control-label">Password</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>
                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input id="password2" type="password" name="new_pass" />
                  </div>
                </div>
              </div>
              <?php echo form_error('new_pass', '<div class="error">', '</div>'); ?>
              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" name="submit" class="btn btn-primary" type="submit" value="Next" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="<?= base_url('assets/js1/jquery.min.js');?>""></script>
<script src="<?= base_url('assets/js1/jquery.ui.custom.js');?>""></script>
<script src="<?= base_url('assets/js1/bootstrap.min.js');?>""></script>
<script src="<?= base_url('assets/js1/jquery.validate.js');?>""></script>
<script src="<?= base_url('assets/js1/jquery.wizard.js');?>""></script>
<script src="<?= base_url('assets/js1/matrix.js');?>""></script>
<script src="<?= base_url('assets/js1/matrix.wizard.js');?>"></script>
</body>
</html>
