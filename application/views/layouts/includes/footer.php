<div class="row-fluid">
  <div id="footer" class="span12"> Refined Finance <a href="#">refinedfinance.com.ng</a> </div>
</div>

<!--end-Footer-part-->

<script src="<?=base_url('assets/js1/excanvas.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.ui.custom.js');?>"></script> 
<script src="<?=base_url('assets/js1/bootstrap.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.flot.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.flot.resize.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.peity.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/fullcalendar.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.dashboard.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.gritter.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.interface.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.chat.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.validate.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.form_validation.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.wizard.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.uniform.js');?>"></script> 
<script src="<?=base_url('assets/js1/select2.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.popover.js');?>"></script> 
<script src="<?=base_url('assets/js1/jquery.dataTables.min.js');?>"></script> 
<script src="<?=base_url('assets/js1/matrix.tables.js');?>"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
