	<!--<script src="https://piyolab.github.io/playground/ethereum/web3/v0.20.6/web3.min.js"></script>-->
	<!--<script src="<?php echo base_url('evoai/public/admin/javascripts/web3.min.js');?>"></script>-->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Token Send
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Token Send</li>
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
								<h3 class="box-title">Token Send List</h3> 
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th class="hidden">Token Address</th>
										<th>To Address</th>	
										<th class="hidden">Decimals</th>
										<th>Amount</th>
										<th>Transaction Id</th>
										<th>Date</th>
										<th>Time</th>
										<th>Status</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($token_list) 
											{
												foreach ($token_list as $res)
												{ 
													?>
														<tr> 
															<td class="hidden">
																<?php echo $res->token_address; ?>
															</td>
															<td>
																<?php echo $res->to_address; ?>
															</td>
															<td class="hidden">
																<?php echo $res->decimals; ?>
															</td>
															<td>
																<?php echo $res->amount; ?>
															</td>
															<td>
																<?php echo $res->transaction_id; ?>
															</td>
															<td>
																<?php echo date('d/M/Y', $res->time); ?>
															</td>
															<td>
																<?php echo date('h:i:s', $res->time); ?>
															</td>
															<td>
																<p id="status_<?php echo $res->id; ?>"></p>
																<script>
																	web3.eth.getTransactionReceipt('<?php echo $res->transaction_id; ?>', function (err, receipt) {
																		if (err) {
																			console.log(err);
																		}

																		if (receipt !== null) {
																			// Transaction went through
																			if(receipt.status == '0x0')
																			{
																				$("#status_<?php echo $res->id ?>").html('<span class="btn btn-warning">failure</span>');
																			}
																			else
																			{
																				$("#status_<?php echo $res->id ?>").html('<span class="btn btn-success">succeeded</span>');
																			}
																		} 
																		else {
																			// Try again in 1 second
																			window.setTimeout(function () {
																			getTransactionReceipt('<?php echo $res->transaction_id; ?>');
																			}, 1000);
																		}
																	});
																</script>
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