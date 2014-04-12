jQuery(document).ready(function() {
	var $win = jQuery(window),
		$masthead = jQuery('#masthead'),
		timer,
		winHeight,
		mastheadHeight,
		marginTopOffset;
	function verticalCenter() {
		winHeight = $win.height();
		mastheadHeight = $masthead.height();
		marginTopOffset = (winHeight / 2) - (mastheadHeight / 2);
		if ( marginTopOffset < 0 ) marginTopOffset = 0;
		$masthead.css('marginTop', marginTopOffset);
	}
	$win.resize(function() {
		clearTimeout(timer);
		// throttle the resize check
		timer = setTimeout(function() {
			// do resize stuff here
			verticalCenter();
		}, 200);
	});
	verticalCenter();
});