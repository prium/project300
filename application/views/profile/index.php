<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo site_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/plugins/chosen-bootstrap/chosen/chosen.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo site_url('assets/css/pages/profile.css'); ?>" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="<?php echo site_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js'); ?>"></script>
<!-- END PAGE LEVEL STYLES -->


<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid profile">
	<div class="span12">
		<!--BEGIN TABS-->
		<div class="tabbable tabbable-custom tabbable-full-width">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1_1" data-toggle="tab">Profile Info</a></li>
				<li><a href="#tab_1_2" data-toggle="tab">Edit Profile</a></li>
			</ul>
			<div class="tab-content">
				<?php $this->load->view('includes/notify'); ?>
				<!--end tab-pane-->
				<div class="tab-pane profile-classic row-fluid active" id="tab_1_1">
					<ul class="unstyled profile-nav span3">
						<li style="padding: 0px;">
							<?php if(!$this->session->userdata('avatar')): ?>
								<img src="http://www.placehold.it/291x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
							<?php else: ?>
								<img src="<?php echo site_url('uploads/'.$this->session->userdata('avatar')); ?>" alt="" />
							<?php endif; ?>
						</li>
					</ul>
					<ul class="unstyled span9">
						<li><span>Full Name:</span> <?php echo $user->fullName; ?></li>
						<li><span>User Name:</span> <?php echo $user->username; ?></li>
						<li><span>Email Address:</span> <?php echo $user->email; ?></li>
						<li><span>User Role:</span> <?php echo $user->role; ?></li>
						<li><span>Joined On:</span> <?php echo date("h:m A, F jS, Y", strtotime($user->createdOn)); ?></li>
					</ul>
				</div>
				<!--tab_1_1-->
				<div class="tab-pane row-fluid profile-account" id="tab_1_2">
					<div class="row-fluid">
						<div class="span12">
							<div class="span3">
								<ul class="ver-inline-menu tabbable margin-bottom-10">
									<li class="active">
										<a data-toggle="tab" href="#tab_1-1">
										<i class="icon-cog"></i> 
										Personal info
										</a> 
										<span class="after"></span>                                    
									</li>
									<li ><a data-toggle="tab" href="#tab_2-2"><i class="icon-picture"></i> Change Avatar</a></li>
									<li ><a data-toggle="tab" href="#tab_3-3"><i class="icon-lock"></i> Change Password</a></li>
									<li ><a data-toggle="tab" href="#tab_4-4"><i class="icon-eye-open"></i> Privacity Settings</a></li>
								</ul>
							</div>
							<div class="span9">
								<div class="tab-content">
									<div id="tab_1-1" class="tab-pane active">
										<div style="height: auto;" id="accordion1-1" class="accordion collapse">
											<form action="<?php echo site_url('profile/'.$user->username.'/update-personal'); ?>" method="post" id="requiredFormEditPersonalProfile" novalidate="novalidate">
												<div class="alert alert-error hide">
													<button class="close" data-dismiss="alert"></button>
													You have some form errors. Please check below.
												</div>
												<div class="alert alert-success hide">
													<button class="close" data-dismiss="alert"></button>
													Your form validation is successful!
												</div>

												<label class="control-label">Full Name</label>
												<input type="text" placeholder="Full Name" class="m-wrap span8" name="fullName" value="<?php echo $user->fullName; ?>"/>
												
												<label class="control-label">Username</label>
												<input type="text" placeholder="Username" class="m-wrap span8" value="<?php echo $user->username;?>" disabled/>
												
												<label class="control-label">Email Address</label>
												<input type="text" placeholder="Email Address" class="m-wrap span8" name="email" value="<?php echo $user->email; ?>" />
												
												<div class="submit-btn">
													<button type="submit" class="btn green">Update Profile</button>
													<input type="reset" class="btn" value="Cancel">
												</div>
											</form>
										</div>
									</div>
									<div id="tab_2-2" class="tab-pane">
										<div style="height: auto;" id="accordion2-2" class="accordion collapse">
											<form action="<?php echo site_url('profile/'.$user->username.'/update-avatar'); ?>" method="post" id="requiredFormEditAvatar" novalidate="novalidate" enctype="multipart/form-data">
												<div class="alert alert-error hide">
													<button class="close" data-dismiss="alert"></button>
													You have some form errors. Please check below.
												</div>
												<div class="alert alert-success hide">
													<button class="close" data-dismiss="alert"></button>
													Your form validation is successful!
												</div>
												<div class="controls">
													<div class="thumbnail" style="width: 290px;">
														<?php if(!$this->session->userdata('avatar')): ?>
															<img src="http://www.placehold.it/291x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
														<?php else: ?>
															<img src="<?php echo site_url('uploads/'.$this->session->userdata('avatar')); ?>" alt="" />
														<?php endif; ?>
													</div>
												</div>
												<div class="space10"></div>
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="input-append">
														<div class="uneditable-input">
															<i class="icon-file fileupload-exists"></i> 
															<span class="fileupload-preview"></span>
														</div>
														<span class="btn btn-file">
														<span class="fileupload-new">Select file</span>
														<span class="fileupload-exists">Change</span>
														<input type="file" class="default" name="avatar"/>
														</span>
														<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
													</div>
												</div>
												<div class="clearfix"></div>
												<div class="space10"></div>
												<div class="submit-btn">
													<button type="submit" class="btn green">Update Profile</button>
													<input type="reset" class="btn" value="Cancel">
												</div>
											</form>
										</div>
									</div>
									<div id="tab_3-3" class="tab-pane">
										<div style="height: auto;" id="accordion3-3" class="accordion collapse">
											<form action="#">
												<label class="control-label">Current Password</label>
												<input type="password" class="m-wrap span8" />
												<label class="control-label">New Password</label>
												<input type="password" class="m-wrap span8" />
												<label class="control-label">Re-type New Password</label>
												<input type="password" class="m-wrap span8" />
												<div class="submit-btn">
													<a href="#" class="btn green">Change Password</a>
													<a href="#" class="btn">Cancel</a>
												</div>
											</form>
										</div>
									</div>
									<div id="tab_4-4" class="tab-pane">
										<div style="height: auto;" id="accordion4-4" class="accordion collapse">
											<form action="#">
												<div class="profile-settings row-fluid">
													<div class="span9">
														<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..</p>
													</div>
													<div class="control-group span3">
														<div class="controls">
															<label class="radio">
															<input type="radio" name="optionsRadios1" value="option1" />
															Yes
															</label>
															<label class="radio">
															<input type="radio" name="optionsRadios1" value="option2" checked />
															No
															</label>  
														</div>
													</div>
												</div>
												<!--end profile-settings-->
												<div class="profile-settings row-fluid">
													<div class="span9">
														<p>Enim eiusmod high life accusamus terry richardson ad squid wolf moon</p>
													</div>
													<div class="control-group span3">
														<div class="controls">
															<label class="checkbox">
															<input type="checkbox" value="" /> All
															</label>
															<label class="checkbox">
															<input type="checkbox" value="" /> Friends
															</label>
														</div>
													</div>
												</div>
												<!--end profile-settings-->
												<div class="profile-settings row-fluid">
													<div class="span9">
														<p>Pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson</p>
													</div>
													<div class="control-group span3">
														<div class="controls">
															<label class="checkbox">
															<input type="checkbox" value="" /> Yes
															</label>
														</div>
													</div>
												</div>
												<!--end profile-settings-->
												<div class="profile-settings row-fluid">
													<div class="span9">
														<p>Cliche reprehenderit enim eiusmod high life accusamus terry</p>
													</div>
													<div class="control-group span3">
														<div class="controls">
															<label class="checkbox">
															<input type="checkbox" value="" /> Yes
															</label>
														</div>
													</div>
												</div>
												<!--end profile-settings-->
												<div class="profile-settings row-fluid">
													<div class="span9">
														<p>Oiusmod high life accusamus terry richardson ad squid wolf fwopo</p>
													</div>
													<div class="control-group span3">
														<div class="controls">
															<label class="checkbox">
															<input type="checkbox" value="" /> Yes
															</label>
														</div>
													</div>
												</div>
												<!--end profile-settings-->
												<div class="space5"></div>
												<div class="submit-btn">
													<a href="#" class="btn green">Save Changes</a>
													<a href="#" class="btn">Cancel</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--end span9-->                                   
						</div>
					</div>
				</div>
				<!--end tab-pane-->
			</div>
		</div>
		<!--END TABS-->
	</div>
</div>
<!-- END PAGE CONTENT-->