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
					<div class="col-md-12">				
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
												<input name="admin_name" class="form-control" type="text" id="admin_name" value="<?php echo set_value('admin_name'); ?>">	
												<?php echo form_error('admin_name', '<span class="text-danger">','</span>');?>
											</div>
										</div>
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Email</label>
												<input name="admin_email" class="form-control" type="email" id="admin_email" value="<?php echo set_value('admin_email'); ?>">												
												<?php echo form_error('admin_email','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Password</label>
												<input name="admin_password" class="form-control" type="password" id="admin_password" value="<?php echo set_value('admin_password'); ?>">	
												<?php echo form_error('admin_password', '<span class="text-danger">','</span>');?>
											</div>
										</div>
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Confirm password</label>
												<input name="confirm_password" class="form-control" type="password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>">												
												<?php echo form_error('confirm_password','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-10">
											<div class="input text">
												<label>Role</label><br>
												<label>
													<input type="checkbox" name="admin_role[]" value="Blog"> Blog
												</label>
												<label>
													<input type="checkbox" name="admin_role[]" value="Announcement"> Announcement
												</label>
												<label>
													<input type="checkbox" name="admin_role[]" value="Support"> Support
												</label>
												<?php echo form_error('admin_role','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>&nbsp;</label>
												<button class="btn btn-success btn-sm" type="submit" name="submit" value="Submit" >Submit</button>
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