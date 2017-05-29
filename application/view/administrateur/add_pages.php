<div class="dashboard-content">
    <div class="form spacer-small">
        <form action="<?php echo URL; ?>administrateur/add_pages" method="post" enctype="multipart/form-data">
            <label for="nom">Nom</label><br>
            <input type="text" name="nom_page" placeholder="Nom du contenu"> <br>



            <input type="submit" value="Ajouter" name="create_name"><br><br>

        </form>
        <form action="<?php echo URL; ?>administrateur/add_pages" method="post" enctype="multipart/form-data">

            <select name="nom_contenu">
                <option disabled selected>Nom</option>
                <?php foreach ($pages as $page):?>
                    <option id="contenu_nom" value="<?php echo $page->id; ?>"><?php echo $page->nom; ?></option>
                <?php endforeach ?>

            </select>
            <input type="submit" id="bouton_supprimer" value="Supprimer" name="delete_name">
            <br><br/><br><br/>
            <?php foreach ($pages as $page): ?>

                <div style="display: none" id='<?php echo $page->id ?>'> <?php echo $page->contenu ?> </div>

            <?php endforeach ?>

            <div class="form-batch">

                <label for="title">Titre</label><br>
                <input type="text" name="titre" placeholder="Titre du contenu"> <br>




                <label for="contenu">Contenu</label><br><br>
                <textarea name="content" id="text_content">



            </textarea>
            </div>
            <div class="form-batch">
                <input type="submit" value="Sauvegarder" name="create_content">
            </div>
        </form>

    </div>

</div>