

<style>

    $color: #000;



    [class*="fontawesome-"]:before {
        font-family: 'FontAwesome', sans-serif;
    }


    * {
        box-sizing: border-box;

    &:before,
    &:after {
         box-sizing: border-box;
     }

    }



    input {
        background-image: none;
        border: none;
        font: 100%/1.5em "Varela Round", sans-serif;
        margin: 0;
        padding: 0;
        transition: all .3s;
    }

    .container {
        left: 50%;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -50%);
    }


    #login {
        width: 400px;
    }

    #login h2 {
        background: #34495e;
        border-radius: 20px 20px 0 0;
        color: #fff;
        font-size: 28px;
        padding: 20px 26px;
    }

    #login h2 span[class*="fontawesome-"] {
        margin-right: 14px;
    }

    #login fieldset {
        background: #fff;
        border-radius: 0 0 20px 20px;
        padding: 20px 26px;
    }

    #login fieldset p {
        color: #777;
        margin-bottom: 14px;
    }



    #login fieldset input {
        border-radius: 3px;
    }

    #login fieldset input[type="email"], #login fieldset input[type="password"] {
        background: #eee;
        color: #777;
        padding: 4px 10px;
        width: 100%;
    }

    #login fieldset input[type="submit"] {

        background: #33cc77;
        color: #fff;
        display: inline-block;
        text-align: center;
        margin: 0 auto;
        padding: 4px 0;
        width: 100px;
    }


    #login fieldset input[type="submit"]:hover {
        background: #28ad63;
    }
</style>



<div class="container">

    <div id="login">

        <h2><span class="fontawesome-lock"></span>Sign In</h2>

        <form action="<?php echo URL; ?>invite/connexion" method="POST">

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



