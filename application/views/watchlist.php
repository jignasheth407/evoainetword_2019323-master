<style>
    table#watchlistTable {
        font-family: Helvetica;
    }
    table#signalsTable {
        font-family: Helvetica;
    }
    .flex-center{
        display: flex;
        justify-content: center;
        margin-top: 4%;
    }
    #main .nav>li>a {
        padding: 0 !important;
    }
    #main .nav>li.active>a{
        background: rgb(49,34,53) !important;
        background: -moz-linear-gradient(top, rgba(49,34,53,1) 0%, rgba(34,19,38,1) 2%, rgba(37,22,41,1) 6%, rgba(40,21,40,1) 8%, rgba(45,23,46,1) 10%, rgba(47,28,50,1) 14%, rgba(53,28,57,1) 17%, rgba(54,29,58,1) 18%, rgba(52,27,56,1) 19%, rgba(54,29,58,1) 21%, rgba(60,30,64,1) 23%, rgba(64,34,68,1) 27%, rgba(70,35,75,1) 29%, rgba(71,36,76,1) 32%, rgba(78,39,84,1) 36%, rgba(81,44,88,1) 40%, rgba(88,46,96,1) 43%, rgba(87,43,94,1) 45%, rgba(94,45,101,1) 48%, rgba(97,47,106,1) 52%, rgba(103,48,113,1) 55%, rgba(107,51,116,1) 60%, rgba(114,55,123,1) 63%, rgba(113,56,124,1) 63%, rgba(134,77,145,1) 71%, rgba(141,89,151,1) 74%, rgba(148,98,157,1) 77%, rgba(173,131,181,1) 84%, rgba(179,142,186,1) 87%, rgba(195,160,200,1) 90%, rgba(199,169,203,1) 93%, rgba(207,180,211,1) 95%, rgba(208,183,212,1) 97%, rgba(213,190,216,1) 98%, rgba(212,195,214,1) 100%)!important;
        background: -webkit-linear-gradient(top, rgba(49,34,53,1) 0%,rgba(34,19,38,1) 2%,rgba(37,22,41,1) 6%,rgba(40,21,40,1) 8%,rgba(45,23,46,1) 10%,rgba(47,28,50,1) 14%,rgba(53,28,57,1) 17%,rgba(54,29,58,1) 18%,rgba(52,27,56,1) 19%,rgba(54,29,58,1) 21%,rgba(60,30,64,1) 23%,rgba(64,34,68,1) 27%,rgba(70,35,75,1) 29%,rgba(71,36,76,1) 32%,rgba(78,39,84,1) 36%,rgba(81,44,88,1) 40%,rgba(88,46,96,1) 43%,rgba(87,43,94,1) 45%,rgba(94,45,101,1) 48%,rgba(97,47,106,1) 52%,rgba(103,48,113,1) 55%,rgba(107,51,116,1) 60%,rgba(114,55,123,1) 63%,rgba(113,56,124,1) 63%,rgba(134,77,145,1) 71%,rgba(141,89,151,1) 74%,rgba(148,98,157,1) 77%,rgba(173,131,181,1) 84%,rgba(179,142,186,1) 87%,rgba(195,160,200,1) 90%,rgba(199,169,203,1) 93%,rgba(207,180,211,1) 95%,rgba(208,183,212,1) 97%,rgba(213,190,216,1) 98%,rgba(212,195,214,1) 100%) !important;
        background: linear-gradient(to bottom, rgba(49,34,53,1) 0%,rgba(34,19,38,1) 2%,rgba(37,22,41,1) 6%,rgba(40,21,40,1) 8%,rgba(45,23,46,1) 10%,rgba(47,28,50,1) 14%,rgba(53,28,57,1) 17%,rgba(54,29,58,1) 18%,rgba(52,27,56,1) 19%,rgba(54,29,58,1) 21%,rgba(60,30,64,1) 23%,rgba(64,34,68,1) 27%,rgba(70,35,75,1) 29%,rgba(71,36,76,1) 32%,rgba(78,39,84,1) 36%,rgba(81,44,88,1) 40%,rgba(88,46,96,1) 43%,rgba(87,43,94,1) 45%,rgba(94,45,101,1) 48%,rgba(97,47,106,1) 52%,rgba(103,48,113,1) 55%,rgba(107,51,116,1) 60%,rgba(114,55,123,1) 63%,rgba(113,56,124,1) 63%,rgba(134,77,145,1) 71%,rgba(141,89,151,1) 74%,rgba(148,98,157,1) 77%,rgba(173,131,181,1) 84%,rgba(179,142,186,1) 87%,rgba(195,160,200,1) 90%,rgba(199,169,203,1) 93%,rgba(207,180,211,1) 95%,rgba(208,183,212,1) 97%,rgba(213,190,216,1) 98%,rgba(212,195,214,1) 100%)!important ;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#312235', endColorstr='#d4c3d6',GradientType=0 ) !important;
        box-shadow: 0px 5px 40px #fff !important;
        text-shadow: -1px 0px 1px #f2f2f2 !important;
    }
    #main .btn-buy{
        width: 180px !important;
        margin-bottom: 10%;
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
					<h2 class="pro-heading">
						<?= @$title; ?>
					</h2>
					<div class="row">
						<div class="form-group col-md-5">
							<!--</3>Comming soon!</h3>		-->
						</div>
					</div>
					<div class="row">
                    	<div class="col-md-12">
        					<ul class="nav nav-pills">
                                <li class="active"><a class="btn-buy watchlistLink" data-toggle="pill" href="#watchlistDiv">Watchlist</a></li>
                                <li><a class="btn-buy signalsLink" data-toggle="pill" href="#signalsDiv">Alerts/Signals</a></li>
                            </ul>
                            <br><br>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="watchlistDiv" class="tab-pane fade in active">
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
    var user = '<?php echo $this->Ref_UserEmail; ?>';
    register(user)
    // checkLogin()
      
        
    var accessToken = localStorage.getItem("access_token");
    var userId = localStorage.getItem("userId");
    
           
    loadWatchlistData();
    loadSignalsData();
    
    $(".watchlistLink").on("click", function(){
        loadWatchlistData();
    })
    $(".signalsLink").on("click", function(){
        loadSignalsData();
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