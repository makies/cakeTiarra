<?php
//debug($channels);
if(is_array($channels) && count($channels)){
	echo "<ul>";
	$i = 1;
	foreach($channels as $c){
		echo "<li>";
		echo $html->link($c,array("action"=>"channel",substr($c,1)),array("accesskey"=>$i));
		echo "</li>";
	}
	echo "</ul>";
}else{
	echo __("Log files not found.");
}
?>
