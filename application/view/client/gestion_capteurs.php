<div class="dashboard-content">
	
	<div class="spacer-large"></div>    
    <h1>Gestion Capteurs</h1>
    <div class="spacer-large"></div>

	<p class="spacer-small">Cette page vous permet d'ajouter / retirer / editer les capteurs connectés présent dans votre domicile</p>
	
	<!-- Div for Adding a new capteurs -->
	<div class="addCapteur" style="display: none;">

		<h4 class="spacer-large">Ajouter un capteur</h4>

		<form method="POST" action="<?php echo URL; ?>client/gestion_capteurs" class="form spacer-small">

			<select name="type_capteur">
				<option disabled selected>Type capteur</option>
				<?php foreach ($type_capteurs as $type_capteur): ?>
				<option value=<?php echo $type_capteur->id; ?> ><?php echo $type_capteur->type; ?></option>
				<?php endforeach ?>
			</select><br/>

			<select name="piece">
				<option disabled selected>Pièce</option>
				<?php foreach ($pieces as $piece): ?>
				<option value=<?php echo $piece->id; ?> ><?php echo $piece->nom; ?></option>
				<?php endforeach ?>
			</select><br/>

			<input type="text" name="donnee" placeholder="Donnee">
			<br/>
			<input type="submit" name="addCapteur">

		</form>
	</div>

	<!-- Div for param the capteurs (changing room for exemple) -->
	<div class="paramCapteur" style="display: none;">

		<h4 class="spacer-large">Parametrer un capteur</h4>

		<div class="textHolder" ></div>
		
		<form method="POST" action="<?php echo URL; ?>client/gestion_capteurs" class="form spacer-small">
			<div id="arrayCheckbox" style="display: none" ></div>
			<label>Changer de Piece</label>
			<select name="piece">
				<option disabled selected>Pièce</option>
				<?php foreach ($pieces as $piece): ?>
				<option value=<?php echo $piece->id; ?> ><?php echo $piece->nom; ?></option>	
				<?php endforeach ?>
			</select><br/>

			<br/>
			<input type="submit" name="paramCapteur" >

		</form>
	</div>

	<h4 class="spacer-large">Liste des capteurs</h4>
	<div class="spacer-small"></div>
	<button name="addCapteur" class="addCapteur_btn">Ajouter</button>
	<button name="paramCapteur" class="paramCapteur_btn">Parametrer</button>
	<table class="table spacer-small">

		<thead>
		<tr class="first">
			<td><input type="checkbox" id="selectAllBoxes"></td>
			<th>Type</th>
			<th>Pièce</th>
			<th>Etat</th>
			<th>Donnée</th>
			<th>Status</th>

		</tr>
		</thead>

		<form class="form" method="POST" action="<?php echo URL; ?>client/gestion_capteurs">
			<tbody>
			<?php foreach ($capteurs as $capteur): ?>
			<tr>
				<td><input type="checkbox" class="checkBoxes" value='<?php echo $capteur->id ?>' name='checkBoxArray[]'>
				<td id="type"><?php echo $capteur->type ?></td>
				<td id="piece"><?php echo $capteur->piece ?></td>
				<td><?php echo $capteur->etat ?></td>
				<td><?php echo $capteur->valeur ?></td>
				<td>
					<?php if ($capteur->favoris == 1): ?>
						<?php echo "Favoris" ?>
					<?php else: ?>
						<?php echo "Non Favoris" ?>
					<?php endif ?>
				</td>
			</tr>
			<?php endforeach ?>
			</tbody>
				
			<input type="submit" name="deleteCapteur" id="submitgestioncapteur" value="Supprimer" >
			<input type="submit" name="favorisCapteur" id="submitgestioncapteur" value="Changer status" >
		</form>

	</table>

</div>