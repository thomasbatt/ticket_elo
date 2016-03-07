$('document').ready(function()
{
	$('.addticket').click(function(evenement)
	{
		evenement.preventDefault();
      	$.post('index.php', {action:'creat_ticket'}, function(){} );
		$.get('index.php?ajax&page=display_new', function(html)
		{
			// alert(html);
			$('.js_new_ticket').replaceWith(html);
		});
  		
	// 	$('.shorter').toggleClass('col-sm-4').toggleClass('col-sm-3');
	// 	$('.panelticket').toggleClass('hidden');
	});
	$('.js_edit_ticket').click(function(evenement)
	{
		evenement.preventDefault();
		var button = $(this);
		var id = $(this).parents('form').find('[name="ticket_id"]').val();
		$.get('index.php?ajax&page=display_ticket&id='+id+'&statut=todo&editing=1', function(html)
		{
			// alert(html);
			button.parents('li').replaceWith(html);
		});
	});
	$('.js_valid_ticket').click(function(evenement)
	{
		evenement.preventDefault();
		var button = $(this);
		var id = $(this).parents('form').find('[name="ticket_id"]').val();
		var title = $(this).parents('form').find('[name="title"]').val();
		var content = $(this).parents('form').find('[name="content"]').val();

		$.post('index.php', {ticket_id:id,title:title,content:content,action:'valid_ticket'}, function()
  		{
			$.get('index.php?ajax&page=display_ticket&id='+id+'&statut=todo&editing=0', function(html)
			{
				// alert(html);
				button.parents('li').replaceWith(html);
			});
		});
	});
	$('.js_delete_ticket').click(function(evenement)
	{
		evenement.preventDefault();
		var button = $(this);
		var id = $(this).parents('form').find('[name="ticket_id"]').val();

		$.post('index.php', {ticket_id:id,action:'delete_ticket'}, function()
  		{
			$.get('index.php?ajax&page=display_ticket&id='+id+'&statut=todo&editing=1', function()
			{
				// alert(html);
				button.parents('li').replaceWith();
			});
		});
	});
});

// script jqueryUI sortable

// deplacement de todo vers current sans retour en arriere possible
$(function() {
    $("#coltodo, #colcurrent").sortable({
      connectWith: "#colcurrent",
      cancel: "#fixed , input",
	  delay: 100,
      stop:function(event, ui)
      {
      	var id = $(ui.item).find('[name="ticket_id"]').val();
      	var statut = $(ui.item).find('[name="statut"]').val();
      	$.post('index.php', {ticket_id:id,statut:statut,action:'next_ticket'}, function()
  		{
  		  	$.get('index.php?ajax&page=display_ticket&id='+id+'&statut=current&editing=0', function(html)
			{
				ui.item.replaceWith(html);
			});		
  		});
      }
    }).disableSelection();
  });

// deplacement de current vers done sans retour en arriere possible
$(function() {
    $("#colcurrent, #coldone").sortable({
      connectWith: "#coldone",
      stop:function(event, ui)
      {
      	
      	var id = $(ui.item).find('[name="ticket_id"]').val();
      	var statut = $(ui.item).find('[name="statut"]').val();
      	$.post('index.php', {ticket_id:id,statut:statut,action:'next_ticket'}, function()
  		{
  			$.get('index.php?ajax&page=display_ticket&id='+id+'&statut=done&editing=0', function(html)
			{
				ui.item.replaceWith(html);
			});		
  		});
      }
    }).disableSelection();
  });
