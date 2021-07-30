<?php echo $this->load->view('menu.php');?>

<section class="news-section simple-section services services-section">
  <div class="container">
    <div class="row clearfix">
      <div class="col-sm-12 fadeInUp animated">
        <h2 class="bg-title">Announcements</h2>
        <h2 class="section-title">Announcements</h2>
      </div>
    </div>
    
	<div class="row clearfix">
		<div class="col-md-12">
			<div class="post-detail text-left">
				<?php
					if($announcements_details)
					{
						?>
							<h3 class="post-title"><?php echo $announcements_details->announcements_title; ?></h3>
							<small class="post-dateexpire"><strong>Start Date: </strong><?php echo $announcements_details->announcements_start_date; ?></small><br>
							<small class="post-dateexpire"><b>End Date: </b><?php echo $announcements_details->announcements_end_date; ?></small>
							<div class="description"><?php echo $announcements_details->announcements_description; ?></div>
						<?php	
					}
				?>
			</div>			
		</div>
	</div>
  </div>
</section>
