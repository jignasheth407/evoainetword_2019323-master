	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Users
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Users</li>
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
								<h3 class="box-title">User details</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th>Username</th>
										<th>Email</th>	
										<th>ETH address</th>
										<th>Referral by</th>
										<th>Details</th>
										<th>Google two factor</th>
										<th>Login Status</th>	
										<th>Action</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($user_list) 
											{
												foreach ($user_list as $row)
												{ 
													?>
														<tr> 
															<td width="10%">
																<?php echo $row->username; ?>
															</td>
															<td width="10%">
																<?php echo $row->email; ?>
															</td>
															<td>
																<?php echo $row->eth_address; ?>
															</td>															
															<td width="10%">	
																<?php
																	$users_list = $this->db->select('username')->get_where('users', array('user_referral_code'=>$row->user_referenced_code))->row();
																	if($users_list)	
																	{	
																		echo $users_list->username;		
																	}
																?>
															</td>
															<td width="5%">
																<a href="<?php echo base_url(); ?>admin/users/userDetails?e=<?= $row->id ?>">details</a>
															</td>
															<td width="10%">
																<?php	
																	if($row->sign_in == 1)	
																	{	
																		
																		?>
																			<span style="cursor:pointer" onClick="disabledGoogleAuth('<?php echo $row->id; ?>');" id="google_auth">On</span>
																		<?php
																	}	
																	else	
																	{	
																		echo 'Off';	
																	}	
																?>	
															</td>
															<td width="13%">
																<a href="#" id="active_<?php echo $row->id;?>" <?php if($row->active != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/users/setStatus','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->id;?>" <?php if($row->active != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/users/setStatus','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>
															<td width="5%">	
																<a class="confirm" onclick="return delete_detail('admin/users/delete_detail/<?php echo $row->id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
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