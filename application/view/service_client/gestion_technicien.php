<div class="dashboard-content">

	<div class="spacer-large"></div>    
    <h1>Gestion Technicien</h1>
    <div class="spacer-large"></div>

	<div class="Liste">
		<p>Liste des techniciens</p>
		<button name ="Supprimer" class="Supprimer_btn">Supprimer</button>
		<table class="table spacer-small">
			<form method="POST" action="<?php echo URL; ?>service_client/gestion_technicien" class="formulaire">
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
						<td><button name ="Voir" class="Voir_btn" value = "<?php echo $technicien->id ?>">Voir</button></td>	
					</tr>
				<?php endforeach ?>
			</tbody>
			</form>
		</table>

		<button name="Modifier_client_btn" class="Modifier_client_btn">Ajouter Technicien</button>
		
		<div style="display: none;" class="form_profil">
			<form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>service_client/gestion_technicien">    
		        <div class="form-batch">
		            <label for="post_tags">Nom</label><br>
		            <input type="text"  name="tech_nom" required>
		        </div>
		        
		        <div class="form-batch">
		            <label for="post_tags">Prenom</label><br>
		            <input type="text"  name="tech_prenom" required>
		        </div>
		        
		        <div class="form-batch">
		            <label for="post_tags">Telephone</label><br>
		            <input type="tel"  name="tech_tel" >
		        </div>
		        
		        <div class="form-batch">
		            <label for="author">localisation</label><br>
		            <input type="text"  name="tech_localisation" >
		        </div>

		        <div class="form-batch">
		            <input type="submit" value="Inscrire Technicien" name="create_tech" >
		        </div>
		    </form>	
		</div>

		
	</div>

</div>
