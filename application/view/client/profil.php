<h3>Mon profil</h3>
<div class="infos">
	<p>Nom : <?php echo $nom ?></p>
	<p>Prénom :<?php echo $prenom ?></p>
	<p>Email : <?php echo $email ?></p>
	<p>Adresse : <?php echo $adresse ?></p>
	<p>Ville : <?php echo $ville ?></p>
	<p>Pays : <?php echo $pays ?></p>
</div>
<img src="photo.jpg" alt="Photo_Profil" height="100" width="100"> 
<input type="button" value="Masquer"/>
<div class="form_profil">
	<p>Modification du profil</p>
	<form method="post" action="traitement.php">
		<p> <label for="nom"> Nom: </label> <input type="text" name="nom" id="nom" maxlength="50" size="40" placeholder="Votre Nom" autofocus /> </p>
		<p> <label for="prenom"> Prénom: </label> <input type="text" name="prenom" id="prenom" maxlength="50" size="40" placeholder="Votre Prénom"  /> </p>
		<p> <label for="email"> Email: </label> <input type="text" name="email" id="email" maxlength="150" size="40" placeholder="Votre email"/> </p>
		<p> <label for="adresse"> Adresse: </label> <input type="text" name="adresse" id="adresse" maxlength="100" size="40" placeholder="Votre adresse"/> </p>
		<p> <label for="pays"> Pays: </label> <input type="text" name="pays" id="pays" maxlength="50" size="40" placeholder="Votre pays"  /> </p>
		<p> <label for="type"> Type: </label> <input type="text" name="type" id="type" maxlength="50" size="40" placeholder="Votre type"  /> </p>
		<p> <label for="pseudo"> Nom d'utilisateur: </label> <input type="text" name="nom_utilisateur" id="nom_utilisateur" maxlength="50" size="40" placeholder="Votre pseudo"/> </p>
		<p> <label for="mdp"> Mot de passe: </label> <input type="text" name="mdp" id="mdp" maxlength="50" size="40" placeholder="Votre mdp" autofocus /> </p>
		<p> <label for="photo"> Photo: </label> <input type="text" name="photo" id="photo" maxlength="200" size="40" placeholder="Votre mdp" autofocus /> </p>
	<input type="submit" value="Envoyer" />
	</form>
</div>

<div class="Suivi">
	<h3>Suivi des missions</h3>
	<p>Missions en cours</p>
	<table class="process_missions">
		<thead>
			<tr class="first">
				<th>Date</th>
				<th>Motif</th>
				<th>Technicien</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($process_missions as $process_mission): ?>
					<tr>
						<td><?php echo $process_mission->date_fin ?></td>
						<td><?php echo $process_mission->motif ?></td>
						<td><?php echo $process_mission->nom_technicien ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<p>Missions terminées</p>
	<table class="end_missions">
		<thead>
			<tr class="first">
				<th>Date</th>
				<th>Motif</th>
				<th>Technicien</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($end_missions as $end_mission): ?>
					<tr>
						<td><?php echo $end_mission->date_fin ?></td>
						<td><?php echo $end_mission->motif ?></td>
						<td><?php echo $end_mission->nom_technicien ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
 
<div class="Factures">
	<h3>Mes Factures</h3>
	<table class="factures">
		<thead>
			<tr class="first">
				<th>Date</th>
				<th>PDF</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($factures as $facture): ?>
					<tr>
						<td><?php echo $facture->date ?></td>
						<td><a href="<?php echo $facture->pdf?>" target=_blank><?php echo $facture->pdf?></a></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
