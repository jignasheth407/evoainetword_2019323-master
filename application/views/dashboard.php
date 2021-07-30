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
					<div id="main_countdown" class="row clearfix mb-70">
						<!---->
						<div class="col-md-4 col-sm-6 padL0">
							<div class="box-shadow dash-box">
								<div class="table-responsive">
									<table class="table table-sale">
										<tbody>
											<tr>
												<td width="40%"> ROUND 6 </td>
												<td width="40"><span class="bckg">&nbsp;</span></td>
												<td width="20%">$1.05</td>
											</tr>
											<tr>
												<td> ROUND 5 </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.95</td>
											</tr>
											<tr>
												<td> ROUND 4 </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.85</td>
											</tr>
											<tr>
												<td> ROUND 3 </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.75</td>
											</tr>
											<tr>
												<td> ROUND 2 </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.65</td>
											</tr>
											<tr class="pre-soldbfore">
												<td> ROUND 1 </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.55</td>
											</tr>
											<tr>
												<td> PRESALE </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.45</td>
											</tr>
											<tr>
												<td> PRIVATE </td>
												<td><span class="bckg">&nbsp;</span></td>
												<td>$0.35</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!--//-->
						<!---->
						<div class="col-md-4 col-sm-6">
							<div class="box-shadow dash-box countdown countdown-default">
								<h2 class="text-center"><span>ICO ROUND 1</span></h2>
								<div class="countdown-time" data-time="2018/10/10 21:00:00">									
								</div>
							</div>							
						</div>
						<!--//-->
						<div class="col-md-4 col-sm-6">
							<div class="box-shadow dash-box"> 
                            	<div class="tm"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/powered-evoai.png" class="pull-right" width="65" /></div>
								<!-- <p class="text-center"><span id="sold_percent"></span></p>
								<p class="text-center"><span class="font-purple">SOLD</span></p> -->
								<div class="progress-bar1" id="sold_percent_chart"  data-duration="1000" data-color="#251227,#6d3577"></div>
								<!-- <div class="progress-bar1" data-percent="20" data-duration="1000" data-color="#ccc,#E74C3C"></div> -->								
							</div>							
						</div>
						<!---->
						<!-- <div class="col-md-4 col-sm-6">
							<p><span id="sold_percent"></span></p>
							<p><span class="font-purple">SOLD</span></p>
							<div id="chart6" class="donut"></div>
							<div class="donut-label">20</div>																		
						</div> -->
						<!--//-->
					</div>
					<div class="row clearfix">
						<a class="btn-buy nav-link js-scroll-trigger" href="#Privatesale2">BUY EVOT</a>
					</div>
					<div id="Privatesale2">
						<h4><strong>Amount</strong></h4>
						<div class="col-md-10 col-md-offset-1">
							<div class="row clearfix">
								<div class="col-lg-3 col-md-3">
									<div class="input-group">
										<input type="text" onkeyup="get_evoaiAmountETH();" id="eth_amount_cal" class="form-control number-only" aria-label="...">
										<div class="input-group-btn">
											<button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ETH</button>											
										</div><!-- /btn-group -->
									</div><!-- /input-group -->
								</div>
								<div class="col-lg-3 col-md-3">
									<div class="input-group">
										<input type="text" onkeyup="get_evoaiAmountUSD();" id="usd_amount_cal" class="form-control number-only" aria-label="...">
										<div class="input-group-btn">
											<button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USDT</button>                                   
										</div><!-- /btn-group -->
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-2 col-md-2 col-sm-2 text-center">
									<h3><i class="fas fa-equals"></i></h3>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="input-group">
										<input type="text" id="evot_amount_cal" onkeyup="get_evoaiAmountEVOT();" class="form-control equals number-only">
										<div class="input-group-btn">
											<button type="button" class="btn btn-default" data-toggle="dropdown">EVOT</button>
										</div><!-- /btn-group -->
									</div><!-- /input-group -->
								</div><!-- /.col-lg-6 -->
							</div>
						</div>    
						<div class="col-md-12 text-center">       
							<h4>You Purchase ....................................... <span id="evot_value"></span> EVOT</h4>
							<h4>Send your <span id="eth_text_val"></span> ETH to the following address</h4>
						</div> 			
						<div class="col-md-10 col-md-offset-1 copy-addr"> 
                        	<h2 class="text-center mb-0"><u><i>DONT SEND ETH FROM AN EXCHANGE</i></u></h2>                    
                            <h3 class="text-center">Only send from Erc20 compatible wallets.</h3>                         
							<div class="row clearfix form_group"></div>
						</div>
						<div class="col-md-12 text-center"> 
							<h4>Please use this wallet to buy EVOT tokens with ETH<br> Recommended gas limit – 400,000 (50 GWEI)<br> Once you make payment, your tokens will appear in your wallet.</h4>
							<p>Your balance will be updated as soon as your deposit has 1 confirmation on the blockchain </p>					
						</div>
					</div>    					
					<!-- Evobot Profit Calculator -->
					<div class="row clearfix">
						<div class="ref-sec col-lg-3 col-md-4 col-sm-4 mt-20 mb-20">	
							<label>Referral Link:</label>
						</div>
						<div class="ref-sec col-md-6 col-sm-8">	
							<div class="input-group">
								<input type="text" onclick="copyTextAdd();" class="form-control walletAddress" value="<?php echo base_url(); ?>registration?e=<?= $user_details->user_referral_code; ?>" placeholder="<?php echo base_url(); ?>">
								<span onclick="copyTextAdd();" class="input-group-addon">Copy</span>
							</div>	
						</div>
					</div>
					<div class="row clearfix" id="Evt-calc">
						<div class="col-md-7 col-sm-12 Evt-calc-book visible-lg visible-md">
							<h2>EVABOT PROFIT CALCULATOR</h2>
							<div class="centerline-sec visible-lg visible-md">
								<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/arrow-centerlineplain.png" class="img-responsive">
							</div>
						</div>
						<div class="col-md-5 col-sm-12 calc-box">							
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>INVESTMENT</th>
											<th>&nbsp;</th>
											<th width="50%">ESTIMATED % RETURN<sub>*</sub></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label>Amount in USD</label><br>
												<input type="text" class="number-only" id="amount_value" name="amount_value" onkeyup="getAmount_val();">
											</td>  
											<td class="brdR">&nbsp;</td>                                    
											<td>
												<label>Daily</label><br>
												<input type="text" class="number-only" id="daily_amount" name="daily_amount" onkeyup="getAmount_val();">
												<span class="field-curr">USD</span>
											</td>
										</tr>
										<tr>
											<td>
												<label>evoCycles</label><br>
												<input type="text" class="number-only" name="evoCycles_day" id="evoCycles_day" value="1" onkeyup="getAmount_val();">
												<label>(max of 90 days)</label>
											</td>  
											<td class="brdR">&nbsp;</td>                                    
											<td>
												<label>Weekly</label><br>
												<input type="text" class="number-only" name="weekly_amount" id="weekly_amount" onkeyup="getAmount_val();">
												<span class="field-curr">USD</span>
											</td>
										</tr>
										<tr>
											<td>
												<label>&nbsp;</label><br>
												<div class="progress">
												  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
													<span class="sr-only">70% Complete</span>
												  </div>
												</div>
											</td>  
											<td class="brdR">&nbsp;</td>                                    
											<td>
												<label>Monthly</label><br>
												<input type="text" class="number-only" name="monthly_amount" id="monthly_amount" onkeyup="getAmount_val();">
												<span class="field-curr">USD</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<p>*Profit levels can not be guaranteed but this calculator provides estimates based on previous performance and does not reflect reinvesting.</p>
						</div>
					</div>
				</div>
				<!-- /main -->
			</div>
		</div>
	</section>
</div>
<script>
	/* Chart */        
	$.getScript('//cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.min.js',function(){
	  $.getScript('//cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.pie.min.js',function(){
		$.getScript('//cdnjs.cloudflare.com/ajax/libs/flot/0.8.2/jquery.flot.resize.min.js',function(){
		  		  
		  // static charts
		  var d1 = [];
		  for (var i = 0; i < 14; i += 0.2) {
			 d1.push([i, Math.sin(i)]);
		  } 
		  var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
		  var d3 = [[0, 12], [7, 12], [12, 13]];
					  
		  $.plot("#chart6",[{data:10,color:'#5566ff'},{data:30,color:'#ddd'}],{series:{pie:{show: true,innerRadius: 0.6}}});
		
		  // real-time chart
		  // we use an inline data source in the example, usually data would
		  // be fetched from a server
		  var data = [], totalPoints = 200;
		  function getRandomData() {
			
			if (data.length > 0)
			  data = data.slice(1);
			
			// do a random walk
			while (data.length < totalPoints) {
			  var prev = data.length > 0 ? data[data.length - 1] : 50;
			  var y = prev + Math.random() * 10 - 5;
			  if (y < 0)
				y = 0;
			  if (y > 100)
				y = 100;
			  data.push(y);
			}
		  
			// zip the generated y values with the x values
			var res = [];
			for (var i = 0; i < data.length; ++i)
			  res.push([i, data[i]])
			  return res;
		  }
		  
		  // setup control widget
		  var updateInterval = 500;
		  $("#updateInterval").val(updateInterval).change(function () {
		  var v = $(this).val();
		  if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1)
				updateInterval = 1;
				if (updateInterval > 2000)
				 updateInterval = 2000;
				 $(this).val("" + updateInterval);
				}
		  });
		  
		  // setup plots
		  var options = {
			grid:{borderColor:'#ccc'},
			series:{shadowSize:0,color:"#33ff33"},
			yaxis:{min:0,max:100},
			xaxis:{show:true}
		  };
		   
		  var plot = $.plot($("#chart1"), [ getRandomData() ], options);
			  
		  function update() {
			plot.setData([ getRandomData() ]);
			plot.draw();
			setTimeout(update, updateInterval);
		  }
		  
		  update();
		  
		});// end getScript (resize)
	  });// end getScript (pie)
	});// end getScript 
</script>

