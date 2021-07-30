<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>               
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left active">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-md-10 col-sm-9 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						Ticket ID: 00
						<?= $supportChat_list[0]->ticket ?>
					</h2>  
					<div class="row clearfix mt-20" id="Evt-calc">
						<div class="col-md-12">
							<h2>Displaying Support Tickets</h2>
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
																	<img src="https://ptetutorials.com/images/user-profile.png" alt=""> 
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
														<a onclick="return ticketClose_detail('helpSupport/ticketClose?t=<?= $supportChat_list[0]->ticket ?>');" href="javascript:void(0);" class="confirm btn btn-success btn-lg col-md-12">Ticket Close</a>																							
													</div>
												</div>
											<?php
										}
									?>
								</div>
							</div>
						</div>
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
				url: '<?php echo base_url()?>helpSupport/supportChat_live',
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
					url: '<?php echo base_url()?>helpSupport/supportReply',
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