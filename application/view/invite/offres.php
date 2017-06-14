	
<div classe="container">

        <div id="container-offre">
		<?php foreach ($offres as $offre) : ?>
            <form method="post" action="traitement.php" class="form-offre">
			<div class="offre">
		
                <h3><?php echo $offre->titre ?></h3>
				<?php echo $offre->detail ?>
				<p class="price"><?php echo $offre->prix ?> €</p>
				<input type="submit" value="SOUSCRIRE" />   
                </div>
			</form>
		<?php endforeach ?>
        </div>

</div>
