<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
	<div class="span12">
		
		<!-- BEGIN FORM-->
		<form action="<?php echo site_url('projects/process-new'); ?>" id="requiredFormProject" class="form-horizontal" novalidate="novalidate" method="post">
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
						<label class="control-label">Project Name<span class="required">*</span></label>
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
						<label class="control-label">Status<span class="required">*</span></label>
						<div class="controls">
							<?php echo form_dropdown('projectStatus', $statusList, '', 'class="span6 m-wrap"'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Start Date<span class="required">*</span></label>
						<div class="controls">
							<div class="input-prepend span6 m-wrap">
								<span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="m-wrap date-picker" data-date-format="yyyy-mm-dd" name="startDate">
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">End Date<span class="required">*</span></label>
						<div class="controls">
							<div class="input-prepend span6 m-wrap">
								<span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="m-wrap date-picker" data-date-format="yyyy-mm-dd" name="endDate">
							</div>
						</div>
					</div>
				</div>
			</div><!--/portlet box grey-->

			<!-- clients and employees -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="icon-reorder"></i>Clients & Employees</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- project clients checkbox -->
					<div class="control-group">
						<label class="control-label">Project Client</label>
						<div class="controls">
							<?php foreach ($clientList as $client): ?>
							  	<label class="checkbox">
							  		<input type="checkbox" name="clients[]" value="<?php echo $client->id; ?>"> <?php echo $client->name; ?>
								</label>
							<?php endforeach; ?>
						</div>
					</div>
					<!-- /project clients checkbox -->
				</div>
			</div><!--/portlet box grey-->
			<!-- /clients and employees -->

			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="icon-reorder"></i>Other Information</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- project categories checkbox -->
					<div class="control-group">
						<label class="control-label">Project Category</label>
						<div class="controls">
							<?php foreach ($categoryList as $category): ?>
								
								<?php if(count($category->subCategory)): ?>
									<label class="checkbox">
										<input type="checkbox" name="categories[]" value="<?php echo $category->id; ?>"> <?php echo $category->name; ?>
									</label>
									
									<?php foreach ($category->subCategory as $subCategory): ?>
										<label class="checkbox space">
											<input type="checkbox" name="categories[]" value="<?php echo $subCategory->id; ?>"> <?php echo $subCategory->name; ?>
										</label>
									<?php endforeach; ?>
							  	
							  	<?php else: ?>
							  	<label class="checkbox">
							  		<input type="checkbox" name="categories[]" value="<?php echo $category->id; ?>"> <?php echo $category->name; ?>
								<?php endif; ?>
								</label>

							<?php endforeach; ?>
							
						</div>
					</div>
					<!-- /project categories checkbox -->
					<div class="control-group">
						<label class="control-label">Project Description</label>
						<div class="controls">
							<textarea class="span12 wysihtml5 m-wrap" rows="10" name="projectDescription" data-error-container="#editor1_error"></textarea>
							<div id="editor1_error"></div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Comment</label>
						<div class="controls">
							<textarea class="span12 m-wrap" rows="6" name="projectComment" data-error-container="#editor2_error"></textarea>
							<div id="editor2_error"></div>
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
<!-- END PAGE CONTENT-->

<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery('#projectName').keyup(function()
		{
			var projectName = jQuery(this).val();
			jQuery('#projectSlug').val(convertToSlug(projectName));
		});

		function convertToSlug(Text)
		{
		    return Text
		        .toLowerCase()
		        .replace(/ /g,'-')
		        .replace(/[^\w-]+/g,'');
		}
	});
</script>

<style type="text/css">
.controls > .radio, .controls > .checkbox
{
	display: block;
}
.checker
{
	margin-left: 15px!important;
}
</style>

