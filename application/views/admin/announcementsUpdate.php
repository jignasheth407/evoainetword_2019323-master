<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Announcements
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/announcements">Announcements</a></li>
			<li class="active">Announcements update</li>
		</ol>
	</section>
	<div>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
		</div>	
	</div>
	<!-- Main content -->
	<section class="content">                
		<div id="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Announcements details</h3> 
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/announcements" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div>
						<!-- form start -->
						<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
							<?php
								foreach($announcements_details as $res)
								{
									?>
										<div class="row">
											<div class="form-group col-md-4">
												<div class="input text">
													<label>Title<span class="text-danger">*</span></label>
													<input name="announcements_title" class="form-control" type="text" id="announcements_title" value="<?php echo $res->announcements_title; ?>" />												
													<?php echo form_error('announcements_title','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-4">
												<div class="input text">
													<label>Category<span class="text-danger">*</span></label>
													<select  name="announcements_category" class="form-control" id="announcements_category">
														<option value="">--- Select category ---</option>
														<?php 
															foreach($category_list as $cres)
															{
																?>
																	<option value="<?php echo $cres->name; ?>" <?php echo ($cres->name == $res->announcements_category)?'selected':'';?>><?php echo $cres->name; ?></option>
																<?php
															}
														?>
													</select>
													<?php echo form_error('announcements_category','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-2">
												<div class="input text">
													<label>Start date<span class="text-danger">*</span></label>
													<input name="announcements_start_date" class="form-control" type="text" id="announcements_start_date" value="<?php echo $res->announcements_start_date; ?>" />												
													<?php echo form_error('announcements_start_date','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
											<div class="form-group col-md-2">
												<div class="input text">
													<label>End date<span class="text-danger">*</span></label>
													<input name="announcements_end_date" class="form-control" type="text" id="announcements_end_date" value="<?php echo $res->announcements_end_date; ?>" />												
													<?php echo form_error('announcements_end_date','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-12">
												<div class="input text">
													<label>Description<span class="text-danger">*</span></label>
													<textarea name="announcements_description" cols="12" rows="10" class="form-control" id="announcements_description"><?php echo $res->announcements_description; ?></textarea>												
													<?php echo form_error('announcements_description','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
										</div>
									<?php
								}
							?>
							</div>	
							<div class="box-footer">
								<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Update">Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/announcements">Cancel</a>							
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>