<!DOCTYPE html>
<html lang="en">
		<head>
		<title>Evoai |
        <?= @$title ?>
        </title>
		<meta charset="utf-8">
		<meta name="active-menu" content="<?= @$menuId ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>evoai/public/webroot/frontend/images/favicon-icon2.png"/>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="https://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/bootstrap.min.css">
		<link href="<?php echo base_url();?>evoai/public/webroot/frontend/css/owl-theme.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/main.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/font-awesome.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
		<!--Adding plugin css file -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/breaking-news-ticker.min.css">
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/jquery.min.js"></script>
		<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/bootstrap.min.js"></script>

		<!-- Owl Stylesheets -->
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/docs.theme.min.css"> -->
	    <link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/owl.carousel.min.css">
	    <link rel="stylesheet" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/owl.theme.default.min.css">	
	    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/jquery.min.js"></script>
	    
		
		<!-- Toastr -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
		<!--//-->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/slideControl.css" />
		<script type="text/javascript" src="<?php echo base_url();?>evoai/public/webroot/frontend/js/jquery.slideControl.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.slideControl').slideControl();
				prettyPrint();
			});
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>evoai/public/webroot/frontend/css/slidestyle.css" />
		<script type="text/javascript" src="<?php echo base_url();?>evoai/public/webroot/frontend/js/prettify.js"></script>		
		<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
		
		</head>

		<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="home-page">

		<!--CSS Spinner -->
		<?php
			if(@$this->Ref_UserName)
			{
				
			}
			else
			{
				?>
					<div class="spinner-wrapper">
						<div class="spinner"> 
							<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/preloader-black.gif" alt="" class="img-responsive center-block"> 
						</div>
					</div>
				<?php
			}
		?>
		<div id='toTop'> <i class="fa fa-angle-up"></i> </div>
		<?php
			if(@$this->Ref_UserName )
			{
				if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'Hhome')
				{
					?>
						<section class="top_line blue-bg">
							<div class="container"> <a onclick="#" target="_blank"> <span class="top_line__live">Token sale is LIVE</span> 
				
							<!-- <span class="top_line__bonus">CURRENT BONUS <?php echo $evot_details->bonus; ?>%</span> --> 
							
							</a> <span class="top_line__how_get"> <a href="#" target="_blank">How to get 500 UBEX Tokens Free? </a> <span class="tire">-</span> <a href="https://t.me/evaoi" target="_blank"> <u class="top_line__join">Join our Telegram</u> <span class="top_line__telegram"></span> </a> </span> </div>
						</section>
					<?php					
				}
			}
			else
			{
				if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' || $this->uri->segment(1) == 'Home' || $this->uri->segment(1) == 'registration' || $this->uri->segment(1) == 'login')
				{
					?>
						<section class="top_line blue-bg">
							<div class="container"> <a onclick="#" target="_blank"> <span class="top_line__live">Token sale is LIVE</span> 
				
							<!-- <span class="top_line__bonus">CURRENT BONUS <?php echo $evot_details->bonus; ?>%</span> --> 
							
							</a> <span class="top_line__how_get"> <a href="#" target="_blank">How to get 500 UBEX Tokens Free? </a> <span class="tire">-</span> <a href="https://t.me/evaoi" target="_blank"> <u class="top_line__join">Join our Telegram</u> <span class="top_line__telegram"></span> </a> </span> </div>
						</section>
					<?php					
				}
			}

		?>
