<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Comments
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo base_url();?>admin/admin_comments">Comments</a></li>
			<li class="active">Comments update</li>
		</ol>
	</section>
	<div class="row">
		<div class="col-xs-12">
			<?= validation_errors() ?>

			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
					<?= $message ?>
				</div>
			<?php endif ?>
			<?= form_open(current_url());?>
			<p><?= lang('comment_edit_subheading');?></p>
		</div>
	</div>
	<!-- Main content -->
	<section class="content">                
		<div id="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Category details</h3> 
							<!--
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/admin_comments" class="btn btn-primary btn-sm">Back</a>
							</div>
							-->
						</div>
						<!-- form start -->
						<div class="box-body">
							<div class="row">
								<div class="col-xs-8">
									<div class="form-group">
										<!--<label for="content"><?= lang('comment_form_field_content') ?></label>-->
										<p class="help-block"><?= lang('comment_form_field_content_hlp_txt') ?></p>
										<?= form_textarea(['name' => 'content', 'class' => 'form-control', 'value' => $comment['content'], 'placeholder' => lang('comment_form_field_content')]) ?>
									</div>
									<div class="form-group box-footer">
										<input class="btn btn-success btn-sm" type="submit" value="<?php echo lang('comments_save_btn');?>">
										<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/admin_comments">Cancel</a>							
									</div>									
								</div>
								<div class="col-xs-4">
									<h4><?= lang('comment_details_hdr') ?></h4>
									<p><?= lang('comments_blog_post_hdr') ?>: <?= $comment['post_title'] ?> (<?= $comment['post_id'] ?>)</p>
									<p><?= lang('comments_comment_id') ?>: <?= $comment['id'] ?></p>
									<p><?= lang('comments_author') ?>: <?= $comment['display_name'] ?></p>
									<p><?= lang('comments_date_posted') ?>: <?= $comment['date'] ?></p>
									<p><?= lang('comments_current_status') ?>: <? echo ($comment['modded'] == 1) ? "Moderated" : "Published"; ?></p>
								</div>
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</section>
</div>