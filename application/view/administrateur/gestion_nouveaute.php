<div class="dashboard-content">
<?php	        foreach ($n as $nouveaute) {
            echo $nouveaute->titre;
            echo $nouveaute->image;
        }

        echo '<div class="slider">
  <div class="slides">
     <div class="slide one">
       <p>Test</p>
    </div>
    <div class="slide">
      <p>Test 2</p>
    </div>
    <div class="slide">
      <p>Test 3</p>
    </div>
  </div>
  <div class="slider-controls">
    
  </div>
</div>'; ?>
</div>