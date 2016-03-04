$('document').ready(function()
{
	$('.js_edit_ticket').click(function(evenement)
	{
		evenement.preventDefault();
		var button = $(this);
		var id = $(this).parents('form').find('[name="ticket_id"]').val();
		$.get('index.php?ajax&page=display_ticket&id='+id, function(html)
		{
			button.parents('li').replaceWith(html);
		});
	});
	// $('.addticket').click(function()
	// {
	// 	$('.shorter').toggleClass('col-sm-4').toggleClass('col-sm-3');
	// 	$('.panelticket').toggleClass('hidden');
	// });
});
