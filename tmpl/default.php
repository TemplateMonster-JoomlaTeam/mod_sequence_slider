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
 ?>


<div id="sequence<?php echo $module->id; ?>" class="sequence-slider<?php if ($params->get('thumbnails') != "false"): ?> sequence-thumbnails<?php endif; ?>" style="padding-bottom:<?php echo $params->get('height'); ?>">
<?php if($params->get('navigation') != "false") : ?>
<div class="sequence-prev"></div>
<div class="sequence-next"></div>
<?php endif; ?>
<?php if($params->get('playPause') != "false") : ?>
<div class="sequence-pause"></div>
<?php endif; ?>
<?php if($params->get('loader') != "false") : ?>
<div class="sequence-preloader">
	<svg class="preloading" xmlns="http://www.w3.org/2000/svg">
        <circle class="circle" cx="6" cy="6" r="6"></circle>
        <circle class="circle" cx="22" cy="6" r="6"></circle>
        <circle class="circle" cx="38" cy="6" r="6"></circle>
    </svg>
</div>
<?php endif; ?>
<?php if($params->get('pagination') != "false") : ?>
<div class="sequence-pagination-wrapper<?php if ($params->get('thumbnails') != "false"): ?> sequence-thumbnails<?php endif; ?>">
	<ul class="sequence-pagination sequence-pagination-<?php echo $module->id; ?><?php if ($params->get('thumbnails') != "false"): ?> sequence-thumbnails<?php endif; ?>">
	<?php 
	    $i=0;	
		foreach ($list as $item) :	?>
		<li>
		<?php if ($params->get('thumbnails') != "false"): ?>
			<img class="slide-thumb" src="<?php echo htmlspecialchars(json_decode($item->images)->image_intro); ?>" alt="">
		<?php endif; ?>
		</li>
		<?php
			$i++;
		endforeach;
	?>
	</ul>
</div>
<?php endif; ?>
<ul class="sequence-canvas">
<?php
	// Item URL
	if($params->get('item_url')){
		$itemURLs = explode(';', $params->get('item_url'));
	}	

	// Item width
	$item_width = floor(100 / count($list));


	$i=0;	
	foreach ($list as $item) :	?>
	<li>	
	<?php	require JModuleHelper::getLayoutPath('mod_sequence_slider', '_item'); ?>
	</li>
	<?php
		$i++;
	endforeach;
?>
    </ul>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		var options<?php echo $module->id; ?> = {
            autoPlay: <?php echo $params->get('autoPlay'); ?>,
            autoPlayDelay: <?php echo $params->get('autoPlayDelay'); ?>,
            // startingFrameID: <?php echo $params->get('startingFrameID'); ?>,
            nextButton:<?php echo $params->get('navigation'); ?>,
            prevButton:<?php echo $params->get('navigation'); ?>,
            pauseButton:<?php echo $params->get('playPause'); ?>,
            <?php if($params->get('pagination') != "false") : ?>
            pagination: '.sequence-pagination-<?php echo $module->id; ?>',
            <?php else : ?>
            pagination: false,
            <?php endif; ?>
			preloader: <?php echo $params->get('loader'); ?>,
			pauseOnHover:<?php echo $params->get('hover'); ?>,
			reverseAnimationsWhenNavigatingBackwards:false,
            fallback: {
                theme: "fade",
                speed: 500
            },
            swipeEvents: {
			    left: "next",
			    right: "prev",
			    up: false,
			    down: false
			}
        }
        var sequence = jQuery("#sequence<?php echo $module->id; ?>").sequence(options<?php echo $module->id; ?>).data("sequence");
    });
</script>
