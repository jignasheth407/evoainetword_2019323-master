<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>            
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-sm-9 col-md-10 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div class="row">
				    	<div class="col-sm-12">
    						<div class="row">
                                         <div style="margin-right: 25px; margin-top: 25px; float: right;">
                                            <button type="button" class="percentage mid-mar" style="color: white; float:left;" onclick="javascript:loadData();">Refresh</button>
                                        </div>
                                     </div>
    						<div class="panel-wrapper collapse in">
    								<div class="panel-body">
    									<div class="table-wrap">
    										<div class="table-responsive">
    											<table id="arbTable" class="table table-bordered livetrade-table liverate dataTable no-footer" >
    												<thead class="bg-black text-left">
    													<tr class="text-left">
                                                            <th class="text-left">No</th>
                                                            <th class="text-left">Trading pair </th>
                                                            <th class="text-left">Buy Exchange</th>
                                                            <th class="text-left">Buy Price</th>
                                                            <th class="text-left">Sell Exchange</th>
                                                            <th class="text-left">Sell Price</th>
                                                            <th class="text-left">Max Volume</th>
                                                            <th class="text-left">Profit %</th>
    													</tr>
    								                </thead>
    												<tfoot class="text-left">
    													<tr class="text-left" >
                                                            <th class="text-left">No</th>
                                                            <th class="text-left">Trading pair</th>
                                                            <th class="text-left">Buy Exchange</th>
                                                            <th class="text-left">Buy Price</th>
                                                            <th class="text-left">Sell Exchange</th>
                                                            <th class="text-left">Sell Price</th>
                                                            <th class="text-left">Max Volume</th>
                                                            <th class="text-left">Profit %</th>
    													</tr>
    												</tfoot>
    												<tbody style="color: white;">
                                                       
    								                </tbody>
    											</table>
    										</div>
    									</div>
    								</div>
    							</div><!-- /Panel wrapper -->
					    </div>
				    </div>
				</div>
				<!-- /main -->
			</div>
		</div>
	</section>
</div>
<script>

    function loadData(){
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/arbitrageOpportunities",
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
              }
            }
            
    $.ajax(settings).done(function (response) {
        console.log(response);
            
        if(response['data']){
            data = response['data'];
            var len = data.length;
            // console.log(len);
            var table = $('#arbTable').DataTable();
            table.clear().draw();
            for($i=0;$i<len;$i++){
                $symbol =  data[$i]['symbol'];
                $buy_exchange = data[$i]['buy_exchange'];
                $buy_price = data[$i]['buy_price'];
                $sell_exchange = data[$i]['sell_exchange'];
                $sell_price = data[$i]['sell_price'];
                $volume = data[$i]['volume'];
                $profit_percentage = data[$i]['profit_percentage'];
                
                // if($('#'+$buy_exchange+'_'+$sell_exchange+'_'+$symbol).length){
        
                //      $("#"+$buy_exchange+'_'+$sell_exchange+'_'+$symbol+" .buy_price").html($buy_price).fadeIn();
                //      $("#"+$buy_exchange+'_'+$sell_exchange+'_'+$symbol+" .sell_price").html($sell_price).fadeIn();
                //      $("#"+$buy_exchange+'_'+$sell_exchange+'_'+$symbol+" .volume").html($volume).fadeIn();
                //      $("#"+$buy_exchange+'_'+$sell_exchange+'_'+$symbol+" .profit_percentage").html($profit_percentage).fadeIn();
                // }
                // else
                // {
                //     var rowCount = $('#arbTable tr').length;
                //     var id = rowCount - 1;
                    // $('#arbTable tbody').append('<tr id="'+$buy_exchange+'_'+$sell_exchange+'_'+$symbol+'">'+
                    //                                     '<td>'+id+'</td>'+
                    //                                     '<td>'+$symbol+'</td>'+
                    //                                     '<td>'+$buy_exchange+'</td>'+
                    //                                     '<td class="buy_price">'+$buy_price+'</td>'+
                    //                                     '<td>'+$sell_exchange+'</td>'+
                    //                                     '<td class="sell_price">'+$sell_price+'</td>'+
                    //                                     '<td class="volume">'+$volume+'</td>'+
                    //                                     '<td class="profit_percentage" style="color: rgba(19, 191, 153,1);">'+$profit_percentage+'</td>'+
                    //                                 '</tr>');
                    $('#arbTable').dataTable().fnAddData( [
                                    
                                    $i+1,
                                    $symbol,
                                    $buy_exchange,
                                    '<span class="buy_price">'+$buy_price+'</span>',
                                    $sell_exchange,
                                    '<span class="sell_price">'+$sell_price+'</span>',
                                    '<span class="volume">'+$volume+'</span>',
                                    '<span class="profit_percentage" style="color: rgba(19, 191, 153,1);">'+$profit_percentage+'</span>'
                            ]);
                    
                // }

            }
        }
        // setInterval(function(){ loadData(); }, 10000);
    });
}

$( document ).ready(function() {
    var table = $('#arbTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['buy_exchange']+'_'+data[iDataIndex]['sell_exchange']+'_'+data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 50
    });
    loadData();
    
});

</script>
