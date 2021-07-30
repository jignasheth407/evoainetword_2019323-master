	<?php echo $this->load->view('menu.php');?>
    <section class="login-section" id="login">
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
		</div>
        <div class="col-md-8 col-md-offset-2 box-shadow padT30 padB30">
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp text-center">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">
                    </a>                 
                    <h4>Forgot password</h4> 
                </div>
            </div>
            <div class="row clearfix">
                <form action="<?php echo base_url('home/forgotPassword'); ?>" method="post" onsubmit="return validate()" accept-charset="utf-8" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">                       
					<div class="col-md-12 form-group">
						<label class="text-center">Write down your email address to reset password</label><br>
						<input type="email" name="email" required class="form-control" placeholder="Enter email...">
						<?php echo form_error('email','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<script src="https://www.google.com/recaptcha/api.js" async defer></script>                                 
						<div id="re_captcha" class="g-recaptcha" data-sitekey="<?php echo reCaptcha_sitekey; ?>"></div>  
						<span class="text-danger captcha hidden">reCaptcha is invalid</span>
					</div>
					<div class="col-md-12 form-group">
						<button type="submit" name="ForgotPassword" value="forgot" class="btn-submit">SEND</button>
					</div>
					<div class="col-md-12 form-group text-center">
						<p><a href="<?php echo base_url('login'); ?>" class="font-purple">Return to login</a></p>
					</div>
				</form>
            </div>
        </div>
    </section>
    <!---End Login----->