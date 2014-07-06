jQuery(document).ready(function() {
	// Global
	var $win = jQuery(window),
		$body = jQuery('body'),
		timer;


	// Home
	var $homeHeader = jQuery('#home_header_id'),
		$viewPhotosButton = jQuery('#event_photos_button_id'),
		marginTopOffset,
		homeHeader = function() {
			if ( $body.hasClass('home') ) {
				var windowHeight = jQuery(window).height(),
						titleBlockHeight = jQuery('#title_block_wrap_id').height(),
						titleBlockMargin = (windowHeight - titleBlockHeight) / 2,
						headerHeight = windowHeight - titleBlockMargin;
				$homeHeader.css({
					height: headerHeight,
					marginTop: titleBlockMargin
				});
			}
		};
	$viewPhotosButton.click(function(e) {
		e.preventDefault();
		var curWindowHeight = jQuery(window).height();
		$body.animate({
			scrollTop: curWindowHeight
		}, 2000);
	});
	// Gallery
	var $galleryWrap = jQuery('#gallery_wrap_id'),
		$galleryImages = jQuery('.gallery--image'),
		$navImage = jQuery('.gallery_nav--image'),
		$galleryClose = jQuery('#gallery_close_id'),
		$galleryObj = jQuery('#gallery_id'),
		imagePad = 16,
		galleryImagesLength = $galleryImages.length,
		firstFade = true,
		$slider,
		galleryWrap = function() {
			if ( $body.hasClass('single-event-galleries') ) {
				var winHeight = $win.height(),
					winWidth = $win.width();
				$slider
					.width(winWidth)
					.height(winHeight);
			}
		},
		fitImage = function(images, container) {
			var contH = container.height(),
				contW = container.width(),
				contRatio = contW / contH,
				imgCount = images.length;
			for ( var i = 0; i < imgCount; i++ ) {
				var $image = jQuery(images[i]),
					imageH = $image.height(),
					imageW = $image.width(),
					imageRatio = imageW / imageH;
					if ( imageRatio < contRatio ) { // Image wider than container
						$image.height(contH - imagePad);
						$image.attr("width", "auto");
					} else { // Container wider than Image
						$image.width(contW - imagePad);
						$image.attr("height", "auto");
					}
			}
		},
		galleryFade = function(toggle) {
			if ( toggle == "out" ) {
				$slider.fadeOut();
				$galleryClose.fadeOut(function() {
					if ( firstFade ) {
						// for ( var imageI = 0; imageI < galleryImagesLength; imageI++ ) {
						// 	jQuery($galleryImages[imageI]).css({
						// 		opacity: 1
						// 	});
						// }
					}
					firstFade = false;
				});
			} else if ( toggle == "in" ) {
				$slider.fadeIn();
				$galleryClose.fadeIn();
			}
		};

		$win.load(function() {
			$galleryObj.bxSlider({
				pagerCustom: '#gallery_nav_id',
				useCSS: false,
				onSliderLoad: function() {
					$slider = jQuery('.bx-wrapper');
					galleryFade("out");
					galleryWrap();
					// fitImage($galleryImages, $win);
				},
				onSlideBefore: function() {
				}
			});
		});

		$navImage.click(function() {
			galleryFade("in");
		});
		$galleryClose.click(function() {
			galleryFade("out");
		});


	// Initializations
	homeHeader();


	// On Resize
	$win.resize(function() {
		clearTimeout(timer);
		// throttle the resize check
		timer = setTimeout(function() {
			// do resize stuff here
			homeHeader();
			galleryWrap();
			// fitImage($galleryImages, jQuery(window));
		}, 200);
	});


});