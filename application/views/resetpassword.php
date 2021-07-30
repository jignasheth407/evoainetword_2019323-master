	<?php echo $this->load->view('menu.php');?>
    <!---Start ----->
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
                    <h4>Reset password</h4> 
                </div>
            </div>
			<div class="row clearfix">
				<form action="" method="post" accept-charset="utf-8" onsubmit="return chekpassword()" class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-12">
					<div class="col-md-12 form-group">
						<input type="password" id="password" name="password" required class="form-control" placeholder="Enter password...">
						<?php echo form_error('password','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<input type="password" id="re_password" name="re_password" required class="form-control" placeholder="Enter re-password...">
						<?php echo form_error('re_password','<spna class="text-danger">','</span>');?>
					</div>
					<div class="col-md-12 form-group">
						<button type="submit" name="resetpassword" value="resetpassword" class="btn-submit">Submit</button>
					</div>
				</form> 
			</div>
        </div>
    </section>
    <!---End Login----->
	<script>
		function chekpassword()
		{
			var password = $("#password").val();
			var re_password = $("#re_password").val();
			if(password != re_password)
			{
				alert('password and re-password do not match');
				return false;
			}
		}
	</script>