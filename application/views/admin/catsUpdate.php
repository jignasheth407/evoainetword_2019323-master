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
			<li class="active">Category update</li>
		</ol>
	</section>
	<div>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>				
		</div>	
		<?= validation_errors() ?>

		<?php if (isset($message)): ?>
			<div class="alert alert-danger" role="alert">
				<?= $message ?>
			</div>
		<?php endif ?>
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
						</div>
						<!-- form start -->
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
											<h3 class="panel-title">Update category</h3>
										</div>
										<div class="panel-body">
											<?= form_open(current_url());?>
											<p><?= lang('add_cat_subheading');?></p>
											<fieldset>
												<div class="form-group">
													<?= form_input( [ 'name'=> 'name', 'id' => 'name', 'class' => "form-control", 'placeholder' => lang('cat_form_name'), 'value' => ($this->input->post('name'))?$this->input->post('name'):$cat['name'] ] ) ?>
												</div>
												<div class="form-group">
													<?= form_input(['name'=> 'url_name', 'id' => 'url_name', 'class' => "form-control", 'placeholder' => lang('cat_form_url'), 'value' => ($this->input->post('url_name'))?$this->input->post('url_name'):$cat['url_name'] ] ) ?>
												</div>
												<div class="form-group">
													<?= form_input(['name'=> 'description', 'id' => 'description', 'class' => "form-control", 'placeholder' => lang('cat_form_desc'), 'value' => ($this->input->post('description'))?$this->input->post('description'):$cat['description'] ] ) ?>
												</div>
											</fieldset>
											<div class="box-footer">
												<input class="btn btn-success btn-sm" type="submit" value="<?php echo lang('save_cat_btn');?>">
												<a class="btn btn-danger btn-sm" href="<?php echo base_url() ;?>admin/admin_cats">Cancel</a>							
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</section>
</div><script>
	var simplemde = new SimpleMDE({
		forceSync: true,
		element: document.getElementById("content")
	});
</script>