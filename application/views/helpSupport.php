<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>               
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-sm-9 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div class="row clearfix mt-20" id="Evt-calc">
						<div class="col-md-12">
							<h2>Displaying Support Tickets</h2>
							<div class="table-responsive mt-20">
								<table class="table table-bordered users-list">
									<thead>
										<tr>
											<th align="center">TICKET ID</th>
											<th align="center">SUBJECT</th>
											<th align="center">STATUS</th>
											<th align="center">DETAILS</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if($support_list != '')
											{
												foreach($support_list as $res)
												{
													?>
														<tr>
															<td align="center">00<?= $res->id ?></td>
															<td align="center"><?= $res->subject ?></td>
															<td align="center">
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
															<td align="center"><a class="font-white" href="<?php echo base_url(); ?>helpSupport/ticketDetails?t=<?= $res->id ?>">details</a></td>
														</tr>														
													<?php
												}
											}
											else
											{
												?>
													<tr>
														<td colspan="4">No record found</td>
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
				<!-- /main -->
			</div>
		</div>
	</section>
</div>