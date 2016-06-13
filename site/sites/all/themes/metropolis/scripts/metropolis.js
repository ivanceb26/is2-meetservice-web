// $Id$
Drupal.behaviors.metropolisBehavior = function(context) {
	
	if ($.browser.msie && ($.browser.version < 7)) {
		$('#superfish li .nolink').hover(function() {
		$(this).addClass('hover');
		}, function() {
        $(this).removeClass('hover');
		});
	};

};