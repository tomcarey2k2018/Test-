<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<span class="view_all"><a href="<?= $GLOBALS['base_path'] ?>events">View all events</a></span>
<div class="below_tab">&nbsp;</div>

<div class="flexslider events">
	<ul class="slides">
		<?php foreach ($rows as $id => $row){ ?>
		  <li<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
			<?php print $row; ?>
		  </li>
		<?php } ?>
	</ul>
</div>


<script src="<?= $GLOBALS['base_path'] ?>sites/all/themes/ULH/js/jquery.flexslider-min.js"></script>
<script language="javascript">
    jQuery(window).load(function(){
      jQuery('.flexslider.events').flexslider({
		slideshow: true,
		pauseOnHover: true,
		direction: "vertical",
		animation: "slide",
		animationSpeed: 1000,
		slideshowSpeed: 4000,
		maxItems: 2,
		startAt: 0,
        minItems: 2
      });
    });
</script>