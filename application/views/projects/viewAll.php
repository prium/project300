<link rel="stylesheet" href="<?php echo site_url('assets/plugins/select2/select2_metro.css'); ?>" />
<link rel="stylesheet" href="<?php echo site_url('assets/plugins/data-tables/DT_bootstrap.css'); ?>" />

<script type="text/javascript" src="<?php echo site_url('assets/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/plugins/data-tables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/plugins/data-tables/DT_bootstrap.js'); ?>"></script>
<script src="<?php echo site_url('assets/scripts/table-managed.js'); ?>"></script>
<script>
	jQuery(document).ready(function() {
	   TableManaged.init();
	});
</script>

<table class="table table-striped table-bordered table-hover" id="sample_2">
	<thead>
		<tr>
			<th style="width: 20px;">#</th>
			<th>Name</th>
			<th>Status</th>
			<th>Starting Date</th>
			<th>Client</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($projects as $key => $project): ?>
			<tr class="odd gradeX">
				<td><?php echo $key+1; ?></td>
				<td><?php echo $project->name; ?></td>
				<td><?php echo ucfirst($project->status); ?></td>
				<td><?php echo date("h:m A, F jS, Y", strtotime($project->startDate)); ?></td>
				<td><?php echo $project->clientName; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>