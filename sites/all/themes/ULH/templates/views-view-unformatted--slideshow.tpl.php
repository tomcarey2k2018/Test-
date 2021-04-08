<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="row">
	<div class="blue_banner">
		<img src="<?= $GLOBALS['base_path'] ?>sites/default/files/blue_banner.png"/>
	</div>

	<div class="flexslider slideshow">
		<ul class="slides">
			<?php foreach ($rows as $id => $row){ ?>
			  <li<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
				<?php print $row; ?>
			  </li>
			<?php } ?>
		</ul>
	</div>
</div>


<script src="<?= $GLOBALS['base_path'] ?>sites/all/themes/ULH/js/jquery.flexslider-min.js"></script>
<script language="javascript">
    jQuery(window).load(function(){
      jQuery('.flexslider.slideshow').flexslider({
		slideshow: true,
		pauseOnHover: true,
		touch: true,
		animation: "slide",
		animationSpeed: 2000,
		slideshowSpeed: 7000,
		itemMargin: 0,
		startAt: 0,
        minItems: 2
      });
    });
</script>