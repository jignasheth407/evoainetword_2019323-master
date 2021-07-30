	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Category
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Category</li>
			</ol>
		</section>
		<div id="msg_div">
			<?php echo $this->session->flashdata('message');?>
		</div>
		<!-- Main content -->
		<section class="content">                
			<div id="content">
				<div class="row">				
					<div class="col-md-12 column">				
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Category list</h3> 
								<div class="box-tools pull-right">
									<a href="<?php echo base_url();?>admin/admin_cats/add_cat" title="Add category" class="btn btn-info btn-sm">Add New</a>
								</div>
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
										<tr>
											<th>Name</th>
											<th>URL (slug)</th>
											<th>Description</th>
											<th>Action</th>
										</tr>	
									</thead>
									<tbody>									
										<?php foreach ($cats as $cat): ?>
										<tr>
											<td><?= $cat->name ?></td>
											<!--<td><a href="<?= site_url('blog/category/' . $cat->url_name) ?>" target="_blank"><?= $cat->url_name ?></a></td>-->
											<td><?= $cat->url_name ?></td>
											<td><?= $cat->description ?></td>
											<td>
												<a href="<?php echo base_url('admin/admin_cats/edit_cat/' . $cat->id);?>" title="Edit"><i class="fa fa-edit fa-2x text-primary"></i></a>&nbsp;&nbsp;	
												<a class="confirm" onclick="return delete_detail('admin/admin_cats/remove_cat/<?php echo $cat->id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</div>