	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Admin Access Role
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Admin Access Role</li>
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>
		</div>
		<!-- Main content -->
		<section class="content">                
			<div id="content">
				<div class="row">				
					<div class="col-md-12 column">				
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Admin access role</h3> 
							</div>							
							<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="box-body">
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Name</label>
												<input name="admin_name" readonly class="form-control" type="text" id="admin_name" value="<?php echo $admin_details->admin_name; ?>">	
												<?php echo form_error('admin_name', '<span class="text-danger">','</span>');?>
											</div>
										</div>
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Email</label>
												<input name="admin_email" class="form-control" readonly type="email" id="admin_email" value="<?php echo $admin_details->admin_email; ?>">												
												<?php echo form_error('admin_email','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-10">
											<div class="input text">
												<label>Role</label><br>
												<?php
													$admin_role_arr = unserialize($admin_details->admin_role);
												?>
												<label>
													<input type="checkbox" name="admin_role[]" <?php if(in_array('Blog', $admin_role_arr)){echo 'checked';}?> value="Blog"> Blog
												</label>
												<label>
													<input type="checkbox" name="admin_role[]" <?php if(in_array('Announcement', $admin_role_arr)){echo 'checked';}?> value="Announcement"> Announcement
												</label>
												<label>
													<input type="checkbox" name="admin_role[]" <?php if(in_array('Support', $admin_role_arr)){echo 'checked';}?> value="Support"> Support
												</label>
												<?php echo form_error('admin_role','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>&nbsp;</label>
												<button class="btn btn-success btn-sm" type="submit" name="update" value="Update" >Update</button>
												<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/adminaccessrole">Cancel</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>