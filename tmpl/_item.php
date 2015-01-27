<?php
/**
 * Sequence Slider for Joomla! Module
 *
 * @author    TemplateMonster http://www.templatemonster.com
 * @copyright Copyright (C) 2012 - 2013 Jetimpex, Inc.
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 
 * Parts of this software are based on Sequence Slider: http://www.sequencejs.com/ & Articles Newsflash standard module
 * 
 */

defined('_JEXEC') or die;
$images = json_decode($item->images);

$itemUrl='';
if(!empty($itemURLs)){
	if(!empty($itemURLs[$i])) $itemUrl = $itemURLs[$i];
	$itemUrl = preg_replace('/\s+/', '', $itemUrl);
}
$link = '';
if($params->get('imageLink')=="itemsLinks"){
	$link = $item->link;
}
if(($params->get('imageLink')=="customLinks") && (!empty($itemUrl))){
	$link = $itemUrl;
}
$target = $params->get('target');
?>

<?php if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
<img class="slide-img"<?php if($params->get('imageLink')=="itemsLinks" || ($params->get('imageLink')=="customLinks") && (!empty($itemUrl))): ?> data-url="<?php echo $link; ?>" data-target="<?php echo $target; ?>"<?php endif; ?> src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="">
<?php if($params->get('imageLink')=="itemsLinks"): ?>
<a href="<?php echo $item->link; ?>">
<?php elseif(($params->get('imageLink')=="customLinks") && (!empty($itemUrl))): ?>
	<a href="<?php echo $itemUrl; ?>">
<?php endif; ?>
		<?php if($params->get('imageLink')=="itemsLinks" || ($params->get('imageLink')=="customLinks" && !empty($itemURL))): ?>
	</a>
<?php endif; ?>
<?php endif; ?>
<div class="info">

	<?php if ($params->get('show_caption') == '1'): ?>
		<div class="camera_caption <?php echo $params->get('captionEffect'); ?>">

			<?php $item_heading = $params->get('item_heading', 'h4'); ?>
			<?php if ($params->get('item_title')) : ?>
	
				<<?php echo $item_heading; ?> class="slide-title">
				<?php if ($params->get('link_titles') && $item->link != '') : ?>
					<a href="<?php echo $item->link;?>">
						<?php echo $item->title;?></a>
				<?php else : ?>
					<?php echo $item->title; ?>
				<?php endif; ?>
				</<?php echo $item_heading; ?>>
	
			<?php endif; ?>
	
			<?php if (!$params->get('intro_only')) :
				echo $item->afterDisplayTitle;
			endif; ?>
	
			<?php echo $item->beforeDisplayContent; ?>
	
			<?php if ($params->get('published')) : ?>
		<div class="item_published">
			<?php echo JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC1')); ?>
		</div>
	<?php endif; ?>
			<?php echo $item->introtext; ?>
	
		<!-- Read More link -->
		<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
			$readMoreText = JText::_('MOD_SEQUENCE_SLIDER_READMORE');
				if ($item->alternative_readmore){
					$readMoreText = $item->alternative_readmore;
				}
			echo '<a class="btn btn-info readmore" href="'.$item->link.'"><span>'. $readMoreText .'</span></a>';
		endif; ?>

		</div>
	<?php endif; ?>

</div>
