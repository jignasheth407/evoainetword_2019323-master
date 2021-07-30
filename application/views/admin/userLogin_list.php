	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Login details
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Users list</li>
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
								<h3 class="box-title">User login details</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th>IP</th>
										<th>Email</th>	
										<th>Date</th>
										<th>Time</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($userLogin_list) 
											{
												foreach ($userLogin_list as $res)
												{ 
													?>
														<tr> 
															<td>
																<?php echo $res->IP_address; ?>
															</td>
															<td>
																<?php echo $res->user_email; ?>
															</td>
															<td>
																<?php echo date('d/M/Y', $res->date_time); ?>
															</td>
															<td>
																<?php echo date('h:i:s a', $res->date_time); ?>
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