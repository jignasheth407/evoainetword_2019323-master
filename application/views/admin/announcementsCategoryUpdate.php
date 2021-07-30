<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Category
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/announcements/category">Category</a></li>
			<li class="active">Category update</li>
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
								<a href="<?php echo base_url();?>admin/announcements/category" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div>
						<!-- form start -->
						<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
							<div class="box-body">
							<?php
								foreach($edit_categort as $res)
								{
									?>
										<div class="row">
											<div class="form-group col-md-4">
												<div class="input text">
													<label>Name<span class="text-danger">*</span></label>
													<input name="name" class="form-control" type="text" id="name" value="<?php echo $res->name; ?>" />												
													<?php echo form_error('name','<span class="text-danger">','</span>'); ?>
												</div>
											</div>
										</div>
									<?php
								}
							?>
							</div>	
							<div class="box-footer">
								<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Update">Update</button>
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/announcements/category">Cancel</a>							
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>