<!DOCTYPE html>
<html lang="<?= $this->session->language_abbr ?>">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $template['title']; ?></title>
		<!-- if you create CDN links, do that first before echoing $template['metadata'] so you can override default CDN settings -->
		<!-- add css and js before echoing $template['metadata'] -->
		<!-- <?php $this->template->append_css('default.css') ?> -->

		<!-- echo css, js, and other metadata as defined -->
		<?php echo $template['metadata']; ?>
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
		<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/carousel.js"></script>
		<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>
		<script>
			$("#owl-demo").owlCarousel({
				autoPlay: 2000,
				items : 6,
				margin:10,
				itemsDesktop : [1199,6],

				itemsDesktopSmall : [979,6],



				dots: false,



				navigation : false,



				pagination: false,



				draggable: false,



				touchMove: false,



				mouseDrag: false



			});       



		</script>
		</head>
		<body id="blogPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="blog-page">
			<!--CSS Spinner -->

			<div class="spinner-wrapper">
			    <div class="spinner"> <img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/preloader-black.gif" alt="" class="img-responsive center-block"> </div>
			</div>
			<div id='toTop'> <i class="fa fa-angle-up"></i> </div>
			<section class="top_line blue-bg">
	          <div class="container"> <a onclick="#" target="_blank"> <span class="top_line__live">Token sale is LIVE</span> 
	            
	            <!-- <span class="top_line__bonus">CURRENT BONUS <?php echo $evot_details->bonus; ?>%</span> --> 
	            
	            </a> <span class="top_line__how_get"> <a href="#" target="_blank">How to get 500 UBEX Tokens Free? </a> <span class="tire">-</span> <a href="https://t.me/evaoi" target="_blank"> <u class="top_line__join">Join our Telegram</u> <span class="top_line__telegram"></span> </a> </span> </div>
	        </section>
	        <?php echo $this->load->view('menu.php');?>
			<!-- temp -->
			<!---->
				<section class="evoaiblog-section">
					<div id="band">
						<div class="row clearfix text-center">
							<div class="col-sm-12 fadeInUp animated">
								<h2 class="bg-title"><?php echo $template['title']; ?></h2>
								<h2 class="section-title"><?php echo $template['title']; ?></h2>
							</div>
						</div>
						<div class="container">
							<div class="row clearfix">
								<div class="col-md-3 col-sm-4 col-xs-12 pull-right sidebar-widgets-wrap">
									<div class="widget widget-twitter-feed clearfix">
										<?php echo $template['partials']['archives']; ?>
									</div>
									<div class="widget widget-twitter-feed clearfix">
										<?php echo $template['partials']['categories']; ?>
									</div>
									<div class="widget widget-twitter-feed clearfix">
										<h4>Recent Post</h4>
										<div id="recent-post-list-sidebar">
											<?php
												$category_list = $this->db->get_where('posts', array('status'=>'published'))->result();
												if($category_list)
												{
													foreach($category_list as $res)
													{
														?>
															<div class="spost clearfix">
																<div class="entry-image pull-left">
																	<a href="<?php echo $res->url; ?>" class="nobg">
																		<img class="rounded-circle" src="<?php echo base_url('webroot/admin/upload/'.$res->feature_image); ?>" alt="">
																	</a>
																</div>
																<div class="entry-c pull-left">
																	<div class="entry-title">
																		<h4><a href="<?php echo $res->url; ?>"><?php echo $res->title; ?></a></h4>
																	</div>
																	<ul class="entry-meta">
																		<li><?php echo $res->date_posted; ?></li>
																	</ul>
																</div>
															</div>
														<?php
													}
												}
											?>
										</div>
									</div>

									<div class="widget widget-twitter-feed clearfix">
										<h4></h4>
									</div>	
									<!-- <?php echo $template['partials']['social']; ?>
									<hr>
									<?php echo $template['partials']['links']; ?>
									<hr>
									
									<hr>
									
									<hr> -->

								</div>


								<div class="col-md-8 col-sm-8 col-xs-12">
									<?php echo $template['body']; ?>
								</div>
							</div>
						</div>            
					</div>
				</section>
			
			<!-- temp -->
			<footer class="footer">
				<div class="container main_footer_container">
					<div class="row clearfix">
						<div class="col-md-4 col-sm-6 col-xs-4">
							<a class="logo" href="<?php echo base_url(); ?>">
								<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png" class="img-responsive">
							</a>
						</div>						
						<div class="col-md-4 col-sm-6 col-xs-8">
							<div class="right-container">
								<ul class="social-listing">
									<li>
										<a href="#">
											<i class="fab fa-telegram-plane"></i>
										</a>
									</li>
									<!--<li>
										<a href="https://www.linkedin.com/in/richardnacht">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>-->
									<li>
										<a target="_blank" href="#">
											<i class="fab fa-medium-m"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="#">
											<i class="fab fa-youtube"></i>
										</a>
									</li>
									<li>
										<a target="_blank" href="">
											<i class="fab fa-github-alt"></i>
										</a>
									</li>
									<!--<li>
										<a target="_blank" href="">
											<i class="fab fa-instagram"></i>
										</a>
									</li>-->
								</ul>
							</div>
						</div>
					</div>										
				</div>
				<div class="bottom-container mt-3">
					<div class="container">
						<span class="footer-contacts">© 2018 - 2019 <a href="<?php echo base_url(); ?>"> Evoai.network </a> All rights reserved.</span>
						<div class="pull-right">
							<a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/DISCLAIMER.pdf');?>" target="_blank">Disclaimers</a>&nbsp;&nbsp;|&nbsp;&nbsp;                    
							<a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/Privacy_Policy.pdf');?>" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/TERMS_OF _SERVICE.pdf');?>" target="_blank">Terms Of Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;
							<a href="#">Token Sale Agreement</a>
						</div>
					</div>
				</div>
			</footer>
		<!--//-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		   <!-- <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>-->
			<script src="<?php echo base_url(); ?>evoai/public/webroot/frontend/js/jQuery-plugin-progressbar.js"></script>				
			<script>
				/*preloader*/
				function preloader(){
					//Preloader
					$(window).on("load", function() {
						preloaderFadeOutTime = 3000;
						function hidePreloader() {
							var preloader = $('.spinner-wrapper');
							preloader.fadeOut(preloaderFadeOutTime);
						}
					hidePreloader();
					});
				} 
				
				$('[data-toggle=offcanvas]').click(function() {
					$('.row-offcanvas').toggleClass('active');
					$('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
				});
				// $('#sidebar').affix({
				//   offset: {
				//     top:125,
				//     bottom: function () {
				//       return (this.bottom = $('.footer').outerHeight(true))
				//     }
				//   }
				// });
				preloader(); 
				
			</script>
			<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/breaking-news-ticker.min.js"></script>
			<script type="text/javascript">		
				hljs.initHighlightingOnLoad();
				setTimeout(function(){
				$('#priceTicker').breakingNews({
						//effect: 'typography'
						limit:4,
						scrollSpeed : 2,				
					});
				}, 2000)
			</script>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://www.evoai.network/evoai/public/webroot/frontend/js/main.js"></script>
	</body>
</html>



