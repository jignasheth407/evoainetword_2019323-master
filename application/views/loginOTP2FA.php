<form action="<?php echo base_url('profile/google2FAUpdate'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<p class="keycode">Key: <?php echo $otp_login_key; ?></p>
	<img src="<?php echo $google_chart_url; ?>" alt="QR Code" class="img-responsive mb-20 center-block">	
	<div class="form-group row clearfix">
		<div class="col-md-12">
			<?php echo form_input($token);?>			
		</div>
	</div>
	<div class="form-group">
		<input type="text" class="hidden" name="identity" value="<?php echo $identity; ?>">
		<input type="text" class="hidden" name="remember" value="<?php echo $remember; ?>">
		<input type="text" class="hidden" name="otp_login_key" value="<?php echo $otp_login_key; ?>">
	</div>
	<div class="modal-footer">
		<div class="row">
			<div class="col-md-4">
				<button type="submit" class="btn-submit">Confirm</button>
			</div>
			<div class="col-md-4">
				<span class="btn-submit" style="cursor: pointer;" onClick="profileFormClose()">Cancel</span>
			</div>
			
		</div>
	</div>
</form>