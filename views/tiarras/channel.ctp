<?php
if(is_array($files) && count($files)){
	echo "<ul>";
	@rsort($files);
	foreach($files as $f){
		echo "<li>";
		echo $html->link($f,array("action"=>"file",h($channel_name),$f));
		echo "</li>";
	}
	echo "</ul>";
}

?>
