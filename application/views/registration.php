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
                    <h4>Create your account!</h4> 
                </div>
            </div>
            <div class="row clearfix">
                <form action="<?php echo base_url('home/registration'); ?>" method="post" accept-charset="utf-8" onsubmit="return check_registration()" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-12">
					<div class="col-md-12 form-group">
						<input type="text" name="username" id="username" onkeyup="error_remove('username')" value="<?= set_value('username'); ?>" class="form-control" placeholder="Enter name...">
						<span class="text-danger error_username hidden">Username is required</span>
						<?php echo form_error('username','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="email" name="email" id="email" onkeyup="error_remove('email')" class="form-control" value="<?= set_value('email'); ?>"  placeholder="Enter email..." />
						<span class="text-danger error_email hidden">Email is required</span>
						<span class="text-danger error_email_r hidden">Email is already exists</span>
						<?php echo form_error('email','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="password" name="password" id="password" onkeyup="error_remove('password')" class="form-control" placeholder="Your Password...">
						<span class="text-danger error_password hidden">Password is required</span>
						<?php echo form_error('password','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="password" name="re_password" id="re_password" onkeyup="error_remove('re_password')" class="form-control" placeholder="Confirm your password...">
						<span class="text-danger error_password hidden">Confirm Password is required</span>
						<span class="text-danger error_re_password_val hidden">Password and confirm password is not same</span>
						<?php echo form_error('password','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="text" name="referenced_code" id="referenced_code" value="<?php echo $referral_code; ?>" onblur="check_referencedCode();" class="form-control" placeholder="Referenced code...">
						<span class="text-danger error_referenced_code hidden">Referenced code is not found</span>
						<?php echo form_error('referenced_code','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="text" name="eth_address" required id="eth_address" onblur="ethAddress_validation();" value="<?= set_value('eth_address'); ?>" class="form-control" placeholder="ETH Address...">
						<span class="text-danger error_eth_address hidden">ETH address is not valid</span>
						<span class="text-danger error_eth_address_exists hidden">ETH address is already exists</span>
						<?php echo form_error('eth_address','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<p>
							<input type="checkbox" name="term_and_condition" id="term_and_condition"> I accept <a href="" class="font-purple">the terms and conditions</a><br>
							<span class="text-danger error_term_and_condition hidden">This field is required</span>
						</p>
						<p>
							<input type="checkbox" name="not_citizen_any_country" id="not_citizen_any_country"> I am not a citizen of any country that restricts cryptocurrencies and investment programs.<br/>
							<span class="text-danger error_not_citizen_any_country hidden">This field is required</span>
						</p>
						<p>
							<input type="checkbox" name="not_registering" id="not_registering"> I am not registering on behalf of a user that cannot participate to the program.<br/>
							<span class="text-danger error_not_registering hidden">This field is required</span>
						</p>
					</div>
					<div class="col-md-12 form-group">
						<script src="https://www.google.com/recaptcha/api.js" async defer></script>                                 
						<div id="re_captcha" class="g-recaptcha" data-sitekey="<?php echo reCaptcha_sitekey; ?>"></div>  
						<span class="text-danger captcha hidden">reCaptcha is invalid</span>
					</div>
					<div class="col-md-12 form-group text-center">
						<button type="submit" name="Submit" value="Submit" class="btn-submit">SIGN UP</button>
						<a href="<?php echo base_url('login');?>" class="font-purple"><strong>Already have an account?</strong></a>
					</div>
				</form> 
            </div>
        </div>
    </section>
    <!---End Login----->