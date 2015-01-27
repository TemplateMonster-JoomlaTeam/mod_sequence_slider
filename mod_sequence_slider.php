<?php
/**
 * Camera Slideshow for Joomla! Module
 *
 * @author    TemplateMonster http://www.templatemonster.com
 * @copyright Copyright (C) 2012 - 2013 Jetimpex, Inc.
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 
 * Parts of this software are based on Camera Slideshow By Manuel Masia: http://www.pixedelic.com/plugins/camera/ & Articles Newsflash standard module
 * 
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$app 	  = JFactory::getApplication();	
$doc = JFactory::getDocument();
$document =& $doc;
$template = $app->getTemplate();

// Include Camera Slideshow styles
switch($params->get('theme')){
	case 0:
		$document->addStyleSheet(JURI::base() . 'modules/mod_sequence_slider/css/sequence.css');
		break;
	case 1:
		$document->addStyleSheet(JURI::base() . 'templates/'.$template.'/css/sequence.css');
		break;
}

// Include Camera Slideshow scripts
switch($params->get('script')){
	case 0:
		$document->addScript(JURI::base() . 'modules/mod_sequence_slider/js/jquery.sequence-min.js');
		break;
	case 1:
		$document->addScript(JURI::base() . 'modules/mod_sequence_slider/js/jquery.sequence.js');
		break;	
	case 2:
		$document->addScript(JURI::base() . 'templates/'.$template.'/js/camera.js');
		break;
}

$list = modSequenceSliderHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Color Skin

if($params->get('skin') == 'default'){
	$skin = '';
} else {
	$skin = 'camera_'.$params->get('skin').'_skin';
}

require JModuleHelper::getLayoutPath('mod_sequence_slider', $params->get('layout', 'default'));
