<style>
/*table#coinsTable {
    font-family: Arial, "Microsoft YaHei", sans-serif;
}
table#watchlistTable {
    font-family: Arial, "Microsoft YaHei", sans-serif;
}
table#signalsTable {
    font-family: Arial, "Microsoft YaHei", sans-serif;
}*/
.flex-center{
    display: flex;
    justify-content: center;
    margin-top: 4%;
}

</style>
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
                	<div class="row"> 
                		<div class="col-md-4">
		                    <h2 class="pro-heading">
		                        <?= @$title; ?>
		                    </h2>
		                </div>
		                <div class="col-md-8">
		                    <ul class="global-stats-list list-inline js-global-stats text-bold">
								<li>Cryptocurrencies: <strong><span class="js-global-stats-cryptocurrencies"></span></strong></li>
								<li><span class="icon-bullet">•</span> Markets: <strong><span class="js-global-stats-markets"></span></strong></li>
								<li><span class="icon-bullet">•</span> Market Cap: <strong><span class="js-global-stats-market-cap" data-global-currency-market-cap="">$140,294,741,311</span></strong></li>
								<li><span class="icon-bullet">•</span> 24h Vol: <strong><span class="js-global-stats-volume" data-global-currency-volume="">$31,775,296,974</span></strong></li>
								<li><span class="icon-bullet">•</span> BTC Dominance: <strong><span class="js-global-stats-btc-dominance">50.6</span>%</strong></li>
							</ul>
						</div>	
					</div>
                    <div class="tab-content">
                        <div id="tickersDiv" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">Tickers</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            
                                    <div class="panel-wrapper">
                                        <div class="panel-body">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="coinsTable" class="table table-hover display  pb-30" >
                                                        <thead class="bg-black text-left">
                                                            <tr class="text-left">
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot class=" bg-black text-left">
                                                            <tr class="text-left" >
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
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
                        </div>
                        <div id="kyberTickersDiv" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <!--<h6 class="panel-title txt-dark">Kyber Tickers</h6>-->
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            
                                    <div class="panel-wrapper">
                                        <div class="panel-body">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="kyberCoinsTable" class="table table-hover display  pb-30" >
                                                        <thead class="bg-black text-left">
                                                            <tr class="text-left">
                                                                <!--<th class="text-left">Rank</th>                 -->
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Symbol</th>
                                                                <!--<th class="text-left">Curr Price</th>-->
                                                                <th class="text-left">Price</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot class=" bg-black text-left">
                                                            <tr class="text-left" >
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Symbol</th>
                                                                <!--<th class="text-left">Curr Price</th>-->
                                                                <th class="text-left">Price</th>
                                                                <th class="text-center">Actions</th>
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
                        </div>
                        <div id="tickersTopDiv" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">Top 20 Tickers</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            
                                    <div class="panel-wrapper">
                                        <div class="panel-body">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="topCoinsTable" class="table table-hover display  pb-30" >
                                                        <thead class="bg-black text-left">
                                                            <tr class="text-left">
                                                                <th class="text-left">Sr. No.</th>                  
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot class=" bg-black text-left">
                                                            <tr class="text-left" >
                                                                <th class="text-left">Sr. No.</th>
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
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
                        </div>
                        <div id="tickersBottomDiv" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <h6 class="panel-title txt-dark">Bottom 20 Tickers</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                            
                                    <div class="panel-wrapper">
                                        <div class="panel-body">
                                            <div class="table-wrap">
                                                <div class="table-responsive">
                                                    <table id="bottomCoinsTable" class="table table-hover display  pb-30" >
                                                        <thead class="bg-black text-left">
                                                            <tr class="text-left">
                                                                <th class="text-left">Sr. No.</th>          
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot class=" bg-black text-left">
                                                            <tr class="text-left" >
                                                                <th class="text-left">Sr. No.</th>          
                                                                <th class="text-left">Rank</th>                 
                                                                <th class="text-left">Name</th>
                                                                <th class="text-left">Market Cap</th>
                                                                <th class="text-left">Price</th>
                                                                <th class="text-left">Volume (24h)</th>
                                                                <th class="text-left">Circulating Supply</th>
                                                                <th class="text-left">Change (24h)</th>
                                                                <th class="text-center">Actions</th>
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
                        </div>
                        <div id="watchlistDiv" class="tab-pane fade">
                          <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">Watchlist</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                
                                        <div class="panel-wrapper">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="watchlistTable" class="table table-hover display  pb-30" >
                                                            <thead class="bg-black text-left">
                                                                <tr class="text-left">
                                                                    <th class="text-left">Rank</th>                 
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Market Cap</th>
                                                                    <th class="text-left">Price</th>
                                                                    <th class="text-left">Volume (24h)</th>
                                                                    <th class="text-left">Circulating Supply</th>
                                                                    <th class="text-left">Change (24h)</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class=" bg-black text-left">
                                                                <tr class="text-left" >
                                                                    <th class="text-left">Rank</th>                 
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Market Cap</th>
                                                                    <th class="text-left">Price</th>
                                                                    <th class="text-left">Volume (24h)</th>
                                                                    <th class="text-left">Circulating Supply</th>
                                                                    <th class="text-left">Change (24h)</th>
                                                                    <th class="text-center">Actions</th>
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
                        </div>
                        <div id="signalsDiv" class="tab-pane fade">
                          <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">Alerts/Signals</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                
                                        <div class="panel-wrapper">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="signalsTable" class="table table-hover display  pb-30" >
                                                            <thead class="bg-black text-left">
                                                                <tr class="text-left">
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Option Choosen</th>
                                                                    <th class="text-left">Option Value</th>
                                                                    <th class="text-left">Required Change</th>
                                                                     <th class="text-left">Email Duration</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class=" bg-black text-left">
                                                                <tr class="text-left" >
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Option Choosen</th>
                                                                    <th class="text-left">Option Value</th>
                                                                    <th class="text-left">Required Change</th>
                                                                    <th class="text-left">Email Duration</th>
                                                                    <th class="text-center">Actions</th>
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
                        </div>
                        <div id="kyberSignalsDiv" class="tab-pane fade">
                          <div class="row">
                            <div class="col-md-12">
                                    <div class="panel panel-default card-view">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h6 class="panel-title txt-dark">Kyber Alerts</h6>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                
                                        <div class="panel-wrapper">
                                            <div class="panel-body">
                                                <div class="table-wrap">
                                                    <div class="table-responsive">
                                                        <table id="kyberSignalsTable" class="table table-hover display  pb-30" >
                                                            <thead class="bg-black text-left">
                                                                <tr class="text-left">
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Current Price</th>
                                                                    <th class="text-left">Required Change</th>
                                                                     <th class="text-left">Email Duration</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class=" bg-black text-left">
                                                                <tr class="text-left" >
                                                                    <th class="text-left">Name</th>
                                                                    <th class="text-left">Current Price</th>
                                                                    <th class="text-left">Required Change</th>
                                                                    <th class="text-left">Email Duration</th>
                                                                    <th class="text-center">Actions</th>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills">
                                <li class="active"><a class="btn-buy tickersLink" data-toggle="pill" href="#tickersDiv">Tickers</a></li>
                                <!-- <li><a class="btn-buy kyberTickersLink" data-toggle="pill" href="#kyberTickersDiv">Kyber Tickers</a></li> -->
                                <li><a class="btn-buy tickersTopLink" data-toggle="pill" href="#tickersTopDiv">Top 20 Tickers</a></li>
                                <li><a class="btn-buy tickersBottomLink" data-toggle="pill" href="#tickersBottomDiv">Bottom 20 Tickers</a></li>
                                <li><a class="btn-buy watchlistLink" data-toggle="pill" href="#watchlistDiv">Watchlist</a></li>
                                <li><a class="btn-buy signalsLink" data-toggle="pill" href="#signalsDiv">Alerts/Signals</a></li>
                                <!-- <li><a class="btn-buy kyberSignalsLink" data-toggle="pill" href="#kyberSignalsDiv">Kyber Alerts</a></li> -->
                            </ul>
                            <br><br>
                        </div>
                    </div>
                    
                </div>
                <!-- /main -->
            </div>
        </div>
    </section>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
<script>

$( document ).ready(function() {
// hgvghj()
    $('#coinsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    $('#kyberCoinsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    $('#topCoinsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 20
    });
    $('#bottomCoinsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 20
    });
    $('#watchlistTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    $('#signalsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['coin']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    $('#kyberSignalsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['coin']); // or whatever you choose to set as the id
        },
        'pageLength': 25
    });
    var user = '<?php echo $this->Ref_UserEmail; ?>';
    register(user)
    // checkLogin()
    
    loadCoinsData();
    loadGlobalMetrics();
    // loadCoinsData();
    // loadTopCoinsData();
    // loadBottomCoinsData();
    // loadWatchlistData();
    // loadSignalsData();


    $(".tickersLink").on("click", function(){
        loadCoinsData();
    })
    $(".kyberTickersLink").on("click", function(){
        loadKyberCoinsData();
    })
    $(".tickersTopLink").on("click", function(){
        loadTopCoinsData();
    })
    $(".tickersBottomLink").on("click", function(){
        loadBottomCoinsData();
    })
    $(".watchlistLink").on("click", function(){
        loadWatchlistData();
    })
    $(".signalsLink").on("click", function(){
        loadSignalsData();
    })
    $(".kyberSignalsLink").on("click", function(){
        loadKyberSignalsData();
    })
    
    
    
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
        

function loadGlobalMetrics(){

    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getGlobalMetrics",
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
              }
            }
            
    $.ajax(settings).done(function (response) {
        console.log(response);
            
        if(response['data']){
            data = response['data'];
             console.log(data);
             // $(".js-global-stats-cryptocurrencies").html()
             // $(".js-global-stats-markets").html().html()
             // $(".js-global-stats-market-cap").html()
             // $(".js-global-stats-volume").html()
             // $(".js-global-stats-btc-dominance").html()
             
        }
    });
    
}


function loadCoinsData(){
    var table = $('#coinsTable').DataTable();
    table.clear().draw();
      
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getMarketData",
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
            console.log(len);
            for($i=0;$i<len;$i++){
                $rank = data[$i]['cmc_rank'];
                $name =  data[$i]['name'];
                $symbol =  data[$i]['symbol'];
                $cir_supply =  parseInt(data[$i]['circulating_supply']).toLocaleString();
                $mcap =  parseInt(data[$i]['quote']['USD']['market_cap']).toLocaleString();
                
                if(data[$i]['quote']['USD']['price'] > 1){
                    $price =  data[$i]['quote']['USD']['price'].toFixed(2);
                }
                else
                {
                    $price =  data[$i]['quote']['USD']['price'].toFixed(6);
                }
                $per24h =  data[$i]['quote']['USD']['percent_change_24h'].toFixed(2);
                if($per24h > 0){
                    $rate =  '#6bf156';
                }
                else
                {
                    $rate =  '#f33923';
                }
                $vol24h =  parseInt(data[$i]['quote']['USD']['volume_24h']).toLocaleString();;
                $id = "'"+$symbol+"'"
                // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
                //                                         '<td>'+($i+1)+'</td>'+
                //                                         '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#" style="color: #fff;">'+$symbol+'</a></td>'+
                //                                         '<td class="ask_price">'+$ask_price+'</td>'+
                //                                         '<td class="ask_volume">'+$ask_volume+'</td>'+
                //                                         '<td class="bid_price">'+$bid_price+'</td>'+
                //                                         '<td class="bid_volume">'+$bid_volume+'</td>'+
                //                                     '</tr>');

                $('#coinsTable').dataTable().fnAddData( [
                                    
                                    $rank,
                                    '<span class="name">'+$name+'</span>',
                                    '$<span class="market_cap">'+$mcap+'</span>',
                                    '$<span class="price">'+$price+'</span>',
                                    '$<span class="volume">'+$vol24h+'</span>',
                                    '<span class="circulating_supply">'+$cir_supply+' '+$symbol+'</span>',
                                    '<span style="color:'+$rate+'"><span class="percent_change_24h" >'+$per24h+'</span>%</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:addToWatchlist('+$id+');"><i class="fa fa-eye" aria-hidden="true" title="Add to Watchlist"></i></button>'+
                                    '&nbsp<button style="border: none; background: inherit;" onclick="javascript:addSignal('+$id+');"><i class="fa fa-plus-circle" aria-hidden="true" title="Add Signal"></i></button></p>'
                        
                            ]);

            }
        }
    });
    
}

function loadKyberCoinsData(){
    var table = $('#kyberCoinsTable').DataTable();
    table.clear().draw();
      
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getKyberData",
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
            console.log(len);
            for($i=0;$i<len;$i++){
                // console.log(data[$i]);
                $name =  data[$i]['name'];
                $symbol =  data[$i]['symbol'];
                
                // if(data[$i]['currentPrice'] > 1){
                //     $currprice =  data[$i]['currentPriceUSD'].toFixed(2);
                // }
                // else
                // {
                //     $currprice =  data[$i]['currentPriceUSD'].toFixed(8);
                // }
                
                if(data[$i]['lastPrice'] > 1){
                    $lastprice =  data[$i]['lastPriceUSD'].toFixed(2);
                }
                else
                {
                    $lastprice =  data[$i]['lastPriceUSD'].toFixed(8);
                }
                
                $id = "'"+$symbol+"'"
                // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
                //                                         '<td>'+($i+1)+'</td>'+
                //                                         '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#" style="color: #fff;">'+$symbol+'</a></td>'+
                //                                         '<td class="ask_price">'+$ask_price+'</td>'+
                //                                         '<td class="ask_volume">'+$ask_volume+'</td>'+
                //                                         '<td class="bid_price">'+$bid_price+'</td>'+
                //                                         '<td class="bid_volume">'+$bid_volume+'</td>'+
                //                                     '</tr>');

                $('#kyberCoinsTable').dataTable().fnAddData( [
                                    
                                    '<span class="name">'+$name+'</span>',
                                    '<span class="symbol">'+$symbol+'</span>',
                                    // '$<span class="currprice">'+$currprice+'</span>',
                                    '$<span class="lastprice">'+$lastprice+'</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:addKyberSignal('+$id+');"><i class="fa fa-plus-circle" aria-hidden="true" title="Add Signal"></i></button></p>'
                        
                            ]);

            }
        }
    });
    
}

function loadTopCoinsData(){
    var table = $('#topCoinsTable').DataTable();
    table.clear().draw();
      
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getTopMarketData",
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
            console.log(len);
            for($i=0;$i<20;$i++){
                $rank = data[$i]['cmc_rank'];
                $name =  data[$i]['name'];
                $symbol =  data[$i]['symbol'];
                $cir_supply =  parseInt(data[$i]['circulating_supply']).toLocaleString();
                $mcap =  parseInt(data[$i]['quote']['USD']['market_cap']).toLocaleString();
                
                if(data[$i]['quote']['USD']['price'] > 1){
                    $price =  data[$i]['quote']['USD']['price'].toFixed(2);
                }
                else
                {
                    $price =  data[$i]['quote']['USD']['price'].toFixed(6);
                }
                $per24h =  data[$i]['quote']['USD']['percent_change_24h'].toFixed(2);
                if($per24h > 0){
                    $rate =  '#6bf156';
                }
                else
                {
                    $rate =  '#f33923';
                }
                $vol24h =  parseInt(data[$i]['quote']['USD']['volume_24h']).toLocaleString();;
                $id = "'"+$symbol+"'"
                // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
                //                                         '<td>'+($i+1)+'</td>'+
                //                                         '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#" style="color: #fff;">'+$symbol+'</a></td>'+
                //                                         '<td class="ask_price">'+$ask_price+'</td>'+
                //                                         '<td class="ask_volume">'+$ask_volume+'</td>'+
                //                                         '<td class="bid_price">'+$bid_price+'</td>'+
                //                                         '<td class="bid_volume">'+$bid_volume+'</td>'+
                //                                     '</tr>');

                $('#topCoinsTable').dataTable().fnAddData( [
                                    $i+1,
                                    $rank,
                                    '<span class="name">'+$name+'</span>',
                                    '$<span class="market_cap">'+$mcap+'</span>',
                                    '$<span class="price">'+$price+'</span>',
                                    '$<span class="volume">'+$vol24h+'</span>',
                                    '<span class="circulating_supply">'+$cir_supply+' '+$symbol+'</span>',
                                    '<span style="color:'+$rate+'"><span class="percent_change_24h" >'+$per24h+'</span>%</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:addToWatchlist('+$id+');"><i class="fa fa-eye" aria-hidden="true" title="Add to Watchlist"></i></button>'+
                                    '&nbsp<button style="border: none; background: inherit;" onclick="javascript:addSignal('+$id+');"><i class="fa fa-plus-circle" aria-hidden="true" title="Add Signal"></i></button></p>'
                        
                            ]);

            }
        }
    });
    
}

function loadBottomCoinsData(){
    var table = $('#bottomCoinsTable').DataTable();
    table.clear().draw();
      
    var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/getBottomMarketData",
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
            console.log(len);
            for($i=0;$i<20;$i++){
                $rank = data[$i]['cmc_rank'];
                $name =  data[$i]['name'];
                $symbol =  data[$i]['symbol'];
                $cir_supply =  parseInt(data[$i]['circulating_supply']).toLocaleString();
                $mcap =  parseInt(data[$i]['quote']['USD']['market_cap']).toLocaleString();
                
                if(data[$i]['quote']['USD']['price'] > 1){
                    $price =  data[$i]['quote']['USD']['price'].toFixed(2);
                }
                else
                {
                    $price =  data[$i]['quote']['USD']['price'].toFixed(6);
                }
                $per24h =  data[$i]['quote']['USD']['percent_change_24h'].toFixed(2);
                if($per24h > 0){
                    $rate =  '#6bf156';
                }
                else
                {
                    $rate =  '#f33923';
                }
                $vol24h =  parseInt(data[$i]['quote']['USD']['volume_24h']).toLocaleString();;
                $id = "'"+$symbol+"'"
                // $('#tickersTable tbody').append('<tr id="'+$symbol+'">'+
                //                                         '<td>'+($i+1)+'</td>'+
                //                                         '<td  onclick="javascript:drawChart('+$symbol+');"><a href="#" style="color: #fff;">'+$symbol+'</a></td>'+
                //                                         '<td class="ask_price">'+$ask_price+'</td>'+
                //                                         '<td class="ask_volume">'+$ask_volume+'</td>'+
                //                                         '<td class="bid_price">'+$bid_price+'</td>'+
                //                                         '<td class="bid_volume">'+$bid_volume+'</td>'+
                //                                     '</tr>');

                $('#bottomCoinsTable').dataTable().fnAddData( [
                                    $i+1,
                                    $rank,
                                    '<span class="name">'+$name+'</span>',
                                    '$<span class="market_cap">'+$mcap+'</span>',
                                    '$<span class="price">'+$price+'</span>',
                                    '$<span class="volume">'+$vol24h+'</span>',
                                    '<span class="circulating_supply">'+$cir_supply+' '+$symbol+'</span>',
                                    '<span style="color:'+$rate+'"><span class="percent_change_24h" >'+$per24h+'</span>%</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:addToWatchlist('+$id+');"><i class="fa fa-eye" aria-hidden="true" title="Add to Watchlist"></i></button>'+
                                    '&nbsp<button style="border: none; background: inherit;" onclick="javascript:addSignal('+$id+');"><i class="fa fa-plus-circle" aria-hidden="true" title="Add Signal"></i></button></p>'
                        
                            ]);

            }
        }
    });
    
}

function addToWatchlist(coin){
    console.log(coin);
    var name = $("#"+coin+" .name").html();
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
          title: 'Are you sure?',
          html: "You want to add "+name+" ("+coin+") in your Watchlist",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!'
        }).then((result) => {
            if (result.value) {
            //console.log(plan);
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/addToWatchlist?userId="+userId+"&coin="+coin,
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    swal('Success!','Added Successfully To Your Watchlist...','success');
                    
                }
            });
        }
    })
}
function addSignal(coin){
    console.log(coin);
    var name = $("#"+coin+" .name").html();
    var mcap = parseInt($("#"+coin+" .market_cap").html().replace(/\D/g,''));
    var price = $("#"+coin+" .price").html();
    var chnage = $("#"+coin+" .percent_change_24h").html();
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
        title: 'Add Signal For '+name,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Add Signal',
        html:
            '<input id="signalCoin" type="hidden" value="'+coin+'" >'+
            'Select Notification Type'+
            '<p class="flex-center"><select id="signalOption" name="signalOption" class="form-control1 btn-buy no-brdR no-brd">'+
                        '<option disabled="" selected=" " value="default">Select Option</option>'+
                        '<option value="mcap">Market Cap</option>'+
                        '<option value="price">Price</option>'+
                        '<option value="volume">Volume</option>'+
                    '</select></p>'+
            // 'Market Cap'+
            // '<input type="number" id="swal-input1" class="swal2-input form-control" value="'+mcap+'" disabled>' +
            'Current Value'+
            '<input type="number" id="swal-input2" class="swal2-input form-control" disabled>' +
            // 'Percentage change 24h'+
            // '<input type="number" id="swal-input3" class="swal2-input form-control" value="'+chnage+'" disabled>' +
            'Enter Your Expected Price Change?<br>'+
            '<input type="number" id="swal-input4" class="swal2-input form-control" placeholder="Enter Your Value" required style="display:inline;margin-left: -100px;">'+
            '<select id="signalType" class="form-control1 btn-buy no-brdR no-brd" style="position: absolute; width: 25% !important; margin-top: 24px; display: inline;"><option value="percentage">Percent %</option><option value="value">Value $</option></select><br>' +
            'Select Notification Duration'+
            '<p class="flex-center"><select id="duration" name="duration" class="form-control1 btn-buy no-brdR no-brd">'+
                        '<option disabled="" selected=" " value="default">Durations</option>'+
                        '<option value="1">Only once</option>'+
                        '<option value="15">After Every 15 min</option>'+
                        '<option value="30">After Every 30 min</option>'+
                        '<option value="60">After Every 1 hour</option>'+
                        '<option value="360">After Every 6 hour</option>'+
                        '<option value="720">After Every 12 hour</option>'+
                        '<option value="1440">After 1 Day</option>'+
                        '<option value="2880">After 2 Days</option>'+
                    '</select></p>',
        preConfirm: function () {
        return new Promise(function (resolve) {
            var signalOption = $('#signalOption').val()
            var OpValue = $('#swal-input2').val()
            var userInput = $('#swal-input4').val()
            var signalType = $('#signalType').val()
            var duration = $('#duration').val()
            if(userInput && duration){
              resolve([
                signalOption,
                OpValue,
                userInput,
                duration,
                signalType
              ])
            }
            else
            {
                
                throw new Error()
            }

        }).catch(error => {
                Swal.showValidationMessage('You Need to Enter Your Expected Price Change and Duration!')
              })
        },
        onOpen: function () {
        $('#swal-input1').focus()
        }
    }).then(function (result) {
        console.log(result)
        if (result.value) {
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/addSignal?userId="+userId+"&coin="+coin+"&option="+result.value[0]+"&optionVal="+result.value[1]+"&userInput="+result.value[2]+"&duration="+result.value[3]+"&signalType="+result.value[4],
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    swal('Success!',response['message'],'success');
                }
            });
        }
    })
    
    $("#signalOption").on("change", function(){
        var signalType =  $("#signalOption").val();
        var coin =  $("#signalCoin").val();
        var mcap = parseInt($("#"+coin+" .market_cap").html().replace(/\D/g,''));
        var price = $("#"+coin+" .price").html();
        var volume = parseInt($("#"+coin+" .volume").html().replace(/\D/g,''));
    
        if(signalType == "mcap"){
            $("#swal-input2").val(mcap);
        }
        else if(signalType == "price"){
            $("#swal-input2").val(price);
        }
        else if(signalType == "volume"){
            $("#swal-input2").val(volume);
        }
    })
}

function loadWatchlistData(){
    
    var table = $('#watchlistTable').DataTable();
    table.clear().draw();
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    var settings = {
      "async": false,
      "crossDomain": true,
      "url": "https://evoai.network:4000/trading/v1/getWatchlist?userId="+userId,
      "method": "GET",
      "headers": {
        "Content-Type": "application/json",
        "Authorization": "Bearer "+accessToken
      }
    }
    
    $.ajax(settings).done(function (response) {
        console.log(response);
        if(response['watchlist']){
            data = response['watchlist'];
            var len = data.length;
            console.log(len);
            for($i=0;$i<len;$i++){
                $rank = data[$i]['cmc_rank'];
                $name =  data[$i]['name'];
                $symbol =  data[$i]['symbol'];
                $cir_supply =  parseInt(data[$i]['circulating_supply']).toLocaleString();
                $mcap =  parseInt(data[$i]['quote']['USD']['market_cap']).toLocaleString();
                
                if(data[$i]['quote']['USD']['price'] > 1){
                    $price =  data[$i]['quote']['USD']['price'].toFixed(2);
                }
                else
                {
                    $price =  data[$i]['quote']['USD']['price'].toFixed(6);
                }
                $per24h =  data[$i]['quote']['USD']['percent_change_24h'].toFixed(2);
                if($per24h > 0){
                    $rate =  '#6bf156';
                }
                else
                {
                    $rate =  '#f33923';
                }
                $vol24h =  parseInt(data[$i]['quote']['USD']['volume_24h']).toLocaleString();
                $id = "'"+$symbol+"'"

                $('#watchlistTable').dataTable().fnAddData( [
                                    
                                    $rank,
                                    '<span class="name">'+$name+'</span>',
                                    '$<span class="market_cap">'+$mcap+'</span>',
                                    '$<span class="price">'+$price+'</span>',
                                    '$<span class="volume">'+$vol24h+'</span>',
                                    '<span class="circulating_supply">'+$cir_supply+' '+$symbol+'</span>',
                                    '<span style="color:'+$rate+'"><span class="percent_change_24h">'+$per24h+'</span>%</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:removeFromWatchlist('+$id+');"><i class="fa fa-times" aria-hidden="true" title="Remove From Watchlist"></i></button>'+
                                    '&nbsp<button style="border: none; background: inherit;" onclick="javascript:addSignal('+$id+');"><i class="fa fa-plus-circle" aria-hidden="true" title="Add Signal"></i></button></p>'
                        
                            ]);

            }
        }
    });
    
    
}

function loadSignalsData(){
    
    var table = $('#signalsTable').DataTable();
    table.clear().draw();
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    var settings = {
      "async": false,
      "crossDomain": true,
      "url": "https://evoai.network:4000/trading/v1/getSignals?userId="+userId,
      "method": "GET",
      "headers": {
        "Content-Type": "application/json",
        "Authorization": "Bearer "+accessToken
      }
    }
    
    $.ajax(settings).done(function (response) {
        console.log(response);
        if(response['signals']){
            data = response['signals'];
            var len = data.length;
            console.log(len);
            for($i=0;$i<len;$i++){
                $symbol =  data[$i]['coin'];
                $signal_option =  data[$i]['signal_option'];
                $option_value =  data[$i]['option_value'];
                $userInput =  data[$i]['user_input'];
                $signalType =  data[$i]['signal_type'];
                $duration =  data[$i]['duration'];
                $id = "'"+$symbol+"'";
                
                if($signalType == "percentage"){
                    $signal = '<span class="userInput">'+$userInput+'</span>%';
                }
                else if($signalType == "value")
                {
                     $signal ='$<span class="userInput">'+$userInput+'</span>';
                }
                console.log($duration)
                $dur = "";
                if($duration == 1){
                    $dur = "Only Once";
                }
                else if($duration == 15 || $duration == 30){
                    $dur = "After "+$duration+" Minutes";
                }
                else if($duration >= 60 && $duration <= 720){
                    $hour = Math.floor( $duration / 60);      
                    $dur = "After "+$hour+" Hours";
                }
                else if($duration ==  1440){
                    $dur = "After 1 Day";
                }
                else if($duration == 2880){
                    $dur = "After 2 Days";
                }
                
                $('#signalsTable').dataTable().fnAddData( [
                                    
                                    '<span class="name">'+$symbol+'</span>',
                                    '<span class="signal_option">'+$signal_option+'</span>',
                                    '$<span class="option_value">'+$option_value+'</span>',
                                    $signal,
                                    '<span class="duration">'+$dur+'</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:removeSignal('+$id+');"><i class="fa fa-times" aria-hidden="true" title="Remove From Watchlist"></i></button>'
                        
                            ]);

            }
        }
    });
    
    
}

function removeFromWatchlist(coin){
    console.log(coin);
    var name = $("#"+coin+" .name").html();
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
          title: 'Are you sure?',
          html: "You want to remove "+name+" ("+coin+") from your Watchlist",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
            if (result.value) {
            //console.log(plan);
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/removeFromWatchlist?userId="+userId+"&coin="+coin,
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    $("#watchlistTable #"+coin).remove();
                    swal('Success!','Removed Successfully From Your Watchlist...','success');
                }
            });
        }
    })
}

function removeSignal(coin){
    console.log(coin);
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
          title: 'Are you sure?',
          html: "You want to remove this signal ("+coin+")",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
            if (result.value) {
            //console.log(plan);
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/removeSignal?userId="+userId+"&coin="+coin,
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    $("#signalsTable #"+coin).remove();
                    swal('Success!','Signal Removed Successfully...','success');
                }
            });
        }
    })
}

function addKyberSignal(coin){
    console.log(coin);
    var name = $("#"+coin+" .name").html();
    var price = $("#"+coin+" .lastprice").html();
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
        title: 'Add Signal For '+name,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Add Signal',
        html:
            '<input id="signalCoin" type="hidden" value="'+coin+'" >'+
            'Current Price'+
            '<input type="number" id="swal-input2" class="swal2-input form-control"  value="'+price+'" disabled>' +
            'Enter Your Expected Price Change?<br>'+
            '<input type="number" id="swal-input4" class="swal2-input form-control" placeholder="Enter Your Value" required style="display:inline;margin-left: -100px;">'+
            '<select id="signalType" class="form-control1 btn-buy no-brdR no-brd" style="position: absolute; width: 25% !important; margin-top: 24px; display: inline;"><option value="percentage">Percent %</option><option value="value">Price $</option></select><br>' +
            'Select Notification Duration'+
            '<p class="flex-center"><select id="duration" name="duration" class="form-control1 btn-buy no-brdR no-brd">'+
                        '<option disabled="" selected=" " value="default">Durations</option>'+
                        '<option value="1">Only once</option>'+
                        '<option value="15">After Every 15 min</option>'+
                        '<option value="30">After Every 30 min</option>'+
                        '<option value="60">After Every 1 hour</option>'+
                        '<option value="360">After Every 6 hour</option>'+
                        '<option value="720">After Every 12 hour</option>'+
                        '<option value="1440">After 1 Day</option>'+
                        '<option value="2880">After 2 Days</option>'+
                    '</select></p>',
        preConfirm: function () {
        return new Promise(function (resolve) {
            var OpValue = $('#swal-input2').val()
            var userInput = $('#swal-input4').val()
            var signalType = $('#signalType').val()
            var duration = $('#duration').val()
            if(userInput && duration){
              resolve([
                OpValue,
                userInput,
                duration,
                signalType
              ])
            }
            else
            {
                
                throw new Error()
            }

        }).catch(error => {
                Swal.showValidationMessage('You Need to Enter Your Expected Price Change and Duration!')
              })
        },
        onOpen: function () {
        $('#swal-input1').focus()
        }
    }).then(function (result) {
        console.log(result)
        if (result.value) {
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/addKyberSignal?userId="+userId+"&coin="+coin+"&currPrice="+result.value[0]+"&userInput="+result.value[1]+"&duration="+result.value[2]+"&signalType="+result.value[3],
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    swal('Success!',response['message'],'success');
                }
            });
        }
    })
    
    
}

function loadKyberSignalsData(){
    
    var table = $('#signalsTable').DataTable();
    table.clear().draw();
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    var settings = {
      "async": false,
      "crossDomain": true,
      "url": "https://evoai.network:4000/trading/v1/getKyberSignals?userId="+userId,
      "method": "GET",
      "headers": {
        "Content-Type": "application/json",
        "Authorization": "Bearer "+accessToken
      }
    }
    
    $.ajax(settings).done(function (response) {
        console.log(response);
        if(response['signals']){
            data = response['signals'];
            var len = data.length;
            console.log(len);
            for($i=0;$i<len;$i++){
                $symbol =  data[$i]['coin'];
                $curr_price =  data[$i]['curr_price'];
                $userInput =  data[$i]['user_input'];
                $signalType =  data[$i]['signal_type'];
                $duration =  data[$i]['duration'];
                $id = "'"+$symbol+"'";
                
                if($signalType == "percentage"){
                    $signal = '<span class="userInput">'+$userInput+'</span>%';
                }
                else if($signalType == "value")
                {
                     $signal ='$<span class="userInput">'+$userInput+'</span>';
                }
                console.log($duration)
                $dur = "";
                if($duration == 1){
                    $dur = "Only Once";
                }
                else if($duration == 15 || $duration == 30){
                    $dur = "After "+$duration+" Minutes";
                }
                else if($duration >= 60 && $duration <= 720){
                    $hour = Math.floor( $duration / 60);      
                    $dur = "After "+$hour+" Hours";
                }
                else if($duration ==  1440){
                    $dur = "After 1 Day";
                }
                else if($duration == 2880){
                    $dur = "After 2 Days";
                }
                
                $('#kyberSignalsTable').dataTable().fnAddData( [
                                    
                                    '<span class="name">'+$symbol+'</span>',
                                    '$<span class="curr_price">'+$curr_price+'</span>',
                                    $signal,
                                    '<span class="duration">'+$dur+'</span>',
                                    '<p class="text-center"><button style="border: none; background: inherit;" onclick="javascript:removeKyberSignal('+$id+');"><i class="fa fa-times" aria-hidden="true" title="Remove From Watchlist"></i></button>'
                        
                            ]);

            }
        }
    });
    
    
}


function removeKyberSignal(coin){
    console.log(coin);
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    swal({
          title: 'Are you sure?',
          html: "You want to remove this signal ("+coin+")",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
            if (result.value) {
            //console.log(plan);
            var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/removeKyberSignal?userId="+userId+"&coin="+coin,
              "method": "GET",
              "headers": {
                "Content-Type": "application/json",
                "Authorization": "Bearer "+accessToken
              }
            }
            
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    $("#kyberSignalsTable #"+coin).remove();
                    swal('Success!','Signal Removed Successfully...','success');
                }
            });
        }
    })
}

function checkValue(value,arr){
  var status = false;
    
  for(var i=0; i<arr.length; i++){
    var name = arr[i];
    if(name == value){
      status = true;
      break;
    }
  }

  return status;
}

 

</script>