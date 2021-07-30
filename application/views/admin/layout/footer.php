	<footer class="main-footer">
		<strong>Copyright &copy; 2017-2018 <a href="https://www.evoai.network">Evoai network</a>.</strong> All rights reserved
	</footer>
	<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<!--<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
  
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/dist/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/dist/js/pages/dashboard2.js"></script>
<!-- Common for all -->
<script src="<?php echo base_url(); ?>evoai/public/admin/webroot/admin/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>	
<script src="<?php echo base_url(); ?>evoai/public/admin/webroot/admin/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>			
<!-- bootbox.min.js -->	
<script src="<?php echo base_url();?>evoai/public/admin/webroot/admin/js/bootbox.min.js" type="text/javascript"></script>				
<script type="text/javascript" src="<?php echo base_url();?>evoai/public/admin/webroot/admin/js/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea#aboutus_description,textarea#announcements_description",
		plugins :"advlist autolink link image lists charmap print preview code fullscreen textcolor table media",
		tools: "inserttable",	
		relative_urls: false,
		toolbar: [ "undo redo | styleselect | bold italic | link image | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify  forecolor backcolor", ]
	});
	$("#msg_div").fadeOut(8000);

	/* DateTimepicker */
		$(document).ready(function(){
			var startDate = new Date('0');
			var FromEndDate = new Date();
			var ToEndDate = new Date();

			ToEndDate.setDate(ToEndDate.getDate()+365);
			
			/* Services Start date  */
			$('#announcements_start_date').datepicker({
				format: 'yyyy-mm-dd',
				weekStart: 1,
				startDate: '0',
				autoclose: true
			}).on('changeDate', function(selected){
				startDate = new Date(selected.date.valueOf());
				startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
				$('#announcements_end_date').datepicker('setStartDate', startDate);
			}); 
			
			/* Services end date  */
			$('#announcements_end_date').datepicker({
				format: 'yyyy-mm-dd',
				weekStart: 1,
				startDate: startDate,
				endDate: ToEndDate,
				autoclose: true
			}).on('changeDate', function(selected){
				FromEndDate = new Date(selected.date.valueOf());
				FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			}); 	
		});
	
	/* Pagination */
	$(function() {
		$("#example1").dataTable(
		{
			"bSort": false,
		});
		$('#example2').dataTable({
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": false,
			"bSort": false,
			"bInfo": true,
			"bAutoWidth": false,
		});
	});			
	/*  Details remove */
	function delete_detail(location_target)
	{
		bootbox.confirm("Are you sure you want to delete this details",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url(); ?>"+location_target;
			}
		});
	}		/* ticketClose_detail */
	function ticketClose_detail(location_target)
	{
		bootbox.confirm("Are you sure you want to this ticket details close",function(confirmed){
			if(confirmed)
			{
				location.href="<?php echo base_url(); ?>"+location_target;
			}
		});
	}
	/* Change status */
	function setStatus(ID, PAGE, status) 
	{
		var str = 'id='+ID+'&status='+status;
		jQuery.ajax({
			type :"POST",
			url  :PAGE,
			data : str,
			success:function(data)
			{			
				if(data==1)
				{
					var a_spanid = 'active_'+ID ;
					var d_spanid = 'inactive_'+ID ;
					if(status !="1")
					{
						$("#"+a_spanid).hide();
						$("#"+d_spanid).show();						
						jQuery("#msg_div").html();				
					}
					else
					{			
						$("#"+d_spanid).hide();
						$("#"+a_spanid).show();				
						jQuery("#msg_div").html();					
					}
				}
			} 
		});
	}
	
	/* disabledGoogleAuth */
	function disabledGoogleAuth(uId)
	{
		if(uId)
		{
			var dataString = 'user_id='+uId;
			$.ajax({
				url: '<?php echo base_url(); ?>admin/users/disabledGoogleAuth',
				type: 'POST',
				data: dataString,
				cache: false,
				success: function(responce){
					if(responce)
					{
						$("#google_auth").text('Off');
					}
				}
			});
		}
	}
	
	$('.number-only').keypress(function(event) {
		if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});
	
	$(document).ready(function() {
		// Icon
		$(".fileUpload").on('change', function() {
			//Get count of selected files
			var countFiles = $(this)[0].files.length;
			var imgPath = $(this)[0].value;
			var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			var image_holder = $(".image-holder");
			image_holder.empty();
			if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") 
			{
				if (typeof(FileReader) != "undefined") 
				{
					//loop for each file selected for uploaded.
					for (var i = 0; i < countFiles; i++) 
					{
						var reader = new FileReader();
						reader.onload = function(e) 
						{
							$("<img />", {
								"src": e.target.result,
								"class": "thumb-image img-responsive",
								"width": "100"
							}).appendTo(image_holder);
						}
						image_holder.show();
						reader.readAsDataURL($(this)[0].files[i]);
					}
				} 
				else 
				{
					alert("This browser does not support FileReader.");
				}
			} 
			else 
			{
				alert("Pls select only images");
			}
		});
	}); 
</script>
</body>

</html>