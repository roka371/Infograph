<!--
Popover view for Infograph that shows articles related to a keyword.
-->
<div class="infograph_popover_wrapper">
<div class="infograph_popover_header">Related Articles</div>
<?php

foreach($articles as $article){
	if ($article->thumbnail_width < '150'){
		echo '<div class="infograph_article_entry">'; 
		echo '<div class="infograph_article_title"><a target="_blank" href="'.$article->aid.'">'.$article->title.'</a></div>
		</div>';
	} else {
		echo '<div class="infograph_article_entrywth">';
		echo '<div class="infograph_article_thumbnail"><img src='.$article->thumbnail.' /></div>';
		echo '<div class="infograph_article_titlewth"><a target="_blank" href="'.$article->aid.'">'.$article->title.'</a></div>
		</div>';
	}
}


?>
</div>

<script>
$('.infograph_article_entry').click(function(){
	event.stopPropagation();
});

$('.infograph_article_entrywth').click(function(){
	event.stopPropagation();
});

</script>
