'use strict';

	$(document).ready(function(){	
		$(window).scroll(function(){
			scrollAnim();		
		})	
		liveRate();
		liveRate_eth();
		liveRate_ltc();
		liveRate_bch();
		liveRate_BABB();
		liveRate_ETN();
		liveRate_TRON();     
		anima();
		proCalc();	

		// youtubeEmbed();	
		
	});

// When the user scrolls down 20px from the top of the document, show the button
	$(window).scroll(function() {
	    if ($(this).scrollTop()) {
	        $('#toTop').fadeIn();
	    } else {
	        $('#toTop').fadeOut();
	    }
	});

	$("#toTop").click(function () {
	   //1 second of animation time
	   //html works for FFX but not Chrome
	   //body works for Chrome but not FFX
	   //This strange selector seems to work universally
	   $("html, body").animate({scrollTop: 0}, 1000);
	});
	
	function rRatecolor(){
		// find the length of the text of THIS PARTICULAR element
		$(".price-grp span.rvalue").each(function(index) {							
   			var x=$(this).text();     			 			   			
   			if(x > 0){
   				$(this).parent().removeClass("font-red");
   				$(this).parent().addClass("font-green");
   			}
   			if(x < 0){
   				$(this).parent().removeClass("font-green");
   				$(this).parent().addClass("font-red");	
   			}
   			if(x == 0){
   				$(this).parent().removeClass("font-red");
   				$(this).parent().removeClass("font-green");
   				$(this).parent().addClass("font-white");
   			}
   		});   		
	}

   function liveRate() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
													
			var val = '';
			
			var CHANGE_PCTDAY = JSON.stringify(json_arr.RAW.BTC.USD.CHANGEPCTDAY);
			var img_btc = JSON.stringify(json_arr.RAW.BTC.USD.LASTUPDATE);
			var CHANGE_PCTDAY1 = Number (CHANGE_PCTDAY).toFixed(2);
			val += ' <div class="pull-left price-grp"><div class="curr"><span class="cname">BTC/USD</span><span> <span class="rvalue"> '+CHANGE_PCTDAY1+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.BTC.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.BTC.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/BTC/USD/latest.png?ts='+img_btc+'"></div>';
			$('.live-rate').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate(); }, 10000);
		 

	}
	
	function liveRate_BABB() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BAB&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
			
			var val = '';
			
			var CHANGE_PCTDAY = JSON.stringify(json_arr.RAW.BAB.USD.CHANGEPCTDAY);
			var img_BABB = JSON.stringify(json_arr.RAW.BAB.USD.LASTUPDATE);
			var CHANGE_PCTDAY1 = Number (CHANGE_PCTDAY).toFixed(2);
			val += ' <div class="pull-left price-grp"><div class="curr"><span class="cname">BAB/USD</span><span> <span><span class="rvalue"> '+CHANGE_PCTDAY1+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.BAB.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.BAB.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/BAB/USD/latest.png?ts='+img_BAB+'"></div>';
			$('.live-rate-BABB').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate(); }, 10000);
	}
	
	function liveRate_ETN() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=ETN&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
			
			var val = '';
			
			var CHANGE_PCTDAY = JSON.stringify(json_arr.RAW.ETN.USD.CHANGEPCTDAY);
			var img_ETN = JSON.stringify(json_arr.RAW.ETN.USD.LASTUPDATE);
			var CHANGE_PCTDAY1 = Number (CHANGE_PCTDAY).toFixed(2);
			val += ' <div class="pull-left price-grp"><div class="curr"><span class="cname">ETN/USD </span><span><span class="rvalue"> '+CHANGE_PCTDAY1+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.ETN.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.ETN.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/ETN/USD/latest.png?ts='+img_ETN+'"></div>';
			$('.live-rate-ETN').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate(); }, 10000);
	}
	
	function liveRate_TRON() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=TRON&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
			
			var val = '';
			
			var CHANGE_PCTDAY = JSON.stringify(json_arr.RAW.TRON.USD.CHANGEPCTDAY);
			var img_TRON = JSON.stringify(json_arr.RAW.TRON.USD.LASTUPDATE);
			var CHANGE_PCTDAY1 = Number (CHANGE_PCTDAY).toFixed(2);
			val += ' <div class="pull-left price-grp"><div class="curr"><span class="cname">TRON/USD </span><span><span class="rvalue"> '+CHANGE_PCTDAY1+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.TRON.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.TRON.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/TRON/USD/latest.png?ts='+img_TRON+'"></div>';
			$('.live-rate-TRON').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate(); }, 10000);
	}
            
	function liveRate_eth() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=ETH&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);                                                            
			var val = '';                                        
			var CHANGE_PCTDAY_ETH = JSON.stringify(json_arr.RAW.ETH.USD.CHANGEPCTDAY);
			var CHANGE_PCTDAY1_ETH = Number (CHANGE_PCTDAY_ETH).toFixed(2); 
			val += ' <div class="pull-left price-grp"><div class="curr"><span class="cname">ETH/USD </span><span><span class="rvalue"> '+CHANGE_PCTDAY1_ETH+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.ETH.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.ETH.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/ETH/USD/latest.png?ts='+JSON.stringify(json_arr.RAW.ETH.USD.LASTUPDATE)+'"></div>';     
			
			$('.live-rate_eth').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate_eth(); }, 10000);
	}
	
	function liveRate_ltc() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=LTC&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
													
			var val = '';   
			var CHANGE_PCTDAY_LTC = JSON.stringify(json_arr.RAW.LTC.USD.CHANGEPCTDAY);
			var CHANGE_PCTDAY1_LTC = Number (CHANGE_PCTDAY_LTC).toFixed(2); 
			val += '<div class="pull-left price-grp"><div class="curr"><span class="cname">LTC/USD </span><span><span class="rvalue"> '+CHANGE_PCTDAY1_LTC+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.LTC.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong>  '+JSON.stringify(json_arr.RAW.LTC.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/LTC/USD/latest.png?ts='+JSON.stringify(json_arr.RAW.LTC.USD.LASTUPDATE)+'"></div>';      
			
			$('.live-rate_ltc').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate_ltc(); }, 10000);
	}
	
	function liveRate_bch() {
		$.ajax({
			url: "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BCH&tsyms=USD",
			type: 'POST',
			dataType: 'json',
			success: function (result) {
			var str_val = JSON.stringify(result);
			var json_arr = jQuery.parseJSON(str_val);
													
			var val = '';
			
			var CHANGE_PCTDAY_BCH = JSON.stringify(json_arr.RAW.BCH.USD.CHANGEPCTDAY);
			var CHANGE_PCTDAY1_BCH = Number (CHANGE_PCTDAY_BCH).toFixed(2); 
			val += '<div class="pull-left price-grp"><div class="curr"><span class="cname">BCH/USD </span><span><span class="rvalue"> '+CHANGE_PCTDAY1_BCH+'</span><span class="cper">%</span></span></div><div class="realR"><strong> '+JSON.stringify(json_arr.RAW.BCH.USD.PRICE)+'</strong> USD</div><div class="cvol">Vol:<strong> '+JSON.stringify(json_arr.RAW.BCH.USD.LASTVOLUME)+'</strong></div></div><div class="pull-left img-grp"><img class="spark-img" src="https://images.cryptocompare.com/sparkchart/BCH/USD/latest.png?ts='+JSON.stringify(json_arr.RAW.BCH.USD.LASTUPDATE)+'"></div>';      
			
			$('.live-rate_bch').html(val);
			rRatecolor();  
			},
			error: function (error) {
			   //alert("Cannot get data");
			}
		});
		//setInterval(function(){ liveRate_bch(); }, 10000);
	} 
 function anima() {
  
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
        $animatables.each(function(i) {
       var $animatable = $(this);
            if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
            }
    });

    };
  
  // Hook doAnimations on scroll, and trigger a scroll
    $(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

}

function scrollAnim(){	
	$('.service-item').each(function(){				
		percentage();
	});
}


function percentage(){	
	if($('.service-item').length > 0){
		$('.service-item .progress-bar-holder .progress-bar:not(.active)').each(function(){
			var i = $(this);
			var val = i.attr('data-percentage');
			// i.find('.progress').width(i.width());
			if (val < 25){
				i.find('.progress').addClass('blue');
			} else if ( val >= 25 && val < 50){
				i.find('.progress').addClass('purple');
			} else if ( val >= 50 && val < 75 ){
				i.find('.progress').addClass('green');
			} else {
				i.find('.progress').addClass('light-green');
			}
			i.addClass('active').animate({
				'width': val + '%',
			}, 300);
			i.find('.progress-value').prop('Counter', 5).animate({
				Counter: val
			}, {
	        duration: 1000,
	        easing: 'swing',
	        step: function (now) {
	          i.find('.progress-value').text(Math.ceil(now) + '%');
	        }
	    }).text(val + '%');
		})
	}
}

function proCalc() {

                var select = $("#demo");
                var slider = $("<div id='slider' onClick='calc()'></div>").insertAfter(select).slider({
                    min: 1,
                    max: 90,
                    value: 1,
                    range: "min",
                    change: function(event, ui) {
                        var sliderValue = $("#slider").slider("option", "value");
                        $('#sliderPosition').html(sliderValue);
                    }
                });


                $('#increase').click(function() {
                    calc();
                    var sliderCurrentValue = $("#slider").slider("option", "value");
                    slider.slider("value", sliderCurrentValue + 1);
                });

                $('#decrease').click(function() {
                    calc();
                    var sliderCurrentValue = $("#slider").slider("option", "value");
                    slider.slider("value", sliderCurrentValue - 1);
                });


            };

// noui slider JS
var html5Slider = document.getElementById('html5');
noUiSlider.create(html5Slider, {
  start:[0, 10],
  connect: true,
  range: {
    'min': 0,
    'max': 100
  },
  format: wNumb({
    // decimals: 3
  })
});

var inputNumber = document.getElementById('input-number');
html5Slider.noUiSlider.on('update', function( values, handle ) {

  var value = values[handle];
  if ( handle ) {
    inputNumber.value = value;
  } else {
    //select.value = Math.round(value);
  }
});
inputNumber.addEventListener('change', function(){
  html5Slider.noUiSlider.set([null, this.value]);
});

            
            
        