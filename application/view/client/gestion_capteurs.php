<div class="dashboard-content">
	<h3>Gestion des capteurs</h3>
	<p class="spacer-small">Cette page vous permet d'ajouter / retirer / editer les capteurs connectés présent dans votre domicile</p>
	<h4 class="spacer-large">Ajouter un capteur</h4>
	<form class="form spacer-small">
		<input type="text" placeholder="Nom capteur"/><br/>
		<select name="type_capteurs">
			<option disabled selected>Type capteur</option>
			<?php foreach ($type_capteurs as $capteur): ?>
			<option value=<?php echo $capteur->type; ?> ><?php echo $capteur->type; ?></option>	
			<?php endforeach ?>
		</select><br/>
		<select>
			<option disabled selected>Pièce</option>
			<?php foreach ($type_capteurs as $capteur): ?>
			<option value=<?php echo $capteur->type; ?> ><?php echo $capteur->type; ?></option>	
			<?php endforeach ?>
		</select><br/>
		<input type="submit" name="">
	</form>
	<h4 class="spacer-large">Liste des capteurs</h4>
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