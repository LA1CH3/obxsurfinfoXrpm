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
			jsonpCallback: 'callback', 
			cache: false,
			url: "http://tidesandcurrents.noaa.gov/api/datagetter?date=latest&station=8651370&product=water_level&datum=STND&units=english&time_zone=gmt&format=json",
			data: { },
			success: function(resp){
				console.log(resp);
				var test = resp.data[0].s;
				console.log(test);
				$(".duck-wind").html(test);
			},
			error: function(xhr, status, error){
				var err = JSON.parse(xhr.responseText);
				console.log(err);
				console.log("hello");
			}

		});

		// DOM ready, take it away

		//// show mobile overlay on click
		clickAppear($cache.mobileTrigger, $cache.mobileOverlay);
		clickAppear($cache.mobileHide, $cache.mobileOverlay);


	});

} ( this, jQuery ));