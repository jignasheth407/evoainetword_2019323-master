<form action="<?php echo base_url('profile/google2FAClose'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="form-group">
		<?php echo form_input($token);?>			
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
				<span class="btn-submit" style="cursor: pointer;" data-dismiss="modal">Cancel</span>
			</div>			
		</div>
	</div>
</form>