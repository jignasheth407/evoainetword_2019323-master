<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>               
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-md-10 col-sm-9 col-xs-11 main-dashcontent" id="main">   
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div class="row clearfix mb-70">
						<div class="ref-sec col-md-6 col-sm-6">							
						<label>Referral Link:</label><br>							
							<div class="input-group">
								<input type="text" onclick="copyTextAdd();" class="form-control walletAddress" value="<?php echo base_url();?>registration?e=<?= $links ?>" placeholder="https://www.evoai.network/">
								<span onclick="copyTextAdd();" class="input-group-addon">Copy</span>
							</div>														
						</div>
						<div class="col-md-6 col-sm-6">
							<h3>Total referral Bonus : 
								<?php
									if($bonus_result)
									{
										$userBonus = 0;
										foreach($bonus_result as $bonus_res)
										{
											$userBonus = $userBonus + $bonus_res->bonus_value;
											echo $userBonus;																								
										}
									}
									else
									{
										echo 0.00;
									}
								?>		
							EVOT</h3>
						</div>
					</div>						
					<!-- Referral User -->
					<div class="row clearfix">
						<div class="col-md-6 col-sm-8">
							<div class="table-responsive">
								<table class="table refusers">
									<tr>
										<td align="center"><h2>Referral user</h2></td>
									</tr>
									<tr>
										<td align="center"><h2><?= count($user_list); ?></h2></td>
									</tr>
									<tr>
										<td align="center"><h2>Referrals</h2></td>
									</tr>
								</table>
							</div>
						</div>							
					</div>
					<!--//-->
					<!-- userlist-->
					<div class="row clearfix" id="Evt-calc">
						<div class="col-md-12">
							<h2>Displaying I User</h2>
							<div class="table-responsive mt-20">
								<table class="table table-bordered users-list">
									<thead>
										<tr>
											<th align="center">NAME</th>
											<th align="center">USERNAME</th>
											<th align="center">EMAIL</th>
											<th align="center">REFERRAL BONUS</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if($user_list != '')
											{
												foreach($user_list as $res)
												{
													?>
														<tr>
															<td>
																<?= $res->username ?>
															</td>
															<td>
																<?php
																	$user_name = explode('@', $res->email );
																	echo $user_name[0];
																?>
															</td>
															<td>
																<?= $res->email ?>
															</td>
															<td>
																<?php
																	if($bonus_result)
																	{
																		$userBonuss = 0;
																		foreach($bonus_result as $bonus_res)
																		{
																			if($res->id == $bonus_res->user_id)
																			{
																				$userBonuss = $userBonuss + $bonus_res->bonus_value;
																				echo $userBonuss;																								
																			}
																		}
																	}
																?>	
															</td>
														</tr>
													<?
												}
											}
											else
											{	
												?>
													<tr>
														<td colspan="4">
															No record available
														</td>
													</tr>
												<?
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!--//-->
				</div>
				<!-- /main -->
			</div>
		</div>
	</section>
</div>
<script>
	/* ref_bonus_count */
	$(function() {
		$("#ref_bonus_count").text(sumColumn(4));
	});

	function sumColumn(index) {
		var total = 0;
		$("td:nth-child(" + index + ")").each(function() {
			total += parseFloat($(this).text(), 10) || 0;
		});  
		total = (total * 5/100).toFixed(2);
		return total;
	}
</script>