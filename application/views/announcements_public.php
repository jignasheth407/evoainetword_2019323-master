<?php echo $this->load->view('menu.php');?>

<section class="news-section simple-section services services-section">
	<div class="container">
		<div class="row clearfix">
			<div class="col-sm-12 fadeInUp animated">
				<h2 class="bg-title">Announcements</h2>
				<h2 class="section-title">Announcements</h2>
			</div>
		</div>    
		<!---->
		<div class="row">
			<div class="col-md-12"> 
				<!-- Nav tabs -->
				<div class="card">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">What's New</a></li>
						<li role="presentation"><a href="#system" aria-controls="system" role="tab" data-toggle="tab">System Update</a></li>
						<li role="presentation"><a href="#campaign" aria-controls="campaign" role="tab" data-toggle="tab">Campaign</a></li>           
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<!---->
						<div role="tabpanel" class="tab-pane active" id="recent">
							<!--  Search -->
							<div class="row clearfix">
								<div class="col-md-4 col-sm-6 col-xs-6">
									<h3 class="tab-title text-left">What`s new</h3>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-6 form-group pull-right">
									<div id="imaginary_container"> 
										<div class="input-group stylish-input-group">
											<input type="text" class="form-control" onKeyup="searchAnnounc(value, 'what_s_new')" placeholder="Search" >
											<span class="input-group-addon">
												<i class="fa fa-search"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!--//-->						
							<!--Post List-->
							<div class="row clearfix">
								<div class="col-md-12">
									<ul class="post-list-items what_s_new">
										<?php
											if($announcements_details)
											{
												foreach($announcements_details as $res)
												{
													if($res->announcements_category == 'What`s new')
													{
														?>
															<li>
																<h3 class="post-title">
																	<a href="<?php echo base_url(); ?>announcements/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><?php echo $res->announcements_title; ?></a>
																</h3>
																<p class="date"><b>Start Date: </b><?php echo $res->announcements_start_date; ?></p>                                    
																<p class="date"><b>End Date: </b><?php echo $res->announcements_end_date; ?></p>                                    
															</li>
														<?php										
													}
												}
											}
										?>																			
									</ul>	
								</div>
							</div>
							<!--//-->													
						</div>
						<!--//-->  
						<div role="tabpanel" class="tab-pane" id="system">
							<!--  Search -->
							<div class="row clearfix">
								<div class="col-md-4 col-sm-6 col-xs-6">
									<h3 class="tab-title text-left">System</h3>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-6 form-group pull-right">
									<div id="imaginary_container"> 
										<div class="input-group stylish-input-group">
											<input type="text" class="form-control" onKeyup="searchAnnounc(value, 'system_announ')" placeholder="Search" >
											<span class="input-group-addon">
												<i class="fa fa-search"></i>												
											</span>
										</div>
									</div>
								</div>
							</div>
							<!--//-->						
							<!--Post List-->
							<div class="row clearfix">
								<div class="col-md-12">
									<ul class="post-list-items system_announ">
										<?php
											if($announcements_details)
											{
												foreach($announcements_details as $res)
												{
													if($res->announcements_category == 'System update')
													{
														?>
															<li>
																<h3 class="post-title">
																	<a href="<?php echo base_url(); ?>announcements/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><?php echo $res->announcements_title; ?></a>
																</h3>
																<p class="date"><b>Start Date: </b><?php echo $res->announcements_start_date; ?></p>                                    
																<p class="date"><b>End Date: </b><?php echo $res->announcements_end_date; ?></p>                                          
															</li>
														<?php										
													}
												}
											}
										?>																			
									</ul>	
								</div>
							</div>
							<!--//-->
						</div>
						<div role="tabpanel" class="tab-pane" id="campaign">
						<!--  Search -->
							<div class="row clearfix">
								<div class="col-md-4 col-sm-6 col-xs-6">
									<h3 class="tab-title text-left">Campaign</h3>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-6 form-group pull-right">
									<div id="imaginary_container"> 
										<div class="input-group stylish-input-group">
											<input type="text" class="form-control" onKeyup="searchAnnounc(value, 'campaign_announ')" placeholder="Search" >
											<span class="input-group-addon">
												<i class="fa fa-search"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!--//-->						
							<!--Post List-->
							<div class="row clearfix">
								<div class="col-md-12">
									<ul class="post-list-items campaign_announ">
										<?php
											if($announcements_details)
											{
												foreach($announcements_details as $res)
												{
													if($res->announcements_category == 'Campaign')
													{
														?>
															<li>
																<h3 class="post-title">
																	<a href="<?php echo base_url(); ?>announcements/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><?php echo $res->announcements_title; ?></a>
																</h3>
																<p class="date"><b>Start Date: </b><?php echo $res->announcements_start_date; ?></p>                                    
																<p class="date"><b>End Date: </b><?php echo $res->announcements_end_date; ?></p>                                               
															</li>
														<?php										
													}
												}
											}
										?>																			
									</ul>	
								</div>
							</div>
						</div>            
					</div>
				</div>
			</div>
		</div>   
	</div>
</section>
<script>
	function searchAnnounc(val, cat_name)
	{
		var dataString = 'title='+val+'&cat_name='+cat_name;			
		$.ajax({
			url: '<?php echo base_url(); ?>announcements/searchAnnouncementPOST',
			type: 'POST',
			data: dataString,
			cache: false,
			success: function(responce){ 
				if(responce)
				{
					$('.'+cat_name).html(responce);
				}
				else
				{
					$('.'+cat_name).html('');
				}
			}
		});	
	}
</script>