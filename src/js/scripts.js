(function( root, $, undefined ) {
	"use strict";

	$(function () {

		//init vars
		var $cache = {};

		$cache.mobileOverlay = $(".mobile-overlay");
		$cache.mobileTrigger = $(".hamburger img");
		$cache.mobileHide = $(".mobile-overlay .hide");
		$cache.partnerImage = $(".slider-partners a");



		//// Helper functions

		//var csv is the CSV file with headers
		function csvJSON(csv){
		 
		  var lines=csv.split("\n");
		 
		  var result = [];
		 
		  var headers=lines[0].split(",");
		 
		  for(var i=1;i<lines.length;i++){
		 
			  var obj = {};
			  var currentline=lines[i].split(",");
		 
			  for(var j=0;j<headers.length;j++){
				  obj[headers[j]] = currentline[j];
			  }
		 
			  result.push(obj);
		 
		  }
		  
		  //return result; //JavaScript object
		  return JSON.stringify(result); //JSON
		}

		// turn our degrees from NOAA into compass directions
		function degToDirection(deg){

			var val = Math.floor((deg/22.5) + 11.25 + 360);
			var arr = ["N","NNE","NE","ENE","E","ESE", "SE", "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
			var result = arr[val % 16];
			return result;
		}
		

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
		
		$(".slider-partners").slick({
			infinite: true,
			slidesToShow: 4, 
			slidesToScroll: 4,
			autoplay: true
		});

		//// API Calls

		// Swell & Temp data from NOAA
		$.ajax({
			type: "GET",
			cache: false,
			url: "http://sdf.ndbc.noaa.gov/sos/server.php?request=GetObservation&service=SOS&version=1.0.0&offering=urn:ioos:station:wmo:44095&observedproperty=Waves&responseformat=text/csv&eventtime=latest",
			success: function(resp){

				var dataR = csvJSON(resp);
				dataR = JSON.parse(dataR);
				console.log(dataR);

				var swellHeight = dataR[0]['\"sea_surface_wave_significant_height (m)\"'];
				var swellDir = dataR[0]['\"sea_surface_wind_wave_to_direction (degree)\"'];
				var swellInt = dataR[0]['\"sea_surface_wave_mean_period (s)\"'];
				var swellTemp = dataR[0]['\"sea_water_temperature (c)\"'];

				var swellString = swellHeight + "' " + degToDirection(swellDir) + " @ " + swellInt + "SEC";

				$(".duck-swell").html(swellString);
			},
			error: function(xhr, status, error){
				var err = JSON.parse(xhr.responseText);
				console.log(err);
			}

		});

		// outside air temp from wunderground
		$.ajax({
			type: "GET",
			cache: false,
			url: "http://api.wunderground.com/api/3658c7c53d19beaf/conditions/q/NC/Nags_Head.json",
			success: function(resp){
				console.log(resp);
				var swellTemp = resp["current_observation"];
				swellTemp = swellTemp["feelslike_f"];
				swellTemp = swellTemp + "°F";
				$(".duck-temp").html(swellTemp);
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

		// partner logo hovers
		$cache.partnerImage.hover(function(e){

			var $hoverImg = $(this).children('img').attr('data-hover');
			var $regImg = $(this).children('img').attr('src');

			$(this).children('img').attr('data-hover', $regImg);
			$(this).children('img').attr('src', $hoverImg);


		});


	});

} ( this, jQuery ));