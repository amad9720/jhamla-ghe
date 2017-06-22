<div class="container">
    
    <div class="spacer-large"></div>    
    <h1>Connexion</h1>
    <div class="spacer-large"></div>

    <div id="login">

        <h2>Sign In</h2>

        <form action="<?php echo URL; ?>invite/connexion" method="POST" class="login-form">
            <fieldset>

                <p><label for="email">Adresse E-mail</label></p>
                <p><input type="email" name="user_email" id="email" placeholder="adresse e-mail"></p>

                <p><label for="password">Mot de passe</label></p>
                <p><input type="password" name="user_password" id="password" placeholder="mot de passe"></p>

                <p><input id="gauche" name="submit" type="submit" value="Se connecter"></p>


            </fieldset>

        </form>

    </div>

</div>



