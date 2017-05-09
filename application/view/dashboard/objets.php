<?php
	include('sidebar.php');
?>


<div class="dashboard-content">
	<h3>Gestion des objets</h3>
	<p class="spacer-small">Cette page vous permet d'ajouter / retirer / editer les objets connectés présent dans votre domicile</p>
	<h4 class="spacer-large">Ajouter un objet</h4>
	<form class="form spacer-small">
		<input type="text" placeholder="Nom objet"/><br/>
		<select>
			<option disabled selected>Type objet</option>
			<option>Thermomètre</option>
			<option>Capteur humidité</option>
			<option>Capteur de présence</option>
		</select><br/>
		<select>
			<option disabled selected>Pièce</option>
			<option>Salon</option>
			<option>Chambre 1</option>
			<option>Chambre 2</option>
		</select><br/>
		<input type="submit" name="">
	</form>
	<h4 class="spacer-large">Liste des objets</h4>
	<table class="table spacer-large">
		<tr class="first">
			<th>Nom</th>
			<th>Pièce</th>
			<th>Type</th>
			<th>Etat</th>
			<th>Données</th>
			<th>Editer</th>
			<th>Supprimer</th>
		</tr>
		<tr>
			<th>Temperature 1</th>
			<th>Salon</th>
			<th>1</th>
			<th>On</th>
			<th>22°</th>
			<th>X</th>
			<th>X</th>
		</tr>
		<tr>
			<th>Humidité 1</th>
			<th>Salon</th>
			<th>2</th>
			<th>On</th>
			<th>40%</th>
			<th>X</th>
			<th>X</th>
		</tr>	
		<tr>
			<th>Caméra</th>
			<th>Chambre 1</th>
			<th>1</th>
			<th>Off</th>
			<th>/</th>
			<th>X</th>
			<th>X</th>
		</tr>							
	</table>
</div>