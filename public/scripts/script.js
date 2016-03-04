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

// script jqueryUI sortable
$(function() {
    $("#coltodo, #colcurrent").sortable({
      connectWith: "#colcurrent",
      stop:function(event, ui)
      {
      	var id = $(ui.item).find('[name="ticket_id"]').val();
      	var statut = $(ui.item).find('[name="statut"]').val();
      	$.post('index.php', {ticket_id:id,statut:statut,action:'next_ticket'}, function()
  		{
  			
  		});
      }
    }).disableSelection();
  });