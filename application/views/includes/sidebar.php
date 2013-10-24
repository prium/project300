<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="start ">
					<a href="index.html">
					<i class="icon-home"></i> 
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="active ">
					<a href="javascript:;">
					<i class="icon-file-text"></i> 
					<span class="title">Projects</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo site_url('projects/add-new'); ?>"><i class="icon-plus-sign-alt"></i> Add New</a>
						</li>
						<li >
							<a href="<?php echo site_url('projects'); ?>"><i class="icon-list"></i> View All</a>
						</li>
						<li >
							<a href="<?php echo site_url('categories/project'); ?>"><i class="icon-tags"></i> Categories</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="icon-file-text"></i> 
					<span class="title">Clients</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="<?php echo site_url('clients/add-new'); ?>"><i class="icon-plus-sign-alt"></i> Add New</a>
						</li>
						<li >
							<a href="<?php echo site_url('clients'); ?>"><i class="icon-list"></i> View All</a>
						</li>
					</ul>
				</li>
				<li class="last ">
					<a href="charts.html">
					<i class="icon-bar-chart"></i> 
					<span class="title">Visual Charts</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->