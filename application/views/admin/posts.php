	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Posts
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a>
				</li>
				<li class="active">Posts</li>
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
								<h3 class="box-title">Posts list</h3> 
								<div class="box-tools pull-right">
									<a href="<?php echo base_url();?>admin/admin_posts/add_post" title="Add posts" class="btn btn-info btn-sm">Add New</a>
								</div>
							</div>							
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
										<tr>
											<th>Title</th>
											<th>Date Created</th>
											<th>Status</th>
											<th>Action</th>
										</tr>		
									</thead>
									<tbody>									
										<?php foreach ($posts as $post): ?>
										<tr>
											<td><?= $post->title ?></td>
											<td><?= $post->date_posted ?></td>
											<td><?= $post->status ?></td>
											<td class="text-right">
												<a href="<?php echo base_url('admin/admin_posts/edit_post/' . $post->id);?>" title="Edit"><i class="fa fa-edit fa-2x text-primary"></i></a>&nbsp;&nbsp;	
												<a class="confirm" onclick="return delete_detail('admin/admin_posts/remove_post/<?php echo $post->id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger" data-toggle="modal" data-target=".bs-example-modal-sm"></i></a>	
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