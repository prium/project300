<div class="row-fluid">

	<div class="span6">

		<!-- BEGIN ADD CATEGORIES FORM-->
		<div class="row-fluid">
			<div class="span12">
				
				<!-- BEGIN FORM-->
				<form action="<?php echo site_url('categories/process-new'); ?>" id="requiredFormCategory" class="form-horizontal" novalidate="novalidate" method="post">
					<?php $this->load->view('includes/notify'); ?>
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption"><i class="icon-plus"></i>Add New Category</div>
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
									<input type="text" name="categoryName" id="categoryName" data-required="1" class="span10 m-wrap">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Slug<span class="required">*</span></label>
								<div class="controls">
									<input name="categorySlug" id="categorySlug" type="text" class="span10 m-wrap">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Parent</label>
								<div class="controls">
									<?php echo form_dropdown('categoryParent', $categories, '', 'class="span10 m-wrap"'); ?>
								</div>
							</div>

							<?php echo form_hidden('categoryType', $categoryType); ?>
							
						</div>
					</div><!--/portlet box grey-->
					
					<div class="form-actions">
						<button type="submit" class="btn green">Add Category</button>
						<input type="reset" class="btn" value="Cancel">
					</div>
				</form>
				<!-- END FORM-->

			</div><!--/span12-->
		</div>
		<!-- END ADD CATEGORIES FORM-->


	</div><!--/span6-->

	<div class="span6">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>All Categories</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body form">
				<table class="table table-striped table-bordered table-hover" id="sample_2">
					<thead>
						<tr>
							<th>Name</th>
							<th>Slug</th>
							<th>Parent</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($allCategories as $category): ?>
								<?php if(count($category->subCategory)): ?>
									<?php foreach ($category->subCategory as $subCategory): ?>
									<tr class="odd gradeX">
										<td><?php echo $subCategory->name; ?></td>
										<td><?php echo $subCategory->slug; ?></td>
										<td><?php echo $category->name; ?></td>
										<td><a class="btn mini green" href="#">Edit</a></td>
										<td><a class="btn mini red" href="#">Delete</a></td>
									</tr>
									<?php endforeach; ?>
							  	
							  	<?php else: ?>
							  	<tr class="odd gradeX">
						  			<td><?php echo $category->name; ?></td>
									<td><?php echo $category->slug; ?></td>
									<td>none</td>
									<td><a class="btn mini green" href="#">Edit</a></td>
									<td><a class="btn mini red" href="#">Delete</a></td>
								</tr>
								<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!--/span6-->

</div><!--/row-fluid-->

<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery('#categoryName').keyup(function()
		{
			var categoryName = jQuery(this).val();
			jQuery('#categorySlug').val(convertToSlug(categoryName));
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