	<script>
		/* Admin EVOT balance */
		function userEVOT_balance()
		{			
			let tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";
			let walletAddress = "0xC2388d0c7eF1E679FacA4965a18fb0D2e43D6d94";
			let minABI = [
				{"constant":true,"inputs":[{"name":"_owner","type":"address"}],"name":"balanceOf","outputs":[{"name":"balance","type":"uint256"}],"type":"function"},
				{"constant":true,"inputs":[],"name":"decimals","outputs":[{"name":"","type":"uint8"}],"type":"function"}
			];
			let contract = web3.eth.contract(minABI).at(tokenAddress);
			contract.balanceOf(walletAddress, (error, balance) => {
			contract.decimals((error, decimals) => {
				balance = balance.div(10**decimals);
				console.log(balance.toString());
					$("#evotbal").text(balance);
				});
			});
		}		
		userEVOT_balance();
	</script>
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
				<li class="active">Tokent</li>
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
								<h3 class="box-title text-center">EVOAI token mass sending feature</h3> 
							</div>	
							<div class="box-body">
								<div class="row">
									<div class="form-group col-md-12">
										<p>Available tokens - <b id="evotbal"></b></p>
										<ul class="list-unstyled">
											<li>1. Max recommended addressess per transaction - 150</li>
											<li>2. Paste the addressess and amounts</li>
											<li>3. Separate the items with a comma, as in the example</li>
											<li>4. Length of receivers and amounts should be equal</li>
										</ul>
									</div>
								</div>
								<div class="row hidden">
									<div class="form-group col-md-5">
										<div class="input text">
											<label>Token Address [0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1]</label>
											 <input type="text" id="token-address" size="80" value="0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1" oninput="onAddressChange()" class="form-control"/>
										</div>
									</div>
									<div class="form-group col-md-5">
										<div class="input text">
											<label>Decimals</label>
											<input type="number" id="decimals" size="40" readonly value="18" class="form-control" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-5">
										<div class="input text">
											<label>Receivers <sub class="text-info">[Separate by comma(,)]</sub></label>
											<!--<input type="text" id="to-address" size="80" class="form-control"></input>-->
											<textarea id="receivers" class="form-control" rows="5" placeholder="Separate by comma(,)"></textarea>
										</div>
									</div>
									<div class="form-group col-md-5">
										<div class="input text">
											<label>Amounts<sub class="text-info">[Separate by comma(,)]</sub></label>
											<!--<input type="number" id="amount" size="40" class="form-control"></input>-->
											<textarea id="amounts" class="form-control" rows="5" placeholder="Separate by comma(,)"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label>Result</label>
										<table id="txTable" class="table table-bordered table-striped">
											<thead>	
												<tr>
													<th>SN.</th>
													<td>TxHash</td>
													<td>Users</td>
													<td>Amount</td>
												</tr>
											</thead>	
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<button id="submit" class="btn btn-primary btn-lg col-md-12">Submit</button>
									</div>
								</div>
							</div><hr>
							<!-- Transaction //-->							
							<h3 class="box-title text-center">Transaction</h3> 
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>	
										<th>ID</th>
										<th>TxHash</th>
										<th>Tokens Amount</th>
										<th>Status</th>										
									</tr>		
									</thead>
									<tbody>									
										<?php 
											$ii = 0;
											if($token_list) 
											{												
												foreach ($token_list as $res)
												{ 
													?>
														<tr> 
															<td>
																<?php echo $ii++; ?>
															</td>
															<td>																
																<a href="https://etherscan.io/tx/<?= $res->transaction_id ?>" target="_blank"><?php echo $res->transaction_id; ?></a>
															</td>
															<td>
																<?php echo $res->amount; ?>
															</td>															
															<td>
																<span class="text-info">Success</span>
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
	<script>								
		$(window).on("load", function(){
			if (typeof web3 !== 'undefined') {
				window.web3 = new Web3(web3.currentProvider);
			} else {
				web3 = new Web3(new Web3.providers.HttpProvider("https://etherscan.io/")); // To change
			}

			console.log(web3.version);

			let tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1", // To change
				ownerAddress = "0xB5869587CA6E239345f75C28d3b8Ee23da812759", // To change
				airdropAddress = "0x94080Ed2F72967554D2a6Bf1DD6f678e498DdB29", // To change
				mainAbi = [
					{
						"constant": false,
						"inputs": [
							{
								"name": "_addresses",
								"type": "address[]"
							},
							{
								"name": "_values",
								"type": "uint256[]"
							}
						],
						"name": "doAirdrop",
						"outputs": [
							{
								"name": "",
								"type": "uint256"
							}
						],
						"payable": false,
						"stateMutability": "nonpayable",
						"type": "function"
					},
					{
						"constant": true,
						"inputs": [
							{
								"name": "owner",
								"type": "address"
							},
							{
								"name": "spender",
								"type": "address"
							}
						],
						"name": "allowance",
						"outputs": [
							{
								"name": "",
								"type": "uint256"
							}
						],
						"payable": false,
						"stateMutability": "view",
						"type": "function"
					}
				],
				tokenInstance = web3.eth.contract(mainAbi).at(tokenAddress),
				contractInstance = web3.eth.contract(mainAbi).at(airdropAddress),
				transactions = JSON.parse(localStorage.getItem("transactions")),
				allowance = 0,
				getAllowance = new Promise((resolve, reject) => {
					tokenInstance.allowance(ownerAddress, airdropAddress, (error, result) => {
						if(!error)
							resolve(result)
						else
							return reject(e)
					})
				});

			$.ready.then(function(){
				// Show allowance in DOM
				showAllowance = (amount) => {
					$('#allowance').text(amount > 0 ? amount : '0. (Please allow more tokens for ' + airdropAddress + ' contract.)');
				}

				showTransactions = (data) => {
					$("#txTable tbody").empty();
					data.forEach(function(value, i) {
						$("#txTable tbody").append('<tr scope="row"><th>' + i + '</th><td><a href="https://etherscan.io/tx/'+ value.txHash +'" target="_blank">' + value.txHash + '<a/></td><td>' + value.users + '</td><td>' + value.amount + '</td></tr>');						
					})
				}

				if (localStorage.getItem("transactions") === null) {
					localStorage.setItem("transactions", JSON.stringify([]));
				} else {
					showTransactions(transactions);
				}

				// Resolving allowance promise
				getAllowance.then((val) => {
					allowance = web3.fromWei( Number(val), 'ether');
					showAllowance(allowance);
				})

				$('#submit').on('click', () => {
					startAirdrop();
				});

				startAirdrop = () => {
					let totalAmount = 0,
						validationPassed = true,
						receivers = [],
						amounts = [];

					// Replacing and creating 'receivers' array
					$('#receivers').val().split(',').forEach((value, i) => {
						if (/\S/.test(value)) {
							value = value.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');

							// Checksuming the addresses
							value = web3.toChecksumAddress(value);

							// Checking if address is valid
							if(web3.isAddress(value)) {
								receivers.push(value);
							} else {
								alert('Founded wrong ETH address, please check it \n\n' + value);
								validationPassed = false;
							}
						}
					});

					// Replacing and creating 'amounts' array
					$('#amounts').val().split(',').forEach((value, i) => {
						if (/\S/.test(value)) {
							value = value.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
							value = parseInt(value);

							// Checking if there is 0 in amounts, cause transaction with 0 amount does not make sense
							if(value !== 0) {
								amounts.push(value);
							} else {
								alert('Founded  number 0 in amounts, please remove it');
								validationPassed = false;
							}
						}
					})

					// Checking arrays length and validities
					if(receivers.length < 1 || amounts.length < 1 || receivers.length != amounts.length) {
						alert('Receivers and/or values has an issue, please check it again');
						validationPassed = false;
					}

					if (!validationPassed) return;

					// Calculating total sum of 'amounts' array items
					amounts.forEach((value, i) => {
						totalAmount += value;
					})

					// If allowance tokens more than amounts sum then continue
					if(allowance >= totalAmount) {

						// Calling the method from airdrop smart contract
						contractInstance.doAirdrop(receivers, amounts, (error, result) => {
							if(!error) {
								allowance -= totalAmount;
								showAllowance(allowance);

								let newTransaction = {
									txHash: result,
									users: receivers.length,
									amount: totalAmount
								}
								
								var dataString = 'token_address='+tokenAddress+'&to_address='+receivers+'&amount='+amounts+'&transaction_id='+result;
								$.ajax({
									url : '<?php echo base_url()?>admin/tokenSend/dataStored',
									type : 'POST',
									data : dataString,
									cache : false,
									success : function(responce)
									{
										userEVOT_balance();
									}
								});

								transactions.push(newTransaction);
								localStorage.setItem("transactions", JSON.stringify(transactions));
								showTransactions(transactions);
							}
							else
								alert(error);
						})
					}
					else
						alert('You havent enough tokens for airdrop'); 
				}
			});
		})
	</script>
	