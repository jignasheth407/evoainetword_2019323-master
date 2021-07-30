<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Posts
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/admin_posts">Posts</a></li>
			<li class="active">Post add</li>
		</ol>
	</section>
	<div>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>	
			<?= validation_errors() ?>

			<?php if (isset($message)): ?>
				<div class="alert alert-danger" role="alert">
					<?= $message ?>
				</div>
			<?php endif ?>
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
							<h3 class="box-title">Post details</h3> 
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/admin_posts" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">-->
						<?= form_open_multipart(current_url());?>
							<div class="box-body">
								<div class="row">
									<div class="col-xs-8">
										<div class="form-group">
											<label for="title"><?= lang('post_form_title_text') ?></label>
											<?= form_input(['name' => 'title', 'class' => 'form-control', 'placeholder' => lang('post_form_title_text') ]) ?>
										</div>									
										<div class="form-group">
											<label for="status"><?= lang('post_form_status_text') ?></label>
											<?= form_dropdown('status',['published' => lang('post_form_status_active'), 'draft' => lang('post_form_status_inactive')] , 'draft', ['class' => 'form-control', 'placeholder' => lang('post_form_status_text')]) ?>
										</div>
										<div class="form-group">
											<label for="content"><?= lang('post_form_content_text') ?></label>
											<p class="help-block"><?= lang('post_form_content_help_text') ?></p>
											<?= form_textarea(['name' => 'content', 'id' => 'content', 'value' => set_value('content'), 'class' => 'form-control', 'placeholder' => lang('post_form_content_text')]) ?>
										</div>
										<div class="form-group">
											<label for="excerpt"><?= lang('post_form_excerpt_text') ?></label>
											<p class="help-block"><?= lang('post_form_excerpt_help_text') ?></p>
											<?= form_textarea(['name' => 'excerpt', 'class' => 'form-control', 'placeholder' => lang('post_form_excerpt_text')]) ?>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-group">
											<label for="excerpt"><?= lang('cats_hdr') ?></label>
											<p class="help-block"><?= lang('post_form_cats_help_text') ?></p>
											<?= form_multiselect('cats[]', $cats, null, ['class' => 'form-control']) ?>
										</div>  		
										<h4><?= lang('optional_hdr') ?></h4>
										<div class="form-group">
											<label for="feature_image"><?= lang('post_form_feature_image_text') ?></label>
											<p class="help-block"><?= lang('post_add_form_feature_image_help_text') ?></p>
											<?= form_upload(['name' => 'feature_image', 'class' => 'form-control', 'placeholder' => lang('post_form_feature_image_text') ]) ?>
										</div>
										<div class="form-group">
											<label for="url_title"><?= lang('post_form_url_title_text') ?></label>
											<p class="help-block"><?= lang('post_add_form_url_title_help_text') ?></p>
											<?= form_input(['name' => 'url_title', 'class' => 'form-control', 'placeholder' => lang('post_form_url_title_text') ]) ?>
										</div>
										<p class="help-block"><?= lang('optional_help_text') ?></p>
										<div class="form-group">
											<label for="meta_title"><?= lang('post_form_meta_title_text') ?></label>
											<p class="help-block"><?= lang('post_form_meta_title_help_text') ?></p>
											<?= form_input(['name' => 'meta_title', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_title_text')]) ?>
										</div>
										<div class="form-group">
											<label for="meta_keywords"><?= lang('post_form_meta_keywords_text') ?></label>
											<p class="help-block"><?= lang('post_form_meta_keywords_help_text') ?></p>
											<?= form_input(['name' => 'meta_keywords', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_keywords_text') ]) ?>
										</div>
										<div class="form-group">
											<label for="meta_description"><?= lang('post_form_meta_desc_text') ?></label>
											<p class="help-block"><?= lang('post_form_meta_desc_help_text') ?></p>
											<?= form_input(['name' => 'meta_description', 'class' => 'form-control', 'placeholder' => lang('post_form_meta_desc_text')]) ?>
										</div>
									</div>
								</div>
							</div><!-- /.box-body -->								
							<div class="box-footer">
								<input class="btn btn-success btn-sm" type="submit" value="<?php echo lang('save_post_btn');?>">
								<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/admin_posts">Cancel</a>							
							</div>
						</form>
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.right-side -->
<script>
	var simplemde = new SimpleMDE({
		forceSync: true,
		element: document.getElementById("content")
	});
</script>