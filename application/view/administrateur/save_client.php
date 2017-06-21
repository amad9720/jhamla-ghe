<div class="dashboard-content">
    <div class="spacer-large">
        <h1>Enregistrement d'un client</h1>
    </div>
	<div class="form spacer-small">
	<form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>administrateur/save_client">
        
        <div class="form-batch">
            <label for="post_tags">Nom</label><br>
            <input type="text"  name="user_nom" required>
        </div>
        
        <div class="form-batch">
            <label for="post_tags">Prenom</label><br>
            <input type="text"  name="user_prenom" required>
        </div>
        
        <div class="form-batch">
            <label for="post_tags">Email</label><br>
            <input type="email"  name="user_email" required>
        </div>
        
        <div class="form-batch">
            <label for="author">Adresse</label><br>
            <input type="text"  name="user_address" required>
        </div>

        <div class="form-batch">
            <label for="post_tags">Ville</label><br>
            <input type="text"  name="user_ville" required>
        </div>
        
        <div class="form-batch">
            <label for="post_tags">Pays</label><br>
            <input type="text"  name="user_pays" required>
        </div>

        <div class="form-batch">
            <label for="post_image">Photo</label><br>
            <input type="file" name="user_image">
        </div>
        
        <div class="form-batch">
            <label for="author">Nom d'utilisateur</label><br>
            <input type="text"  name="user_username" required>
        </div>
        
        <div class="form-batch">
            <label for="post_status">Mot de Passe</label><br>
            <input type="password"   name="user_password" required>
        </div>
        
        <div class="form-batch">
            <select name="user_role">
				<option disabled selected>Role</option>
				<?php foreach ($roles as $role): ?>
				<option value=<?php echo $role->id; ?> ><?php echo $role->role; ?></option>	
				<?php endforeach ?>
			</select><br/>
        </div>

        <div class="form-batch">
            <select name="user_offre">
				<option disabled selected>Offre</option>
				<?php foreach ($offres as $offre): ?>
				<option value=<?php echo $offre->id; ?> ><?php echo $offre->titre; ?></option>	
				<?php endforeach ?>
			</select><br/>
        </div>

        <div class="form-batch">
            <input type="submit" value="Ajouter" name="create_user" >
        </div>
    </form>	
	</div>
</div>