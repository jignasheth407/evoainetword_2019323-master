	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Video section
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Video section</li>
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
								<h3 class="box-title">Video section</h3> 
							</div>							
							<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="box-body">
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Title</label>
												<input name="title" class="form-control" type="text" id="title" value="<?php echo $video_details->title; ?>">	
												<?php echo form_error('title', '<span class="text-danger">','</span>');?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>URL</label>
												<input type="text" class="form-control" name="url" value="<?= $video_details->url; ?>">
											</div>
										</div>
										<div class="form-group col-md-2">
											<div class="input text">
												<label>Selected video</label>
												<video controls preload="none" width="150" height="100" style="margin-bottom:5px">
													<source src="<?php echo base_url(); ?>evoai/public/webroot/frontend/videos/<?php echo  $video_details->full_video; ?>"/>   
												</video>
											</div>
										</div>
										<div class="form-group col-md-3">
											<div class="input text">
												<label>Full video</label>
												<input name="full_video" type="file" id="full_video" value="<?php echo set_value('full_video'); ?>">												
												<?php echo form_error('full_video','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>&nbsp;</label>
												<button class="btn btn-success btn-sm" type="submit" name="update" value="Update" >Submit</button>
												<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/premiumVideo">Cancel</a>
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