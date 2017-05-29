
<div classe="container">

        <div id="block">
		<?php foreach ($offres as $offre) : ?>
            <form method="post" action="traitement.php" >
			<div class="offre">
		
                <h4><?php echo $offre->titre ?></h4>
				<p><?php echo $offre->detail ?></p></br>
				<p><?php echo $offre->prix ?> €</p></br>
	
				<input type="submit" value="souscrir" />   
                </div>
			</form>
		<?php endforeach ?>
        </div>

</div>
