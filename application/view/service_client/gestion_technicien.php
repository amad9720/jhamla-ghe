<div class="container">
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
		</table>
	</div>

</div>
