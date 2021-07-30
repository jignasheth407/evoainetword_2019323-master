<div class="content-wrapper">
	<!-- Content Header (Page header) -->	
	<section class="content-header">
		<h1>
			Category
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/admin_cats">Category</a></li>
			<li class="active">Category add</li>
		</ol>
	</section>
	<div>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
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
							<div class="box-tools pull-right">
								<a href="<?php echo base_url();?>admin/admin_cats" class="btn btn-primary btn-sm">Back</a>
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">-->						
						<div class="box-body">
							<div class="row">
								<div class="col-md-4 col-md-offset-4">
									<?= validation_errors() ?>

									<?php if (isset($message)): ?>
										<div class="alert alert-danger" role="alert">
											<?= $message ?>
										</div>
									<?php endif ?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><?= lang('index_add_new_cat');?></h3>
										</div>
										<div class="panel-body">
											<?= form_open(current_url());?>
											<p><?= lang('add_cat_subheading');?></p>
											<fieldset>
												<div class="form-group">
													<?= form_input(['name'=> 'name', 'id' => 'name', 'class' => "form-control", 'placeholder' => lang('cat_form_name'), 'value' => set_value('name')]) ?>
												</div>
												<div class="form-group">
													<?= form_input(['name'=> 'url_name', 'id' => 'url_name', 'class' => "form-control", 'placeholder' => lang('cat_form_url'), 'value' => set_value('url_name')]) ?>
												</div>
												<div class="form-group">
													<?= form_input(['name'=> 'description', 'id' => 'description', 'class' => "form-control", 'placeholder' => lang('cat_form_desc'), 'value' => set_value('description')]) ?>
												</div>
												<div class="box-footer">
													<input class="btn btn-success btn-sm" type="submit" value="<?php echo lang('save_cat_btn');?>">
													<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/admin_cats">Cancel</a>							
												</div>
											</fieldset>
											</form>
										</div>												
									</div>
								</div>
							</div>
						</div><!-- /.box-body -->															
					</div><!-- /.box -->
				</div><!--/.col (left) -->
			</div>
		</div>
	</section><!-- /.content -->
</div><!-- /.right-side -->