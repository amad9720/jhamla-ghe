
<div classe="container">

        <div id="block">
            <form method="post" action="traitement.php" >
			<div class="offre">
		
                <h4>offre classique </h4>
				<p>cette offre vous permet: </br>
				-5 pieces </br>
				-10 capteurs </br></p>
				    <input type="submit" value="souscrir" />   
                </div>
			</form>
			<form method="post" action="traitement.php" >
            <div class="offre">
				<p>cette offre vous permet: </br>
				-10 pieces </br>
				-25 capteurs </br></p> 
                <h4>offre medium </h4>
				    <input type="submit" value="souscrir" />   
                </div>
			</form method="post" action="traitement.php">
			<form>
            <div class="offre"><h4>offre prenium </h4>
				<p>cette offre vous permet: </br>
				- pieces ilimitées </br>
				-capteurs illimités </br></p>
			    <input type="submit" value="souscrir" />   
                </div>
			</form>
        </div>

</div>

<div class="offre"></div>
	<!--<?php foreach ($offres as $offre); ?>-->
	<?php $offres= offre::get_offres($offre->id); ?>