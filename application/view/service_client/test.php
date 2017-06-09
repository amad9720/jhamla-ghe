<body> <form class="form" method="post" action="<?php echo URL;?>invite/formulaire">

    <p>
        <label >Nom :</label>
        </br>
        <input type="text" name="nom" placeholder="nom du groupe"/>
    </p>

    <p>
        <label>Style de groupe :</label>
        </br>
        <select name="style_de_groupe">
            <option disabled selected>Style de groupe</option>
            <?php foreach ($styles as $style): ?>
                <option value=<?php echo $style->id; ?> ><?php echo $style->style; ?></option>
            <?php endforeach ?>
        </select><br/>
    </p>

    <p>
    <h1>Quelle requête ?</h1> </br>
    <p> <input type="radio" name="a" id="ajouter"/> <label for="ajouter">Ajouter le groupe à la base de données</label> </p>
    <p> <input type="radio" name="a" id="lister"/> <label for="lister">Lister les groupes appartenant au style sélectionné</label> </p>
    <p> <input type="radio" name="a id="afficher"/> <label for="afficher">Afficher, par date croissante, la liste des concerts du groupe indiqué (date, nom de la salle et nom de la ville)</label></p>
    </p>

    <input type="submit" name="submit" value="Envoyer" />
</form>
</body>
