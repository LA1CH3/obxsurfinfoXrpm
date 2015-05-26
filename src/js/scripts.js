(function( root, $, undefined ) {
	"use strict";

	$(function () {

		//init vars
		var $cache = {};

		$cache.mobileOverlay = $(".mobile-overlay");
		$cache.mobileTrigger = $(".hamburger img");
		$cache.mobileHide = $(".mobile-overlay .hide");



		//// Helper functions

		// Click appear functions

		function clickAppear($trigger, $item){
			$trigger.click(function(e){
				e.preventDefault();
				$item.fadeToggle();
			});
		}


		//// Plugins init
		$(".slider").slick({
			dots: true,
			autoplay: true
		});

		$.simpleWeather({
			location: 'Nags Head, NC',
			unit: 'f',
			success: function(weather){
				var tempHtml = weather.temp + '&deg; ';
				//var windHtml = weather.wind.speed + " " + weather.wind.direction + " @ " + "9 SEC";

				$(".duck-temp").html(tempHtml);
				//$(".duck-wind").html(windHtml);
			},
			error: function(error){
				console.log(error);
				$(".duck-temp").html("<p>" + error + "</p>");
			}
		});

		// API Calls

		// Swell data from NOAA
		$.ajax({
			type: "GET",
			contentType: 'text/plain',
			dataType: 'JSON',
			cache: false,
			url: "http://magicseaweed.com/api/qZh1LXwV0O0V5vT9K68Cal6uQJXiMyy7/forecast/?spot_id=397",
			data: { },
			success: function(resp){

				// wave data
				console.log(resp);
				var feet = resp[0].swell.components.combined.height;
				var dir = resp[0].swell.components.combined.compassDirection;
				var interval = resp[0].swell.components.combined.period;

				var swellString =
					feet +=
					'\' ';
				swellString += dir;
				swellString += " @ ";
				swellString += interval;
				swellString += " SEC";

				// temperature data
				var temp = resp[0].condition.temperature;
				temp += "°";

				
					
				$(".duck-swell").html(swellString);
				$(".duck-temp").html(temp);
			},
			error: function(xhr, status, error){
				var err = JSON.parse(xhr.responseText);
				console.log(err);
			}

		});

		// DOM ready, take it away

		//// show mobile overlay on click
		clickAppear($cache.mobileTrigger, $cache.mobileOverlay);
		clickAppear($cache.mobileHide, $cache.mobileOverlay);


	});

} ( this, jQuery ));