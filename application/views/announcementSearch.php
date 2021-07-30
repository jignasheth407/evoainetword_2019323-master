	<?php
		foreach($announcements_details as $res)
		{
			?>
				<li>
					<h3 class="post-title">
						<a href="<?php echo base_url(); ?>announcement/<?php echo str_replace(' ','_',$res->announcements_title); ?>"><?php echo $res->announcements_title; ?></a>
					</h3>
					<p class="date"><b>Start Date: </b><?php echo $res->announcements_start_date; ?></p>                                    
					<p class="date"><b>End Date: </b><?php echo $res->announcements_end_date; ?></p>                                               
				</li>				
			<?php	
		}
	?>		