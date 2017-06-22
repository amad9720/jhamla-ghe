<div class="dashboard-content">
    
    <div class="spacer-large"></div>    
    <h1>Contact</h1>
    <div class="spacer-large"></div>

    <div class="contact_info large card">

        <h4 class="titre_contact"><?php echo $infos[0]->nom; ?></h4>

        <?php foreach ($infos as $info): ?>
            <?php echo $info->titre ?><br/>
            <?php echo $info->contenu ?><br/>
        <?php endforeach ?>
            
    </div>

    <div class="space-large"></div>

    <div class="contact_info large card">

        <h4 class="titre_contact">Formulaire de contact</h4>
        <form method="post" >

            <fieldset>
                <legend> Coordonnées</legend>
                <p><label for="nom"> Nom: </label> <input type="text" name="nom" id="nom" placeholder="Votre Nom" autofocus/></p>
                <p><label for="prénom"> Prénom: </label> <input type="text" name="prénom" id="prénom" placeholder="Votre Prénom"/></p>
            </fieldset>

            <p><label for="message"> Message: </label>
                </br><textarea type="text" name="message" id="message" placeholder="Votre message" required/> </textarea>
            </p>

            <input type="submit" value="Envoyer"/>


        </form>
    </div>

    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7366332335264!2d2.2789194684142564!3d48.825086291643075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6707980bd3947%3A0xd54fb6c5e1933333!2s10+Rue+de+Vanves%2C+92170+Issy-les-Moulineaux!5e0!3m2!1sfr!2sfr!4v1495186655453"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

</div>