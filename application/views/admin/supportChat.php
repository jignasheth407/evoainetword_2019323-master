	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Support
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Support</li>
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>
		</div>
		<!-- Main content -->
		<section class="content">
			<div id="content">
				<div class="container">
					<h3 class=" text-center">Messaging</h3>
					<div class="messaging">
						<div class="mesgs">
							<div class="msg_history">
								<?php
									if($supportChat_list != '')
									{
										foreach($supportChat_list as $res)
										{
											if($res->to_id == 0)
											{
												?>
													<div class="incoming_msg">
														<div class="incoming_msg_img"> 
															<img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
														</div>
														<div class="received_msg">
															<div class="received_withd_msg">
																 
																<p>
																	<?= $res->message ?>
																</p>
																<span class="time_date"> <?= $res->created_date ?></span>
															</div>
														</div>
													</div>
												<?php
											}
											else
											{
												?>
													<div class="outgoing_msg">
														<div class="sent_msg">																														
															<p>
																<?= $res->message ?>
															</p>
															<span class="time_date"> <?= $res->created_date ?></span> 
														</div>
													</div>
												<?php
											}
										}
									}
									else
									{
										?>
											No record found
										<?php
									}
								?>
							</div>
							<?php
								if($supportChat_list[0]->status == 0)
								{
									?>
										<div class="type_msg">
											<div class="input_msg_write">
												<input type="text" id="message" name="message" class="write_msg" placeholder="Type a message" />
												<input type="hidden" id="ticket" name="ticket" class="hidden" value="<?= $supportChat_list[0]->ticket ?>" />
												<input type="hidden" id="to_id" name="to_id" class="hidden" value="<?= $supportChat_list[0]->to_id ?>" />
												<span class="msg_send_btn" onClick="supportReply();"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span>
												<p></p><p></p>	
												<a class="confirm btn btn-success btn-lg col-md-12" onclick="return ticketClose_detail('admin/support/ticketClose/<?php echo $supportChat_list[0]->ticket;?>');" href="javascript:void(0);">Ticket Close</a>														
											</div>
										</div>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script>
		/* Support chat */
			setInterval(function(){ 
				var id = '<?= $supportChat_list[0]->ticket ?>';
				if(id)
				{
					supportChat_live(id);							
				}
			}, 5000);
			
			function supportChat_live(id)
			{
				var dataString = 'ticket='+id;
				$.ajax({
					url: '<?php echo base_url()?>admin/support/supportChat_live',
					type: 'GET',
					dataType: 'text',
					data: dataString,
					cache: false,
					success: function(response){
						if(response)
						{
							$('.msg_history').html(response);
						}
						else
						{
							$('.msg_history').text('No record found');
						}
					}
				});			
			}
			
			/* supportReply */
			function supportReply()
			{
				var message = $("#message").val();
				var ticket = $("#ticket").val();
				var to_id = $("#to_id").val();
				if(message != '' || ticket != '' || to_id != '')
				{
					var dataString = 'message='+message+'&ticket='+ticket+'&to_id='+to_id;
					$.ajax({
						url: '<?php echo base_url()?>admin/support/supportReply',
						type: 'POST',
						data: dataString,
						cache: false,
						success: function(response){
							if(response)
							{
								$('#message').val('');
								$('.msg_history').html(response);
							}
							else
							{
								$('.msg_history').text('No record found');
							}
						}
					});					
				}
			}
	</script>