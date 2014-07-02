jQuery(document).ready(function() {
	// Global
	var $win = jQuery(window),
		$body = jQuery('body'),
		timer;


	// Home
	var $homeHeader = jQuery('#home_header_id'),
		$titleBlock = jQuery('#title_block_id'),
		marginTopOffset,
		homeHeader = function() {
			if ( $body.hasClass('home') ) {
				var winHeight = $win.height(),
						titleBlockHeight = $titleBlock.height();
						titleBlockMargin = (winHeight - titleBlockHeight) / 2;
				$homeHeader
					.height(winHeight)
					.css({paddingTop: titleBlockMargin});
			}
		};

	// Gallery
	var $galleryWrap = jQuery('#gallery_wrap_id'),
		$galleryImages = jQuery('.gallery--image'),
		imagePad = 16,
		$slider,
		$navImage = jQuery('.gallery_nav--image'),
		galleryWrap = function() {
			if ( $body.hasClass('single-event-galleries') ) {
				var winHeight = $win.height(),
					winWidth = $win.width();
				$slider
					.width(winWidth)
					.height(winHeight);
			}
		};
		fitImage = function(images, container) {
			var contH = container.height(),
				contW = container.width(),
				contRatio = contW / contH,
				imgCount = images.length;
				// console.log(images.length);
			for ( var i = 0; i < imgCount; i++ ) {
				var $image = jQuery(images[i]),
					imageH = $image.height(),
					imageW = $image.width(),
					imageRatio = imageW / imageH;
					if ( imageRatio < contRatio ) { // Image wider than container
						$image.height(contH - imagePad);
						$image.attr("width", "auto");
					} else { // Container wider than Image
						$image.attr("height", "auto");
						$image.width(contW - imagePad);
					}
			}
		};


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
			fitImage($galleryImages, jQuery(window));
		}, 200);
	});

	jQuery('#gallery_id').bxSlider({
		pagerCustom: '#gallery_nav_id',
		onSliderLoad: function() {
			$slider = jQuery('.bx-wrapper');
			$slider.fadeOut();
			galleryWrap();
			fitImage($galleryImages, $win);
		},
		onSlideBefore: function() {
		}
	});

	$navImage.click(function() {
		$slider.fadeIn();
	});

});