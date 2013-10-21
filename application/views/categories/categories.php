<div class="row-fluid">

	<div class="span6">

		<!-- BEGIN ADD CATEGORIES FORM-->
		<div class="row-fluid">
			<div class="span12">
				
				<!-- BEGIN FORM-->
				<form action="<?php echo site_url('projects/process-new'); ?>" id="requiredForm" class="form-horizontal" novalidate="novalidate" method="post">
					<?php $this->load->view('includes/notify'); ?>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption"><i class="icon-reorder"></i>Basic Information</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body form">
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
							<div class="control-group">
								<label class="control-label">Name<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="projectName" id="projectName" data-required="1" class="span6 m-wrap">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Slug<span class="required">*</span></label>
								<div class="controls">
									<input name="projectSlug" id="projectSlug" type="text" class="span6 m-wrap">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Parent<span class="required">*</span></label>
								<div class="controls">
									<?php echo form_dropdown('projectStatus', $categories, '', 'class="span6 m-wrap"'); ?>
								</div>
							</div>
							
						</div>
					</div><!--/portlet box grey-->
					
					<div class="form-actions">
						<button type="submit" class="btn green">Submit</button>
						<input type="reset" class="btn" value="Cancel">
					</div>
				</form>
				<!-- END FORM-->

			</div><!--/span12-->
		</div>
		<!-- END ADD CATEGORIES FORM-->


	</div><!--/span6-->

	<div class="span6">
		Place for viewing all categories
	</div><!--/span6-->

</div><!--/row-fluid-->