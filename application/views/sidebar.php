<?php
	//$nodeURL = 'http://evoai.tech:7000/login';
	$nodeURL = 'https://www.evoai.network:7000/login';
	$Ref_beta_role = $this->session->userdata('Ref_beta_role');	
	$Ref_super_role = $this->session->userdata('Ref_super_role');	
	$Ref_UserEmail = $this->session->userdata('Ref_UserEmail');	
	$Ref_UserID = $this->session->userdata('Ref_UserID');
	$announcement_status = $this->db->where('status', 1)->where('announcements_category','Customers Announcement')->get('announcements')->result();	
	$count_announs = '';
	if(count($announcement_status) > 0)
	{
		foreach($announcement_status as $announcRes)
		{
			$users_arr = '';
			$start_date = new DateTime($announcRes->announcements_start_date);
			$s_time = $start_date->getTimestamp();
			$end_date = new DateTime($announcRes->announcements_end_date);
			$e_time = $end_date->getTimestamp();
			if($s_time < time() && $e_time > time())
			{
				$users_arr = explode(',',$announcRes->announcements_users_id);
				if(in_array($Ref_UserID, $users_arr))
				{
				}
				else
				{
					$count_announs++;										
				}
			}
		}
		if($count_announs == '')
		{
			$count_announs = 0;
		}
	}
	else
	{
		$count_announs = 0;
	}
?>
<div class="column col-sm-3 col-md-2" id="sidebar">
	<ul class="nav" id="menu"> 
		<li id="Dashboard">
			<a href="<?php echo base_url('dashboard');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-home.png"></i> 
				<span class="collapse in">Dashboard</span>
			</a>
		</li>
		<!-- EvoIntel -->
		<li id="EvoIntel">
			<a href="<?php echo base_url('evoIntel');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-referral.png"></i> 
				<span class="collapse in">EvoIntel</span>
			</a>
		</li>  
		<!--// -->
		<li id="Wallet">
			<?php				
				if($Ref_beta_role == 1 || $Ref_super_role == 1)
				{
					?>
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">								             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'wallet'; ?>">
								<input type="hidden" name="count_announs" class="form-control hidden" value="<?= $count_announs; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-wallet.png"></i> 
								<span class="collapse in">Wallet</span>
							</button>							
						</form>  
					<?php
				}
				else					
				{
					?>
						<a href="#">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-wallet.png"></i> 
							<span class="collapse in">Wallet</span>
							<i class="pull-right"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>
						</a>         			
					<?php
				}
			?>	
		</li>
		<li id="Live_Trades">
			<?php
				if($Ref_super_role == 1)
				//if($Ref_UserEmail == 'nooodlecup@gmail.com' || $Ref_UserEmail == 'nicholas@tensai-solutions.co.uk' || $Ref_UserEmail == 'EVOAINETWORK@GMAIL.COM' || $Ref_UserEmail == 'bharatchhabra13@gmail.com' || $Ref_UserEmail == 'pavs94@gmail.com' || $Ref_UserEmail == 'sergeym610@gmail.com')
				{
					?>
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'live_trades'; ?>">
								<input type="hidden" name="count_announs" class="form-control hidden" value="<?= $count_announs; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-livetrade.png"></i> 
								<span class="collapse in">Live trades</span>
							</button>
						</form>
					<?php
				}
				else
				{
					?>
						<a href="#">
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-livetrade.png"></i> 
							<span class="collapse in">Live trades</span>
							<i class="pull-right"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>					
						</a>
					<?php
				}
			?>
		</li>		
		<li id="Evabot">
			<?php
				if($Ref_beta_role == 1 || $Ref_super_role == 1)
				{
					?>
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'evabot'; ?>">
								<input type="hidden" name="count_announs" class="form-control hidden" value="<?= $count_announs; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i>
								<span class="collapse in">Evabot</span>
							</button>
						</form> 
					<?php
				}
				else
				{
					?>
						<a href="#">
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i>
							<span class="collapse in">Evabot</span>
							<i class="pull-right"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>					
						</a> 
					<?php
				}
			?>
		</li>
		<li id="Evobot" class="dropdown">
			<?php
				if($Ref_super_role == 1)
				//if($Ref_UserEmail == 'nooodlecup@gmail.com' || $Ref_UserEmail == 'nicholas@tensai-solutions.co.uk' || $Ref_UserEmail == 'EVOAINETWORK@GMAIL.COM' || $Ref_UserEmail == 'bharatchhabra13@gmail.com' || $Ref_UserEmail == 'pavs94@gmail.com' || $Ref_UserEmail == 'sergeym610@gmail.com')
				{
					/*
					<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
						<button type="submit">
							<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
							<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'evobot'; ?>">
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i> 
							<span class="collapse in">Evobot</span>
						</button>
					</form> 
					*/
					?>
						<a href="<?= base_url('evobot'); ?>">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i> 
							<span class="collapse in">Evobot</span>
							<i class="pull-right padlock-sec"></i>					
						</a> 
						<a class="dropdown-toggle" data-toggle="dropdown" style="right: 0;position: absolute;top: 0;cursor:pointer "><b class="fa fa-angle-down"></b></a>		
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('wallet/add_API_Keys');?>"><i class="fa fa-fw fa-user"></i> Add API Keys</a></li>
							<li><a href="<?php echo base_url('wallet/arbitrage_Opportunities');?>"><i class="fa fa-fw fa-cog"></i> Arbitrage Opportunities</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('wallet/tickers');?>"><i class="fa fa-fw fa-power-off"></i> Tickers</a></li>
							<li><a href="<?php echo base_url('wallet/trade');?>"><i class="fa fa-fw fa-power-off"></i> Trade</a></li>
						</ul>
					<?php
				}
				else
				{
					?>
						<a href="#">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i> 
							<span class="collapse in">Evobot</span>
							<i class="pull-right padlock-sec"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>					
						</a> 
					<?php
				}
			?>
		</li>
		<li id="Eve">
			<?php
				if($Ref_super_role == 1)
				//if($Ref_UserEmail == 'nooodlecup@gmail.com' || $Ref_UserEmail == 'nicholas@tensai-solutions.co.uk' || $Ref_UserEmail == 'EVOAINETWORK@GMAIL.COM' || $Ref_UserEmail == 'bharatchhabra13@gmail.com' || $Ref_UserEmail == 'pavs94@gmail.com' || $Ref_UserEmail == 'sergeym610@gmail.com')
				{
					/*
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'eve'; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i>
								<span class="collapse in">Eve</span>
							</button>
						</form> 					
					*/
					?>
						<a href="<?= base_url('eve'); ?>">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i>
							<span class="collapse in">Eve</span>
							<i class="pull-right padlock-sec"></i>					
						</a> 
					<?php
				}
				else
				{
					?>
						<a href="#">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-chart.png"></i>
							<span class="collapse in">Eve</span>
							<i class="pull-right padlock-sec"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>					
						</a> 
					<?php
				}
			?>
		</li>
		<li id="Exchange">
			<?php
				if($Ref_super_role == 1)
				//if($Ref_UserEmail == 'nooodlecup@gmail.com' || $Ref_UserEmail == 'nicholas@tensai-solutions.co.uk' || $Ref_UserEmail == 'EVOAINETWORK@GMAIL.COM' || $Ref_UserEmail == 'bharatchhabra13@gmail.com' || $Ref_UserEmail == 'pavs94@gmail.com' || $Ref_UserEmail == 'sergeym610@gmail.com')
				{
					?>
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'exchange'; ?>">
								<input type="hidden" name="count_announs" class="form-control hidden" value="<?= $count_announs; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-exchange.png"></i> 
								<span class="collapse in">Exchange</span>
							</button>
						</form> 
					<?php
				}
				else
				{
					?>
						<a href="#">	
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-exchange.png"></i> 
							<span class="collapse in">Exchange</span>
							<i class="pull-right padlock-sec"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>					
						</a> 
					<?php
				}
			?>
		</li>
		<li id="Academy">
			<?php
				if($Ref_beta_role == 1 || $Ref_super_role == 1)
				{
					?>
						<form action="<?php echo $nodeURL; ?>" method="post" accept-charset="utf-8">									             
							<button type="submit">
								<input type="hidden" name="uIdc" class="form-control hidden" value="<?php echo base64_encode($this->Ref_UserID); ?>">
								<input type="hidden" name="dirn" class="form-control hidden" value="<?php echo 'academy'; ?>">
								<input type="hidden" name="count_announs" class="form-control hidden" value="<?= $count_announs; ?>">
								<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/academy2.png"></i> 
								<span class="collapse in">Academy</span>
							</button>
						</form> 
					<?php
				}
				else
				{
					?>
						<a href="#">
							<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/academy2.png"></i> 
							<span class="collapse in">Academy</span>
							<i class="pull-right padlock-sec"><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-padlock.png"></i>
						</a>
					<?php
				}
			?>
		</li>
		<li id="Profile">
			<a href="<?php echo base_url('profile');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-profile.png"></i> 
				<span class="collapse in">Profile</span>
			</a>
		</li>
		<li id="Support">
			<a href="<?php echo base_url('support');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-support.png"></i> 
				<span class="collapse in">Support</span>
			</a>
		</li>
		<li id="Announcements">
			<a href="<?php echo base_url('clientAnnouncements');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-announce.png"></i> 
				<span class="collapse in">Evo News</span><span class="badge"><?= $count_announs; ?></span>
			</a>
		</li>                
		<li id="My_referrals">
			<a href="<?php echo base_url('myreferrals');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-referral.png"></i> 
				<span class="collapse in">My Referrals</span>
			</a>
		</li>	               
		<li id="EvoStableCoins">
			<a href="<?php echo base_url('evoStableCoins');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-referral.png"></i> 
				<span class="collapse in">Evo Stable Coins</span>
			</a>
		</li>		
		<!-- Watchlist -->
		<!-- <li id="Watchlist">
			<a href="<?php echo base_url('watchlist');?>">
				<i><img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/icon-referral.png"></i> 
				<span class="collapse in">Watchlist</span>
			</a>
		</li> -->    		
		<!--// -->
	</ul>
</div>