<div class="container">
	<div class="Liste">
		<p>Liste des techniciens</p>
		<button name ="Supprimer" class="Supprimer_btn">Supprimer</button>
		<table class="table spacer-small">
			<thead>
				<tr class="first">
					<td><input type="checkbox" id="selectAllBoxes"></td>
					<th>Nom</th>
					<th>Prénom</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($techniciens as $technicien): ?> 
					<tr>
						<td><input type="checkbox" class="checkBoxes" value = "<?php echo $technicien->id ?>" name="checkBoxArray[]"></td>
						<td><?php echo $technicien->nom ?></td>
						<td><?php echo $technicien->prenom ?></td>		
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button name ="Profil" class="Profil_btn">Afficher Profil</button>
	<button name ="Modifier" class="Modifier_btn">Modifier Profil</button>
	<button name ="Add_mission" class="Add_mission_btn">Ajouter Mission</button>
	<button name ="End_mission" class="End_mission_btn">Fin Mission</button>

 	<div class="add_mission">
 		<form method="post" action="<?php echo URL; ?>invite/gestion_technicien">
 			<select name="nom_client">
 				<option selected disabled>Client</option>
 				<?php foreach ($clients as $client) ?>
 					<option value=<?php echo $client->id ?>><?php echo $client->nom ?><?php echo $client->prenom ?></option>
 				<?php endforeach ?>
 			</select><br/>
 			<input name ="date" id="date" type="date">
 			<p><label for="motif">Motif de la mission: </label><input type="text" name="motif" id="motif" maxlenght="300" size="40" placeholder="Motif"/></p>
 		<input type="submit" value="Envoyer">
 	</form>
 	</div>

 	<div class="profil">
 		<?php foreach ($techniciens_selected as $technicien_selected) ?>
 			<p>Nom : <?php echo $technicien_selected->nom ?></p>
 			<p>Prénom : <?php echo $technicien_selected->prenom ?></p>
 			<p>Lieu : <?php echo $technicien_selected->lieu ?></p>
 			<p>Téléphone : <?php echo $technicien_selected->telephone ?></p>
 			<p>Missions en cours: </p>
 			<table class="process_missions">
 				<thead>
 					<tr class="first">
 						<th>Date</th>
 						<th>Motif</th>
 						<th>Etat</th>
 						<th>Client</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach ($process_missions as $process_mission) ?>
 						<tr>
 							<td><?php echo $process_mission->date ?></td>
 							<td><?php echo $process_mission->motif ?></td>
 							<td><?php echo $process_mission->etat ?></td>
 							<td><?php echo $process_mission->client ?></td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>
 			</table>
 			<p>Historique des missions</p>
 			<table class="end_missions">
 				<thead>
 					<tr class="first">
 						<th>Date</th> 						
 						<th>Motif</th>
 						<th>Etat</th>
 						<th>Client</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach ($end_missions as $end_mission) ?>	
 						<tr>
 							<td><?php echo $end_mission->date_debut ?></td>
 							<td><?php echo $end_mission->motif ?></td>
 							<td><?php echo $end_mission->etat ?></td>
 							<td><?php echo $end_mission->client ?></td>
 						</tr>
 					<?php endforeach ?>
 				</tbody>
 			</table>
 		<?php endforeach ?>
 	</div>

 	<div class="modifier">
 		<p>Modification des informations</p>
 		<form method="post" action="<?php echo URL; ?>invite/gestion_techniciens">
	 		<p><label for="nom">Nom: </label><input type="text" name="nom" id="nom" maxlenght="50" size="40" placeholder="Votre nom"/></p>
	 		<p><label for="prenom">Prénom: </label><input type="text" name="prenom" id="prenom" maxlenght="50" size="40" placeholder="Votre prénom"/></p>
	 		<p><label for="motif">Téléphone: </label><input type="text" name="tel" id="tel" maxlenght="50" size="40" placeholder="Votre téléphone"/></p>
	 		<p><label for="motif">Lieu: </label><input type="text" name="lieu" id="lieu" maxlenght="50" size="40" placeholder="Votre lieu"/></p>
	 	</form>
	 </div>
</div>
