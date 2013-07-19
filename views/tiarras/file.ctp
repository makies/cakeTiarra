<?php

/*
echo $form->create("Tiarra",array("url"=>$this->here));
echo $form->textarea("msg");
echo $form->submit("Send");
echo $form->end();
*/

$options = array(
//  "totalItems" => 200,
  "itemData"=>$content,
  "delta" => 10,
  "perPage" => 50,
  "path" => $this->here,
);

//debug($this->here);
//debug($this->params);
$pager =& Pager::factory($options);
//debug($pager);
$navi = $pager -> getLinks();
//debug($navi);


//echo $html->para("navi",$navi["all"]);

if(count($content)){
	$offset = (intval(@$this->params["url"]["pageID"]) ) * $options["perPage"] ;
	for($i=$offset; $i<($offset+$options["perPage"]); $i++){
	//foreach($content as $c){
		if(empty($content[$i])){
			break;
		}
		$c = $content[$i];
		echo "<p>";
		echo '<span style="font-size:x-small; color:#11972D;">';
		echo $c["date"];
		echo " ";
		echo $c["name"];
		echo '</span>';
		echo '<br />';
		echo '<span style="font-size:medium; color:#000;">';
		echo $text->autoLink($c["msg"]);
		echo '</span>';
		echo "</p>";
	}

}
echo "<hr />";
if(!empty($navi["linkTagsRaw"]["prev"]) || !empty($navi["linkTagsRaw"]["next"])){

echo '<p style="text-align:center;">';
if(!empty($navi["linkTagsRaw"]["prev"])){
echo '<a href="'.$navi["linkTagsRaw"]["prev"]["url"].'" accesskey="*">'.__($navi["linkTagsRaw"]["prev"]["title"],true).'</a>';
echo "&nbsp;";
}
if(!empty($navi["linkTagsRaw"]["next"])){
echo '<a href="'.$navi["linkTagsRaw"]["next"]["url"].'" accesskey="#">'.__($navi["linkTagsRaw"]["next"]["title"],true).'</a>';
}
echo "</p>";
}

echo "<hr />";
echo $html->para("navi",$navi["pages"],array("style"=>"text-align:center;"));

echo "<hr />";
echo $this->renderElement('channel_list');
?>
