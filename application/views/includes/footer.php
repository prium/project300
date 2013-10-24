	</div>
	<!-- END PAGE CONTAINER--> 
</div>
<!-- END PAGE -->
</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			Developed as Project300 by Prium & Anindya
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<script src="<?php echo site_url(); ?>/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo site_url(); ?>/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo site_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo site_url(); ?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo site_url(); ?>/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo site_url(); ?>/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="<?php echo site_url(); ?>/assets/scripts/app.js"></script>
	<script src="<?php echo site_url(); ?>/assets/scripts/form-validation.js"></script> 
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<!-- END PAGE LEVEL STYLES -->    
	<script>
		jQuery(document).ready(function() {   
		   // initiate layout and plugins
		   App.init();
		   FormValidation.init();
		   
			if (jQuery().datepicker) {
				$('.date-picker').datepicker({
					rtl : App.isRTL()
				});
			}
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>