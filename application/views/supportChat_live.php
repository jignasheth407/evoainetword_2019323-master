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