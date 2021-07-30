<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<style>
body{
    font-family: 'Poppins', sans-serif;
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
                        <div class="col-md-12">
                            <ul class="nav nav-pills">
                                <li class="active"><a class="btn-buy kyberTickersLink" data-toggle="pill" href="#kyberTickersDiv">Dai Tickers</a></li>
                                <li><a class="btn-buy kyberSignalsLink" data-toggle="pill" href="#kyberSignalsDiv">Dai Alerts</a></li>
                            </ul>
                            <br><br>
                        </div>
                    </div>
                    <div class="tab-content">
                       
                        <div id="kyberTickersDiv" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="panel panel-default card-view">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <!--<h6 class="panel-title txt-dark">Tickers Data</h6>-->
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

    $('#kyberCoinsTable').DataTable({
        'responsive': true,
        'fnCreatedRow': function (nRow, aData, iDataIndex) {
            // console.log(data);
            // console.log(iDataIndex);
            $(nRow).attr('id', data[iDataIndex]['symbol']); // or whatever you choose to set as the id
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
    
    loadKyberCoinsData();



    $(".kyberTickersLink").on("click", function(){
        loadKyberCoinsData();
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

 

</script>