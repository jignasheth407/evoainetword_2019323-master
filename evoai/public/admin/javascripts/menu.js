$(document).ready(function(){
    var element = $('meta[name="sidebar-menu"]').attr('content');
    $('#' + element).addClass('active');
	
	/* Pagination */
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
			location.href = location_target;
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
	});
}