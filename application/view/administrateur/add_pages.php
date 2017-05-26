<div class="dashboard-content">
	<div class="form spacer-small">
	<form action="<?php echo URL; ?>administrateur/add_pages" method="post" enctype="multipart/form-data" >

            <select name="nom_contenu">
                <option disabled selected>Nom</option>
                <?php foreach ($pages as $page):?>
                    <option name="contenu_nom" value=<?php echo $page->id; ?> ><?php echo $page->nom; ?></option>
                <?php endforeach ?>

            </select><br/>
        </form>

        <div class="form-batch">
            <label for="title">Contenu</label><br><br>
            <textarea name="content" ></textarea>
        </div>                 
        <div class="form-batch">
            <input type="submit" value="Ajouter" name="create_content" >
        </div>
    </form>	
	</div>
</div>