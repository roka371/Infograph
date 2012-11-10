
var memory = '';

$(document).ready(function(){
	
	// Initial node
	$('#infograph_form').submit(function(){
		memory += $('#infograph_input').val();
		$('#infograph_input').blur();
		$('#infograph_loading').show('fade', 500);
		$.post('/index.php/infograph/get_keyword_recommendation/init', {'keyword': $('#infograph_input').val()}, 
			function(data){
				$('#infograph_loading').hide('fade', 500);
				var data_array = data.split('|');
				var keyword_array = data_array[0].split(';');
				var article_array = data_array[1].split('/');
				$('.infograph_children_topleft').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[0]);
				$('.infograph_children_topleft').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[0]);
				$('.infograph_children_topright').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[1]);
				$('.infograph_children_topright').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[1]);
				$('.infograph_children_left').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[2]);
				$('.infograph_children_left').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[2]);
				$('.infograph_children_bottomleft').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[3]);
				$('.infograph_children_bottomleft').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[3]);
				$('.infograph_children_bottomright').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[4]);
				$('.infograph_children_bottomright').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[4]);
				$('.infograph_children_right').children('.infograph_children_wrapper').children('.infograph_children_text').text(keyword_array[5]);
				$('.infograph_children_right').children('.infograph_children_wrapper').children('.infograph_children_articleid').text(article_array[5]);
				$('.infograph_children_active').removeClass('infograph_children_center');
		});
		return false;
	});
	
	$('#infograph_input').focus(function(){
		$('.infograph_node').css('background-color', '#B5D9EB');
	});
	
	$('#infograph_input').blur(function(){
		$('.infograph_node').css('background-color', '#EBEFF1');
	});
	
	// Popover for child node hover
	$('.infograph_children_active').hover(function(){
	var articles = $(this).children('.infograph_children_wrapper').children('.infograph_children_articleid').text();
	target = $(this).children('.infograph_children_wrapper').children('.infograph_children_popover');
	$.post('/index.php/infograph/load_articles', { 'articles': articles}, 
	function(data){
		$('.infograph_current').addClass('infograph_current_popoverup');
		target.html(data);
		target.show();
	});
	}, function(){
		$('.infograph_current').removeClass('infograph_current_popoverup');
		$(this).children('.infograph_children_wrapper').children('.infograph_children_popover').hide();
		$(this).children('.infograph_children_wrapper').children('.infograph_children_popover').empty();
	});
	
	
	
	
	// Click Children node
	
	$('.infograph_children_active').live('click', function(){
		$('#infograph_loading').remove();
		var keyword = $(this).children('.infograph_children_wrapper').children('.infograph_children_text').text();
		// Find the type of the selected node
		if ($(this).hasClass('infograph_children_topleft')){
			var type = 'topleft';
		} else if ($(this).hasClass('infograph_children_topright')){
			var type = 'topright';
		} else if ($(this).hasClass('infograph_children_left')){
			var type = 'left';
		} else if ($(this).hasClass('infograph_children_bottomleft')){
			var type = 'bottomleft';
		} else if ($(this).hasClass('infograph_children_bottomright')){
			var type = 'bottomright';
		} else if ($(this).hasClass('infograph_children_right')){
			var type = 'right';
		}
		
		// Set this node as the current node
		$('.infograph_current').removeClass('infograph_current');
		$(this).addClass('infograph_current');
		$(this).children('.infograph_children_wrapper').append('<div id="infograph_loading" class="infograph_loading_children"><img src="/assets/loading.png" /></div>');
		// Hide the rest of the children
		$('div.infograph_children_active:not(.infograph_current)').addClass('infograph_children_center');
		setTimeout(function(){
			$('.infograph_children_center').hide();
		}, 300);
		
		// Deactivate all of the current active children
		$('.infograph_children_popover').remove();
		$('.infograph_children_active').unbind();
		$('.infograph_children_active').removeClass('infograph_children_active');
		
		// Move the selected node to the center depending on the type of the node and give styles to the selected node.
		
		switch (type) {
			case 'topleft':
				$('#infograph_node_container').css({'top': $('#infograph_node_container').offset().top+255, 'left': $('#infograph_node_container').offset().left+190});
				$(this).addClass('infograph_currentnode infograph_current_topleft');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
			case 'topright':
				$('#infograph_node_container').css({'top': $('#infograph_node_container').offset().top+255, 'left': $('#infograph_node_container').offset().left-190});
				$(this).addClass('infograph_currentnode infograph_current_topright');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
			case 'left':
				$('#infograph_node_container').css({'left': $('#infograph_node_container').offset().left+380});
				$(this).addClass('infograph_currentnode infograph_current_left');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
			case 'bottomleft':
				$('#infograph_node_container').css({'top': $('#infograph_node_container').offset().top-255, 'left': $('#infograph_node_container').offset().left+190});
				$(this).addClass('infograph_currentnode infograph_current_bottomleft');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
			case 'bottomright':
				$('#infograph_node_container').css({'top': $('#infograph_node_container').offset().top-255, 'left': $('#infograph_node_container').offset().left-190});
				$(this).addClass('infograph_currentnode infograph_current_bottomright');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
			case 'right':
				$('#infograph_node_container').css({'left': $('#infograph_node_container').offset().left-380});
				$(this).addClass('infograph_currentnode infograph_current_right');
				$(this).children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_main_text');
				break;
		}
		
		memory += keyword;
		setTimeout(function(){
			$('#infograph_loading').show('fade', 500);
			$.post('/index.php/infograph/get_keyword_recommendation/'+type, {'keyword': keyword, 'memory': memory}, 
			function(data){
				$('.infograph_current').prepend(data);
				$('#infograph_input').hide('fade', 500);
				$('.infograph_node').addClass('infograph_oldnode');
				$('div.infograph_currentnode:not(.infograph_current)').addClass('infograph_oldnode');
				$('.infograph_oldnode').children('.infograph_children_wrapper').children('.infograph_children_text').addClass('infograph_old_text');
				setTimeout(function(){
					$('#infograph_loading').hide('fade', 500);
					$('.infograph_children_active').removeClass('infograph_children_center');
				}, 500);
				$('#infograph_memory').remove();
			});
		}, 500);
		
	});
});
