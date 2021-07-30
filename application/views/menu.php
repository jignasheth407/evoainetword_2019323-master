	<section class="header  desk-header notfixed" id="top">
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
                    <li><a href="<?php echo base_url(); ?>#faqs" class="nav-link js-scroll-trigger">FAQ</a></li>   
                    
                    <?php
					if($this->Ref_UserID)
					{
						?>
							<li><a href="<?php echo base_url('logout'); ?>" class="header__wallet">
								<span class="text-center">Logout</span>
							</a></li> 
							<li>
								<a href="<?php echo base_url(); ?>dashboard" class="header__wallet">
									<?php echo $this->Ref_UserName; ?>
								</a>
							</li> 
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
            <!-- <div class="header__logo">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo_web.png" alt="" class="logo_pc">
                    <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo.png" alt="" class="logo_mob">
                </a>
            </div> -->
            <!-- Logo -->
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 hidden-xs">
          <div>
          <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo_web.png" alt="" class="img-responsive" >      
          </a>
          </div>
        </div>
        <!--//-->
            <a href="javascript:open_popup('#popup-menu')" class="header__menu_mob_link"></a>
            <nav class="header__menu hidden">
                <ul>
                    <li><a class="nav-link js-scroll-trigger" href="#ecosystem">About EVOAI</a></li>
                    <li><a class="nav-link js-scroll-trigger" href="#apiConnected">Partners</a></li>
                    <li><a class="nav-link js-scroll-trigger" href="#ourTeam">Team</a></li>
                    <li><a class="nav-link js-scroll-trigger" href="#distributionTkn" target="_blank">Token</a></li>
                    <li><a class="nav-link js-scroll-trigger" href="#roadMap" target="_blank">Roadmap</a></li>                    
                </ul>
            </nav>
            <!--<a onclick="" href="#" target="_blank" class="btn btn-danger header__contribute">CONTRIBUTE</a>-->
            <div class="col-md-4 col-lg-4 pull-right">
              <nav class="header__right">
                <a href="<?php echo base_url(); ?>#faqs" class="nav-link js-scroll-trigger">FAQ</a> 
        <?php
          if($this->session->userdata('Ref_UserID'))
          {
            ?>
              <a href="<?php echo base_url('home/logout'); ?>" class="header__wallet">
                <span class="text-center">Logout<span>
              </a> 
              <a href="<?php echo base_url(); ?>dashboard" class="header__wallet">
                <?php echo $this->Ref_UserName; ?>
              </a> 
            <?php
          }
          else
          {
            ?>
              <a href="<?php echo base_url(); ?>login" class="header__wallet nav-link js-scroll-trigger hidden">
                <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/login_new.png">Login
              </a>                    
            <?php
          }
        ?>
            </nav>
            </div>
            
        </div>
    </section>