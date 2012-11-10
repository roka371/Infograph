<!--
The main view for Infograph
-->


<!--


*        *         ***********
*        *                   *
*        *                   *
*        *                   *
*        *                   *
*        *                   *
*        *                   *
**************     ***********
         *         *          
         *         *                    
         *         * 
         *         * 
         *         ************ 


-->

<html>

<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" charset="utf-8"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/js/script_infograph.js" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="/css/style_infograph.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Infograph</title>
</head>

<body>

<div id="container">
	
	<div id="infograph_title" onclick="window.location.href='/index.php/infograph'">Infograph</div>

	<div id="infograph">
		
		<div id="infograph_node_container">
		<div class="infograph_node infograph_current">
			<div id="infograph_input_wrapper">
				<div id="infograph_loading" class="infograph_loading_initial"><img src="/assets/loading.png" /></div>
				<form id="infograph_form">
				<input id="infograph_input" placeholder="What's your interest?" type="text" />
				</form>
			</div>
		</div>
		<div id="infograph_reference_container">
			<div id="infograph_reference">
				<div class="infograph_children infograph_children_topleft infograph_children_active infograph_children_center">			
				<div class="infograph_children_wrapper">	
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_topright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>	
					<div class="infograph_children_line infograph_children_topright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_left infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>
					<div class="infograph_children_line infograph_children_left_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomleft infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>
					<div class="infograph_children_line infograph_children_bottomleft_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_bottomright infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>
					<div class="infograph_children_line infograph_children_bottomright_line"></div>
				</div>
				</div>
				<div class="infograph_children infograph_children_right infograph_children_active infograph_children_center">
				<div class="infograph_children_wrapper">
					<div class="infograph_children_articleid"></div>
					<div class="infograph_children_text"></div>	
					<div class="infograph_children_popover"></div>
					<div class="infograph_children_line infograph_children_right_line"></div>
				</div>
				</div>
			</div>
		</div>
		</div>
		
	</div>
</div>

</body>
</html>