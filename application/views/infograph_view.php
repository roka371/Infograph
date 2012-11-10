<div id="infograph_memory"><?php echo $memory; ?></div>

<?php

switch ($type){
	case 'topleft':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center" id="1">				
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>
					<div class="infograph_children_popover"></div>					
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomleft_line infograph_children_center"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
	
	case 'topright':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center" id="1">				
				<div class="infograph_children_wrapper">		
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>		
					<div class="infograph_children_popover"></div>			
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
		
	case 'left':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center" id="1">				
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>		
					<div class="infograph_children_popover"></div>			
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
		
	case 'bottomleft':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center" id="1">				
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>		
					<div class="infograph_children_popover"></div>		
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
		
	case 'bottomright':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>		
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
		
	case 'right':
		echo '<div id="infograph_reference_container" style="z-index:-1;">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center" id="1">				
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[0].'</div>	
					<div class="infograph_children_text">'.$keywords[0].'</div>			
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[1].'</div>
					<div class="infograph_children_text">'.$keywords[1].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[2].'</div>
					<div class="infograph_children_text">'.$keywords[2].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[3].'</div>
					<div class="infograph_children_text">'.$keywords[3].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid">'.$articles[4].'</div>
					<div class="infograph_children_text">'.$keywords[4].'</div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>';
		break;
}


?>


<script>
$('.infograph_children_active').unbind();
$('.infograph_children_active').hover(function(){
	var articles = $(this).children('.infograph_children_wrapper').children('.infograph_children_articleid').text();
	target = $(this).children('.infograph_children_wrapper').children('.infograph_children_popover');
	$.post('/infograph/load_articles', { 'articles': articles}, 
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
</script>