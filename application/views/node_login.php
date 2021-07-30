<body onload="formSubmit()" class="hidden">	
	<div class="dash-body">
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
			<form action="http://evoai.tech:7000/login" method="post" id="loginForm" accept-charset="utf-8" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
				<div class="row clearfix">
					<div class="col-md-12 form-group">
						<input type="hidden" name="uId" class="form-control hidden" value="<?php echo $user_details->id; ?>">
					</div>
				</div>                      
			</form> 
		</section>
	</div>
	<script>
		function formSubmit() {
			$("#loginForm").submit();
		}
	</script>
</body>
