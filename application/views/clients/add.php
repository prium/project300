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
						<label class="control-label">Name<span class="required">*</span></label>
						<div class="controls">
							<input type="text" name="clientName" id="clientName" data-required="1" class="span6 m-wrap">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email<span class="required">*</span></label>
						<div class="controls">
							<input name="clientEmail" id="clientEmail" type="email" class="span6 m-wrap">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Gender<span class="required">*</span></label>
						<div class="controls">
							<select class="span6 m-wrap">
								<option value="">select</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
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
						<label class="control-label">End Date</label>
						<div class="controls">
							<div class="input-prepend span6 m-wrap">
								<span class="add-on"><i class="icon-calendar"></i></span><input type="text" class="m-wrap date-picker" data-date-format="yyyy-mm-dd" name="endDate">
							</div>
						</div>
					</div>
				</div>
			</div><!--/portlet box grey-->

			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="icon-reorder"></i>Other Information</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<div class="control-group">
						<label class="control-label">Organization</label>
						<div class="controls">
							<input name="clientOrg" id="clientOrg" type="text" class="span6 m-wrap">
							<div id="editor1_error"></div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Address</label>
						<div class="controls">
							<textarea class="span12 wysihtml5 m-wrap" rows="10" name="clientAddress" data-error-container="#editor1_error"></textarea>
							<div id="editor1_error"></div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Client Details</label>
						<div class="controls">
							<textarea class="span12 wysihtml5 m-wrap" rows="10" name="clientDetails" data-error-container="#editor1_error"></textarea>
							<div id="editor1_error"></div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Comment</label>
						<div class="controls">
							<textarea class="span12 m-wrap" rows="6" name="clientComment" data-error-container="#editor2_error"></textarea>
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

