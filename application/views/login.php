	<?php echo $this->load->view('menu.php');?>
    <section class="login-section" id="login">		
        <div class="col-md-8 col-md-offset-2 box-shadow padT30 padB30">
            <div class="row clearfix">
                <div class="col-sm-12 animatable fadeInUp text-center">
                    <a href="<?php echo base_url();?>">
                        <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">
                    </a>                 
                    <h4>Log in</h4> 
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>				
					</div>
                </div>
            </div>
            <div class="row clearfix">
                <form action="" method="post" onsubmit="return validate()" accept-charset="utf-8" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="row clearfix">
                        <div class="col-md-12 form-group">
                            <input type="text" name="email" autocomplete="off" id="login_email" onBlur="check_email();" required class="form-control" placeholder="Enter email...">
							<span class="text-danger login_email hidden">Email id is not registered</span>
						</div>
                        <div class="col-md-12 form-group">
                            <input type="password" name="password" autocomplete="off" required class="form-control" placeholder="Your Password...">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="check-box">
                                <input type="checkbox" name="remember" value="0"> Remember Password?
                            </div>
                        </div>                      
                        <div class="col-md-12 form-group">
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>                                 
                            <div id="re_captcha" class="g-recaptcha" data-sitekey="<?php echo reCaptcha_sitekey;?>"></div>  
                            <span class="text-danger captcha hidden">reCaptcha is required</span>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" name="Login" value="Login" class="btn-submit">LOG IN</button>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="<?php echo base_url('home/forgotPassword');?>" class="font-purple"><strong>Forgot your password?</strong></a>
                            <p>Don't have account? <a href="<?php echo base_url('registration'); ?>" class="font-purple"><strong>signup</strong></a></p>
                        </div>
                    </div>                      
                </form> 
            </div>
        </div>
    </section>
    <!---End Login----->