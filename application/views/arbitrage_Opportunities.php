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
					<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						 <div class="panel panel-default card-view">
							<div class="panel-heading" >
								<div class="text-center">
									<h6 class="panel-title txt-dark text-center" style="font-family: 'Raleway', sans-serif;">ARBITRAGE OPPORTUNITIES</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper" style="color: white;">
								<div class="panel-body">
									<p class="muted p1" style="font-family: 'Raleway', sans-serif;">All the latest crypto arbitrage trades. Arbitrage is taking advantage of a price difference for cryptocurrencies between different exchanges and markets. On this page you’ll find all the latest opportunities for to do Arbitrage trades across all the different exchanges.</p>
							
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				<!-- Row -->
            <div class="row">
				    	<div class="col-sm-12">
    						<div class="panel panel-default card-view">
    							    <div class="row">
                                         <div style="margin-right: 25px; margin-top: 25px; float: right;">
                                            <button type="button" class="percentage mid-mar" style="color: white; float:left;" onclick="javascript:loadData();">Refresh</button>
                                        </div>
                                     </div>
    							<div class="panel-wrapper">
    								<div class="panel-body">
    									<div class="table-wrap">
    										<div class="table-responsive">
    											<table id="arbTable" class="table table-hover display  pb-30" >
    												<thead class="bg-black text-left">
    													<tr class="text-left">
                                                            <th class="text-left">timestamp</th>
                                                            <th class="text-left">Trading pair </th>
                                                            <th class="text-left">Buy Exchange</th>
                                                            <th class="text-left">Buy Price</th>
                                                            <th class="text-left">Sell Exchange</th>
                                                            <th class="text-left">Sell Price</th>
                                                            <th class="text-left">Max Volume</th>
                                                            <th class="text-left">Profit %</th>
                                                            <th class="text-left">Action</th>
    													</tr>
    								                </thead>
    												<tfoot class="text-left">
    													<tr class="text-left" >
                                                            <th class="text-left">timestamp</th>
                                                            <th class="text-left">Trading pair</th>
                                                            <th class="text-left">Buy Exchange</th>
                                                            <th class="text-left">Buy Price</th>
                                                            <th class="text-left">Sell Exchange</th>
                                                            <th class="text-left">Sell Price</th>
                                                            <th class="text-left">Max Volume</th>
                                                            <th class="text-left">Profit %</th>
                                                            <th class="text-left">Action</th>
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
				<!-- /main -->
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="modalApiKeyForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="apiKeyForm" method="POST" action="javascript:addApiKeys()">
      <input type="text" id="exchId" class="form-control validate hidden">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="text" id="apiKey" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="apiKey">Your API Key</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text" id="secretKey" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="secretKey">Your Secret Key</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-default">Add Keys</button>
      </div>
      </form>
    </div>
  </div>
</div>


  <a id="openModal" href="" class="btn btn-default btn-rounded mb-4 hidden" data-toggle="modal" data-target="#modalApiKeyForm">Launch
    Modal Login Form</a>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
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
                $base =  data[$i]['base'];
                $quote=  data[$i]['quote'];
                $buy_exchange = data[$i]['buy_exchange'];
                $buy_price = data[$i]['buy_price'];
                $sell_exchange = data[$i]['sell_exchange'];
                $sell_price = data[$i]['sell_price'];
                $volume = data[$i]['volume'];
                $profit_percentage = data[$i]['profit_percentage'];
                $timestamp = data[$i]['timestamp'];
                
                $symbol1 = "'"+$symbol+"'";
                $base1 = "'"+$base+"'";
                $quote1 = "'"+$quote+"'";
                $buy_exchange1 = "'"+$buy_exchange+"'";
                $sell_exchange1 = "'"+$sell_exchange+"'";
                $buy_price1 = "'"+$buy_price+"'";
                $sell_price1 = "'"+$sell_price+"'";
                $volume1 = "'"+$volume+"'";
                
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
                                    
                                    $timestamp,
                                    $symbol,
                                    $buy_exchange,
                                    '<span class="buy_price">'+$buy_price+'</span>',
                                    $sell_exchange,
                                    '<span class="sell_price">'+$sell_price+'</span>',
                                    '<span class="volume">'+$volume+'</span>',
                                    '<span class="profit_percentage" style="color: rgba(19, 191, 153,1);">'+$profit_percentage+'</span>',
                                    '<button class="btn btn-sm" onclick="javascript:trade('+$symbol1+','+$base1+','+$quote1+','+$buy_exchange1+','+$sell_exchange1+','+$buy_price1+','+$sell_price1+','+$volume1+')">Trade</button>'
                            ]);
                    
                // }

            }
        }
        // setInterval(function(){ loadData(); }, 10000);
    });
}

$( document ).ready(function() {

    var user = '<?php echo $this->Ref_UserEmail; ?>';
    register(user)
    
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
        
function trade(symbol, base, quote, buyExch, sellExch, buyPrice, sellPrice, maxVolume ){
    console.log(symbol)
    console.log(base)
    console.log(quote)
    console.log(buyExch)
    console.log(sellExch)
    console.log(buyPrice)
    console.log(sellPrice)
    console.log(maxVolume)
    
    var buySide = 1;
    var sellSide = 1;
    var buySideError = 0;
    var sellSideError = 0;
    var buyBaseBal = 0;
    var buyQuoteBal = 0;
    var sellBaseBal = 0;
    var sellQuoteBal = 0;
    
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    buyBaseBal = getBalance(buyExch,base);
    sellBaseBal = getBalance(sellExch,base);
    
    console.log(buyBaseBal)
    console.log(sellBaseBal)
    
    if(buyBaseBal == false){
        buySide = addApiKeys(buyExch);
        // $('#modalApiKeyForm').modal('show');
        // $("exchId").val(buyExch);
        // $('#openModal').trigger('click');
        
    }
    
    if(sellBaseBal == false && buySide == 1){
        sellSide = addApiKeys(sellExch);
        // $("exchId").val(sellExch);
        // $('#openModal').trigger('click');
    }
    console.log(buySide)
    console.log(sellSide)
    if(buySide == 1 && sellSide == 1){
        alert("done")
        buyBaseBal = getBalance(buyExch,base);
        buyQuoteBal = getBalance(buyExch,quote);
        sellBaseBal = getBalance(sellExch,base);
        sellQuoteBal = getBalance(sellExch,quote);
        console.log(buyBaseBal)
        console.log(buyQuoteBal)
        console.log(sellBaseBal)
        console.log(sellQuoteBal)
    }

    
}

function getBalance(exchnage,coin)
{
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    var settings = {
                      "async": false,
                      "crossDomain": true,
                      "url": "https://evoai.network:4000/trading/v1/getExchangeBalance?userId="+userId+"&exchange="+exchnage+"&coin="+coin,
                      "method": "GET",
                      "headers": {
                        "Content-Type": "application/json",
                        "Authorization": "Bearer "+accessToken
                      }
                    }
                    
    $.ajax(settings).done(function (response) {
        console.log(response);
            
            if(response.error){
                return false
            }
            else
            {
                return response;
            }
    });
    
    return false
}

function addApiKeys()
{
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    var exchange = $("#exchId").val();
    var api_key = $("#apiKey").val();
    var secret_key = $("#secretKey").val();
    
    var settings = {
      "async": false,
      "crossDomain": true,
      "url": "https://evoai.network:4000/trading/v1/addExchangeKeys?userId="+userId+"&exchange="+exchnage+"&api_key="+api_key+"&secret="+secret_key,
      "method": "GET",
      "headers": {
        "Content-Type": "application/json",
        "Authorization": "Bearer "+accessToken
      }
    }

    $.ajax(settings).done(function (response) {
            console.log(response);
            
        if(response){
            if(response.error){
                // alert(response.error);
                swal('Error!',response.error,'error');
                return 0;
            }
            else{
                // alert(response.message);
                swal('Success!',response.message,'success');
                return 1;
            }
        }
    });
            
}

$('#modalApiKeyForm').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

function addApiKeys(exchnage)
{
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
    swal({
            title: 'Add Exchange API KEYS',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Add Keys',
            html:
                exchnage+ ' API key'+
                '<input type="text" id="swal-input1" class="swal2-input form-control" placeholder="Enter API key" >' +
                exchnage+ ' Secret Key'+
                '<input type="text" id="swal-input2" class="swal2-input form-control" placeholder="Enter Secret key" >',
                
            preConfirm: function () {
            return new Promise(function (resolve) {
                var exchApikey = $('#swal-input1').val()
                var exchSecretkey = $('#swal-input2').val()
              
                if(exchApikey && exchSecretkey){
                  resolve([
                    exchApikey,
                    exchSecretkey
                  ])
                }
                else
                {
                    throw new Error()
                }
    
            }).catch(error => {
                    Swal.showValidationMessage('You Need to Enter All Fields!')
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
                  "url": "https://evoai.network:4000/trading/v1/addExchangeKeys?userId="+userId+"&exchange="+exchnage+"&api_key="+result.value[0]+"&secret="+result.value[1],
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
            
                $.ajax(settings).done(function (response) {
                        console.log(response);
                        
                    if(response){
                        if(response.error){
                            // alert(response.error);
                            swal('Error!',response.error,'error');
                            return 0;
                        }
                        else{
                            // alert(response.message);
                            swal('Success!',response.message,'success');
                            return 1;
                        }
                    }
                });
            }
        })
        return 0;
}
/*swal({
            title: 'Add Exchange API KEYS',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Add Keys',
            html:
                buyExch+ ' API key'+
                '<input type="text" id="swal-input1" class="swal2-input form-control" placeholder="Enter API key" >' +
                buyExch+ ' Secret Key'+
                '<input type="text" id="swal-input2" class="swal2-input form-control" placeholder="Enter Secret key" >' +
                sellExch +' API key'+
                '<input type="text" id="swal-input3" class="swal2-input form-control" placeholder="Enter API key" >' +
                sellExch +' Secret key'+
                '<input type="text" id="swal-input4" class="swal2-input form-control" placeholder="Enter Secret key" >',
                
            preConfirm: function () {
            return new Promise(function (resolve) {
                var buyExchApikey = $('#swal-input1').val()
                var buyExchSecretkey = $('#swal-input2').val()
                var sellExchApikey = $('#swal-input3').val()
                var sellExchSecretkey = $('#swal-input4').val()
              
                if(buyExchApikey && buyExchSecretkey && sellExchApikey && sellExchSecretkey){
                  resolve([
                    buyExchApikey,
                    buyExchSecretkey,
                    sellExchApikey,
                    sellExchSecretkey
                  ])
                }
                else
                {
                    throw new Error()
                }
    
            }).catch(error => {
                    Swal.showValidationMessage('You Need to Enter All Fields!')
                  })
            },
            onOpen: function () {
            $('#swal-input1').focus()
            }
        }).then(function (result) {
            console.log(result)
            // if (result.value) {
            //     var settings = {
            //       "async": false,
            //       "crossDomain": true,
            //       "url": "https://evoai.network:4000/trading/v1/addSignal?userId="+userId+"&coin="+coin+"&price="+result.value[0]+"&userInput="+result.value[1]+"&duration="+result.value[2]+"&signalType="+result.value[3],
            //       "method": "GET",
            //       "headers": {
            //         "Content-Type": "application/json",
            //         "Authorization": "Bearer "+accessToken
            //       }
            //     }
                
            //     $.ajax(settings).done(function (response) {
            //         console.log(response);
            //         if(response){
            //             swal('Success!',response['message'],'success');
            //         }
            //     });
            // }
        })*/
</script>
