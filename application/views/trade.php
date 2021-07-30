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
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h6 class="panel-title pull-left">Active Exchanges</h6>
                            <br><br>
							<div class="users-nicescroll-bar" style="overflow: hidden; width: auto; height: 370px;">
								<ul class="chat-list-wrap" id="activeExTable">
									
								</ul>
							</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="bd pd-t-30 pd-b-20 pd-x-20" id="chart_3">
                            <label class="section-title" style="text-align:center;"></label>
                            <div style="width:60%; margin:0 auto; margin-bottom:15%;">
                               <select id="exchange1" class="form-control1 form-border btn-buy no-brdR no-brd" data-placeholder="Choose one">
                                    <option class="drop-bg" label="Select Exchange"></option>
                                  </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1"><button class="btn btn-success btn-block" id="activateExch">Activate Exchange</button><p class="t-10">This button activates a particular exchange.</p></div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1"><button class="btn btn-primary btn-block" id="addMarkets">Add Markets</button><p class="t-10">This button adds markets ( pairs of the exchange ) for the selected exchange.</p></div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1"><button class="btn btn-danger btn-block" id="deactivateExch">Deactivate Exchange</button><p class="t-10">This button deactivates a particular exchange.</p></div>
                            </div>
                            
                            
                        </div>
                      </div><!-- col-6 -->
				</div>
					<div class="row">
						<div class="row row-padding-bottom">
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
<!--						<input type="text" placeholder=".col-sm-4" class="form-control">
-->							</div>
							<div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <div class="form-group mt-30 mb-30">
        							<label class="control-label mb-10  text-center" style="width: 100%;">Select Exchange</label>
        							<select id="activeExch" class="form-control1 form-border btn-buy no-brdR no-brd">
            							<option class="drop-bg" label="Select Exchange"></option>
        							</select>
    							</div>												
							</div>
    						<!--<div class="col-md-2 col-sm-12 col-xs-12 form-group">-->
    						    <!--<input type="text" placeholder=".col-sm-4" class="form-control">-->
    						<!--</div>-->
                          
							<div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <div class="form-group mt-30 mb-30">
        							<label class="control-label mb-10  text-center" style="width: 100%;">Select Pair</label>
        							<select id="symbol" class="form-control1 form-border btn-buy no-brdR no-brd">
        							</select>
    							</div>												
							</div>
						
							<div class="col-md-2 col-sm-12 col-xs-12 form-group">
<!--							<input type="text" placeholder=".col-sm-4" class="form-control">
-->							</div>
					</div>
                    
				    <div class="row">
                        <div class="col-sm-4">
                            <div class="panel panel-default card-view">
    							<div class="panel-heading">
    								<div class="pull-left">
    									<h6 class="panel-title txt-dark">Balances</h6>
    								</div>
    								<div class="clearfix"></div>
    							</div>
    							<div class="panel-wrapper">
    								<div class="panel-body">
    									<div class="table-wrap">
    										<div class="table-responsive">
    											<table id="ExBalTable" class="table table-hover display  pb-30" >
    												<thead class="bg-black">
    													<tr>
    														  
                                                            <th>Asset</th>
                                                            <th>Balance</th>
                                            
    
    													</tr>
    												</thead>
    												<tfoot class="bg-black">
    													<tr>

                                                             <th>Asset</th>
                                                            <th>Balance</th>
                                            
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
				    	<div class="col-sm-8">
				    	    <div class="row">
        						<!--<style>-->
        						<!--    input[type="text"]-->
              <!--                      {-->
              <!--                          border: 0;-->
              <!--                          background-color:black;-->
              <!--                          border-bottom: 1px solid white;-->
              <!--                          outline: 0;-->
              <!--                      }-->
        						<!--</style>-->
        				    	<div class="col-sm-6" >
            						<div class="panel panel-default card-view" style="background-color:black">
            							<div class="panel-heading" >
            								<div class="pull-left">
            									<h6 class="panel-title txt-dark">BUY - <span class="symbol"></span> <a href="#" class="refresh" style="font-size:16px;margin-left:200px"><i  class="fa fa-refresh" ></i></a></h6>
            								</div>
            								<div class="clearfix"></div>
            							</div>
            							<div class="panel-wrapper"  style="background-color:black">
            								<div class="panel-body" >
                                                <form id="buyForm" action="javascript:buy();"> 
                                                
                                                ORDER TYPE: <select id="buyOrderType" class="form-control" required><option label="Select Type"></option></select><br><br>
                                                
                                                AMOUNT :  <input type="text" class="form-control" id="amount1" placeholder="ENTER AMOUNT" required/>
                                                <br><br>
            
                                                PRICE : <input type="text" class="form-control" id="price1" placeholder="ENTER PRICE" required/>
                                                <br><br><br>
                                                
                                                <button class="percentage" type="sumbit">Place Buy Order</button>
                                                <span></span>
                                                <br>
                                                </form>
            								</div>
            							</div><!-- /Panel wrapper -->
            						</div>	
        					    </div>
        					    
						    	<div class="col-sm-6 " >
        						<div class="panel panel-default card-view" style="background-color:black" >
        							<div class="panel-heading" >
        								<div class="pull-left">
        									<h6 class="panel-title txt-dark">SELL - <span class="symbol"></span> <a href="#" class="refresh1" style="font-size:16px;margin-left:200px"><i class="fa fa-refresh"></i></a></h6>
        								</div>
        								<div class="clearfix"></div>
        							</div>
        							<div class="panel-wrapper"  style="background-color:black">
        								<div class="panel-body" >
                                            <form id="sellForm" action="javascript:sell();"> 
                                            
                                            ORDER TYPE: <select id="sellOrderType" class="form-control" required><option label="Select Type"></option></select><br><br>
                                            
                                            
                                            AMOUNT :  <input type="text" class="form-control" id="amount2" placeholder="ENTER AMOUNT" required />
                                            <br><br>
                                            
                                            PRICE : <input type="text" class="form-control" id="price2" placeholder="ENTER PRICE *"  required />
                                            <br><br><br>
                                            
                                            
                                            <button class="percentage" type="sumbit">Place Sell Order</button>
                                            <span></span>
                                            <br>
                                            </form>
        								</div>
        							</div><!-- /Panel wrapper -->
        						</div>	
    					    </div>	
    					  </div>
					    </div>
				      </div>
					</div>
					
					
				</div>
				<!-- /main -->
			</div>
		</div>
	</section>
</div>
<script>
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
    $( document ).ready(function() {
        
        var user = '<?php echo $this->Ref_UserEmail; ?>';
        register(user)
        // checkLogin()
      
        
        var accessToken = localStorage.getItem("access_token");
        var userId = localStorage.getItem("userId");
        
        
        var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/activeExchanges?userId="+userId,
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
                   
                    $('#activeExch').append('<option class="drop-bg" value="'+$name+'">'+$name+'</option>');
                    
                }
            }
        });
        
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
                   
                    $('#exchange1').append('<option class="drop-bg" value="'+$name+'">'+$name+'</option>');
                    
                    
                }
            }
        });
        
        var settings = {
              "async": false,
              "crossDomain": true,
              "url": "https://evoai.network:4000/trading/v1/activeExchanges?userId="+userId,
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
                   
                    $('#activeExTable').append('<li class="chat-list">'+$name+'</li>');
                    // $('#activeExch').append('<option value="'+$name+'">'+$name+'</option>');
                    // $('#activeExch1').append('<option value="'+$name+'">'+$name+'</option>');
                    // $('#activeExch2').append('<option value="'+$name+'">'+$name+'</option>');
                    
                }
            }
        });
        
        $('#activateExch').on('click', function(){
                
            var exchange = $('#exchange1').val();
            console.log(exchange);
            if(!exchange)
            {
                alert("select exchange first");
            }
            else
            {
                var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/setActiveExchange?userId="+userId+"&exchange="+exchange,
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
            
                $.ajax(settings).done(function (response) {
                        console.log(response);
                        
                        $('#activeExTable').append('<li class="chat-list">'+exchange+'</li>');
                        $('#activeExch').append('<option value="'+exchange+'">'+exchange+'</option>');
                        $('#activeExch1').append('<option value="'+exchange+'">'+exchange+'</option>');
                        $('#activeExch2').append('<option value="'+exchange+'">'+exchange+'</option>');
                        alert("Exchange Activated");
                        
                });
            }
        });
        
        $('#deactivateExch').on('click', function(){
                
            var exchange = $('#exchange1').val();
            console.log(exchange);
            if(!exchange)
            {
                alert("select exchange first");
            }
            else
            {
                var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/deactiveExchange?userId="+userId+"&exchange="+exchange,
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
            
                $.ajax(settings).done(function (response) {
                        console.log(response);
                        
                    // if(response){
                            $("#"+exchange).remove();
                            alert("Exchange Deactivated");
                    
                    // }
                });
            }
        });
        
        $('#addMarkets').on('click', function(){
                
            var exchange = $('#exchange1').val();
            console.log(exchange);
            if(!exchange)
            {
                alert("select exchange first");
            }
            else
            {
                var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/addMarkets?userId="+userId+"&exchange="+exchange,
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
            
                $.ajax(settings).done(function (response) {
                        console.log(response);
                        
                    // if(response){
                            alert("Exchange Markets Added");
                    // }
                });
            }
        });
        
        
        $('#activeExch').on('change', function(){  
            $('#symbol').html('<option label="Select symbol"></option>');
            $('#buyOrderType').html('<option label="Select Type"></option>');
            $('#sellOrderType').html('<option label="Select Type"></option>');
            var exchange = $('#activeExch').val();
            
            console.log(exchange);
            
            if(!exchange)
            {
                alert("select exchange first");
            }
            else
            {
            
                var settings = {
                      "async": false,
                      "crossDomain": true,
                      "url": "https://evoai.network:4000/trading/v1/getExchangeMarkets?userId="+userId+"&exchange="+exchange,
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
                           
                            $('#symbol').append('<option class="drop-bg" value="'+$name+'">'+$name+'</option>');
                            
                            
                        }
                    }
                    else{
                        alert("Please Add Exchange Markets First");
                    }
                });
                
                var settings = {
                      "async": false,
                      "crossDomain": true,
                      "url": "https://evoai.network:4000/trading/v1/getExchangeOrderType?exchange="+exchange,
                      "method": "GET",
                      "headers": {
                        "Content-Type": "application/json",
                        "Authorization": "Bearer "+accessToken
                      }
                    }
                    
                $.ajax(settings).done(function (response) {
                        console.log(response);
                    if(response){
                    
                        $market =  response['data'][0]['marketOrder'];
                        if($market == 1){
                            $('#buyOrderType').append('<option class="drop-bg" value="market">Market</option>');
                            $('#sellOrderType').append('<option class="drop-bg" value="market">Market</option>');
                        }
                        $limit =  response['data'][0]['limitOrder'];
                        if($limit == 1){
                            $('#buyOrderType').append('<option class="drop-bg" value="limit">Limit</option>');
                            $('#sellOrderType').append('<option class="drop-bg" value="limit">Limit</option>');
                        }
    
                    }
    
                });
                
                var settings = {
                      "async": false,
                      "crossDomain": true,
                      "url": "https://evoai.network:4000/trading/v1/getExchangeBalances?userId="+userId+"&exchange="+exchange,
                      "method": "GET",
                      "headers": {
                        "Content-Type": "application/json",
                        "Authorization": "Bearer "+accessToken
                      }
                    }
                    
                $.ajax(settings).done(function (response) {
                    var table = $('#ExBalTable').DataTable();
                    table.clear().draw();    
                    // $('#ExBalTable tbody').html('');
                    if(response){
                        if(response.error)
                            alert(response.error);
                        else
                        {
                            console.log(response.message);
                            var data = response.message;
                            
                            for (var k in data){
                                var symbol =  k;
                                var balance =  data[k];
                                if(balance > 0){
                                    // $('#ExBalTable tbody').append('<tr><td>'+k+'</td><td>'+data[k]+'</td></tr>');
                                    
                                    $('#ExBalTable').dataTable().fnAddData( [
                                            symbol,
                                            balance
                                    ]);
                                    // $('#ExBalTable').DataTable().row.add([
                                    //         symbol,
                                    //         balance
                                    // ]).draw();
                                }
                            }
                        }
                    }    
                });
            }

        });
        
        $('#symbol').on('change', function(){  
            $('#price1').val('');
            $('#price2').val('');
            var exchange = $('#activeExch').val();
            var symbol = $('#symbol').val();
            console.log(symbol);
            
            $('.symbol').html(symbol);
            
            var pair = symbol.replace('/','');
            console.log(pair);
             var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/getTicker?exchange="+exchange+"&pair="+pair,
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
                
            $.ajax(settings).done(function (response) {
                    console.log(response);
                if(response){
                    $buyPrice =  response['tickers']['ask_price'];
                    $sellPrice =  response['tickers']['bid_price'];
                   $('#price1').val($buyPrice);
                   $('#price2').val($sellPrice);
                }
            });

        });
        
        $('#ExBalTable').DataTable({
        //   responsive: true,
        "pageLength": 25,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
            
          }
        });
        
        $("#activeExch").val('binance').trigger('change');
        
        $(".refresh").on('click', function(){  
            $("#buyForm").trigger("reset");
        });
        $(".refresh1").on('click', function(){  
            $("#sellForm").trigger("reset");
        });
    });
    
    function buy(){
        var accessToken = localStorage.getItem("access_token");
        var userId = localStorage.getItem("userId");    
        var activeExch = $('#activeExch').val();
        var symbol = $('#symbol').val();
        var orderType = $('#buyOrderType').val();
        var side = "buy";
        var amount = $('#amount1').val();
        var price = $('#price1').val();
        console.log(activeExch);
        console.log(symbol);
        console.log(orderType);
        console.log(side);
        console.log(amount);
        console.log(price);
        if(!activeExch)
        {
            alert("select exchange first");
        }
        else if(!symbol)
        {
            alert("select symbol first");
        }
        else
        {
            
            var data ={userId:userId, exchange:activeExch, symbol:symbol, type:orderType, side:side, amount:amount, price:price};
            var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/createOrder",
                  "method": "POST",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  },
                  "processData": false,
                  "data": JSON.stringify(data)
            }
                
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    if(response.error)
                        alert(response.error);
                    else
                        alert(response.message);
                         $('#buyForm').trigger("reset");
                }    
            });
        }
    }
    
    function sell(){
        var accessToken = localStorage.getItem("access_token");
        var userId = localStorage.getItem("userId");    
        var activeExch = $('#activeExch').val();
        var symbol = $('#symbol').val();
        var orderType = $('#sellOrderType').val();
        var side = "sell";
        var amount = $('#amount2').val();
        var price = $('#price2').val();
        console.log(activeExch);
        console.log(symbol);
        console.log(orderType);
        console.log(side);
        console.log(amount);
        console.log(price);
        if(!activeExch)
        {
            alert("select exchange first");
        }
        else if(!symbol)
        {
            alert("select symbol first");
        }
        else
        {
            
            var data ={userId:userId, exchange:activeExch, symbol:symbol, type:orderType, side:side, amount:amount, price:price};
            var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/createOrder",
                  "method": "POST",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  },
                  "processData": false,
                  "data": JSON.stringify(data)
            }
                
            $.ajax(settings).done(function (response) {
                console.log(response);
                if(response){
                    if(response.error)
                        alert(response.error);
                    else
                        alert(response.message);
                        $('#sellForm').trigger("reset");
                }    
            });
        }
    }
        
</script>
