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
						<td><a href="<?php echo URL ?>service_client/technicien?id_technicien=<?php echo $technicien->id ?>">Voir</a></td>		
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

</div>
