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
		<select name="piece">
			<option disabled selected>Pièce</option>
			<?php foreach ($pieces as $piece): ?>
			<option value=<?php echo $piece->nom; ?> ><?php echo $piece->nom; ?></option>	
			<?php endforeach ?>
		</select><br/>
		<input type="submit" name="">
	</form>
	<h4 class="spacer-large">Liste des capteurs</h4>
	<table class="table spacer-large">
		<thead>
		<tr class="first">
			<th>Type</th>
			<th>Pièce</th>
			<th>Etat</th>
			<th>Données</th>
			<th>Editer</th>
			<th>Supprimer</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach ($capteurs as $capteur): ?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<?php endforeach ?>
		</tbody>							
	</table>
</div>