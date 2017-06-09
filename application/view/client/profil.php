<div class="dashboard-content">
<h3>Mon profil</h3>
<div class="infos">
	<p>Nom : <?php echo $client->nom ?></p>
	<p>Prénom :<?php echo $client->prenom ?></p>
	<p>Email : <?php echo $client->email ?></p>
	<p>Adresse : <?php echo $client->adresse ?></p>
	<p>Ville : <?php echo $client->ville ?></p>
	<p>Pays : <?php echo $client->pays ?></p>
</div>
<img src="<?php echo $client->photo ?>" alt="Photo_Profil" height="100" width="100"> 
<button name ="Mission_client_btn" class="Mission_client_btn">Suivi des missions</button>
<button name="Modifier_client_btn" class="Modifier_client_btn">Modifier profil</button>
<button name="Facture_btn" class="Facture_btn">Factures</button>
<div class="form_profil">
	<p>Modification du profil</p>
	<form method="post" action="<?php echo URL; ?>client/profil">
		<p> <label for="nom"> Nom: </label> <input type="text" name="nom" id="nom" maxlength="50" size="40" placeholder="Votre Nom" autofocus /> </p>
		<p> <label for="prenom"> Prénom: </label> <input type="text" name="prenom" id="prenom" maxlength="50" size="40" placeholder="Votre Prénom"  /> </p>
		<p> <label for="email"> Email: </label> <input type="text" name="email" id="email" maxlength="150" size="40" placeholder="Votre email"/> </p>
		<p> <label for="adresse"> Adresse: </label> <input type="text" name="adresse" id="adresse" maxlength="100" size="40" placeholder="Votre adresse"/> </p>
		<p> <label for="ville"> Pays: </label> <input type="text" name="ville" id="ville" maxlength="50" size="40" placeholder="Votre ville"  /> </p>
		<p> <label for="pays"> Type: </label> <input type="text" name="pays" id="pays" maxlength="50" size="40" placeholder="Votre pays"  /> </p>
		<p> <label for="pseudo"> Nom d'utilisateur: </label> <input type="text" name="nom_utilisateur" id="nom_utilisateur" maxlength="50" size="40" placeholder="Votre pseudo"/> </p>
		<p> <label for="mdp"> Mot de passe: </label> <input type="text" name="mdp" id="mdp" maxlength="50" size="40" placeholder="Votre mdp" autofocus /> </p>
		<p> <label for="photo"> Photo: </label> <input type="text" name="photo" id="photo" maxlength="200" size="40" placeholder="Votre photo" autofocus /> </p>
	<input type="submit" name="modif_profil" value="Envoyer" />
	</form>
</div>

<div class="Suivi">
	</br><h3>Suivi des missions</h3>
	</br><p>Missions en cours</p>
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
						<td><?php echo $process_mission->date ?></td>
						<td><?php echo $process_mission->motif ?></td>
						<td><?php echo $process_mission->nom ?><?php echo " " ?><?php echo $process_mission->prenom ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</br></br><p>Missions terminées</p>
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
						<td><?php echo $end_mission->date ?></td>
						<td><?php echo $end_mission->motif ?></td>
						<td><?php echo $end_mission->nom ?><?php echo " " ?><?php echo $end_mission->prenom ?></td>
					</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
</br></br> 
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
</div>
