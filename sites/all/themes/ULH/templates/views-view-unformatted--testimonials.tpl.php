<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="row heading">
	<h2> Postgraduate Testimonials </h2>
	<div class="buttons">
		<div class="button previous"> &nbsp; </div>
		<div class="button next"> &nbsp; </div>
	</div>
</div>

<div class="row body">
	<?php 
		$i = 0;
		foreach ($rows as $id => $row){ 
			$i++; ?>
			<div class="testimonial_wrapper" testimonial_nr="<?= $i ?>">
				<div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
					<?php print $row; ?>
				</div>
			</div>
		<?php } 
	?>
</div>

<script language="javascript">
	amount = <?= $i ?>;
	if(amount>1){
		for(i=2; i<=amount; i++)
			jQuery(".testimonial_wrapper[testimonial_nr='"+ i +"']").hide();
		var current_testimonial = 1;
		jQuery(".next").click(function(){
			if(current_testimonial == amount)
				current_testimonial = 1
			else
				current_testimonial++;
			jQuery(".testimonial_wrapper[testimonial_nr='"+ current_testimonial +"']").show();
			jQuery(".testimonial_wrapper[testimonial_nr='"+ current_testimonial +"']").siblings(".testimonial_wrapper").hide();
		});
		jQuery(".previous").click(function(){
			if(current_testimonial == 1)
				current_testimonial = amount;
			else
				current_testimonial--;
			jQuery(".testimonial_wrapper[testimonial_nr='"+ current_testimonial +"']").show();
			jQuery(".testimonial_wrapper[testimonial_nr='"+ current_testimonial +"']").siblings(".testimonial_wrapper").hide();
		});
	}
	else
		jQuery(".row.heading .buttons").hide();
</script>