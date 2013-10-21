<div class="row-fluid">

	<div class="span6">

		<form class="form-horizontal">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="icon-reorder"></i>Add New Category</div>
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
						<label class="control-label">Name</label>
						<div class="controls">
							<input type="text" placeholder="Name" class="m-wrap large">
						</div>
					</div><!--/control-group-->

					<div class="control-group">
						<label class="control-label">Slug</label>
						<div class="controls">
							<input type="text" placeholder="Slug" class="m-wrap large">
						</div>
					</div><!--/control-group-->

					<div class="control-group">
						<label class="control-label">Parent</label>
						<div class="controls">
							<select class="large m-wrap" tabindex="1">
								<option value="Category 1">None</option>
								<option value="Category 1">Category 2</option>
								<option value="Category 1">Category 3</option>
							</select>
						</div>
					</div><!--/control-group-->

					<div class="form-actions">
						<button type="submit" class="btn blue">Save</button>
						<button type="button" class="btn">Cancel</button>
					</div><!--/form-actions-->

				</div>
			</div>

	</form>


	</div><!--/span6-->

	<div class="span6">
		Place for viewing all categories
	</div><!--/span6-->

</div><!--/row-fluid-->