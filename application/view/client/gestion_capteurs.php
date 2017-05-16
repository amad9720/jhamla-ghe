<div class="dashboard-content">
	<h3>Gestion des capteurs</h3>
	<p class="spacer-small">Cette page vous permet d'ajouter / retirer / editer les capteurs connectés présent dans votre domicile</p>
	

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

	<h4 class="spacer-large">Liste des capteurs</h4>
	<div class="spacer-small"></div>
	<button name="addCapteur" class="addCapteur_btn">Ajouter Capteur</button>
	<table class="table spacer-small">

		<!-- <div class="" id="bulkOptionContainer">
            <select class="" name="bulk_options" id="">
            	<option disabled selected>Action</option>
                <option value="deleted">Delete</option>
            </select>
        </div> -->
		<thead>
		<tr class="first">
			<td><input type="checkbox" id="selectAllBoxes"></td>
			<th>Type</th>
			<th>Pièce</th>
			<th>Etat</th>
			<th>Donnée</th>
		</tr>
		</thead>

		<form class="form" method="POST" action="<?php echo URL; ?>client/gestion_capteurs">
			<tbody>
			<?php foreach ($capteurs as $capteur): ?>
			<tr>
				<td><input type="checkbox" class="checkBoxes" value='<?php echo $capteur->id ?>' name='checkBoxArray[]'>
				<td><?php echo $capteur->type ?></td>
				<td><?php echo $capteur->piece ?></td>
				<td><?php echo $capteur->etat ?></td>
				<td><?php echo $capteur->valeur ?></td>
			</tr>
			<?php endforeach ?>
			</tbody>
				
			<input type="submit" name="deleteCapteur" id="submitgestioncapteur" >
		</form>

	</table>

</div>