<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>               
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-sm-9 col-md-10 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div id="msg_div">
						<?php echo $this->session->flashdata('message');?>	
					</div>
					<p id="show_msg"></p>						
					<div class="row clearfix">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username" value="<?php echo $user_details->username; ?>" class="form-control" placeholder="Cryptoguy">
								<span class="text-danger hidden error_username" >Username name is required</span>
							</div>
							<div class="form-group">
								<label>Email <input type="checkbox" <?php if($_COOKIE['cache_section'] == 1){echo 'checked';}?> id="emailenabledisable"> Show</label><br>
								<p class="enabledemail">
									<input type="text" readonly value="<?php echo $user_details->email; ?>" class="form-control">
								</p>
								<p class="disabledemail hidden">
									<input type="text" readonly  class="form-control">
								</p>
							</div>
							<div class="form-group">
								<label>MEW/Metamask-Compulsory</label>
								<input type="text" name="eth_address" id="eth_address" onBlur="checkAddres();" value="<?php echo $user_details->eth_address; ?>" class="form-control">
								<span class="text-danger hidden error_eth_address">ETH address is not valid</span>
							</div>
							<div class="form-group">
								<label>Referral</label>
								<input type="text" readonly value="<?php echo $user_details->user_referenced_code; ?>" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<span style="cursor:pointer;" onClick="updateProfile();" class="btn-submit btn-update mt-0">SAVE</span>									
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label>Current Password</label>
								<input type="password" name="current_password" id="current_password" class="form-control" placeholder="Type your password">
								<span class="text-danger hidden error_current_password">Current password is required</span>
								<span class="text-danger hidden error_current_password_err">Password are not valid</span>
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="new_password" id="new_password" class="form-control" placeholder="Type new password">
								<span class="text-danger hidden error_new_password_err">New password is required</span>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm your new password">
								<span class="text-danger hidden error_confirm_password">Confirm password is required</span>
								<span class="text-danger hidden error_confirm_password_err">New password and confirm password is not same</span>
							</div>
							<div class="form-group clearfix">								
								<span style="cursor:pointer;" onClick="changePassword();" class="btn-submit btn-update">UPDATE</span>	
							</div>
							<!--<form action="" id="profileForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">-->
								<div class="form-group mt-30 clearfix">
									<div class="checkbox">
										 <label style="font-size:20px">
											Add Google 2 Factor Authorization 
										</label><br>
										<label>
											<?php
												if($user_details->sign_in == 1)
												{
													?>
														<input type="checkbox" data-toggle="modal" data-target="#modal2FAModelClose" name="otp" id="otp" value="1" <?php echo ($user_details->sign_in == 1)?'checked':'';?>>
														<span class="cr">
															<i class="cr-icon fas fa-check"></i>
														</span>
													<?php
													echo 'Enabled';
												}
												else
												{
													?>
														<input type="checkbox" data-toggle="modal" data-target="#modal2FAModel" name="otp" id="otp" value="1">
														<span class="cr">
															<i class="cr-icon fas fa-check"></i>
														</span>
													<?php
													echo 'Enable';
												}
											?>
										  </label><br>									
										<p>&nbsp;</p>
										<?php
											/*
											if($google_chart_url)
											{
												?>
													<p>Scan this code from your mobile Google Authenticator app to activate 2 factore authentication </p>
													<img src="<?php echo $google_chart_url; ?>" alt="QR Code" class="img-responsive mt-20">				
												<?php
											}
											*/
										?>
									</div>
									<!-- 2 Factor Authentication -->
									<?php
									/*
									<div class="row form-group">
										<div class="col-md-12 2FAModelAct hidden">
											<p>Scan this code from your mobile Google Authenticator app to activate 2 factore authentication</p>
											<div class="response">
											</div>
										</div>
										<div class="col-md-12 2FAModelDact hidden">
											<p>Enter code</p>
											<div class="responseClose">
											</div>
										</div>
									</div>
									*/
									?>
									<!--//-->
								</div>
							<!--</form>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- 2FAModel Enable-->
<div id="modal2FAModel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Scan this code from your mobile Google Authenticator app to activate 2 factore authentication</h4>
			</div>
			<div class="modal-body">				
				<div class="response">
				</div>
			</div>			
		</div>
	</div>
</div>
<!--//-->
<!-- 2FA Disable -->
<div id="modal2FAModelClose" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">To Deactivate 2 factor authentication please enter the code.</h4>
			</div>
			<div class="modal-body">				
				<div class="responseClose">
				</div>
			</div>			
		</div>
	</div>
</div>
<!--//-->
<script>	
	$('#otp').change(function() { //$("#profileForm").submit();
		var otp = $("#otp").prop('checked');
		<?php
			if($user_details->sign_in != 1)
			{
				?>
					$(".2FAModelAct").removeClass("hidden");
					$(".2FAModelDact").addClass("hidden");
					var dataString = 'otp=1';
					$.ajax({
						url : 'profile/google2FA',
						type : 'POST',
						data : dataString,
						cache: false,
						success: function(response){
							if(response)
							{
								$(".response").html(response);
							}
							else
							{
								$(".response").html('');
							}
						}			
					});
				<?php
			}
			else
			{
				?>
					$(".2FAModelAct").addClass("hidden");
					$(".2FAModelDact").removeClass("hidden");
					var dataString = 'otp=0';
					$.ajax({
						url : 'profile/google2FACloseForm',
						type : 'POST',
						data : dataString,
						cache: false,
						success: function(response){
							if(response)
							{
								$(".responseClose").html(response);
							}
							else
							{
								$(".responseClose").html('');
							}
						}			
					});
				<?php
			}
		?>
	});
	
	/* google2FAUpdate */
	function google2FAUpdate()
	{
		$("#profileForm").submit();
	}
	/* google2FAClose */
	function google2FAClose()
	{
		$("#profileForm").submit();
	}
		
	/* profileFormClose */
	function profileFormClose()
	{
		location.href="profile/profileFormClose";
	}
	
	function checkAddres(){
		var address =  $('#eth_address').val();
		$.ajax({
			url: 'https://shapeshift.io/validateAddress/'+address+'/'+'eth', // form action url
			type: 'GET', // form submit method get/post
			dataType: 'json', // request type html/json/xml
			success: function(resp) 
			{
				if(resp.isvalid==true){
					$('.error_eth_address').addClass('hidden');
				}
				else
				{
					$('.error_eth_address').removeClass('hidden');
					return false;
				}
			}
			
		}); 
	}
	
	/* Profile update */
	function updateProfile()
	{
		var username = $("#username").val();
		var eth_address = $("#eth_address").val();
		checkAddres();
		if(username != '' && eth_address != '')
		{
			$(".error_username").addClass('hidden');
			var dataString = 'username='+username+'&eth_address='+eth_address;
			$.ajax({
				url: 'profile/updateProfile',
				type: 'post',
				data: dataString,
				success: function(result){
					$("#show_msg").html(result);				
					$(".error_eth_address").addClass('hidden');
				}			
			});			
		}
		else
		{
			if(username == '')
			{
				$(".error_username").removeClass('hidden');
				return false;
			}
			if(eth_address == '')
			{
				$(".error_eth_address").removeClass('hidden');
				return false;
			}			
		}
	}
	
	/* changePassword */
	function changePassword()
	{
		var current_password = $("#current_password").val();
		var new_password = $("#new_password").val();
		var confirm_password = $("#confirm_password").val();
		if(current_password == '')
		{
			$(".error_current_password").removeClass('hidden');
			return false;
		}
		if(new_password == '')
		{
			$(".error_new_password_err").removeClass('hidden');
			return false;
		}
		if(confirm_password == '')
		{
			$(".error_confirm_password").removeClass('hidden');
			return false;
		}
		if(current_password != '' && new_password != '' && confirm_password != '')
		{
			$(".error_current_password").addClass('hidden');
			$(".error_new_password_err").addClass('hidden');
			$(".error_confirm_password").addClass('hidden');
			if(new_password != confirm_password)
			{
				$(".error_confirm_password_err").removeClass('hidden');
				return false;
			}
			if(current_password != '')
			{
				var dataString = 'current_password='+current_password+'&new_password='+new_password;
				$.ajax({
					url: 'profile/changePassword',
					type: 'post',
					data: dataString,
					success: function(response){
						if(response)
						{
							$("#show_msg").html(response);
							$(".error_confirm_password_err").addClass('hidden');
						}
					}
				});
			}
		}
	}
</script>