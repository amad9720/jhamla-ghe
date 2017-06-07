<div class="dashboard-content">
	<h3>Gestion des nouveautes</h3>
	<div class="spacer-small"></div>
	<p>Créer / modifier et supprimer les nouveautés</p>
	<div class="spacer-small"></div>
	<form enctype="multipart/form-data" class="form" action="" method="post">
		<input type="text" name="titre" placeholder="Titre nouveaute"><br>
		<textarea name="description" placeholder="description"></textarea><br>
		<select name="slider_id">
			<option value="0">Slider Client</option>
			<option value="1">Slider Invite</option>
		</select><br>
		<input type="file" name="image"><br>
		<input type="submit">
	</form>
	<div class="spacer-large"></div>
	<table class="table">
		<tr>
			<th>Titre</th>
			<th>Image</th>
			<th>Date</th>
			<th>Slider id</th>
		</tr>
		<pre>
		<?php
    	//print_r($nouveaute);
		?>
		<pre>
		<?php foreach ($n as $nouveaute) { 
			echo "<tr><td>".$nouveaute->titre."</td>";
			echo "<td>".$nouveaute->image."</td>";
			echo "<td>".$nouveaute->date."</td>";
			echo "<td>".$nouveaute->slider_id."</td></tr>";
		} ?>

	</table>
</div>