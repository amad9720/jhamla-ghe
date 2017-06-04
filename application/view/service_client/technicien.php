<div class="container">	
	<button name ="Modifier" class="Modifier_btn">Modifier Profil</button>
	<button name ="Add_mission" class="Add_mission_btn">Ajouter Mission</button></br></br>

 	
 	<div class="profil">
 			<p>Nom : <?php echo $technicien_selected->nom ?></p>
 			<p>Prénom : <?php echo $technicien_selected->prenom ?></p>
 			<p>Lieu : <?php echo $technicien_selected->localisation ?></p>
 			<p>Téléphone : <?php echo $technicien_selected->telephone ?></p><br/></br>
 			<h2>Missions en cours</h2></br>
 			<table class="process_missions">
 				<thead>
 					<tr class="first">
 						<td><input type="checkbox" id="selectAllBoxes"></td>
 						<th>Date</th>
 						<th>Motif</th>
 						<th>Client</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach ($process_missions as $process_mission): ?>
 						<tr>
 							<td><input type="checkbox" class="checkBoxes" value = "<?php echo $process_mission->id ?>" name="small_checkBoxArray[]"></td>
 							<td><?php echo $process_mission->date_debut ?></td>
 							<td><?php echo $process_mission->motif ?></td>
 							<?php  $id_utili = $process_mission->id_client;
 							$utili = Utilisateur::find_by_id($id_utili); ?>

 							<td><?php echo $utili->nom; ?><p> </p><?php echo $utili->prenom ?></td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>
 			</table>
 			<button name ="End_mission" class="End_mission_btn">Fin Mission</button>
 			</br></br>
 			<h2>Historique des missions</h2></br>
 			<table class="end_missions">
 				<thead>
 					<tr class="first">
 						<td><input type="checkbox" id="selectAllBoxes"></td>
 						<th>Date</th> 						
 						<th>Motif</th>
 						<th>Client</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach ($end_missions as $end_mission): ?>	
 						<tr>
 							<td><input type="checkbox" class="checkBoxes" value = "<?php echo $mission->id ?>" name="small_checkBoxArray[]"></td>
 							<td><?php echo $end_mission->date_debut ?></td>
 							<td><?php echo $end_mission->motif ?></td>
 							<?php  $id_utili = $process_mission->id_client;
 							$utili = Utilisateur::find_by_id($id_utili); ?>

 							<td><?php echo $utili->nom; ?><p> </p><?php echo $utili->prenom ?></td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>
 			</table>

 	</div>
 	</br>
	</br>

 	<div class="modifier" style="display: none;">
 		<h1>Modification des informations</h1>
 		<form method="post" action="<?php echo URL; ?>service_client/gestion_technicien">
	 		<p><label for="nom">Nom: </label><input type="text" name="nom" id="nom" maxlenght="50" size="40" placeholder="Votre nom"/></p>
	 		<p><label for="prenom">Prénom: </label><input type="text" name="prenom" id="prenom" maxlenght="50" size="40" placeholder="Votre prénom"/></p>
	 		<p><label for="tel">Téléphone: </label><input type="text" name="tel" id="tel" maxlenght="50" size="40" placeholder="Votre téléphone"/></p>
	 		<p><label for="lieu">Lieu: </label><input type="text" name="lieu" id="lieu" maxlenght="50" size="40" placeholder="Votre lieu"/></p>
	 		<input type="submit" name="modifier_profil" value="Envoyer">
	 	</form>
	 </div>

	</br>
	</br>
	 <div class="add_mission" style="display: none;">
	 	<h1>Ajouter une nouvelle mission</h1></br>
 		<form method="post" action="<?php echo URL; ?>service_client/gestion_technicien">
 			<select name="id_client">
 				<option selected disabled>Client</option>
 				<?php foreach ($clients as $client): ?>
 					<option value=<?php echo $client->id; ?> ><?php echo $client->nom; ?><p> </p><?php echo $client->prenom; ?></option>
 				<?php endforeach ?>
 			</select><br/>
 			<input name ="date" id="date" type="date">
 			<p><label for="motif">Motif de la mission: </label><input type="text" name="motif" id="motif" maxlenght="300" size="40" placeholder="Motif"/></p>
 			<input type="submit" name="add_mission" value="Envoyer">
 		</form>
 	</div>
</div>

	