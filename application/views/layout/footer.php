	<footer class="footer">

        <div class="container main_footer_container">

			<div class="row clearfix">

				<div class="col-md-4 col-sm-6 col-xs-4">

					<a class="logo" href="<?php echo base_url(); ?>">

						<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png" class="img-responsive">

					</a>

				</div>            

				<div class="col-md-4 col-sm-6 col-xs-8">

					<div class="right-container">

						<ul class="social-listing">

							<li>

								<a href="https://t.me/evaoi" target="_blank">

									<i class="fab fa-telegram-plane"></i>

								</a>

							</li>

							<!--<li>

								<a href="https://www.linkedin.com/in/richardnacht">

									<i class="fab fa-linkedin-in"></i>

								</a>

							</li>-->

							<li>

								<a target="_blank" href="#">

									<i class="fab fa-medium-m"></i>

								</a>

							</li>

							<li>

								<a target="_blank" href="#">

									<i class="fab fa-youtube"></i>

								</a>

							</li>

							<li>

								<a target="_blank" href="">

									<i class="fab fa-github-alt"></i>

								</a>

							</li>

							<!--<li>

								<a target="_blank" href="">

									<i class="fab fa-instagram"></i>

								</a>

							</li>-->

						</ul>

					</div>

				</div>

			</div>                        

        </div>

        <div class="bottom-container mt-3">

            <div class="container">

				<span class="footer-contacts">© 2018 - 2019 <a href="<?php echo base_url(); ?>"> Evoai.network </a> All rights reserved.</span>

                <div class="pull-right">

                    <?php
				/*
                    <a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/DISCLAIMER.pdf');?>" target="_blank">Disclaimers</a>&nbsp;&nbsp;|&nbsp;&nbsp;                    

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/Privacy_Policy.pdf');?>" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/TERMS_OF_SERVICE.pdf');?>" target="_blank">Terms Of Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/pdf/Token_sale_agreement.pdf');?>" target="_blank">Token Sale Agreement</a>
				*/
				?>


                    <a href="<?php echo base_url('evoai/public/webroot/frontend/html/DISCLAIMER.html');?>" target="_blank">Disclaimers</a>&nbsp;&nbsp;|&nbsp;&nbsp;                    

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/html/Privacy_Policy.html');?>" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/html/TERMS_OF_SERVICE.html');?>" target="_blank">Terms Of Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;

                    <a href="<?php echo base_url('evoai/public/webroot/frontend/html/Token_sale_agreement.html');?>" target="_blank">Token Sale Agreement</a>

                </div>

            </div>

        </div>

    </footer>

    <!-- Modal -->

    <div class="modal fade" id="modalPrivatesale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <a href="<?php echo base_url();?>">

						<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">

					</a>

                </div>

                <div class="modal-body">

                    <h4 class="text-center">CONGRATULATIONS !! PRIVATE SALE HAS <br>COMMENCED!!</h4>

                    <div class="modalcontent-body">

                        <div class="row clearfix">

                            <div class="col-md-1 col-sm-2">

                                <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/eth-iconM.png" class="img-responsive">

                            </div>

                            <div class="col-md-9 col-sm-8">

                                <h4 class="addr"> EVOAI CROWDSALE CONTRACT ADDRESS:</h4>

                                <input type="text" onclick="copyTextAdd();" value="0xC2388d0c7eF1E679FacA4965a18fb0D2e43D6d94" class="walletAddress">

                                <a style="cursor:pointer;" onclick="copyTextAdd();" class="btn-buy">Copy to Clipboard</a>

                                <!--<h4 id="walletAddress" class="wallet-addr">0xC2388d0c7eF1E679FacA4965a18fb0D2e43D6d94</h4>-->                                

                            </div>

                            <div class="col-md-2 col-sm-2 qr-modalimg">

								<img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/nQR-img.jpg" class="img-responsive">

							</div>

                        </div>

                    </div>

                    <h4 class="text-center">Please use this wallet to buy EVOT tokens with ETH<br> Recommended gas limit – 400,000 (50 GWEI)<br> Once you make payment, your tokens will appear in your wallet.</h4>

                </div>

                <div class="modal-footer">

                </div>

            </div>

        </div>

    </div> 

    <!--//-->      

    <!-- Modal -->

    <div class="modal fade" id="modalPrivatesale2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <a href="<?php echo base_url();?>">

                        <img src="<?php echo base_url();?>evoai/public/webroot/frontend/images/web_logo.png">

                    </a>

                </div>

                <div class="modal-body">

                    <h4><strong>Amount<small class="pull-right">1 EVOT = $<?php echo $evot_details->evot_value; ?></small></strong></h4>

                    <div class="col-md-10 col-md-offset-1">

                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-3">

                                <div class="input-group">

                                  <input type="text" onkeyup="get_evoaiAmountETH();" id="eth_amount_cal" class="form-control number-only" aria-label="...">

                                  <div class="input-group-btn">

                                    <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ETH</button>

                                    <!--

									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ETH <span class="caret"></span></button>

                                    <ul class="dropdown-menu dropdown-menu-right">

                                      <li><a href="#">BTC</a></li>

                                      <li><a href="#">LTC</a></li> 

                                      <li><a href="#">BCH</a></li>                                 

                                    </ul>

									-->

                                  </div><!-- /btn-group -->

                                </div><!-- /input-group -->

                            </div>

                            <div class="col-lg-3 col-md-3">

                                <div class="input-group">

                                  <input type="text" onkeyup="get_evoaiAmountUSD();" id="usd_amount_cal" class="form-control number-only" aria-label="...">

                                  <div class="input-group-btn">

                                    <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USDT</button>                                   

                                  </div><!-- /btn-group -->

                                </div><!-- /input-group -->

                            </div><!-- /.col-lg-6 -->

                            <div class="col-lg-2 col-md-2 col-sm-2 text-center">

                                <h3><i class="fas fa-equals"></i></h3>

                            </div>

                            <div class="col-lg-3 col-md-3">

                                <div class="input-group">

									<input type="text" id="evot_amount_cal" onkeyup="get_evoaiAmountEVOT();" class="form-control equals number-only">

									<div class="input-group-btn">

										<button type="button" class="btn btn-default" data-toggle="dropdown">EVOT</button>

									</div><!-- /btn-group -->

                                </div><!-- /input-group -->

                            </div><!-- /.col-lg-6 -->

                        </div>

                    </div>    

                    <div class="col-md-12 text-center">       

                        <h4>You Purchase ....................................... <span id="evot_value"></span> EVOT</h4>

						<!--<h4>Bonus <?php echo $evot_details->bonus; ?>% ....................................... <span id="evot_bonus"></span> EVOT</h3>-->

						<h4>Send your <span id="eth_text_val"></span> ETH to the following address</h4>	

						<!--<h5>PRIVATE SALE purchase rules : MIN/BUY $1000 of EVOT and MAX/ BUY $10,000 of EVOT per wallet</h5>-->

                    </div> 	

                    <div class="col-md-12 text-center">

                    <h1 class="text-center font-yellow"><u><i>DONT SEND ETH FROM AN EXCHANGE</i></u></h1>  
					<h2>Only send from Erc20 compatible wallets.</h2>                    

                    </div>	

                        	

                    <div class="modalcontent-body col-md-12 mt-0">                    	

                       <div class="row clearfix form_group"></div>

                    </div>

					<div class="col-md-12 text-center"> 

					<h4>Please use this wallet to buy EVOT tokens with ETH<br> Recommended gas limit – 400,000 (50 GWEI)<br> Once you make payment, your tokens will appear in your wallet.</h4>

                    <p>Your balance will be updated as soon as your deposit has 1 confirmation on the blockchain </p>					

					</div>

                </div>

                <div class="modal-footer">

                </div>

            </div>

        </div>

    </div> 

    <!--//-->  

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" type="text/javascript"></script>

    <script type='text/javascript'>

		$('#emailenabledisable').change(function() {
			var emailenabledisable = $("#emailenabledisable").prop('checked');
			if(emailenabledisable == true)
			{
				//$(".disabledemail").addClass('hidden');
				//$(".enabledemail").removeClass('hidden');
				//$("#showemail").removeAttr('class');
				document.cookie = "cache_section=1";
				$("#showemail").text('<?= $this->Ref_UserEmail ?>');
			}
			else
			{
				//$("#showemail").addClass('hidden');
				document.cookie = "cache_section=0";
				$("#showemail").text('');
				//$(".enabledemail").addClass('hidden');
				//$(".disabledemail").removeClass('hidden');
			}
		});

		$("#msg_div").fadeOut(15000);

		/* Cron job */
		function coinTransaction()
		{
			var dataSstring = 'uckn='+'evo';
			$.ajax({
				url: '<?php echo base_url()?>home/coinTransaction',
				type: 'POST',
				dataType: 'json',
				cache: false,
				success: function(resp)
				{
					if(resp)
					{
						console.log(resp);
					}
				}
			});			
		}
		function tokenPaidStatus()
		{
			var dataSstring = 'uckn='+'evo';
			$.ajax({
				url: '<?php echo base_url()?>home/tokenPaidStatus',
				type: 'POST',
				dataType: 'json',
				cache: false,
				success: function(resp)
				{
					if(resp)
					{
						console.log(resp);
					}
				}
			});			
		}
		coinTransaction();
		tokenPaidStatus();
		/* Login validation */

		function validate() { 

			var login_email = $('#login_email').val();

			if(login_email)

			{

				var dataString = 'email='+login_email;

				$.ajax({

					url: '<?php echo base_url()?>home/checkEmail',

					type: 'POST',

					data: dataString,

					cache: false,

					success: function(responce){ 

						if(responce){

							$('.login_email').addClass('hidden');

						}

						else{

							$('.login_email').removeClass('hidden');

							return false;

						}

					}

				});				

			}

			var response = grecaptcha.getResponse();

			if(response.length == 0)

			{

				$('.captcha').removeClass('hidden');

				return false;					

			}				

		}

		

		/* check_email */

		function check_email()

		{

			var login_email = $('#login_email').val();

			if(login_email)

			{

				var dataString = 'email='+login_email;

				$.ajax({

					url: '<?php echo base_url()?>home/checkEmail',

					type: 'POST',

					data: dataString,

					cache: false,

					success: function(responce){ 

						if(responce){

							$('.login_email').addClass('hidden');

						}

						else{

							$('.login_email').removeClass('hidden');

							return false;

						}

					}

				});				

			}

		}

		

		/* Try profit bar */

		function getAmount_val()

		{

			var amount_value = $("#amount_value").val();

			var daily_amount = $("#daily_amount").val();

			var evoCycles_day = $("#evoCycles_day").val();

			var weekly_amount = $("#weekly_amount").val();

			//var last_amount = $("#last_amount").val();

			var monthly_amount = $("#monthly_amount").val();

			if(evoCycles_day == ''){

				evoCycles_day = 1;

			}

			if(amount_value != ''){

				$('#daily_amount').val(((evoCycles_day / 102) * amount_value).toFixed(10));

				$('#weekly_amount').val(((evoCycles_day / 102) * amount_value * 7).toFixed(10));

				$('#monthly_amount').val(((evoCycles_day / 102) * amount_value * 30).toFixed(10));

			}

		}

		

		/* Registration validation */

		function check_registration() { 

			var username = $("#username").val();

			var email = $("#email").val();

			var password = $("#password").val();

			var re_password = $("#re_password").val();

			var eth_address = $("#eth_address").val();

			var checkedValue = $("#term_and_condition").is(":checked");

			if(checkedValue == false)

			{

				$("#term_and_condition").focus();			

				$('.error_term_and_condition').removeClass('hidden');

				return false;	

			}

			else

			{

				$('.error_term_and_condition').addClass('hidden');

			}

			var not_citizen_any_country = $("#not_citizen_any_country").is(":checked");

			if(not_citizen_any_country == false)

			{

				$("#not_citizen_any_country").focus();			

				$('.error_not_citizen_any_country').removeClass('hidden');

				return false;	

			}

			else

			{

				$('.error_not_citizen_any_country').addClass('hidden');

			}

			var not_registering = $("#not_registering").is(":checked");

			if(not_registering == false)

			{

				$("#not_registering").focus();			

				$('.error_not_registering').removeClass('hidden');

				return false;	

			}

			else

			{

				$('.error_not_registering').addClass('hidden');

			}

			var response = grecaptcha.getResponse();

			if(response.length == 0)

			{

				$('.captcha').removeClass('hidden');

				return false;					

			}	

			if(username == '' || email == '' || password == '' || re_password == '' || eth_address == '')

			{

				if(username == ''){

					$('.error_username').removeClass('hidden');	

					$("#username").focus();								

					return false;					

				}

				if(email == ''){

					$('.error_email').removeClass('hidden');	

					$("#email").focus();			

					return false;					

				}				

				if(password == ''){

					$('.error_password').removeClass('hidden');					

					$("#password").focus();			

					return false;					

				}			

				if(re_password == ''){

					$('.error_re_password').removeClass('hidden');					

					$("#re_password").focus();			

					return false;					

				}			

				if(eth_address == ''){

					$('.error_eth_address').removeClass('hidden');					

					$("#eth_address").focus();			

					return false;					

				}

				return false;				

			}

			else

			{

				if(password != re_password)

				{

					$('.error_re_password_val').removeClass('hidden');					

					return false;		

				}

				var dataString = 'email='+email;

				$.ajax({

					url: '<?php echo base_url()?>home/checkEmail',

					type: 'POST',

					data: dataString,

					cache: false,

					success: function(responce){ 

						if(responce){

							$('.error_email_r').removeClass('hidden');

							return false;

						}

						else{

							$('.error_email_r').addClass('hidden');

						}

					}

				});

				ethAddress_validation();

			}			

		}

		

		/*  Details remove */

		function ticketClose_detail(location_target)

		{

			bootbox.confirm("Are you sure you want to this ticket details close",function(confirmed){

				if(confirmed)

				{

					location.href="<?php echo base_url(); ?>"+location_target;

				}

			});

		}

		

		function error_remove(val)

		{

			var email = $("#email").val();

			$('.error_'+val).addClass('hidden');

			//$('.error_email_r').addClass('hidden');

			if(val == 'email'){ 

				var dataString = 'email='+email;

				$.ajax({

					url: '<?php echo base_url()?>home/checkEmail',

					type: 'POST',

					data: dataString,

					cache: false,

					success: function(responce){ 

						if(responce){

							$('.error_email_r').removeClass('hidden');

							return false;

						}

						else{

							$('.error_email_r').addClass('hidden');

						}

					}

				});				

			}

		}

		

		function ethAddress_validation()

		{

			var eth_address = $("#eth_address").val();

			var dataString = 'eth_address='+eth_address;

			$.ajax({

				url: '<?php echo base_url()?>home/ethAddress_validation',

				type: 'POST',

				data: dataString,

				cache: false,

				success: function(responce_add){ 

					if(responce_add == 2)

					{		

						$('.error_eth_address').addClass('hidden');

						$('.error_eth_address_exists').removeClass('hidden');

						return false;						

					}

					else if(responce_add == '')

					{		

						$('.error_eth_address').removeClass('hidden');

						$('.error_eth_address_exists').addClass('hidden');

						return false;						

					}

					else

					{

						$('.error_eth_address').addClass('hidden');

						$('.error_eth_address_exists').addClass('hidden');

					}

				}

			}); 

		}

						

		/* Check referral code */

		function check_referencedCode()

		{

			var referenced_code = $("#referenced_code").val();

			if(referenced_code != '')

			{

				var parts = referenced_code.split('=');

				var lastSegment = parts.pop() || parts.pop();  

				$("#referenced_code").val(lastSegment);				

				var dataString = 'referenced_code='+lastSegment;

				$.ajax({

					url: '<?php echo base_url()?>home/check_referencedCode',

					type: 'POST',

					data: dataString,

					cache: false,

					success: function(responce)

					{

						if(responce)

						{

							$('.error_referenced_code').addClass('hidden');

						}

						else

						{

							$('.error_referenced_code').removeClass('hidden');

							return false;

						}

					}

				});

			}

		}

		

		/* textCopy  */

		function containtCopy()

		{ 

			var copyText = document.getElementById("referralLink");

			copyText.select();

			document.execCommand("copy");

		}

		

		(function() { 

			var widget_id = 'XPJLnGe3uN';

			var d = document;

			var w = window;



			function l() {

				typeWriter1();

				var s = document.createElement('script');

				s.type = 'text/javascript';

				s.async = true;

				s.src = '//code.jivosite.com/script/widget/' + widget_id;

				var ss = document.getElementsByTagName('script')[0];

				ss.parentNode.insertBefore(s, ss);

			}

			if (d.readyState == 'complete') { l(); } else { if (w.attachEvent) { w.attachEvent('onload', l); } else { w.addEventListener('load', l, false); } }

		})();



		/* CharAt */

		var i = 0;

		var j = 0;

		var txt = 'Evolution of Artificial Intelligence';

		var txt2 = 'A revolutionary new platform fusing crypto trading and AI.';

		var speed = 90;

		var delay = 15000;



		function typeWriter1() {

			if (i == 0) {

				document.getElementById("textShow").innerHTML = '';

				document.getElementById("secondText").innerHTML = '';

			}

			if (i < txt.length) {

				document.getElementById("textShow").innerHTML += txt.charAt(i);

				i++;

				setTimeout(typeWriter1, speed);

			} else {

				setTimeout(typeWriter2, delay);

			}

		}



		function typeWriter2() {

			if (i == txt.length) {

				document.getElementById("textShow").innerHTML = 'Evolution of Artificial Intelligence';



				if (j < txt2.length) {

					document.getElementById("secondText").innerHTML += txt2.charAt(j);

					j++;

				} else {

					i = 0;

					j = 0;

				}

				setTimeout(typeWriter2, speed);

			} else {

				setTimeout(typeWriter1, delay);

			}

		}

    </script>

    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/jquery.countdown.js"></script>

    <script>

      /*-------------------------------------------

      CountDown

    -------------------------------------------*/

    $('.countdown-time').each(function () {

        var endTime = $(this).data('time');

        $(this).countdown(endTime, function (tm) {

            $(this).html(tm.strftime('<span class="section_count"><span class="tcount days">%D:</span><span class="text">DAYS</span></span><span class="section_count"><span class="tcount hours">%H:</span><span class="text">HOURS</span></span><span class="section_count"><span class="tcount minutes">%M</span><span class="text">MINS</span></span>'));

        });

    });	

    </script>

    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->

    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/scrolling-nav.js"></script>

    <script>

		function textCopy() {

			var copyText = document.getElementById("walletAddress");

			copyText.select();

			document.execCommand("copy");

		}		

    </script>       

	

	<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/highlight.pack.js"></script>

		<!-- adding plugin javascript file -->

	<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/breaking-news-ticker.min.js"></script>

	<script type="text/javascript">		

	//	hljs.initHighlightingOnLoad();

	//	setTimeout(function(){

	//	$('#priceTicker').breakingNews({

				//effect: 'typography'

	//		limit:4,

     //       scrollSpeed : 2,				

	//		});

	//	}, 2000)

		

		$(document).ready(function () {

				 $('.btn-box > label > input').click(function () {

					$('.btn-box > label > input:not(:checked)').parent().removeClass("selected");

					$('.btn-box > label > input:checked').parent().addClass("selected");

				});

				$('.btn-box > label > input:checked').parent().addClass("selected");

				var element = $('meta[name="active-menu"]').attr('content');

				$('#' + element).addClass('active');

			});

		$('#evoaiVideo').hover(function toggleControls() {

			if (this.hasAttribute("controls")) {

				this.removeAttribute("controls")

			} else {

				this.setAttribute("controls", "controls")

			}

		})

		

	function copyTextAdd() {

			var copyText = $(".walletAddress");

			copyText.select();

			document.execCommand("copy");

		}

		function showValue1(newValue) { 

    document.getElementById("monday").innerHTML= newValue;

}



function changeRangeValue(val){

    document.getElementById("range").value = isNaN(pparseFloat(val, 8)) ? 0 : parseFloat(val, 8);

    showValue1(val);

}

/* collection */
function getCollection()
{
	$.ajax({
		url:'<?php echo base_url()?>thanks/getCollection',
		type:'POST',
		dataType:'html',
		cache: false,
		success: function(resp){
			if(resp)
			{
				$(".form_group").html(resp);
			}
		}
	});
}
getCollection();

function changeInputValue(val){

    document.getElementById("number").value = isNaN(parseFloat(val, 8)) ? 0 : parseFloat(val, 8);

    showValue1(val);

}

		var rangeSlider = function(){

		var slider = $('.range-slider'),

			range = $('.range-slider__range'),

			value = $('.range-slider__value');

			

			slider.each(function(){

				value.each(function(){

					var value = $(this).prev().attr('value');

					$(this).html(value);

					//$(".arrow_val").val(value);

				});

				range.on('input', function(){

					$(this).next(value).html(this.value);

					$(".arrow_val").val(this.value);

				});

			});

		};



		rangeSlider();

	</script>

	<script>

	    $( "#slider" ).slider({

        range: true,

        values: [ 17, 67 ]

        });   

        $(document).ready(function(){

 $("a.collapsed").click(function(){

      $(this).find(".btn:contains('answer')").toggleClass("collapsed");

  });

 });                     

	</script>

 <!-- Modal -->

    <!--Tajar Amdar-->

    <div class="modal fade" id="modalTajar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Tajar-Amdar.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Tajar Amdar</h4>

                    

                    <p class="text-center">Tajar consults companies in the blockchain and ICO space, advising across economic, sophisticated technology and the internet industries through data sciences in order to create practical, profitable programs that cultivate business. He decided to devote his time and capital into the realization of A.I. based trading. He has a vast background in the stock and forex trading, especially on quantitative analysis. His research is focused primarily around A.I. and machine learning programs to enhance trading strategies.</p>

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Rostyslav Bortman -->

    <div class="modal fade" id="modalBortman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Rostyslav-Bortman.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Rostyslav Bortman</h4>

                    

                    <p class="text-center">Rostyslav is an Ethereumblockchain enthusiast. He has been involved in blockchain integration and development for several years. He has garnered a wealth of knowledge: Customizations of Microsoft Dynamics 365 for sales team, migration a database from Act! to Microsoft Dynamics 365. Blockchain/Ethereum research.Dev support, customizations and writing plugins in Microsoft Dynamics CRM.Master of Computer Applications (M.C.A.)Bachelor of Engineering (B.Eng.) </p>                   

                   

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Nick Tacminzis -->

    <div class="modal fade" id="modalNick" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Nick-Tacminzis.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Nick Tacminzis</h4>

                    

                    <p class="text-center">Serial entrepreneur and blockchain evangelist with experience in Asian markets. Nick is an early adopter of the blockchain who has a deep understanding of big data processing, AI, distributed network system and architecture design.</p>                                                         

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Bharat Chhabra -->

    <div class="modal fade" id="modalBharat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Bharat-Chhabra.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Bharat Chhabra</h4>

                    

                    <p class="text-center">Bharat after graduation from university, he selected websites development as his profession. He is Founder/Director of BRInfotech which he started in 2012. He is a young, dynamic, and dedicated professional developer. He has a BE(c.s.) and has now gained more than ten years worth of experience in the field of web development. He has created major projects that involve the development of websites, implement CRM and billing systems. He is currently developing projects utilize blockchain technology.</p>  

                    <a href="https://www.linkedin.com/in/bharat-chhabra-044bb1147/" target="_blank" class="text-center center-block"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" class="social-icon" /></a>                  

                   

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Om Prakash Verma -->

    <div class="modal fade" id="modalOm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Om-Prakash.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Om Prakash Verma</h4>

                    

                    <p class="text-center">Omprakash is dedicated Sr.web developer with perfect skills, he has done many projects in web development at high level.He now has more than 3 years of practical experience in the field of development, his area of interest also in Mobile Apps and demonstrates a solid knowledge in Microsoft Structured Query. Language(MS SQL) Microsoft Web Development.</p>       

                    <a href="https://www.linkedin.com/in/om-verma-1ab9a6171/" target="_blank" class="text-center center-block"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" class="social-icon" /></a>            

                   

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Otmane Daghmouchi -->

    <div class="modal fade" id="modalOtmane" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Otmane-Daghmouchi.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Otmane Daugmouchi</h4>                    

                    <p class="text-center">Otman is a believer that user interfaces are a pivotal point of the internet electronic components and he is quickly becoming a world-identified professional in the advancement of web interfaces. He has accomplished great progress in the development of the visual component of websites, for instance prototypes of pages, HTML, CSS, animation on Javascript. </p>                                      

                </div>                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Mehroz Anwer -->

    <div class="modal fade" id="modalMehroz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/team/Mehroz-Anwer.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Mehroz Anwer</h4>

                    

                    <p class="text-center">Mehroz is a very strong arts and design professional, skilled in Graphic Design, Advertising and Computer Animation. His experience enables him to understand the core message of a project and deliver quality results. Master of Fine Arts (M.F.A.), Media Science | Iqra University 2005 – 2006. </p>                   

                   

                </div>

                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Richard Nacht -->

    <div class="modal fade" id="modalRichardNacht" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>webroot/frontend/images/team/richard.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Richard Nacht</h4>                    

                    <p class="text-center">Richard Nacht brings a thorough understanding of the intersection of the law and business needs to any endeavor, having created multiple successful startups himself. He holds a J.D. and an MBA and has worked with thousands of clients over a 35-year career as an attorney. Master of Business Administration (M.B.A.) | New York University, Stern School of Business 1991 – 1993. Doctor of Law (J.D.) | New York Law School 1980 – 1983. Bachelor of Arts (B.A.) | University of Pennsylvania 1977 – 1980.</p> 

                    <a href="https://www.linkedin.com/in/richardnacht" target="_blank" class="text-center center-block"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" class="social-icon" /></a>

                    <p>&nbsp;</p>                                     

                </div>                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Taiki Shino -->

    <div class="modal fade" id="modalTaikiShino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>webroot/frontend/images/team/Taiki-Shino.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Taiki Shino</h4>                    

                    <p class="text-center">Taiki Shino work is publishing relations. The work of the publication has continued for 30 years.</p>

                    <p class="text-center">It's a work to tell my Excitement to people's.<br> (Magazine, Manga, Book editing...etc.)</p>

                    <p class="text-center">I have been engaged in the management of IT companies for a long time and have been developing various web services and TV GAME.<br> (Console game and application game...etc.)<br> Those using paper media are "publications", and when using digital media It will be "IT" or "TV GAME".</p> 

                    <a href="https://www.linkedin.com/in/shino-tokyo/" target="_blank" class="text-center center-block"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" class="social-icon" /></a>

                    <p>&nbsp;</p>                                     

                </div>                

            </div>

        </div>

    </div>

    <!--//-->

    <!-- Bianca Ruiz -->

    <div class="modal fade" id="modalBiancaRuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog modal-team" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

						<span aria-hidden="true">&times;</span>

					</button>                    

                </div>

                <div class="modal-body">

                	<img src="<?php echo base_url(); ?>webroot/frontend/images/team/Bianca-Ruiz.jpg" class="img-responsive center-block">

                    <h4 class="text-center">Bianca Ruiz</h4>                    

                   <!--  <p class="text-center">Bianca Ruiz brings a thorough understanding of the intersection of the law and business needs to any endeavor, having created multiple successful startups himself. He holds a J.D. and an MBA and has worked with thousands of clients over a 35-year career as an attorney. Master of Business Administration (M.B.A.) | New York University, Stern School of Business 1991 – 1993. Doctor of Law (J.D.) | New York Law School 1980 – 1983. Bachelor of Arts (B.A.) | University of Pennsylvania 1977 – 1980.</p> --> 

                    <a href="https://www.linkedin.com/in/bianca-ruiz-581197158" target="_blank" class="text-center center-block"><img src="<?php echo base_url(); ?>evoai/public/webroot/frontend/images/icon-linkedin.png" class="social-icon" /></a>

                    <p>&nbsp;</p>                                     

                </div>                

            </div>

        </div>

    </div>

    <!--//-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>

   <!-- <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js/dist/web3.min.js"></script>-->

	<script src="<?php echo base_url(); ?>evoai/public/webroot/frontend/js/jQuery-plugin-progressbar.js"></script>	

    <script>

        // Web3js initialization

        web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/baf22b6c2cd84003aa418a653eacecfa"));



        // ABI

        var crowdsaleABI = JSON.parse('[{"constant":false,"inputs":[],"name":"burnUnsoldTokens","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_beneficiary","type":"address"}],"name":"buyTokens","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},{"constant":false,"inputs":[{"name":"_newFundsWallet","type":"address"}],"name":"changeFundsWallet","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"changeRound","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"endCrowdsale","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"renounceOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"startCrowdsale","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"anonymous":false,"inputs":[{"indexed":true,"name":"purchaser","type":"address"},{"indexed":true,"name":"beneficiary","type":"address"},{"indexed":false,"name":"value","type":"uint256"},{"indexed":false,"name":"amount","type":"uint256"}],"name":"TokensPurchased","type":"event"},{"inputs":[{"name":"_tokenColdWallet","type":"address"},{"name":"_fundsWallet","type":"address"},{"name":"_oraclize","type":"address"}],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"name":"previousOwner","type":"address"},{"indexed":true,"name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"previousOwner","type":"address"}],"name":"OwnershipRenounced","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"name":"timestamp","type":"uint256"},{"indexed":false,"name":"round","type":"string"}],"name":"RoundStarts","type":"event"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"constant":true,"inputs":[],"name":"fundsWallet","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"open","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"oraclize","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"privateSaleMaxContrAmount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"privateSaleMinContrAmount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"state","outputs":[{"name":"roundName","type":"string"},{"name":"round","type":"uint256"},{"name":"tokens","type":"uint256"},{"name":"rate","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"token","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"usdRaised","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"weiRaised","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"}]');

        // var tokenABI = JSON.parse('[{"constant":false,"inputs":[{"name":"_spender","type":"address"},{"name":"_value","type":"uint256"}],"name":"approve","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_from","type":"address"},{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transferFrom","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_who","type":"address"}],"name":"balanceOf","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_to","type":"address"},{"name":"_value","type":"uint256"}],"name":"transfer","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"_owner","type":"address"},{"name":"_spender","type":"address"}],"name":"allowance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"anonymous":false,"inputs":[{"indexed":true,"name":"from","type":"address"},{"indexed":true,"name":"to","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"name":"owner","type":"address"},{"indexed":true,"name":"spender","type":"address"},{"indexed":false,"name":"value","type":"uint256"}],"name":"Approval","type":"event"}]');

        var oraclizeABI = JSON.parse('[{"constant":true,"inputs":[],"name":"getEthPrice","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"}]');



        var crowdsaleAddress = "0x5824D62F4f3C875C906F4E16d488BeD05a87A2Ea";

        // var tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";

        var oraclizeAddress = "0x97D8061df1370cBAc097ede6a10CA10714c7774a";



        var crowdsaleInstance = web3.eth.contract(crowdsaleABI).at(crowdsaleAddress);

        // var tokenInstance = web3.eth.contract(tokenABI).at(tokenAddress);

        var oraclizeInstance = web3.eth.contract(oraclizeABI).at(oraclizeAddress);



        var usd_price = '';

		var evot_val = '<?php echo $evot_details->evot_value; ?>';

        var bonus_val = '<?php echo $evot_details->bonus; ?>';



        // Getting USD price from oraclize

        (function(){

            oraclizeInstance.getEthPrice(function(err, res){

				usd_price = res / 100;

				$(".liveUSD_price").text(usd_price);

				userAccountDetails(usd_price);

				//userEVOT_balance();

            });

        })();



		$('.number-only').keypress(function(event) {

            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {

                event.preventDefault();

            }

        });



		/* USD and evoai value in at header */

		function userAccountDetails(usd_price)

		{

			//$(".liveUSD_price").text(usd_price);

			$.ajax({
				
				//url: 'https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1&address=<?= $this->session->userdata('Ref_ethAddress'); ?>&tag=latest&apikey=XT1TNTQ6NWDKJDVB76FIGWQU2VAJHEKTYV',
				
				url: 'https://api.etherscan.io/api?module=account&action=balance&address=<?= $this->session->userdata('Ref_ethAddress'); ?>&tag=latest&apikey=XT1TNTQ6NWDKJDVB76FIGWQU2VAJHEKTYV',
				
				type: 'POST',

				dataType: 'json',

				cache: false,

				success: function(responce){ 
					var eth_bal = responce.result;					
					var eth_bals = (Number(eth_bal.toString()) / 10**18).toFixed(4);
					$(".liveETH_balance").text(eth_bals);

				}

			});

		}

		

		/* Etherscan */

		function liveRate_ETHFromEtherscan()

		{

			$.ajax({

				url: 'https://api.etherscan.io/api?module=stats&action=ethprice&apikey=XT1TNTQ6NWDKJDVB76FIGWQU2VAJHEKTYV',

				type: 'POST',

				dataType: 'json',

				cache: false,

				success: function(responce){

					//console.log(responce);

					//usd_price = responce.result.ethusd;

					//$(".liveUSD_price").text(responce.result.ethusd);

					//userAccountDetails(usd_price)

				}

			});

		}

		setInterval(function(){ liveRate_ETHFromEtherscan(); }, 3000);

		liveRate_ETHFromEtherscan();

		

		/* user EVOT balance */

		function userEVOT_balance()

		{

			let tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";

			let walletAddress = "<?= $this->session->userdata('Ref_ethAddress'); ?>";



			// The minimum ABI to get ERC20 Token balance

			let minABI = [

				// balanceOf

				{

					"constant":true,

					"inputs":[{"name":"_owner","type":"address"}],

					"name":"balanceOf",

					"outputs":[{"name":"balance","type":"uint256"}],

					"type":"function"

				},

				// decimals

				{

					"constant":true,

					"inputs":[],

					"name":"decimals",

					"outputs":[{"name":"","type":"uint8"}],

					"type":"function"

				}

			];



			// Get ERC20 Token contract instance

			let contract = web3.eth.contract(minABI).at(tokenAddress);



			// Call balanceOf function

			contract.balanceOf(walletAddress, (error, balance) => {

			// Get decimals

			contract.decimals((error, decimals) => {

					// calculate a balance

					balance = balance.div(10**decimals);

					$(".liveEVOT_balance").text(balance);

				});

			});

		}

		userEVOT_balance();

		/* get_evoaiAmount */

		function get_evoaiAmountETH()

		{

			var eth_amount_cal = $("#eth_amount_cal").val();

			var usd_amt = (eth_amount_cal * usd_price).toFixed(2);

			var evot_amt = (usd_amt / evot_val).toFixed(2);

			$("#usd_amount_cal").val(usd_amt);

			$("#evot_amount_cal").val(evot_amt);

			$("#evot_value").text(evot_amt);

			var evot_bonus = (evot_amt * bonus_val/100).toFixed(2);

			$("#evot_bonus").text(evot_bonus);

			$("#eth_text_val").text(eth_amount_cal);

		}

		function get_evoaiAmountUSD()

		{

			var usd_amount_cal = $("#usd_amount_cal").val();

			eth_amt = (usd_amount_cal/usd_price).toFixed(5);			

			$("#eth_amount_cal").val(eth_amt);

			var evot_amt = (usd_amount_cal / evot_val).toFixed(2);

			$("#evot_amount_cal").val(evot_amt);	

			$("#evot_value").text(evot_amt);

			var evot_bonus = (evot_amt * bonus_val/100).toFixed(2);

			$("#evot_bonus").text(evot_bonus);

			$("#eth_text_val").text(eth_amt);

		}

		function get_evoaiAmountEVOT()

		{

			var evot_amount_cal = $("#evot_amount_cal").val();

			var usd_amt = (evot_amount_cal * evot_val).toFixed(2);

			var eth_amt = (usd_amt / usd_price).toFixed(5);

			$("#usd_amount_cal").val(usd_amt);	

			$("#eth_amount_cal").val(eth_amt);

			$("#eth_text_val").text(eth_amt);	

			$("#evot_value").text(evot_amount_cal);

        }



         // Progress bar part

        var progressBar = $(".distribution__lines.distribution_line_custom_new");

        var r = new web3.BigNumber(10).toPower(18);



        (function(){

            // tokenInstance.balanceOf(crowdsaleAddress, function(err, res){

            //     var crowdsaleTokens = 6800000;

            //     var totalAvailableTokens = parseInt(res.div(r).valueOf()); // x tokens available for crowdsale

            //     var totalSoldTokens = crowdsaleTokens - totalAvailableTokens; // x tokens sold during the crowdsale

            // });



            crowdsaleInstance.state.call(function(err,res){

                var stageName = res[0];

                var availableTokens = res[2].div(r).valueOf();

                var stageTokens;

                var soldTokens;

                var stageProcent = 0;



                if(stageName == "Private sale") stageTokens = 300000;

                else if(stageName == "Pre sale") stageTokens = 500000;

                else stageTokens = 1000000;



                soldTokens = stageTokens - availableTokens;

                stageProcent =  Math.round((soldTokens * 100) / stageTokens);

                if(stageProcent < 2) stageProcent = 7;

                if(stageProcent > 89) stageProcent = 92;



                progressBar.css("background", "linear-gradient(to right, rgb(118, 56, 129)" + stageProcent + "%, rgb(209, 198, 218)" + (stageProcent + 15) + "%, rgb(0, 0, 0)" + (stageProcent + 30) + "%");



                $("#tokens-sold").text(soldTokens.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " sold");

                $("#stage_name").text(stageName);

                $("#stage_state").html("TOKENS AVAILABLE <br>" + stageTokens.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " EVOT");



                $("#tokens-sold").css({"position" : "absolute", "top" : "0", "left": stageProcent - 1 + "%", "font-family" : "'PrometoW04-Regular'", "text-shadow" : "1px 1px #000000"});

                $("#stage_name").css({"float": "left", "text-transform": "uppercase"});

				/* Dashboard */

				var sold_percent = ((soldTokens * 100) / stageTokens).toFixed(2);

				$("#sold_percent").text(sold_percent+"%");

				$("#sold_percent_chart").attr("data-percent", sold_percent);

				$(".progress-bar1").loading();				

            });

        })();       

   

		/*preloader*/

		function preloader(){

			//Preloader

			$(window).on("load", function() {

				preloaderFadeOutTime = 3000;

				function hidePreloader() {

					var preloader = $('.spinner-wrapper');

					preloader.fadeOut(preloaderFadeOutTime);

				}

			hidePreloader();

			});

    	} 

		

    	$('[data-toggle=offcanvas]').click(function() {

			$('.row-offcanvas').toggleClass('active');

			$('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');

		});

		// $('#sidebar').affix({

		//   offset: {

		//     top:125,

		//     bottom: function () {

		//       return (this.bottom = $('.footer').outerHeight(true))

		//     }

		//   }

		// });

		

		// my balance

		// wallet contract

		var wallet_contract_address = '<?= $this->Ref_ethAddress?>';

		var wallet_contract_abi = [{"constant":true,"inputs":[],"name":"balanceOfContractFeeToken","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_receiver","type":"address"},{"name":"amount","type":"uint256"}],"name":"transferToken","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_token","type":"address"}],"name":"setExchangeContractAddress","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_token","type":"address"}],"name":"setTokenAddress","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"withdraw","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"setTokenFee","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"setETHFee","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"feeETH","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"transferETH","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"withdrawToken","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_user","type":"address"},{"name":"_amount","type":"uint256"}],"name":"recevedEthFromEvabot","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"user","type":"address"}],"name":"balanceOfETH","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"depositToken","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getCurrentTokenFee","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getEvotTokenAddress","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getCurrentEthFee","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"feeWithdrawEthAll","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getEvabotContractAddress","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"feeWithdrawTokenAmount","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_user","type":"address"},{"name":"_amount","type":"uint256"}],"name":"recevedTokenFromEvabot","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"admin_","type":"address"}],"name":"changeAdmin","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"withrawAllEthOnContract","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_token","type":"address"}],"name":"setEvabotContractAddress","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"amount","type":"uint256"}],"name":"feeWithdrawEthAmount","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"feeWithdrawTokenAll","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_balance","type":"uint256"}],"name":"withdrawAllTokensOnContract","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"user","type":"address"}],"name":"balanceOfToken","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"feeEVOT","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalTokenFee","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"","type":"address"}],"name":"etherBalance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"deposit","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},{"constant":true,"inputs":[],"name":"getExchangeContractAddress","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_user","type":"address"},{"name":"_amount","type":"uint256"}],"name":"recevedEthFromExchange","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"totalEthFee","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"","type":"address"}],"name":"tokenBalance","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"balanceOfContractFeeEth","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"anonymous":false,"inputs":[{"indexed":false,"name":"types","type":"uint256"},{"indexed":false,"name":"user","type":"address"},{"indexed":false,"name":"amount","type":"uint256"}],"name":"Deposit","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"name":"types","type":"uint256"},{"indexed":false,"name":"user","type":"address"},{"indexed":false,"name":"amount","type":"uint256"}],"name":"Withdraw","type":"event"},{"anonymous":false,"inputs":[{"indexed":false,"name":"types","type":"uint256"},{"indexed":false,"name":"_from","type":"address"},{"indexed":false,"name":"amount","type":"uint256"},{"indexed":false,"name":"_to","type":"address"}],"name":"Transfered","type":"event"}];

		window.addEventListener('load', async () => {    

           

            if (window.ethereum) {

                window.web3 = new Web3(ethereum);

                try {

                    await ethereum.enable();

                    userAddress = web3.eth.accounts[0];

                    web3.eth.defaultAccount = userAddress;        

                    const EvoAi = web3.eth.contract(wallet_contract_abi);

                    walletContractInstance = EvoAi.at(wallet_contract_address);

                                        

                    //const TokenContract = web3.eth.contract(token_abi);

                    //tokenInstance = TokenContract.at(token_address);

                } catch(e) {

                    console.log(e);

                }

            } else if(window.web3) {

                window.web3 = new Web3(web3.currentProvider);

                userAddress = web3.eth.accounts[0];

                web3.eth.defaultAccount = userAddress;        

                const EvoAi = web3.eth.contract(wallet_contract_abi);

                walletContractInstance = EvoAi.at(wallet_contract_address);

                

                

                //const TokenContract = web3.eth.contract(token_abi);

                //tokenInstance = TokenContract.at(token_address);

            }

            getBalances();

        });

		//get token and ether balance when load the page

        async function getBalances() {

            try {

                var token_balance = await balanceOfToken();

                $('#header_evot_balance').text(Number(token_balance.toString()) / 10**18);

				//console.log(Number(token_balance.toString()) / 10**18);

				

                var ether_balance = await balanceOfETH();

				var val = (Number(ether_balance.toString()) / 10**18).toString();

				if (val.indexOf('.') != -1) {

					var vals = val.split('.');

					var decimal = '';

					if(vals[1].length > 5) {

						decimal = vals[1].substr(0, 5);

					} else {

						decimal = vals[1];

					}

					val = vals[0] + '.' + decimal;

				}

				

				$('#header_eth_balance').text(val);

            } catch(e) {

                //$('#wallet_addr').text('Please connect to the Ethereum mainnet on Metamask.');

                console.log(e);

            }   

    

        }

		// get token balance by user address

        function balanceOfToken() {

            try {

                return new Promise((resolve, reject) => {

                    walletContractInstance.balanceOfToken(userAddress, function(e, r) {

                        if (e) {

                            reject(e);

                        }

                        resolve(r);

                    });

                });

            } catch (e) {

                console.log(e);

            }

        }

    

        // get ether balance by user address

        function balanceOfETH() {

            try {

                return new Promise((resolve, reject) => {

                    walletContractInstance.balanceOfETH(userAddress, function(e, r) {

                        if (e) {

                            reject(e);

                        }

                        resolve(r);

                    });

                });

            } catch (e) {

                console.log(e);

            }

        }		

		

    </script>

	<script type="text/javascript">

		<?php

			if($this->session->flashdata('success_message'))

			{

				?>

					toastr.success('<?php echo $this->session->flashdata('success_message')?>', 'Success!');

				<?php

			}

			if($this->session->flashdata('error_message'))

			{

				?>

					toastr.error('<?php echo $this->session->flashdata('error_message')?>', 'Error!');

				<?php

			}			

		?>

	</script>

    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/breaking-news-ticker.min.js"></script>

	<script type="text/javascript">		

		hljs.initHighlightingOnLoad();

		setTimeout(function(){

		$('#priceTicker').breakingNews({

				//effect: 'typography'

			limit:4,

            scrollSpeed : 2,				

			});

		}, 2000);

		

		preloader(); 

	</script>	

    <script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>evoai/public/webroot/frontend/js/owl.carousel.min.js"></script>

	<script>
				// $("#owl-demo").owlCarousel({
				// 	autoPlay: 2000,
				// 	items : 3,
				// 	margin:10,
				// 	itemsDesktop : [1199,6],

				// 	itemsDesktopSmall : [979,6],

				// 	dots: false,

				// 	navigation : true,

				// 	pagination: false,

				// 	draggable: false,

				// 	touchMove: false,

				// 	mouseDrag: false

				// });  
				
				   var carousel = $("#owl-demo");				  
				   carousel.owlCarousel({
				    itemsCustom: [
				      [0,3]
				    ],
				    autoPlay: false,
				    autoplayHoverPause:true,
				 	items : 3,
				 	margin:5,
				 	itemsDesktop : [1199,6],
				 	itemsDesktopSmall : [979,6],
				 	dots: false,
				 	navigation : true,
				 	pagination: false,
				 	draggable: false,
				 	touchMove: false,
				 	mouseDrag: false,
				     afterAction: function(el){
				       //remove class active
				       this
				       .$owlItems
				       .removeClass('active')
				      
				       //add class active
				       this
				       .$owlItems //owl internal $ object containing items
				       .eq(this.currentItem + 1)
				       .addClass('active')				      
				     }				     
				    });			  
				  
				  
			
				// $('.owl-carousel').owlCarousel({
			 //        items:1,
			 //        merge:true,
			 //        loop:true,
			 //        margin:10,
			 //        video:true,
			 //        lazyLoad:true,
			 //        center:true,
			 //        responsive:{
			 //            480:{
			 //                items:2
			 //            },
			 //            600:{
			 //                items:4
			 //            }
			 //        }
			 //    }) 
			</script>	

	</body>

</html>