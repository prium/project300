<h3>***Need to add amounts box</h3>
<div class="row-fluid">
	<div class="span7">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>Project Details</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body">
				<dl>
					<dt><h5>Project Name</h5></dt>
					<dd><h4><?php echo $project->name; ?></h4></dd>
					<dt><h5>Project belongs to categories</h5></dt>
					<?php foreach ($project->categories as $category): ?>
						<?php if(is_null($category->parentName)): ?>
							<dd><h4><?php echo $category->name; ?></h4></dd>
						<?php else: ?>
							<dd><h4><?php echo $category->parentName."/".$category->name; ?></h4></dd>
						<?php endif; ?>
					<?php endforeach; ?>
					<dt><h5>Description</h5></dt>
					<dd><div class="well"><?php echo $project->description; ?></div></dd>
					<dt><h5>Comment</h5></dt>
					<dd><div class="well"><?php echo $project->comment; ?></div></dd>
					<dt><h5>Project Created on</h5></dt>
					<dd><h4><?php echo date("h:m A, F jS, Y", strtotime($project->createdOn)); ?></h4></dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="span5">
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>Quick View</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body">
				<dt><h5>Project Status</h5></dt>
				<dd><h4><?php echo ucfirst($project->status); ?></h4></dd>
				<dt><h5>Start Date</h5></dt>
				<dd><h4><?php echo date("h:m A, F jS, Y", strtotime($project->startDate)); ?></h4></dd>
				<dt><h5>End Date</h5></dt>
				<dd><h4><?php echo date("h:m A, F jS, Y", strtotime($project->endDate)); ?></h4></dd>
			</div>
		</div>	
	</div>

	<div class="span5">
		<div class="portlet box red">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>Clients</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body">
				<?php foreach ($project->clients as $key => $client): ?>
					<?php if($key != 0) echo "<hr/>"; ?>
						<h4><strong><?php echo $key+1; ?></strong><h4>
						<h4>Name: <strong><?php echo $client->name; ?></strong></h4>
						<h4>Gender: <?php echo ucfirst($client->gender); ?></h4>
						<h4>Email Address: <a href="mailto:<?php echo $client->email; ?>"><?php echo $client->email; ?></a></strong></h4>
						<h4>Organization: <?php echo $client->organization; ?></h4>
					</dl>
				<?php endforeach; ?>
			</div>
		</div>	
	</div>
</div>