<section class="header dash-header" id="top">
	<div class="container-fluid">
		<div class="header__logo pull-left">
			<a href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo_web.png" alt="" class="logo_pc">
				<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/logo.png" alt="" class="logo_mob">
			</a>
		</div>
		<a href="#" data-toggle="offcanvas" class="toggle-btn"><i class="fa fa-navicon fa-3x"></i></a>         
	</div>
</section>       
<section class="dashboard-section">	
	<div class="wrapper">
		<div class="row row-offcanvas row-offcanvas-left">
			<!-- sidebar -->
			<?php echo $this->load->view('sidebar.php');?>
			<!-- /sidebar -->
			<!-- main right col -->
			<div class="column col-sm-9 col-xs-11 main-dashcontent" id="main">  
				<div id="msg_div">
					<?php echo $this->session->flashdata('message');?>				
				</div>
				<h2>
					<span class="collapse in hidden-xs">Profile</span>
				</h2>
				<div class="row form-group">
					<div class="col-md-12">
						<img src="<?php echo $google_chart_url; ?>" alt="QR Code"><br>
					</div>
					<div class="col-md-12 hidden">
						<div id="backup_codes">
							<p>
							<?php
								if($backup_codes)
								{
									foreach ($backup_codes as $backup_code){
										echo $backup_code.'<br>';														
									}
								}
							?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- /main -->
		</div>
	</div>
</section>


