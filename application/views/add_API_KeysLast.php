<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>               
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-sm-9 col-md-10 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>									
					<div class="row clearfix mb-70">
						<div class="form-group">
							<ul class="post-list-items client-news">
								<?php
									if($announcements_details != '')
									{
										foreach($announcements_details as $res)
										{
											if($res->announcements_category == 'Customers Announcement')
											{
												if($res->announcements_start_date <= date('Y-m-d') )
												{
													if($res->announcements_end_date > date('Y-m-d') )
													{
														?>
															<li>
																<h3 class="post-title">
																	<a href="<?php echo base_url(); ?>announcements/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><?php echo $res->announcements_title; ?></a>
																</h3>
																<p class="date"><?php echo $res->created_date; ?></p> 
																<p class="sdescr"><?php echo substr($res->announcements_description, 0, 500).'...........'; ?><a href="<?php echo base_url(); ?>announcements/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><strong>Read More</strong></a></p>
															</li>
														<?															
													}
												}												
											}
										}
									}
									else
									{	
										?>
											<li>
												No record available
											</li>
										<?
									}
								?>
							</ul>
						</div>	
					</div>	
				</div>
				<!-- /main -->
			</div>
		</div>
	</section>
</div>