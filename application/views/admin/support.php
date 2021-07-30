	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Support
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Support</li>
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
								<h3 class="box-title">Support details</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Username</th>  
											<th>Email</th>  
											<th>Subject</th>  
											<th>Message</th>  
											<th>Ticket</th>  
											<th>Status</th>  
											<th>Action</th>  
										</tr>  			
									</thead>
									<tbody>	
										<?php 
											if($support_list)
											{
												foreach($support_list as $res)
												{ 
													?>
														<tr>
															<td width="10%"><?= $res->username ?></td>
															<td width="13%"><?= $res->email ?></td>
															<td width="10%"><?= $res->subject ?></td>
															<td><?= substr($res->message,0,100).' ...' ?></td>
															<td>
																<a href="<?php echo base_url(); ?>admin/support/supportChat?e=<?= $res->s_id; ?>">00<?= $res->s_id ?></a>
															</td>
															<td>
																<?php 
																	if($res->status == 0)
																	{
																		echo 'Pending';
																	}
																	else
																	{
																		echo 'Complete';
																	}
																?>
															</td>
															<td>			
																<a class="confirm" onclick="return delete_detail('admin/support/delete_detail/<?php echo $res->s_id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
															</td>
														</tr>
													<?php
												}
											}
											else
											{
												?>
													<tr>
														<td colspan="7">No Records Found</td>
													</tr>	
												<?php
											}
										?>
									</tbody>
								</table>
							</div><!-- /.box-body -->
							<!-- /.box -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>