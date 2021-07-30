	<?php echo $this->load->view('menu.php');?>
	<section class="login-section" id="login">		
        <div class="col-md-8 col-md-offset-2 box-shadow padT30 padB30">
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp text-center">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">
                    </a>                 
                    <h4>Thanks</h4> 
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>				
					</div>
                </div>
            </div>
            <div class="row clearfix">
				<div class="col-md-12 form-group">
					<p>Your profile update successful</p>
				</div>
            </div>
        </div>
    </section>
    <!---End Login----->