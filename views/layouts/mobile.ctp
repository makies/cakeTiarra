<?php
/* SVN FILE: $Id: default.ctp 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-19 11:16:01 +0900 (Fri, 19 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<?php header('Content-Type: application/xhtml+xml;'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.0) 1.0//EN" "i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset='UTF-8'" />
	<title>
		<?php echo __('cakeTiarra',true); ?>
	</title>
	<?php
//		echo $html->meta('icon');
//		echo $html->css('cake.generic');
//		echo $scripts_for_layout;
	?>
<style type="text/css">
<![CDATA[
a:focus{color:#FFFFFF}
a:visited{color:#FF3366}
a:link{color:#FF3366}
}
]]>
</style>


</head>
<body><span style="font-size:small;">

	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('cakeTiarra', true), '/',array("accesskey"=>0)); ?></h1>
		</div>
		<hr color="red" />
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<hr />
		<div id="footer">
			<?php echo $html->link(
					$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target'=>'_blank'), null, false
				);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</span>
</body>
</html>
