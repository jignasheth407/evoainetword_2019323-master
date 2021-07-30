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
                

                    <div class="row box_header" style="margin-right: 0;margin-left: 0; margin-bottom:4%;">
                   
                        <div class="col-md-3"><span>Active Exchanges</span></div>
                        <div class="col-md-7"><span>API Key</span></div>
                        <div class="col-md-2"><span>Action</span></div>
                        <!-- <div class="col-md-2"><span>Status</span></div> -->
                
                    </div>
                    <div class="row exch_block" id="bitfinex" >
                        <div class="col-md-3">
                            <div class="row pad-5">
                                <div class="col-md-12 box-pad ">
                                    <select id="activeExch" class="form-control1 form-border btn-buy no-brdR no-brd" data-placeholder="Choose one">
                                        <option class="drop-bg" label="Select Exchange"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row pad-5">
                                   <div class="col-md-6 box-pad ">
                                    <input type="text" class="form-control bg-white" style ="color:white;"    placeholder="API Key" id="publicKey">
                                   </div>
                                   <div class="col-md-6 box-pad">
                                    <input type="text" class="form-control bg-white" style ="color:white;"   placeholder="Secret Key" id="secretKey">
                                   </div>
                            </div>
                        </div>
                        <div class="col-md-2 box-pad">
                            <div class="form-group text-center ">
								<button id="addExKeys" type="submit" class="percentage">Save</button>
							</div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #763881;">
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
        console.log(user)
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
        
        
        $('#addExKeys').on('click', function(){
                
            var activeExch = $('#activeExch').val();
            var api_key = $('#publicKey').val();
            var secret = $('#secretKey').val();
            console.log(activeExch);
            console.log(api_key);
            console.log(secret);
            if(!activeExch)
            {
                alert("select exchange first");
            }
            else if(!api_key)
            {
                alert("insert public key");
            }
            else if(!secret)
            {
                alert("insert secret key");
            }
            else
            {
                var settings = {
                  "async": false,
                  "crossDomain": true,
                  "url": "https://evoai.network:4000/trading/v1/addExchangeKeys?userId="+userId+"&exchange="+activeExch+"&api_key="+api_key+"&secret="+secret,
                  "method": "GET",
                  "headers": {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer "+accessToken
                  }
                }
            
                $.ajax(settings).done(function (response) {
                        console.log(response);
                        
                    if(response){
                        if(response.error)
                            alert(response.error);
                        else
                            alert(response.message);
                    }
                });
            }
        });
        
        
    });
    
    </script>
