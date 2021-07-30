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
					<div class="col-md-12 column">				
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Video section</h3> 
								<div class="box-tools pull-right">
									<a href="<?php echo base_url();?>admin/premiumVideo/videoSection" title="Add video" class="btn btn-info btn-sm">Add New</a>
								</div>
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th>Title</th>
										<th>Video/URL</th>	
										<th>Status</th>	
										<th>Action</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($video_list) 
											{
												foreach ($video_list as $row)
												{ 
													?>
														<tr> 
															<td>
																<?php echo $row->title; ?>
															</td>
															<td>
																<?php
																	if($row->full_video != '')
																	{
																		?>
																			<video width="100" height="100" class="embed-responsive-item" poster="<?php echo base_url(); ?>evoai/public/webroot/frontend/videos/<?php echo  $row->full_video; ?>" controls="">
																				<source src="<?php echo base_url(); ?>evoai/public/webroot/frontend/videos/<?php echo  $row->full_video; ?>" type="video/mp4">
																			</video>
																		<?php
																	}
																	else
																	{
																		echo $row->url;
																	}
																?>
															</td>
															<td width="10%">
																<a href="#" id="active_<?php echo $row->id;?>" <?php if($row->status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/premiumVideo/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->id;?>" <?php if($row->status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/premiumVideo/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>
															<td width="10%">	
																<a href="<?php echo base_url();?>admin/premiumVideo/videoSection/<?php echo $row->id; ?>" title="Edit">
																	<i class="fa fa-edit fa-2x text-primary"></i>
																</a>&nbsp;&nbsp;	
																<a class="confirm" onclick="return delete_detail('admin/premiumVideo/delete_detail/<?php echo $row->id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger"></i></a>	
															</td>
														</tr>  										
													<?php	
												} 
											}
											else 
											{
												?>
													<tr>
														<td colspan="10">No Records Found</td>
													</tr>
												<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</div>