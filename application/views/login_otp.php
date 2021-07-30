	<?php echo $this->load->view('menu.php');?>
    <section class="login-section" id="login">
		<div id="msg_div">
			<?php echo $this->session->flashdata('message_login');?>				
		</div>
        <div class="col-md-8 col-md-offset-2 box-shadow padT30 padB30">
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp text-center">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">
                    </a>                 
                    <h4>Please input otp code from google authenticator</h4> 
                </div>
            </div>
            <div class="row clearfix">
                <form action="" method="post" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="row clearfix">
                        <div class="col-md-12 form-group">
                            <?php echo form_input($token);?>	
                        </div>
                       <div class="col-md-12 form-group">
							<input type="text" class="hidden" name="identity" value="<?php echo $identity; ?>">
							<input type="text" class="hidden" name="remember" value="<?php echo $remember; ?>">
							<input type="text" class="hidden" name="otp_login_key" value="<?php echo $otp_login_key; ?>">
						</div>
						<div class="col-md-12 form-group">
                            <div class="check-box">
                                <input type="checkbox" name="remember" value="0"> Remember Password?
                            </div>
                        </div> 
						<div class="col-md-12 form-group">
							<button type="submit" class="btn-submit">Submit</button>							
						</div>
						<div class="col-md-12 form-group">
							<p>			
								<a href="<?php echo base_url('registration'); ?>" class="font-purple"><strong>Sign up</strong></a>
							</p>							
							<p>			
								<a href="<?php echo base_url('home/forgotPassword');?>" class="font-purple"><strong>Forgot your password?</strong></a>
							</p>							
						</div>
                    </div>                      
                </form> 
            </div>
        </div>
    </section>