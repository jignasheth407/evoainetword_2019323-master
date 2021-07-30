<div class="dash-body">
	<?php echo $this->load->view('layout/custom_header.php'); ?>    
	<section class="dashboard-section">	
		<div class="wrapper">
			<div class="row row-offcanvas row-offcanvas-left">
				<!-- sidebar -->
				<?php echo $this->load->view('sidebar.php');?>
				<!-- /sidebar -->
				<!-- main right col -->
				<div class="column col-md-10 col-sm-9 col-xs-11 main-dashcontent" id="main">  
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div class="row">
						<div class="row row-padding-bottom">
						<div class="col-md-4 col-sm-12 col-xs-12 form-group">
<!--						<input type="text" placeholder=".col-sm-4" class="form-control">
-->							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <div class="form-group mt-30 mb-30">
        							<label class="control-label mb-10  text-center" style="width: 100%;">Select Exchange</label>
        							<select id="exchanges" class="form-control">
        							<!--<option class="drop-bg">Binance</option>-->
        							<!--<option class="drop-bg">Bitfinex</option>-->
        				   <!--         <option class="drop-bg">Poloniex</option>-->
        				   <!--         <option class="drop-bg">Hitbtc</option>-->
        				   <!--          <option class="drop-bg">Bittrex</option>-->
        							</select>
    							</div>												
							</div>
								<div class="col-md-4 col-sm-12 col-xs-12 form-group">
<!--						<input type="text" placeholder=".col-sm-4" class="form-control">
-->							</div>
                          
			            </div>		
					</div>
					<div class="row">
                	<div class="col-md-7">
    					<div class="row">
    								<div class="panel-body">
    									<div class="table-wrap">
    										<div class="table-responsive">
    											<table id="tickersTable" class="table table-bordered dataTable no-footer" >
    												<thead class="bg-black text-left">
    													<tr class="text-left">
                        									<th class="text-left">Sr. No.</th>				    
    													    <th class="text-left">Symbol</th>
                                                            <th class="text-left">Ask Price</th>
                                                            <th class="text-left">Ask Volume</th>
                                                            <th class="text-left">Bid Price</th>
                                                            <th class="text-left">Bid Volume</th>
    													</tr>
    								                </thead>
    												<tfoot class=" bg-black text-left">
    													<tr class="text-left" >
                                                            <th class="text-left">Sr. No.</th>				    
    													    <th class="text-left">Symbol</th>
                                                            <th class="text-left">Ask Price</th>
                                                            <th class="text-left">Ask Volume</th>
                                                            <th class="text-left">Bid Price</th>
                                                            <th class="text-left">Bid Volume</th>
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
                <div class="col-md-5">	    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                      <div id="tradingview_8a64d"></div>
                      <div class="tradingview-widget-copyright pad-5"><a href="https://in.tradingview.com/symbols/BINANCE-BTCUSDT/" rel="noopener" target="_blank"><span class="" style="color:white !important;">BTCUSDT chart</span></a> by TradingView</div>
                      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                     </div>    
                <!-- TradingView Widget END -->
                </div>
			
			</div>   
				</div>
				
				<!-- /main -->
			</div>
		</div>
	</section>
</div>
<script>

var exchange = 'binance';
$( document ).ready(function() {
    var table = $('#tickersTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    
    var user = '<?php echo $this->Ref_UserEmail; ?>';
    register(user)
    // checkLogin()
      
        
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/exchanges",
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
        $.ajax(settings).done(function (response) {
                console.log(response);
                
            if(response){
                var len = response.length;
                // console.log(len);
                for(var i=0;i<len;i++){
                    $name =  response[i];
                   
                    $('#exchanges').append('<option class="drop-bg" value="'+$name+'">'+$name+'</option>');
                    
                    
                }
            }
        });
    $('#exchanges').val('binance');
    
    
    loadData(exchange);
    
    new TradingView.widget(
                      {
                      "width": 500,
                      "height": 480,
                      "symbol": exchange.toUpperCase()+":BTCUSDT",
                      "interval": "D",
                      "timezone": "Etc/UTC",
                      "theme": "Dark",
                      "style": "1",
                      "locale": "in",
                      "toolbar_bg": "#f1f3f6",
                      "enable_publishing": false,
                      "allow_symbol_change": true,
                      "container_id": "tradingview_8a64d"
                    });    

    
    $('#exchanges').on('change', function(){  
            exchange = $('#exchanges').val();
            console.log(exchange);
            loadData(exchange);
            ws.close();
            // updateData(exchange);
        });
});

    function register(username){
            
        // var data ={username:$username,password:$password};
  
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "https://evoai.network:4000/trading/v1/register?username="+username,
          "method": "GET",
        //   "headers": {
        //     "Content-Type": "application/json"
        //   },
        //   "processData": false,
        }
        
        $.ajax(settings).done(function (response) {
            console.log(response);
            if(response['message']){
                console.log(response['message']);
                 alert(response['message']);
            }
            else if(response['access_token']){
                console.log(response['access_token']);
                localStorage.setItem("access_token", response['access_token']);
                localStorage.setItem("userId", response['userId']);
            }
        });

    }
    function checkLogin()
    {
        var accessToken = localStorage.getItem("access_token");
        var userId = localStorage.getItem("userId");
        if(accessToken == null || accessToken == undefined || userId == null || userId == undefined)
          window.location.href="login.php"
        var date = new Date(0);
        var base64Url = accessToken.split('.')[1];
        var base64 = base64Url.replace('-', '+').replace('_', '/');
        var decoded =  JSON.parse(window.atob(base64));
        console.log(decoded.exp)
        date.setUTCSeconds(decoded.exp);
        if(date.valueOf() > new Date().valueOf())
            console.log("Logged In")
        else
             window.location.href="login.php"
    }
        

    
function drawChart(symbol){
    console.log(exchange);
    console.log(symbol.id);
    new TradingView.widget(
                      {
                      "width": 500,
                      "height": 480,
                      "symbol": exchange.toUpperCase()+":"+symbol.id,
                      "interval": "D",
                      "timezone": "Etc/UTC",
                      "theme": "Dark",
                      "style": "1",
                      "locale": "in",
                      "toolbar_bg": "#f1f3f6",
                      "enable_publishing": false,
                      "allow_symbol_change": true,
                      "container_id": "tradingview_8a64d"
                    }
                      );
}


function loadData(exchange){
    var table = $('#tickersTable').DataTable();
    table.clear().draw();
      
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getTickers?exchange="+exchange,
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
              }
            }
            
    $.ajax(settings).done(function (response) {
        console.log(response);
            
        if(response['tickers']){
            data = response['tickers'];
            var len = data.length;
            // console.log(len);
            for($i=0;$i<len;$i++){
                $symbol =  data[$i]['symbol'];
                $ask_price = data[$i]['trade']['ask_price'];
                $ask_volume = data[$i]['trade']['ask_volume'];
                $bid_price = data[$i]['trade']['bid_price'];
                $bid_volume = data[$i]['trade']['bid_volume'];
                
                // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
                //                                         '<td>'+($i+1)+'</td>'+
                //                                         '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#" style="color: #fff;">'+$symbol+'</a></td>'+
                //                                         '<td class="ask_price">'+$ask_price+'</td>'+
                //                                         '<td class="ask_volume">'+$ask_volume+'</td>'+
                //                                         '<td class="bid_price">'+$bid_price+'</td>'+
                //                                         '<td class="bid_volume">'+$bid_volume+'</td>'+
                //                                     '</tr>');

                $('#tickersTable').dataTable().fnAddData( [
                                    
                                    $i+1,
                                    '<a href="#" style="color:white;"><span onclick="javascript:drawChart('+$symbol+');">'+$symbol+'</span></a>',
                                    '<span class="ask_price">'+$ask_price+'</span>',
                                    '<span class="ask_volume">'+$ask_volume+'</span>',
                                    '<span class="bid_price">'+$bid_price+'</span>',
                                    '<span class="bid_volume">'+$bid_volume+'</span>'
                            ]);

            }
        }
    });
    
}

function updateData(exchange){
    
    ws = new WebSocket("ws://evoai.network:9000/"+exchange);
    ws.onopen = function () { console.log("websocket opened...")};
    ws.onmessage = function (event) {
        // console.log(event.data);
        var data = JSON.parse(event.data)
        console.log(data);
        $symbol =  data['symbol'];
        $ask_price = data['ask_price'];
        $ask_volume = data['ask_volume'];
        $bid_price = data['bid_price'];
        $bid_volume = data['bid_volume'];
        if($('#'+$symbol).length){
            $("#"+$symbol+" .ask_price").html($ask_price).fadeIn();
            $("#"+$symbol+" .ask_volume").html($ask_volume).fadeIn();
            $("#"+$symbol+" .bid_price").html($bid_price).fadeIn();
            $("#"+$symbol+" .bid_volume").html($bid_volume).fadeIn();
        }
        /*else
        {
            var rowCount = $('#tickersTable tr').length;
            var id = rowCount - 1;
            // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
            //                                             '<td>'+id+'</td>'+
            //                                             '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#">'+$symbol+'</a></td>'+
            //                                             '<td class="ask_price">'+$ask_price+'</td>'+
            //                                             '<td class="ask_volume">'+$ask_volume+'</td>'+
            //                                             '<td class="bid_price">'+$bid_price+'</td>'+
            //                                             '<td class="bid_volume">'+$bid_volume+'</td>'+
            //                                         '</tr>');
            $('#tickersTable').dataTable().fnAddData( [
                                    
                                    id,
                                    $symbol,
                                    
                                    $symbol,
                                    $ask_price,
                                    $ask_volume,
                                    $bid_price,
                                    $bid_volume
                                    
                            ]);
        }*/
        
    };
    ws.onclose = function () { console.log("websocket closed...")}; // disable onclose handler first
}
    

</script>