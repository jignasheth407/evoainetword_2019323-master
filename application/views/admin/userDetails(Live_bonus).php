	<div class="content-wrapper">
		<script>
			var user_bonus_arr = Array();
		</script>
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
								<h3 class="box-title">Account: <?= $user_result->username ?></h3> 
							</div>							
							<div class="box-body">
								<div class="nav-tabs-custom">
									<ul class="nav nav-tabs">
										<li id="Details" class="active">
											<a href="#tab_1" data-toggle="tab">
												<strong>Details</strong>
											</a>
										</li>
										<li id="Referral" >
											<a href="#tab_2" data-toggle="tab">
												<strong>Referral</strong>
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Details tab -->
										<div class="tab-pane active" id="tab_1">
											<div class="box-body">
												<div class="row">
													<div class="form-group col-md-6">
														<div class="input text">
															<label>Username</label>
															<input name="username" readonly class="form-control number-only"  type="text" id="username" value="<?= $user_result->username ?>">												
														</div>
													</div>
													<div class="form-group col-md-6">
														<div class="input text">
															<label>Email</label>
															<input name="email" readonly class="form-control number-only" type="text" id="email" value="<?= $user_result->email ?>">												
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<div class="input text">
															<label>Reference by</label>
															<input name="refence_by" readonly class="form-control"  type="text" id="refence_by" value="<?= @$refence_by->username; ?>">												
														</div>
													</div>
													<div class="form-group col-md-6">
														<div class="input text">
															<label>ETH address</label>
															<input name="eth_address" readonly class="form-control number-only" type="text" id="eth_address" value="<?= $user_result->eth_address ?>">												
														</div>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<div class="input text">
															<label>EVOT Balance</label>
															<input type="text" readonly class="form-control" id="evot_balance" value="0.00">
														</div>
													</div>
													<div class="form-group col-md-3">
														<div class="input text">
															<label>	Beta role</label>
															<p><input type="checkbox" <?php echo ($user_result->beta_role == 1)?'checked':'';?> id="beta_version" onChange="setBetaVersion(this)"> &nbsp; Beta version enable</p>
														</div>
													</div>
													<div class="form-group col-md-3">
														<div class="input text">
															<label>	All access</label>
															<p><input type="checkbox" <?php echo ($user_result->super_role == 1)?'checked':'';?> id="super_role" onChange="setSuperVersion(this)"> &nbsp; All access enable</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!--//-->
										<!-- Details tab -->
										<div class="tab-pane" id="tab_2">
											<div class="box-body">
												<table id="example1" class="table table-bordered table-striped">
													<thead>
														<tr>
															<th>Username</th>
															<th>Coin</th>
															<th>Bonus</th>
															<th>Paid bonus</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>	
														<?php 
															if($referral_list)
															{
																foreach($referral_list as $res)
																{ 
																	?>
																		<tr>
																			<td><?= $res->username ?></td>
																			<td>
																				<script>
																					var eth_add = '<?= $res->eth_address ?>';																					
																					var web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/baf22b6c2cd84003aa418a653eacecfa"));
																					if(eth_add)
																					{
																						let tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";
																						let walletAddress = "<?= $res->eth_address ?>";
																						let bonus_value = '<?php echo @$evot_details->bonus; ?>';
																						
																						// The minimum ABI to get ERC20 Token balance
																						let minABI = [
																						  // balanceOf
																						  {
																							"constant":true,
																							"inputs":[{"name":"_owner","type":"address"}],
																							"name":"balanceOf",
																							"outputs":[{"name":"balance","type":"uint256"}],
																							"type":"function"
																						  },
																						  // decimals
																						  {
																							"constant":true,
																							"inputs":[],
																							"name":"decimals",
																							"outputs":[{"name":"","type":"uint8"}],
																							"type":"function"
																						  }
																						];

																						// Get ERC20 Token contract instance
																						let contract = web3.eth.contract(minABI).at(tokenAddress);

																						// Call balanceOf function
																						contract.balanceOf(walletAddress, (error, balance) => {
																						  // Get decimals
																						  contract.decimals((error, decimals) => {
																							// calculate a balance
																							balance = balance.div(10**decimals);
																							var user_balance = balance;
																							var ref_bonus = (user_balance * bonus_value/100).toFixed(2);
																							$("#coin_<?= $res->id ?>").text(user_balance);
																							$("#code_<?= $res->id ?>").text(ref_bonus);
																							//$("#user_bonus_<?= $res->id ?>").val(ref_bonus);
																							user_bonus_arr.push(ref_bonus+'_'+<?= $res->id ?>);
																						  });
																						});																						
																					}
																					$("#user_bonus_arr").val(user_bonus_arr);
																				</script>																				
																				<span id="coin_<?= $res->id ?>">0.00</span>																				
																			</td>																																																								
																			<td>
																				<span class="ref_bonus_count" id="code_<?= $res->id ?>">0.00</span>																				
																			</td>																																								
																			<td>
																				<?php
																					if($bonus_result)
																					{
																						foreach($bonus_result as $bonus_res)
																						{
																							if($bonus_res->referal_user_id == $res->id)
																							{
																								?>
																									<span id="old_bonus_<?= $res->id ?>">
																										<?= $bonus_res->user_bonus ?>
																									</span>
																								<?php
																							}
																						}
																					}
																				?>																																									
																			</td>
																			<td>
																				<span class="btn btn-info" data-toggle="modal" data-target="#payNow" onclick="getValue_bonus(<?php echo $res->id; ?>,'<?= $res->email ?>');">Pay now</span>	
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
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th width="40%">Total bonus</th>
															<th width="35%"><span id="ref_bonus_count"></span></th>
															<th width="25%"><span class="btn btn-success" data-toggle="modal" data-target="#payNowTotal"> &nbsp;&nbsp;Pay now</span></th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
										<!--//-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Modal -->
		<div class="modal fade" id="payNow" role="dialog">
			<div class="modal-dialog">			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Pay now</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<span class="text-danger hidden required"> * Fill all are required fields</span>
							<div class="row">
								<div class="form-group col-md-6">
									<div class="input text">
										<label>Amount<span class="text-danger">*</span></label>
										<input name="user_bonus" class="form-control number-only" value="0.00" type="text" id="user_bonus">												
										<input name="referal_user_id" class="form-control number-only" type="hidden" id="referal_user_id">												
										<input name="referal_user_email" class="form-control number-only" type="hidden" id="referal_user_email">												
										<input name="user_id" class="form-control number-only" value="<?= $user_result->id ?>" type="hidden" id="user_id">												
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="input text">
										<label>Transaction ID<span class="text-danger">*</span></label>
										<input name="transaction_id" class="form-control" type="text" id="transaction_id">										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" onClick="payNow_bonus();" class="btn btn-success">PayNow</button>
					</div>
				</div>			  
			</div>
		</div>
		<!-- Totla bonus Modal -->
		<div class="modal fade" id="payNowTotal" role="dialog">
			<div class="modal-dialog">			
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Pay now</h4>
					</div>
					<div class="modal-body">
						<div class="box-body">
							<span class="text-danger hidden required"> * Fill all are required fields</span>
							<div class="row">
								<div class="form-group col-md-6">
									<div class="input text">
										<label>Amount<span class="text-danger">*</span></label>
										<input name="total_user_bonus" class="form-control number-only" readonly type="text" id="total_user_bonus">													
										<input name="select_user_id" class="form-control number-only" value="<?= $user_result->id ?>" type="hidden" id="select_user_id">												
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="input text">
										<label>Transaction ID<span class="text-danger">*</span></label>
										<input name="all_transaction_id" class="form-control" type="text" id="all_transaction_id">										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" onClick="payNow_totalBonus();" class="btn btn-info">PayNow</button>
					</div>
				</div>			  
			</div>
		</div>
	</div>
	
	<script>
		/* ref_bonus_count */
		$(function() {
			$("#ref_bonus_count").text(sumColumn());
		});
		setInterval(function () {
		  sumColumn();
		}, 300);
		function sumColumn() {
			var sum = 0;
			$(".ref_bonus_count").each(function(){
				sum += parseFloat($(this).text());
			});
			sum = (sum).toFixed(2);
			$("#ref_bonus_count").text(sum);
			$("#total_user_bonus").val(sum);
			//return sum;
		}
	
		function getValue_bonus(referal_user_id, referal_user_email)
		{
			$("#referal_user_id").val(referal_user_id);
			$("#referal_user_email").val(referal_user_email);
			var old_bonus = $.trim($("#old_bonus_"+referal_user_id).text());
			if(old_bonus)
			{
				$("#user_bonus").val(old_bonus);				
			}
		}
		
		function payNow_bonus()
		{
			var user_id = $("#user_id").val();
			var user_bonus = $("#user_bonus").val();
			var referal_user_id = $("#referal_user_id").val();
			var referal_user_email = $("#referal_user_email").val();
			var s_user_email = '<?= $user_result->email ?>';
			var transaction_id = $("#transaction_id").val();
			if(user_id == '' || user_bonus == '' || referal_user_id == '' || transaction_id == '')
			{
				$('.required').removeClass('hidden');
				return false;
			}
			else
			{				
				$('.required').addClass('hidden');
				var dataString = 'user_id='+user_id+'&user_bonus='+user_bonus+'&referal_user_id='+referal_user_id+'&transaction_id='+transaction_id+'&referal_user_email='+referal_user_email+'&s_user_email='+s_user_email;
				$.ajax({
					url: '<?php echo base_url(); ?>admin/users/payNow_bonus',
					type: 'post',
					data: dataString,
					success: function(result){
						$('#payNow').modal('toggle');
						location.reload();
					}
				});
			}
		}
		
		/* Submit all user bounus */
		function payNow_totalBonus()
		{
			var selecy_user_id = '<?= $user_result->id ?>';
			var all_user_bonus = $("#total_user_bonus").val();
			var all_transaction_id = $("#all_transaction_id").val();
			//var user_bonus_arr = [$(".user_bonus_arr").val()];
			//var bonus_array = JSON.parse("[" + user_bonus_arr + "]");
			var bonus_array = user_bonus_arr;
			//var bonus_array = JSON.parse(user_bonus_arr);
			//console.log(user_bonus_arr);
			if(selecy_user_id == '' || all_user_bonus == '' || all_transaction_id == '')
			{
				alert('Please fill all required fields');
				$('#payNowTotal').modal('toggle');
				return false;
			}
			else
			{
				var dataString = 'selecy_user_id='+selecy_user_id+'&all_user_bonus='+all_user_bonus+'&all_transaction_id='+all_transaction_id+'&user_bonus_arr='+bonus_array;
				//alert(dataString);
				$.ajax({
					url: '<?php echo base_url(); ?>admin/users/payNow_totalBonus',
					type: 'post',
					data: dataString,
					datatype: 'json',
					success: function(result){
						$('#payNowTotal').modal('toggle');
						location.reload();
					}
				});
			}
		}
		
		web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/baf22b6c2cd84003aa418a653eacecfa"));
		var eth_address = '<?= $user_result->eth_address ?>';
		if(eth_address)
		{
			let tokenAddress1 = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";
			let walletAddress1 = "<?= $user_result->eth_address ?>";
			
			// The minimum ABI to get ERC20 Token balance
			let minABI = [
				// balanceOf
				{
					"constant":true,
					"inputs":[{"name":"_owner","type":"address"}],
					"name":"balanceOf",
					"outputs":[{"name":"balance","type":"uint256"}],
					"type":"function"
				},
				// decimals
				{
					"constant":true,
					"inputs":[],
					"name":"decimals",
					"outputs":[{"name":"","type":"uint8"}],
					"type":"function"
				}
			];

			// Get ERC20 Token contract instance
			let contract = web3.eth.contract(minABI).at(tokenAddress1);

			// Call balanceOf function
			contract.balanceOf(walletAddress1, (error, balance) => {
				// Get decimals
				contract.decimals((error, decimals) => {
				// calculate a balance
				balance = balance.div(10**decimals);
				var evot_balance = balance;
					$("#evot_balance").val(evot_balance);
				});
			});
		}
		
		/* setBetaVersion */
		function setBetaVersion(checkboxElem)
		{
			var userBeta_val = '';
			var user_id = '<?= $user_result->id ?>';
			if (checkboxElem.checked) {
				userBeta_val = 1;
			} else {
				userBeta_val = 0;
			}
			var dataString = 'userBetaVersion='+userBeta_val+'&user_id='+user_id;
			$.ajax({
				url : '/admin/users/setBetaVersion',
				type: 'POST',
				data: dataString,
				cache: false,
				success: function(response)
				{
					if(response)
					{
						alert(response);
					}
				}
			});
		}
		/* setSuperVersion */
		function setSuperVersion(checkboxElem)
		{
			var userSuper_val = '';
			var user_id = '<?= $user_result->id ?>';
			if (checkboxElem.checked) {
				userSuper_val = 1;
			} else {
				userSuper_val = 0;
			}
			var dataString = 'userSuperVersion='+userSuper_val+'&user_id='+user_id;
			$.ajax({
				url : '/admin/users/setSuperVersion',
				type: 'POST',
				data: dataString,
				cache: false,
				success: function(response)
				{
					if(response)
					{
						alert(response);
					}
				}
			});
		}
	  </script>