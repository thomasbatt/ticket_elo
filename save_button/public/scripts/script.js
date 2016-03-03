$('document').ready(function()
{
	$('.addticket').click(function()
	{
		$('.shorter').toggleClass('col-sm-4').toggleClass('col-sm-3');
		$('.panelticket').toggleClass('hidden');
	});
});