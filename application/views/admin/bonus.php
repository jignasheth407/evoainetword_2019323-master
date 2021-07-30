	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bonus
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Bonus</li>
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>
		</div>
		<!-- Main content -->
		<section class="content">                
			<div id="content">
				<div class="row">				
					<div class="col-md-12 column">				
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Bonus</h3> 
							</div>							
							<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="box-body">
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Bonus</label>
												<input name="bonus" class="form-control"  type="text" id="bonus" value="<?php echo $bonus_details->bonus; ?>">												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>&nbsp;</label>
												<button class="btn btn-success btn-sm" type="submit" name="Update" value="Update" >Update</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script>
		/* Change status */
		function setStatusDoc(ID, PAGE, status) 
		{
			var str = 'id='+ID+'&status='+status;
			jQuery.ajax({
				type :"POST",
				url  :PAGE,
				data : str,
				success:function(data)
				{			
					if(data==1)
					{
						var a_spanid = 'active_d'+ID ;
						var d_spanid = 'inactive_d'+ID ;
						if(status !="1")
						{
							$("#"+a_spanid).hide();
							$("#"+d_spanid).show();
							jQuery("#msg_div").html();
						}
						else
						{			
							$("#"+d_spanid).hide();
							$("#"+a_spanid).show();
							jQuery("#msg_div").html();
						}
					}
				} 
			});
		}
	</script>