<div class="full-image-wrapper index-img ">
	<div class="container">
		<h1 class="public-index-title">Nos offres</h1>
		<p class="public-index-sub-title">Découvrez l'ensemble de nos offres.</p>
	</div>
	</div>
		<div class="spacer-large">	</div>
        <div id="container-offre">
		<?php foreach ($offres as $offre) : ?>
            <form method="post" action="<?php echo URL; ?>/invite/inscription" class="form-offre">
			<div class="offre">
		
                <h3><?php echo $offre->titre ?></h3>
				<?php echo $offre->detail ?>
				<p class="price"><?php echo $offre->prix ?> €</p><p class="month">/mois</p>
				<button><a href="<?php echo URL; ?>invite/inscription">SOUSCRIRE</a></button>   
                </div>
			</form>
		<?php endforeach ?>
        </div>

</div>
