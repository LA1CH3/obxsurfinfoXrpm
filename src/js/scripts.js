(function( root, $, undefined ) {
	"use strict";

	$(function () {

		//init vars
		var $cache = {};

		$cache.mobileOverlay = $(".mobile-overlay");
		$cache.mobileTrigger = $(".hamburger img");
		$cache.mobileHide = $(".mobile-overlay .hide");
		$cache.partnerImage = $(".slider-partners a");
		$cache.desktopnavItem = $("nav.desktop .menu-item");



		/// Helper functions

		// submenu nav hovering
		function hoverAppear($trigger){
			$trigger.hover(
				function(e){
					e.preventDefault();
					var $item = $(this).find(".sub-menu");
					$item.stop().slideDown();
				}, function(e){
					var $item = $(this).find(".sub-menu");
					$item.stop().slideUp();
				} );
		}

		hoverAppear($cache.desktopnavItem);

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

		$(".report-slider").slick({
			infinite: true,
			slidesToShow: 3, 
			slidesToScroll: 3,
			responsive: [
			    {
			      breakpoint: 1224,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3,
			        infinite: true,
			      }
			    },
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			]
		});

		//// API Calls

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