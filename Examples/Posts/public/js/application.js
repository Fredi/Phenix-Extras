(function($) {
	function allowAction(element)
	{
		var message = element.data('confirm');
		return !message || confirm(message);
	}

	function stopEverything(e)
	{
		e.stopImmediatePropagation();
		return false;
	}

	$('a[data-method]').live('click', function(e) {
		var link = $(this);
		if (!allowAction(link))
			return stopEverything(e);

		var href = link.attr('href'),
		method = link.data('method'),
		form = $('<form method="post" action="' + href + '"></form>'),
		metadata_input = '<input name="_method" value="' + method + '" type="hidden" />';

		form.hide().append(metadata_input).appendTo('body');
		form.submit();

		return false;
	});
})(jQuery);