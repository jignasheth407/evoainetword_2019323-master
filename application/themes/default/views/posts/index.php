<?php
	if($posts)
	{
		foreach($posts as $postRes)
		{
			?>
				<div class="row clearfix">
					<div class="postcontent">
						<div id="posts" class="post-timeline clearfix">
							<div class="timeline-border"></div>
							<!---->
							<div class="entry clearfix">
								<div class="entry-timeline">
									<?php
										echo date('M d',strtotime($postRes->date_posted)); 
									?>
									<div class="timeline-divider"></div>
								</div>
								<div class="entry-image">
									<a href="<?php echo $postRes->url; ?>">
										<img class="image_fade" src="<?php echo base_url('webroot/admin/upload/'.$postRes->feature_image); ?>" alt="Standard Post with Image">
									</a>
								</div>
								<div class="entry-title">
									<h2><a href="<?php echo $postRes->url; ?>"><?php echo $postRes->title; ?></a></h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><a href="#"><i class="fa fa-user"></i> admin</a></li>
									<li>
										<i class="fas fa-folder-open"></i>
										<a href="#">
											<?php if ($post->categories): ?>
												<?php foreach ($post->categories as $cat): ?>
													<?php echo $cat->name ?> 
												<?php endforeach ?> 
											<?php endif ?>
										</a>
									</li>
									<li><a href="#"><i class="fas fa-comments"></i> <?php echo $postRes->comment_count; ?></a></li>
								</ul>
								<div class="entry-content">
									<p><?php echo $post->excerpt ?></p>
									<a href="<?php echo $postRes->url; ?>" class="more-link">Read More</a>
								</div>
							</div>
							<!--//-->
						</div>
					</div>    
				</div>				
			<?php
		}
	}
	
	/*
	<div class="col-sm-12 bht" id="recent">   
	<div class="page-header text-muted">
		<?php if (! $this->uri->segment(1)): ?>
		<?php echo lang('recent_posts'); ?>
		<?php else: ?>
		<?php if ($this->uri->segment(2) == 'category'): ?>
		<?= lang('category_hdr') . ' `' . ucfirst($this->uri->segment(3)) . '`'  ?> 
		<?php elseif ($this->uri->segment(2) == 'archive'): ?>
		<?= lang('archives_for_hdr') . ' ' . date('F', $this->uri->segment(4)) . ' ' . $this->uri->segment(3)  ?> 
		<?php else: ?>
		<?php echo lang('older_posts'); ?>
		<?php endif ?>
		<?php endif ?>
	</div> 
</div>

<?php if ($posts): ?>
<?php foreach ($posts as $post): ?>

	<div class="row">    
      <div class="col-sm-12">
        <h3><?php echo $post->title ?></h3>
        <h4>
          <small class="text-muted">
          	<span class="glyphicon glyphicon-time" aria-hidden="true"><time class="post-date" datetime="<?php echo date("D, d M Y H:i:s T", strtotime($post->date_posted)) ?>"></span> <?= $post->date_posted ?>
          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $post->display_name ?>
          	<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $post->comment_count ?>
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <?php if ($post->categories): ?>
				<?php foreach ($post->categories as $cat): ?>
					<?php echo $cat->name ?> 
				<?php endforeach ?> 
            <?php endif ?>
          </small>
        </h4>
        <p><?php echo $post->excerpt ?></p>
        <h4>
          <small class="text-muted">
            <a class="btn btn-default text-muted" href="<?php echo $post->url ?>"><?php echo lang('btn_read_more'); ?></a> 
            <?php if ( $this->ion_auth->is_admin() || $this->ion_auth->in_group('editor') || $this->ion_auth->logged_in() && $this->session->userdata('user_id') == $post->author  ): ?>
            <a class="btn btn-default text-muted" href="<?php echo site_url('admin_posts/edit_post/' . $post->id) ?>"><?php echo lang('btn_edit'); ?></a> 
            <?php endif ?>
            <br>
            
        </small>
      </h4>
      </div>

      <div class="col-sm-2">
        <?php if($post->feature_image): ?>
          <img src="<?= base_url('webroot/admin/upload/' . $post->feature_image) ?>" class="img-responsive" alt="Responsive image">
        <?php endif ?>
      </div> 

    </div>




<?php endforeach ?>

<?php if ($pagination): ?>
<div class="row divider">    
    <div class="col-sm-12">
        <?php echo $pagination ?>
    </div>
</div>

<?php endif ?>

<?php else: ?>
  <h3 class="text-center"><?= lang('no_posts_found') ?></h3>

<?php endif ?>
	*/
?>