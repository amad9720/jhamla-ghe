<div class="dashboard-content">
	<div class="slider">
		<div classs="slides">
		<?php	        foreach ($n as $nouveaute) { ?>
			<div class="slide">
				<h2><?php echo $nouveaute->titre; ?></h2>
	            <?php echo $nouveaute->image;?>
			</div>
	            
	    <?php    } ?>
	  </div>
		<div class="slider-controls">
	    </div>
	</div>
</div>