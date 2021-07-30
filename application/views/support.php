<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>              
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-md-10 col-sm-9 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<p id="show_msg"></p>	
					<p class="text-center mb-70">Our support team is here help you. Please send us a message using the from below.</p>
					<div class="row clearfix">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="subject" id="subject" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" id="email" value="<?php echo $this->Ref_UserEmail; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" id="message" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<span class="btn-submit btn-update mt-0" onclick="supportDataStore();">Send</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	function supportDataStore()
	{
		var email = $("#email").val();
		var subject = $("#subject").val();
		var message = $("#message").val();
		if(email == '' || subject == '' || message == '')
		{
			var result = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>All field are required!</div>';
			$("#show_msg").html(result);
		}
		else
		{
			var dataString = 'email='+email+'&subject='+subject+'&message='+message;
			$.ajax({
				url: 'support/storeData',
				type: 'post',
				data: dataString,
				success: function(res){
					if(res)
					{
						$("#show_msg").html(res);
					}
					else
					{
						var result = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>All field are required!</div>';
						$("#show_msg").html(result);
					}
				}
			});
		}
	}
</script>