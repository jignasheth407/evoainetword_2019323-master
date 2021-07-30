<section class="header desk-header" id="top">
    	<!-- For mobile view -->
        <div class="row clearfix visible-xs visible-sm"> 
          <!--NAvigation-->
          <div class="col-xs-12">
            <nav class="navbar navbar-default">
              <div class="container-fluid"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  <a href="<?php echo base_url();?>" class="navbar-brand"> <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo_web.png" alt="" class="img-responsive" > </a> </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a class="nav-link js-scroll-trigger" href="#ecosystem">About EVOAI</a></li>
						<li><a class="nav-link js-scroll-trigger" href="#apiConnected">Partners</a></li>
						<li><a class="nav-link js-scroll-trigger" href="#ourTeam">Team</a></li>
						<li><a class="nav-link js-scroll-trigger" href="#distributionTkn" target="_blank">Token</a></li>
						<li><a class="nav-link js-scroll-trigger" href="#roadMap" target="_blank">Roadmap</a></li> 
						<li><a href="#" target="_blank">Blogs</a></li>         
						<li><a href="<?php echo base_url(); ?>#faqs" class="nav-link js-scroll-trigger">FAQ</a></li>                       
						<?php
							if($this->Ref_UserID)
							{
								?>
									<li><a href="<?php echo base_url('logout'); ?>" class="header__wallet">
										<span class="text-center">Logout</span>
									</a></li> 
									<li><a href="<?php echo base_url(); ?>dashboard" class="header__wallet">
										<img src="<?php echo base_url();?>webroot/frontend/images/login.png"><?php echo $this->Ref_UserName; ?>
									</a></li> 
								<?php
							}
							else
							{
								?>
									<li><a href="<?php echo base_url('login'); ?>" class="header__wallet nav-link js-scroll-trigger">
										<img src="<?php echo base_url();?>webroot/frontend/images/login_new.png">Login
									</a></li>                
								<?php
							}
						?>
					</ul>
                </div>
                <!-- /.navbar-collapse --> 
              </div>
              <!-- /.container-fluid --> 
            </nav>
          </div>
          <!--//-->
         
        </div>
        <!--//-->
        <div class="container-fluid visible-lg visible-md">
            <div class="header__logo col-lg-2 col-md-3">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>webroot/frontend/images/logo_web.png" alt="" class="img-responsive">
                    <!-- <img src="<?php echo base_url();?>webroot/frontend/images/logo.png" alt="" class="img-responsive"> -->
                </a>
            </div>
            <div class="col-md-10 col-lg-10 hidden">
                <nav class="header_menu navbar navbar-default">
                    <ul class="nav networknav navbar-nav">
                        <li><a class="nav-link js-scroll-trigger" href="#ecosystem">About EVOAI</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#apiConnected">Partners</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#ourTeam">Team</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#distributionTkn" target="_blank">Token</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#roadMap" target="_blank">Roadmap</a></li>  
                        <li><a href="#" target="_blank">Blog</a></li>
                        <li><a href="<?php echo base_url('announcements') ?>">Announcements</a></li>                  
                    </ul>
                    <ul class="nav navbar-nav networknav navbar-right">
                        <li><a href="<?php echo base_url(); ?>#faqs" class="nav-link js-scroll-trigger">FAQ</a></li> 
                    <?php
                        if($this->Ref_UserID)
                        {
                            ?>
                                <li><a href="<?php echo base_url('logout'); ?>" class="header__wallet">
                                    <span class="text-center">Logout</span>
                                </a> </li>
                                <li><a href="<?php echo base_url(); ?>dashboard" class="header__wallet">
                                    <img src="<?php echo base_url();?>webroot/frontend/images/login.png"> <?php echo $this->Ref_UserName; ?>
                                </a> </li>
                            <?php
                        }
                        else
                        {
                            ?>
                                <li><a href="<?php echo base_url('login'); ?>" class="header__wallet nav-link js-scroll-trigger">
                                    <img src="<?php echo base_url();?>webroot/frontend/images/login_new.png">Login
                                </a> </li>               
                            <?php
                        }
                    ?>
                    </ul>

                </nav>
            </div>
            <!-- <a href="javascript:open_popup('#popup-menu')" class="header__menu_mob_link"></a> -->
            <div class="col-md-5 col-lg-6 padL0">
                <nav class="header__menu">
                    <ul>
                        <li><a class="nav-link js-scroll-trigger" href="#ecosystem">About EVOAI</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#apiConnected">Partners</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#ourTeam">Team</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#distributionTkn" target="_blank">Token</a></li>
                        <li><a class="nav-link js-scroll-trigger" href="#roadMap" target="_blank">Roadmap</a></li>  
                        <li><a href="#" target="_blank">Blog</a></li>
                        <!-- <li><a href="<?php echo base_url('announcements') ?>">Announcements</a></li> -->                  
                    </ul>
                </nav>
            </div>
            
            <!-- <a onclick="" href="#" target="_blank" class="btn btn-danger header__contribute">CONTRIBUTE</a> -->
            <div class="col-md-4 col-lg-4">
                <nav class="header__right">
                    <a href="<?php echo base_url(); ?>#faqs" class="nav-link js-scroll-trigger">FAQ</a> 
                    <?php
                        if($this->Ref_UserID)
                        {
                            ?>
                                <a href="<?php echo base_url('logout'); ?>" class="header__wallet">
                                    <span class="text-center">Logout</span>
                                </a> 
                                <a href="<?php echo base_url(); ?>dashboard" class="header__wallet">
                                    <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/loginw.png"><?php echo $this->Ref_UserName; ?>
                                </a> 
                            <?php
                        }
                        else
                        {
                            ?>
                                <a href="<?php echo base_url('login'); ?>" class="header__wallet nav-link js-scroll-trigger">
                                    <img src="<?php echo base_url();?>webroot/frontend/images/login_new.png">Login
                                </a>                
                            <?php
                        }
                    ?>
                </nav>
            </div>
            
        </div>
    </section>
    <!-- Artificial Intelligence -->
    <section class="black_block atificial-intelligence">
		<div id="msg_div">
				<?php echo $this->session->flashdata('message');?>				
			</div>	
        <div class="atificial-intelligence__bg"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-sm-8 top-text show-content">
                    <h1>&nbsp;<span id="textShow"></span></h1>
                    <h2 class="tagline">&nbsp;<span id="secondText"></span></h2>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-6 col-md-5">
                    <div class="atificial-intelligence__cont col">
                        <div class="atificial-intelligence__wrap">
                            <div class="row clearfix">
                                <div class="col-md-11 mt-5">
                                    <div class="table-responsive">
                                        <table class="table table-sale">
                                            <tbody>
                                                <tr>
                                                    <td>PRIVATE SALE </td>
                                                    <td>300,000</td>
                                                    <td>SOLD OUT</td>
                                                </tr>
                                                <tr>
                                                    <td>PRESALE </td>
                                                    <td>500.000 </td>
                                                    <td>SOLD OUT</td>
                                                </tr>
                                                <tr class="pre-soldbfore">
                                                    <td>ICO ROUND 1 </td>
                                                    <td>1,000,000 </td>
                                                    <td>TODAY</td>
                                                </tr>
                                                <tr>
                                                    <td>ICO ROUND 2 </td>
                                                    <td>1,000,000 </td>
                                                    <td>UPCOMING</td>
                                                </tr>
                                                <tr>
                                                    <td>ICO ROUND 3 </td>
                                                    <td>1,000,000 </td>
                                                    <td>UPCOMING</td>
                                                </tr>
                                                <tr>
                                                    <td>ICO ROUND 4 </td>
                                                    <td>1,000,000 </td>
                                                    <td>UPCOMING</td>
                                                </tr>
                                                <tr>
                                                    <td>ICO ROUND 5 </td>
                                                    <td>1,000,000 </td>
                                                    <td>UPCOMING</td>
                                                </tr>
                                                <tr>
                                                    <td>ICO ROUND 6 </td>
                                                    <td>1,000,000 </td>
                                                    <td>UPCOMING</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <h4 class="top_amount_text pull-right">1 EVOT = $<?php echo $evot_details->evot_value; ?>
                                <img src="<?php echo base_url();?>webroot/frontend/images/eth-icon.png">
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 count-div">
                    <div class="atificial-intelligence__cont col ">
                        <div class="atificial-intelligence__wrap">
                            <h1></h1>
                            <div class="atificial-intelligence__counter" id="main_countdown">
                                <div class="countdown countdown-default">
                                    <div class="countdown-time" data-time="2018/10/10 21:00:00">
                                        <!--<div class="countdown-time" data-time="2018/10/01 00:00:00"><span class="section_count"><span class="tcount days">00:</span><span class="text">DAYS</span></span><span class="section_count"><span class="tcount hours">00:</span><span class="text">HOURS</span></span><span class="section_count"><span class="tcount minutes">00</span><span class="text">MINS</span></span></div>-->

                                    </div>
                                </div>
                            </div>
                            <div class="atificial-intelligence__list">
                                <a class="btn-inform brd3-white" href="<?php echo base_url(); ?>evoai/public/webroot/frontend/pdf/wp-v2point0-final.pdf" target="_blank">Read the Whitepaper</a>    
                                <a class="btn-inform brd3-white js-scroll-trigger" href="#evoai-section" target="_blank"><i class="fa fa-play-circle play_video_icon" aria-hidden="true"></i><span class="play_video_text">See How it Works </span></a>
                                <!--<a class="btn-buy" href="#" data-toggle="modal" data-target="#modalPrivatesale">BUY EVOT TOKENS</a>-->
                                <a class="btn-buy no-brdR no-brd" href="#" data-toggle="modal" data-target="#modalPrivatesale2">BUY EVOT TOKENS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-9">
                    <div class="distribution__lines distribution_line_custom_new" style=" width: 100%;">
                        <dl class="distribution__line distribution__line_custom-new  distribution__line1  distribution__line1_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line2 distribution__line2_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line3 distribution__line3_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line4 distribution__line4_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line4 distribution__line5_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line4 distribution__line6_new">
                        </dl>
                        <dl class="distribution__line distribution__line_custom-new distribution__line4 distribution__line7_new">
                        </dl>
                        <span class="softcap_font" id="stage_name"></span> 
                        <span class="hardcap-evot" id="stage_state"></span>
                        <span class="softcap_font" id="tokens-sold"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//-->
    <!-- Realtime Price -->
    <section class="realtime-rates simple-section services-section">        
        <div class="bn-breaking-news" id="priceTicker">         
            <div class="bn-news">
                <ul>
                    <li class="live-rate"></li>
                    <li class="live-rate_eth"></li>
                    <li class="live-rate_ltc"></li>
                    <li class="live-rate_bch"></li>
                    <li class="live-rate-BABB"></li>
                    <li class="live-rate-ETN"></li>
                    <li class="live-rate-TRON"></li>
                </ul>
            </div>
            <div class="bn-controls">
                <button><span class="bn-arrow bn-prev"></span></button>
                <button><span class="bn-action"></span></button>
                <button><span class="bn-arrow bn-next"></span></button>
            </div>
        </div>
    </section>
    <!--//-->
          
    <!-- Component -->
    <section class="simple-section services services-section" id="about">
        <div id="band" class="container text-center">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">Components</h2>
                    <h2 class="section-title">Components</h2>
                </div>
            </div>
            <div class="services-holder row clearfix">
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-retweet new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">Internal Exchange  </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar" data-percentage="90">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-code new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">Front end Coding! </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="90">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-paint-brush new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">Front end UI!</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="85">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-desktop new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVABOT Demo</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="100">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-rocket new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVABOT Live </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar" data-percentage="70">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-handshake-o new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVABOT Exchange Aggregator</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar" data-percentage="60">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-wrench new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVABOT Basic Tools</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="40">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-random new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVABOT Advanced Tools </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="20">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-pie-chart new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVOCHARTS Intelligent Charts </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="20">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-file-code-o new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVE Programming</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="30">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-cubes new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">EVE Learning Modules</span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="20">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-xs-12 service-item animatable fadeInUp">
                    <div class="service-item-entry" data-fancybox="modal" data-src="#modal-2">
                        <i class="fa fa-line-chart new_send" aria-hidden="true"></i>
                        <div class="text-side"><span class="title">Trading Academy </span><span class="status">Status: <span>Deploying</span></span>
                        </div>
                        <div class="progress-bar-holder">
                            <div class="progress-bar " data-percentage="30">
                                <div class="progress"></div>
                                <div class="progress-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//-->    
    <!--Evoai Experience-->    
    <section class="simple-section services evoai-section" id="evoai-section">
        <div id="band" class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">The EVOAI Experience</h2>
                    <h2 class="section-title">The EVOAI Experience</h2>                    
                </div>
                <div class="col-md-12 box-shadow">
                    <!-- <video id="evoaiVideo" poster="<?php echo base_url();?>webroot/frontend/images/video_bg.png">
                        <source src="<?php echo base_url();?>webroot/frontend/videos/EVOAI-0uKwgbFYFNE8_beta.mp4" type="video/mp4" />
                    </video> -->

                    <div align="center" class="embed-responsive embed-responsive-16by9">
    					<video class="embed-responsive-item" poster="<?php echo base_url();?>webroot/frontend/images/video_bg.png" controls>
        					<source src="<?php echo base_url();?>webroot/frontend/videos/EVOAI-0uKwgbFYFNE8_beta.mp4" type="video/mp4" />
    					</video>
					</div>


                </div>
                


            </div> 
        </div>
    </section>        
    <!--//--> 
    <?php
		if($video_list)
		{
			?>
				<section class="simple-section services evoai-section"> 
					<div id="band" class="container-fluid text-center">
						<div class="row clearfix">
							<div class="col-sm-12 animatable fadeInUp">
								<h2 class="bg-title">The EVOAI Videos</h2>
								<h2 class="section-title">The EVOAI Videos</h2>                    
							</div>
							<div class="col-md-12 box-shadow padT30 padB30">
								<div class="owl-theme" id="owl-demo">  
									<?php
										if($video_list)
										{
											foreach($video_list as $res)
											{
												?>
													<div class="item">
														<div align="center" class="embed-responsive embed-responsive-16by9">
															<?php
																if($res->full_video)
																{
																	?>
																		<video class="embed-responsive-item" poster="<?php echo base_url(); ?>evoai/public/webroot/frontend/videos/<?php echo  $res->full_video; ?>" controls>
																			<source src="<?php echo base_url(); ?>evoai/public/webroot/frontend/videos/<?php echo $res->full_video; ?>" type="video/mp4" />
																		</video>
																	<?php
																}
																else
																{
																	$url = $res->url;		
																	preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
																	$id = $matches[1];
																	?>
																		<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $id ?>"></iframe>
																	<?php
																}
															?>
														</div>
													</div>
												<?php								
											}
										}
									?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php
		}
	?>
	
    <!---Start-ecosystem Exchange----->
    <section class="work-calculater" id="ecosystem">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">Ecosystem</h2>
                    <h2 class="section-title">Ecosystem</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <img src="<?php echo base_url();?>webroot/frontend/images/ecosystem-banner.jpg" class="img-responsive center-block">
                </div>
            </div>
        </div>
    </section>
    <!---End-Eco system Exchange----->   
    <!---Start-API Connected----->
    <section class="work-calculater" id="apiConnected">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">API Connected</h2>
                    <h2 class="section-title">API Connected</h2>
                </div>    
                <div class="col-sm-12 animatable fadeInUp">
                    <ul class="xchange-list">
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-bitfinex.png" class="img-responsive center-block" alt="Bitfinex"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-binance.png" class="img-responsive center-block" alt="Binance"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-bittrex.jpg" class="img-responsive center-block" alt="Bittrex"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-okex.jpg" class="img-responsive center-block" alt="Okex"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-wex.jpg" class="img-responsive center-block" alt="Wex"></a></li>
                    </ul>
                </div>
                <div class="col-sm-12 animatable fadeInUp">
                    <ul class="xchange-list">
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-poloniex.jpg" class="img-responsive center-block" alt="Poloniex"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-kraken.jpg" class="img-responsive center-block" alt="Kraken"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-hitbtc.jpg" class="img-responsive center-block" alt="Hitbtc"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-exmo.jpg" class="img-responsive center-block" alt="Exmo"></a></li>
                        <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-bithum.jpg" class="img-responsive center-block" alt="Bithumb"></a></li>
                    </ul>
                </div>
            </div>            
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp">                    
                    <h2 class="section-title p9">Coming Soon</h2>
                </div>
            </div>
            <div class="col-sm-12 animatable fadeInUp">
                <ul class="xchange-list">
                    <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-huobi.jpg" class="img-responsive center-block" alt="Huobi"></a></li>
                    <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-hotbit.jpg" class="img-responsive center-block" alt="Hotbit"></a></li>
                    <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-rypros.jpg" class="img-responsive center-block" alt="Rypros"></a></li>
                    <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-gdax.jpg" class="img-responsive center-block" alt="Gdax"></a></li>
                    <li><a href="#"><img src="<?php echo base_url();?>webroot/frontend/images/logo-cex.jpg" class="img-responsive center-block" alt="Cex"></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!---End-API Connected----->
    <!--Start Mix order Book-->
    <section class="simple-section" id="mixOrder">
        <div class="container container_road_section">
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">Evobot Exchange</h2>
                    <h2 class="section-title">Evobot Aggregated Exchange</h2>
                </div>
            </div>
            <form class="form-mixorder" method="post" name="mainForm" action="#mixOrder" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <label><?php echo $success_msg; ?></label>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12 col-md-5">
                        <div class="row clearfix">
                            <div class="col-sm-8">
                                <div class="multi-btn btn-box">
                                    <label class="selected" onclick="get_orderValue();">
                                        <input type="radio" checked name="order_type" class="hidden" value="Buy">Buy
                                    </label>
                                    <label onclick="get_orderValue();">
                                        <input type="radio" name="order_type" class="hidden" value="Sell">Sell
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="btn-box">
                                    <!--<label><input type="radio" name="order" class="hidden">BuyAA</label>-->
                                    <select name="currency_from_to" class="form-control" id="currency_name" onchange="getCurrency_rate(this.value)">
                                        <option value="BTC_USDT">BTC/USDT</option>
                                        <option value="ETH_BTC">ETH/BTC</option>
                                        <option value="LTC_BTC">LTC/BTC</option>
                                        <option value="BCH_BTC">BCH/BTC</option>
                                        <option value="BCH_ETH">BCH/ETH</option>
                                        <option value="ZEC_BTC">ZEC/BTC</option>
                                    </select>
                                </div>
                            </div>                              
                        </div>
                    </div>                    
                    <div class="col-sm-12 col-md-7 arrow-box">                    
                        <?php
                        /*                                              
                        <div class="range-slider">
                            <input class="range-slider__range" type="range" min="0.01" max="100" value="30" onchange="enterValue();">
                            <span class="range-slider__value hidden" style="color:#fff"></span>
                            <input type="text" name="price" class="form-control arrow_val" min="0.01" max="100" value="30" onkeyup="enterValue();">
                            <img src="<?php echo base_url();?>webroot/frontend/images/form-arrow-after.png">                            
                        </div> 
                        <!-- <div class="content">
                             <ul class="clearfix">
                                <li><input type="text" value="0.1" class="slideControl form-control arrow_val" maxlength="100" /></li>
                                <li><label>FooBar: </label><input type="text" value="9.0" class="slideControl" maxlength="3" /></li>
                            </ul>
                        </div>  --> 
                        */
                        ?>
                        <div class="mix-slider">
                            <input type="text" min="0.01" max="100" step="0" id="input-number" class="mixrange_value number-only arrow_val" >                         
                            <div id="orderValue"></div>      
                            <div id="from_currency"></div>      
                        </div>                        
                    </div>
                </div>
                <div class="row clearfix form-group mt-30">
                    <div class="col-sm-12 col-md-4 box-field">
                        <div class="row">
                            <div class="col-sm-4 box-field">
                                <label class="box-inline">Exchange</label>
                            </div>
                            <div class="col-sm-8 box-field">
                                <div class="btn-box">
                                    <select class="form-control" name="api_name" id="API_name" onchange="selectAPI_name(this.value);">
                                        <option value="BINANCE">Binance</option>
                                        <option value="BITTREX">Bittrex</option>
                                        <option value="OKEX">Okex</option>
                                        <option value="POLONIEX">Poloniex</option>
                                        <option value="BITFINEX">Bitfinex</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" name="order_book_price" class="form-control text-right Show_order_book">
                            <div class="input-group-addon select_price">USDT</div>
                        </div>  
                        <label class="bottom">Show order book</label>                       
                    </div>
                    <div class="col-sm-12 col-md-4 form-group box-field">
                        <label>Best Aggregated Price</label>
                        <div class="input-group">
                            <input type="text" name="mix_order_book_price" class="form-control text-right Show_Mix_order_book">
                            <div class="input-group-addon select_price">USDT</div>
                        </div>
                        <label class="bottom">Show Mix order book</label>
                    </div>
                    <div class="col-sm-12 col-md-4 box-field">
                        <label>Evobot Edge</label>
                        <div class="input-group">
                            <input type="text" name="calculate_price" class="form-control text-right Price_EVOAI">
                            <div class="input-group-addon"><span class="select_price">USDT</span><sub class="Price_EVOAI_per font-purple">10%</sub></div>
                        </div>                      
                    </div>
                </div>
                <?php
                /*
                <div class="row clearfix form-group">
                    <div class="col-sm-6 box-field">
                        <label>Email Id</label>
                        <input type="text" class="form-control" name="user_email">
                        <?php echo form_error('user_email','<span class="text-danger">','</span>');?>
                    </div>
                    <div class="col-sm-2">
                        <label>&nbsp;</label>
                        <button class="btn btn-primary" name="Submit" value="Submit">Submit</button>
                    </div>
                </div>
                */
                ?>
                <input type="text" class="hidden" value="0" id="ref_api_price">
                <input type="text" class="hidden" value="0" id="coin_api_price">
            </form>            
        </div>
    </section>
    <!---- TRY PROFIT -Calculator---->
    <section id="profitbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp calculate_value">
                    <h2 class="bg-title">Try Profit Bar</h2>
                    <h2 class="section-title ">Try Profit Bar</h2>
                </div>
            </div>            
            <div class="col-md-8 col-md-offset-4 col-sm-4 col-sm-offset-4 calculate_value animatable fadeInUp">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-4 visible-lg visible-md visible-sm centerline-sec">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/arrow-centerlineplain.png" class="img-responsive">
                    </div>
                    <div class="col-md-7 col-sm-8 calc-box">
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
                                              <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                              aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                                <span class="sr-only">70% Complete</span>
                                              </div>
                                            </div>
                                            <!-- <div class="services-holder">
                                                <div class="progress-bar-holder">
                                                    <div class="progress-bar" data-percentage="65">
                                                        <div class="progress"></div>
                                                        <div class="progress-value"></div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            
                                            <!-- <input type="text" class="number-only" name="last_amount" id="last_amount" onkeyup="getAmount_val();">   -->                                   
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
                    
                </div>              
            </div>
            <div class="col-md-12">
                <h4 class="text-center"><b>*Profit levels can not be guaranteed but this calculator provides estimates based on previous performance and does not reflect reinvesting</b></h4>
            </div>
        </div>
    </section>      
    <!----Start-Tokens-distribution-section------>
    <section class="distribution" id="distributionTkn">
        <div class="container container_section-3">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title ">Token Distribution</h2>
                    <h2 class="section-title ">Token Distribution</h2>                    
                </div>
            </div>
            <div class="row clearfix">
                <img src="<?php echo base_url();?>webroot/frontend/images/tokendistributtion-banner4.png" class="img-responsive center-block">
            </div>
            <!--<div class="distribution__lines">
                <dl class="distribution__line distribution__line1">
                    <dt>Distributed to Community</dt>
                    <dd>72%</dd>
                </dl>
                <dl class="distribution__line distribution__line2">
                    <dt>Team & Advisors<span class="distribution_question">
                     <a  href="#" class="distribution_question_clicker"></a>
                     ?
                     </span>
                    </dt>
                    <dd>15%</dd>
                </dl>
                <dl class="distribution__line distribution__line3">
                    <dt>Reserve </dt>
                    <dd>10%</dd>
                </dl>
                <dl class="distribution__line distribution__line4">
                    <dt>Bounty <span class="distribution_question">
                     <a href="#" class="distribution_question_clicker"></a>
                     ?
                     </span>
                    </dt>
                    <dd>3%</dd>
                </dl>
            </div>-->
            <div class="row justify-content-between distribution__row">
                <div class="col-md-7 col-sm-6 distribution__left">
                    <p class="p1">Ethereum <strong>ERC20</strong></p>
                    <div class="atificial-intelligence__accept">
                        <p class="p2 pull-left">Purchase methods accepted </p>&nbsp;&nbsp;&nbsp;&nbsp;
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/eth-icon.png" class="pull-left" width="80">
                        <!--<ul>
                            <li class="ico1"><img src="<?php echo base_url();?>webroot/frontend/images/ETH-coin1.png">
                                <br>ETH
                            </li>
                        </ul>-->
                    </div>
                    <ul class=" flex-nowrap distribution__caps" style="clear: both">                       
                        <li class="col bg3">
                            <p class="p3">Cost of 1 EVOAI Token:</p>
                            <p class="p4">0.00001 ETH</p>
                        </li>
                    </ul>
                    <p class="p5">
                        Token Contract Address: <strong><a href="https://etherscan.io/token/0x5de805154a24cb824ea70f9025527f35facd73a1" target="_blank" class="font-white">Available</a></strong>
                    </p>
                    <p class="p5">Symbol: <strong>EVOT</strong>
                    </p>
                    <p class="p5">Decimal: <strong>18</strong>
                    </p>
                    
                    <div class="row clearfix"> 
                        <div class="col-md-8">
                            <div class="distribution__box">
                                <div class="clearfix">
                                    <div class="col-md-7 col-sm-7 col-xs-6">
                                        <p class="p5 animatable fadeInUp">
                                            <strong>TOKEN PRICES</strong>
                                        </p>
                                        <div class="p6 section-heading">
                                            <p class="noletterspac mt-30 animatable fadeInUp"><strong>Private Sale</strong></p>
                                            <p>300,000 - $0.35</p>
                                            <p class="p5"></p>                    
                                            <p class="noletterspac mt-30 animatable fadeInUp"><strong>PRE ICOSale</strong></p>
                                            <p>500,000 - $0.45</p>                                                           
                                        </div> 

                                    </div>

                                    <div class="col-md-5 col-sm-5 col-xs-6">
                                        <p class="p5 animatable fadeInUp">
                                            <strong>ICO </strong>
                                        </p>
                                        <div class="p6 section-heading">                    
                                            <p>1000000 - $0.55</p>
                                            <p>1000000 - $0.65</p>
                                            <p>1000000 - $0.75</p>
                                            <p>1000000 - $0.85</p>
                                            <p>1000000 - $0.95</p>
                                            <p>1000000 - $1.05</p>                   
                                        </div> 
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                    <!--<p class="p5 animatable fadeInUp">
                        <strong>TOKEN PRICES:</strong> 
                    </p>
                    
                    <div class="p5 section-heading">
                        <h4 class="noletterspac mt-30 animatable fadeInUp">Private Sale</h4>
                        <p>300,000 - $0.40</p>
                        <p class="p5"></p>                    
                        <h4 class="noletterspac mt-30 animatable fadeInUp">PRE ICOSale</h4>
                        <p>500,000 - $0.50</p>                                                           
                        <h4 class="noletterspac mt-30 animatable fadeInUp">ICO</h4>
                        <p>1000000 - $0.60</p>
                        <p>1000000 - $0.70</p>
                        <p>1000000 - $0.80</p>
                        <p>1000000 - $0.90</p>
                        <p>1000000 - $1.00</p>
                        <p>1000000 - $1.10</p>                   
                    </div> -->
                    <p class="p5 mt-30">
                        <strong>INSTRUCTIONS:</strong>
                    </p>
                    <ul class="inst-list"> 
                        <li>Access your ERC20 Ethereum wallet, this may be Myetherwallet or Metamask.</li>
                        <li>Send your ETH from your Myetherwallet or Metamask wallet to the EVOAI Token<br> Sale deposit address</li>
                        <li>Do not send Ethereum payment to any address</li>
                        <li>The Evoai smart contract will auto deliver your EVOT Tokens when you send<br> your ETH to the crowd sale contract address.</li>
                        <li>After you make payment, your token will appear in your wallet.</li>
                        <li>Copy token address in your MEW or Metamask so it can recognise your EVOT<br> Tokens when they are released.</li>
                        <li>Store your EVOT tokens in your wallet until the EVABOT, EVOBOT & EVE go live!</li>
                    </ul>                                   
                </div>
                <div class="col-md-5 col-sm-6 distribution__limited_offer">
                    <p class="p6">Limited
                        <br> offer</p>
                    <p class="p7">500
                        <br>EVOAI Tokens</p>
                    <p class="p8">Giveaway to 50 randomly selected investors and get the privilege to test our bot during 2 weeks beta testing period.</p>
                    <p class="p8 p10">Here's how you can qualify:</p>
                    <ul class="list-unstyled process-list">
                        <li>1) Register an account with Evoai </li>
                        <li>2) Purchase a minimum of $250 or more EVOT's</li>
                        <li>3) Join our telegram group</li>
                    </ul>
                    <!--<p class="p8">Selected from the first 5000 registered </p>-->
                    <div id="mlb2-8254780" class="ml-subscribe-form ml-subscribe-form-8254780 ">
                        <form class="ml-block-form" action="#" data-id="" method="POST" target="_blank">
                            <p class="p9 form-section">
                                <span class="form-group ml-field-email ml-validate-required  ml-validate-email input_overflow">
                           <input type="email" name="fields[email]" class="form-control" placeholder="Enter your Email" value="" autocomplete="email" >     
                           </span>
                            </p>
                            <input type="hidden" name="ml-submit" value="1">
                            <p class="p10">
                                <button type="submit" class="btn btn-primary  partners__btn">RECEIVE 500 EVOBOT Tokens</button>
                            </p>
                            <p class="p10">Winners will be announced one day prior to our beta bot launch, via our telegram and website.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----End-Tokens-distribution-section------>
    <!---Start-Road-map----->
    <section class="simple-section roadmap" id="roadMap">
        <div class="container container_road_section">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">Roadmap</h2>
                    <h2 class="section-title">Roadmap</h2>
                </div>
            </div>
            <div class="row visible-lg visible-md">
                <div class="col-sm-12">
                    <div class="roadmap-container animatable right items-1 fadeInUp active">
                        <div class="roadmap-snake">
                            <div class="line shanke-line-1">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-2">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-3">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-4">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-5">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-6">
                                <div class="gradient"></div>
                            </div>
                            <div class="line shanke-line-7 hidden">
                                <div class="gradient"></div>
                            </div> 
                                                         
                            
                           
                        </div>
                        <div class="timeline-wrap">
                            <div class="item active blip" id="roadmap-event" data-month="4_2018">
                                <div class="dot violet"></div>
                                <span class="date">APRIL 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Research cryptocurrency markets and exchanges (completed).</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="5_2018">
                                <div class="dot violet"></div>
                                <span class="date">MAY 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Design concept of EVOAI (completed).</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="6_2018">
                                <div class="dot violet"></div>
                                <span class="date">JUNE 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Build team of web, API and blockchain specialists (complete).</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="7_2018">
                                <div class="dot violet"></div>
                                <span class="date">JULY 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Develop EVABOT alpha proof-of-concept (completed).</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="8_2018">
                                <div class="dot violet"></div>
                                <span class="date">AUGUST 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Launch EVOAI live ICO webpage (completed).</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="9_2017">
                                <div class="dot violet"></div>
                                <span class="date">SEPTEMBER 2018</span>
                                <div class="text-container">
                                    <div class="descr">- Private Sale.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="10_2018">
                                <div class="dot violet"></div>
                                <span class="date">OCTOBER 2018</span>
                                <div class="text-container">                                     
                                    <div class="descr">- Frontend 1.0 development.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="11_2018">
                                <div class="dot violet"></div>
                                <span class="date">NOVEMBER 2018</span>
                                <div class="text-container">      
                                    <div class="descr">- EVABOT 0.9 closed beta test.</div>
                                    
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="12_2018">
                                <div class="dot violet"></div>
                                <span class="date">DECEMBER 2018</span>
                                <div class="text-container">
                                    <div class="descr">- EVABOT 1.0 launch.</div>
                                    <div class="descr">- Begin EVOBOT development.</div> 
                                    
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="1_2019">
                                <div class="dot violet"></div>
                                <span class="date">JANUARY 2019</span>
                                <div class="text-container">
                                    <div class="descr">- EVOBOT closed beta for users to test and give feedback. </div>
                                    <div class="descr">- Get EVOT listed on external exchanges.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="2_2019">
                                <div class="dot violet"></div>
                                <span class="date">FEBRUARY 2019</span>
                                <div class="text-container">                                
                                    <div class="descr">- Launch the EVOAI platform with User Interface 2.0 with internal exchange.</div>
                                    <div class="descr">- Launch academy for tutorials for EVABOT/EVOBOT.</div>
                                    <div class="descr">- Launch EVOBOT basic trading tools.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="3_2019">
                                <div class="dot violet"></div>
                                <span class="date">MARCH 2019</span>
                                <div class="text-container">
                                    <div class="descr">- Launch EVOAI User Interface v2.0.</div>
                                    <div class="descr">- Begin EVE development.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="4_2019">
                                <div class="dot violet"></div>
                                <span class="date">APRIL 2019</span>
                                <div class="text-container"> 
                                    <div class="descr">-  Create custom wallet to hold and facilitate atomic-swap/exchange EVOT tokens.</div>
                                    <div class="descr">- Launch EVOBOT advanced trading tools and EVOCHARTS.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="5_2019">
                                <div class="dot violet"></div>
                                <span class="date">MAY 2019</span>
                                <div class="text-container">
                                    <div class="descr">- Deploy EVE A.I. and begin testing phase.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="7_2019">
                                <div class="dot violet"></div>
                                <span class="date">JULY 2019</span>
                                <div class="text-container">
                                    <div class="descr">- Launch EVE system.</div>
                                </div>
                            </div>
                            <div class="item active blip" id="roadmap-event" data-month="8_2019">
                                <div class="dot violet"></div>
                                <span class="date">AUGUST 2019</span>
                                <div class="text-container">
                                    <div class="descr">- Develop EVE modules and API.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix visible-sm visible-xs">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="<?php echo base_url(); ?>webroot/frontend/images/roadmap-main-image-updated-nov.png" class="img-responsive center-block">
                </div>
            </div>
        </div>
    </section>
    <!---End-Road-Map-Section----->    
    
    <!---Start-Team----->
    <section class="simple-section team-section" id="ourTeam">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">Our Team</h2>
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>  

            <div class="row clearfix prfl-sec prfl-sec-first">
                
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">&nbsp;
                    <!-- <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Tajar-Amdar.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Tajar Amdar</h4></div>
                    <div class="pro-desg"><p>EVOAI CEO 
                    </p></div>
                    <div class="pro-details">

                        <button data-toggle="modal" data-target="#modalTajar">Read More</button>
                    </div> -->

                </div>
                <!--//-->
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Nick-Tacminzis.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Nick Tacminzis</h4></div>
                    <div class="pro-desg"><p>EVOAI CEO<br />
                    <a href="https://www.linkedin.com/in/nicholas-tacminzis-78721915b/" target="_blank"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details"><button data-toggle="modal" data-target="#modalNick">Read More</button></div>

                </div>
                <!--//-->
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Rostyslav-Bortman.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Rostyslav Bortman</h4></div>
                    <div class="pro-desg"><p>Senior Blockchain Software Developer<!--<br />
                    <a href="#"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a>--></p></div>
                    <div class="pro-details" >
                        <button data-toggle="modal" data-target="#modalBortman">Read More</button>
                    </div>

                </div>
                <!--//-->
                
            </div>
            <div class="row clearfix prfl-sec">
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Bharat-Chhabra.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Bharat Chhabra</h4></div>
                    <div class="pro-desg"><p>Senior Javascript Engineer<br />
                    <a href="https://www.linkedin.com/in/bharat-chhabra-044bb1147/"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details"><button data-toggle="modal" data-target="#modalBharat">Read More</button></div>

                </div>
                <!--//-->
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Om-Prakash.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Om Prakash Verma</h4></div>
                    <div class="pro-desg"><p>Blockchain and front-end dev<br />
                    <a href="https://www.linkedin.com/in/om-verma-1ab9a6171/"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details"><button data-toggle="modal" data-target="#modalOm">Read More</button></div>

                </div>
                <!--//-->
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Otmane-Daghmouchi.jpg" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Otmane Daugmouchi</h4></div>
                    <div class="pro-desg"><p>Senior Front-end and UI/UX dev<!--<br />
                    <a href="#"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a>--></p></div>
                    <div class="pro-details"><button data-toggle="modal" data-target="#modalOtmane">Read More</button></div>

                </div>
                <!--//-->
                <!---->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Mehroz-Anwer.jpg" alt="" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Mehroz Anwer</h4></div>
                    <div class="pro-desg"><p>Head of Creative and Graphics<!--<br />
                    <a href="#"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a>--></p></div>
                    <div class="pro-details"><button data-toggle="modal" data-target="#modalMehroz">Read More</button></div>

                </div>
                <!--//-->
            </div>

			<div class="row clearfix prfl-sec prfl-sec-first">
                <div class="leftmrgn visible-lg visible-md">&nbsp;</div>
                
                <!-- Richard Nacht -->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/richard.jpg" alt="" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Richard Nacht</h4></div>
                    <div class="pro-desg"><p>Legal counsel<br />
                    <a href="https://www.linkedin.com/in/richardnacht" target="_blank"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details">
                        <button data-toggle="modal" data-target="#modalRichardNacht">Read More</button>
                    </div>
                </div>
                <!--//-->
                <!-- Richard Nacht -->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Taiki-Shino.jpg" alt="" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Taiki Shino</h4></div>
                    <div class="pro-desg"><p>Blockchain consultant<br />
                    <a href="https://www.linkedin.com/in/shino-tokyo/" target="_blank"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details">
                        <button data-toggle="modal" data-target="#modalTaikiShino">Read More</button>
                    </div>
                </div>
                <!--//-->
                <!-- Bianca Ruiz -->
                <div class="col-md-3 col-sm-4 profile-item">
                    <div class="pro-img col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo base_url(); ?>webroot/frontend/images/team/Bianca-Ruiz.jpg" alt="" class="img-responsive center-block">
                    </div>
                    <div class="pro-name"><h4>Bianca Ruiz</h4></div>
                    <div class="pro-desg"><p>Graphic Designer<br />
                    <a href="https://www.linkedin.com/in/bianca-ruiz-581197158" target="_blank"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" width="35" height="35" /></a></p></div>
                    <div class="pro-details">
                        <button data-toggle="modal" data-target="#modalBiancaRuiz">Read More</button>
                    </div>
                </div>
                <!--//-->
            </div>

        </div>
    </section>  

    <!-- End Team -->    
    <!---Start-FAQs----->
    <section class="faq-section" id="faqs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 animatable fadeInUp">
                    <h2 class="bg-title">FAQs</h2>
                    <h2 class="section-title">Frequently Asked Question</h2>
                </div>
            </div>

            <div class="row">
                <div class="panel-group col-sm-12" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading1">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapseOne"> What is EVOAI?</a> </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body"> EVOAI is the next generation trading engine that will empower users of all experience levels to earn income from the blockchain. The platform will do this by offering users the opportunity to invest in a multitude of trading systems, from passive-income automated arbitrage pools to AI powered signals and advanced manual trading bots </div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading2">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2"> Is EVOAI a Decentralized platform? </a> </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                            <div class="panel-body"> Yes! The platform is decentralized, the EVOAI platform is coded to extract data from the Ether Explorer via your Metamask and Myetherwallet. Your tokens are held in your wallet meaning that you are in full control of your assets and you are not required to deposit and store your EVOAI tokens on our platform. </div>
                          </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading3">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3"> How do I participate and buy an EVOAI (EVOT) token? </a> </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                            <div class="panel-body"> You will need a computer or laptop running the desktop version of Firefox /Chrome or MEW(Myetherwallet). Metamask a digital wallet used specifically with web applications. You also need to buy Ethereum (ETH) a crypto coin used on the Ethereum blockchain. Send your ETH from your Myetherwallet or Metamask wallet to the EVOAI Token Sale deposit address. The EVOAI smart contract will auto deliver your EVOT tokens when you send your ETH to the crowd sale contract address.</div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading4">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4"> What is your U.S.P?</a> </h4>
                          </div>
                          <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                            <div class="panel-body"> Our U.S.P is the EVOAI in house proprietary algorithms and in-house rapid API real-time connections, which will pull prices from over 80 connected exchanges ensuring the best arbitrage opportunities are found and utilized, ranking their execution in order of volumetric profitability and historic probabilities (i.e. total profit and chance of profit vs percentage profit) and executing the highest ranked opportunities, making its way down the list, throughout the 24-hour trading cycle. </div>
                          </div>
                        </div>                        
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading5">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5"> What is arbitrage trading?</a> </h4>
                          </div>
                          <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                            <div class="panel-body"> Arbitrage trading is a system of trading where, due to a price differential on two different markets, simultaneous trades can be executed that lock-in a guaranteed profit. The automated trading bot will only execute a trade that has an instant profit after fees, therefore the trade will never make a loss. </div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading6">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6"> Do trading bots actually exist?</a> </h4>
                          </div>
                          <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                            <div class="panel-body"> Yes! The EVOAI team consists of mathematicians, A.I. researchers and machine learning developers. Together we have customized the now familiar Blackbird trading bot and the Coinapi technology to create our own unique innovative trading bots. </div>
                          </div>
                        </div>                        
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading7">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7"> What is EVABOT?</a> </h4>
                          </div>
                          <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                            <div class="panel-body"> EVOBOT is a bot that can be programmed by users using a simple logic system based around traditional trading techniques. EVOBOT acts as a powerful tool to execute more complex trades leveraging the speed and decision-certainty of pre-programmed commands. These commands will have fully editable parameters that can be set by users and can also be combined with other compatible commands to create advanced automated trading strategies. </div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading8">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8"> How many EVOAI (EVOT) tokens have been issued? </a> </h4>
                          </div>
                          <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                            <div class="panel-body"> There is a total of 10million EVOAI tokens minted, 68% of which (or 6.8 million) will be available for sale. The smart contract prohibits any more tokens being minted. </div>
                          </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading9">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapse9"> What is EVE?</a> </h4>
                          </div>
                          <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                            <div class="panel-body"> Essentially, <strong>EVE</strong> represents the cognitive analysis of big data coupled with cutting-edge artificial intelligence to discover financial opportunity. She is a cryptocurrency AI that connects with external APIs, our in house proprietary algorithms and the blockchain to make informed trading decisions.</div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading10">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10"> When is EVOAI planning to be listed on external exchanges?</a> </h4>
                          </div>
                          <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                            <div class="panel-body"> Once we have successfully completed our token sale we will aim to be listed on several major exchanges. The EVOAI team have already reached out to a few representatives of these exchanges, however due to legal reasons we cannot disclose their names or exact dates for the listings that are planned. Please join our telegram group for the latest updates and announcements.</div>
                          </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading11">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapse11"> How do I display my new tokens?</a> </h4>
                          </div>
                          <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                            <div class="panel-body"> Copy token address in your MEW or MetaMask so it can recognize your EVOT tokens when they are released.<br>
                                <p><strong>Token Contract: 0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1</strong></p>
                                <p><strong>Symbol: EVOT, Decimal: 18</strong></p>
                            </div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading12">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12"> Can Citizens or residents of the United States participate in the token sale?</a> </h4>
                          </div>
                          <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                            <div class="panel-body"> Unfortunately, it is prohibited for U.S Citizens to participate in the token sale, it is only possible if you are an accredited (qualified) Investor.</div>
                          </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading13">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="true" aria-controls="collapse13"> What is your affiliate program?</a> </h4>
                          </div>
                          <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                            <div class="panel-body"> We have one level - 5% of Ico Purchase ONLY</div>
                          </div>
                        </div>
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading14">
                            <h4 class="panel-title"> 
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14"> How can I secure my account?</a> 
                            </h4>
                          </div>
                          <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
                            <div class="panel-body"> We recommend to all our users to activate 2FA (Two factor Authentication) in order to enforce an additional level of security. You will need to download the Google authenticator app and install on your smartphone. Please make sure you copy the QR code and be responsible for the secret code as once it is lost it cannot be recovered.</div>
                          </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="panel col-md-6">
                          <div class="panel-heading" role="tab" id="heading15">
                            <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="true" aria-controls="collapse15"> How do I access the bot?</a> </h4>
                          </div>
                          <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
                            <div class="panel-body"> To initiate the trading bot you are required to invest any amount over $250. The dashboard allows users to connect via their MetaMask wallets and perform various actions. Firstly, users can interact with the bots using the native EVOT token to participate in funding pools or to gain access to sophisticated manual trading bots. The EVOT token is available for purchase or sell in the internal EVOAI exchange, and will be available on select external exchanges soon after of launch. </div>
                          </div>
                        </div>                     
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!---End-FAQs----->
    <script type="text/javascript" src="<?php echo base_url();?>webroot/frontend/js/nouislider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>webroot/frontend/js/wNumb.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>webroot/frontend/js/custom.js"></script>   
    <script>
        var mixOrderValue = document.getElementById('orderValue');
        noUiSlider.create(mixOrderValue, {
          start:[0, 0.01],
          connect: true,
          range: {
            'min': 0,
            'max': 100
          },
          format: wNumb({
            //suffix: ' BTC'
            // decimals: 3
          })
        });

        var inputNumber = document.getElementById('input-number');
        mixOrderValue.noUiSlider.on('update', function( values, handle ) {

            var value = values[handle]; 
            if ( handle ) {
                inputNumber.value = value;
            } else {
                //select.value = Math.round(value);
            }
            enterValue();
        });

        // select.addEventListener('change', function(){
        //  mixOrderValue.noUiSlider.set([this.value, null]);
        // });

        inputNumber.addEventListener('change', function(){
            mixOrderValue.noUiSlider.set([null, this.value]);
        });

        function getCurrency_rate(currency_name)
        { 
            var coin_api_price = '';
            var ref_api_price = '';
            var str = currency_name; 
            var orderVal = document.mainForm.order_type.value;
            
            var arrow_val = $(".arrow_val").val();
            if(arrow_val == ''){
                arrow_val = 0.01;
                $(".arrow_val").val(arrow_val);
            }
            
            var str_array = str.split('_');
            var replace_arr = str.replace('_','');
            var API_name = $("#API_name").val();
            /* Coin API */
            var api_rname = '';
            $("#from_currency").text(str_array[0]);
            if(API_name == 'BITFINEX')
            {
                if(str_array[1] == 'USDT'){
                    api_rname = 'BITFINEX_SPOT_BTC_USD';
                }
                else{
                    api_rname = API_name+'_SPOT_'+currency_name;
                }
            }
            else{
                api_rname = API_name+'_SPOT_'+currency_name;
            }
            $.ajax({
                url:"https://rest.coinapi.io/v1/orderbooks/"+api_rname+"/latest?apikey=1205EBAC-2B31-4DD4-81E2-A2EA231240B4&limit=1",
                method:"get",
                dataType: 'json',
                success:function(response){
                    if(response)
                    {
                        if(orderVal == 'Buy'){
                            var order_book_price = response[0].asks[0].price;                           
                        }
                        else{
                            var order_book_price = response[0].bids[0].price;                                                       
                        }
                        var order_book_count_price = (order_book_price * arrow_val).toFixed(2);
                        $(".Show_order_book").val(order_book_count_price);  
                        /*
                        var show_Mix_order_book = $(".Show_Mix_order_book").val();
                        if(orderVal == 'Buy'){
                            if(show_Mix_order_book > order_book_count_price ){
                                $(".Show_Mix_order_book").val(order_book_count_price);
                            }
                        }
                        else{
                            if(show_Mix_order_book < order_book_count_price ){
                                $(".Show_Mix_order_book").val(order_book_count_price);
                            }
                        }
                        */
                        $("#ref_api_price").val(order_book_count_price);
                    }
                    sum_value();
                }
            });
            $.ajax({
                url:"https://rest.coinapi.io/v1/exchangerate/"+str_array[0]+"/"+str_array[1]+"?apikey=1205EBAC-2B31-4DD4-81E2-A2EA231240B4",
                method:"get",
                dataType: 'json',
                success:function(data){
                    var btc_price = data.rate;
                    var full_price = (btc_price * arrow_val).toFixed(2);                    
                    $(".Show_Mix_order_book").val(full_price);
                    coin_api_price = full_price;
                    $("#coin_api_price").val(coin_api_price);
                    sum_value();
                }
            });
            $(".select_price").text(str_array[1]);
        }

        function sum_value()
        {
            var ref_api_price = $("#ref_api_price").val();
            var coin_api_price = $("#coin_api_price").val();
            var orderVal = document.mainForm.order_type.value;
            if(orderVal == 'Buy'){
                var less_price = (parseFloat(ref_api_price) - parseFloat(coin_api_price)).toFixed(2);
                if(less_price < 0){
                    $(".Show_Mix_order_book").val(ref_api_price);
                    less_price = (0.00000000).toFixed(2);                   
                }
            }
            else{
                var less_price = (parseFloat(coin_api_price) - parseFloat(ref_api_price)).toFixed(2);
                if(less_price < 0){
                    $(".Show_Mix_order_book").val(ref_api_price);
                    less_price = (0.00000000).toFixed(2);
                }
            }
            var less_price_persent = ((less_price * 100)/ ref_api_price).toFixed(2);
            $(".Price_EVOAI").val(less_price);
            $(".Price_EVOAI_per").text(less_price_persent+'%');
        }

        function enterValue(){
            var currency_name = $("#currency_name").val();
            getCurrency_rate(currency_name);
        }

        function selectAPI_name(val){
            var currency_name = $("#currency_name").val();
            getCurrency_rate(currency_name);
        }

        function get_orderValue(){
            var currency_name = $("#currency_name").val();
            getCurrency_rate(currency_name);
        }
        
        /* Try profit bar */
		function getAmount_val()
		{
			var amount_value = $("#amount_value").val();
			var daily_amount = $("#daily_amount").val();
			var evoCycles_day = $("#evoCycles_day").val();
			var weekly_amount = $("#weekly_amount").val();
			//var last_amount = $("#last_amount").val();
			var monthly_amount = $("#monthly_amount").val();
			if(evoCycles_day == ''){
				evoCycles_day = 1;
			}
			if(amount_value != ''){
				$('#daily_amount').val(((evoCycles_day / 102) * amount_value).toFixed(10));
				$('#weekly_amount').val(((evoCycles_day / 102) * amount_value * 7).toFixed(10));
				$('#monthly_amount').val(((evoCycles_day / 102) * amount_value * 30).toFixed(10));
			}
		}
    </script>