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
								<h3 class="box-title">Category details</h3> 								
							</div>
							<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="box-body">
									<div class="row">
										<div class="form-group col-md-5">
											<div class="input text">
												<label>Name<span class="text-danger">*</span></label>
												<input name="name" placeholder="Add new category" class="form-control" type="text" id="name" value="<?php echo set_value('name');?>" />												
												<?php echo form_error('name','<span class="text-danger">','</span>'); ?>
											</div>
										</div>
										<div class="form-group col-md-5">
											<div class="input text">
												<label>&nbsp;</label><br>
												<button class="btn btn-success btn-sm" type="submit" name="Submit" value="Submit">Submit</button>																	
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="box box-info">
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>										
									<tr>											
										<th>Name</th>
										<th>Created date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>		
									</thead>
									<tbody>									
										<?php 
											if($category_result) 
											{
												foreach ($category_result as $row)
												{ 
													?>
														<tr> 
															<td>
																<?php echo $row->name; ?>
															</td>
															<td>
																<?php echo $row->created_date; ?>
															</td>
															<td width="10%">
																<a href="#" id="active_<?php echo $row->id;?>" <?php if($row->status != 1){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/announcements/setStatusCategory','0')">
																	<button class="btn btn-sm btn-success">ON</button>
																	<button class="btn btn-sm btn-default">OFF</button>
																</a>
																<a href="#" id="inactive_<?php echo $row->id;?>" <?php if($row->status != 0){ echo "style='display:none;'"; } ?> class="btn-group" onclick="return setStatus(<?php echo $row->id;?>,'<?php echo base_url();?>admin/announcements/setStatusCategory','1')">
																	<button class="btn btn-sm btn-default">ON</button>
																	<button class="btn btn-sm btn-success">OFF</button>
																</a>
															</td>
															<td>	
																<a href="<?php echo base_url();?>admin/announcements/announcementsEdit/<?php echo $row->id; ?>" title="Edit"><i class="fa fa-edit fa-2x text-primary"></i></a>&nbsp;&nbsp;	
																<a class="confirm" onclick="return ticketClose_detail('admin/announcements/delete_detailCategory/<?php echo $row->id;?>');" href="javascript:void(0);" title="Remove"><i class="fa fa-trash-o fa-2x text-danger"></i></a>	
															</td>
														</tr>  										
													<?php
												} 
											}
											else 
											{
												?>
													<tr>
														<td colspan="10">No Records Found</td>
													</tr>
												<?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.content -->
	</div>