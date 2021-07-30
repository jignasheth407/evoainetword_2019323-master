<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
		<?php
			if($this->admin_id == 1 || $this->admin_id == 2)
			{
				?>
					<div class="row">  
						<div class="col-lg-3 col-xs-6"> 
							<!-- small box --> 
							<div class="small-box bg-yellow">
								<div class="inner">	
									<?php
										$users_count = $this->db->get_where('users')->num_rows();
									?>
									<h3><?= $users_count ?></h3>
									<p>Users</p> 
								</div>  
								<div class="icon">
									<i class="ion ion-person-add"></i> 
								</div>
								<a href="/admin/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-green">   
								<div class="inner"> 
									<h3><?= $valueBonus_details->bonus ?></h3>  
									<p>Bonus</p> 
								</div> 
								<div class="icon"> 
									<i class="ion ion-stats-bars"></i> 
								</div> 
								<a href="/admin/evot_bonus_value" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
							</div>           
						</div><!-- ./col -->  
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-red">      
								<div class="inner">  
									<h3><?= $valueBonus_details->evot_value ?></h3>   
									<p>Evot value</p>      
								</div>  
								<div class="icon">    
									<i class="ion ion-pie-graph"></i> 
								</div>  
								<a href="/admin/evot_bonus_value" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>  
							</div>  
						</div><!-- ./col -->
						<div class="col-lg-3 col-xs-6"> 
						<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">		
									<?php	
										$support_count = $this->db->get_where('support', array('status'=> 0))->num_rows();		
									?> 
									<h3><?php echo $support_count; ?></h3>    
									<p>Support</p>       
								</div>  
								<div class="icon">    
									<i class="ion ion-link"></i>  
								</div>   
								<a href="/admin/support" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>  
						</div><!-- ./col -->   
					</div>
				<?php
			}
		?>
    </section>
</div>
<!-- /.content-wrapper -->