<section class="login-section" id="login">
	<div id="msg_div">
		<?php echo $this->session->flashdata('message');?>				
	</div>
	<div class="col-md-4">
		<ul class="sidebar-menu">
			<li class="<?php echo ($this->uri->segment(1)=='dashboard')?'active':''?>">
				<a href="<?php echo base_url();?>dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<!--
			<li class="<?php echo ($this->uri->segment(2)=='security')?'active':''?>">
				<a href="<?php echo base_url();?>dashboard/security">
					<i class="fa fa-creative-commons-sa"></i> <span>Security</span>
				</a>
			</li>
			-->
		</ul>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div class="row clearfix">
			<div class="col-sm-12 text-center">
				<h4>Dashboard</h4> 
			</div>
		</div>
		<div class="row clearfix form-group">
			<div class="col-md-12">
				<img src="<?php echo $google_chart_url; ?>" alt="QR Code"><br>
			</div>
			<div class="col-md-12">
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
</section>