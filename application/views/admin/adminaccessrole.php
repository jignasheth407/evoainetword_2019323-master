	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Admin access role
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Admin access role</li>
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
								<h3 class="box-title">Admin Access Role Details</h3> 
								<div class="box-tools pull-right">
									<a href="<?php echo base_url();?>admin/adminaccessrole/adminrole" title="Add Admin role" class="btn btn-info btn-sm">Add New</a>
								</div>
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th>Username</th>
										<th>Email</th>	
										<th>Role</th>
										<th>Status</th>	
										<th>Action</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($admin_list) 
											{
												foreach ($admin_list as $row)
												{ 
													if($row->admin_id != 1 && $row->admin_id != 2) 
													{
														?>
															<tr> 
																<td>
																	<?php echo $row->admin_username; ?>
																</td>
																<td>
																	<?php echo $row->admin_email; ?>
																</td>
																<td width="30%">
																	<?php echo implode(', ',(unserialize($row->admin_role))); ?>
																</td>
																<td width="10%">
																	<a href="#" id="active_<?php echo $row->admin_id;?>" <?php if($row->admin_active_inactive != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->admin_id;?>,'<?php echo base_url();?>admin/adminaccessrole/setStatus','0')">
																		<button class="btn btn-sm btn-success">ON</button>
																		<button class="btn btn-sm btn-default">OFF</button>
																	</a>
																	<a href="#" id="inactive_<?php echo $row->admin_id;?>" <?php if($row->admin_active_inactive != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->admin_id;?>,'<?php echo base_url();?>admin/adminaccessrole/setStatus','1')">
																		<button class="btn btn-sm btn-default">ON</button>
																		<button class="btn btn-sm btn-success">OFF</button>
																	</a>
																</td>
																<td width="10%">	
																	<a href="<?php echo base_url();?>admin/adminaccessrole/adminrole/<?php echo $row->admin_id; ?>" title="Edit">
																		<i class="fa fa-edit fa-2x text-primary"></i>
																	</a>&nbsp;&nbsp;	
																	<a class="confirm" onclick="return delete_detail('admin/adminaccessrole/delete_detail/<?php echo $row->admin_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger"></i></a>	
																</td>
															</tr>  										
														<?php														
													}
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