
<!DOCTYPE html>
<html>
<head>
    <style>

     .Contact_info{
         background-color: #bcbcbc;
         box-shadow: 5px 5px 5px black;
     }
        .capteur_panne{
            text-align: left;
            position: absolute;


        }

        .capteur_panne,.info_egghome{
            display: inline-block;
            margin-left: 22%;

        }

        .info_egghome,.capteur_panne p {
            font-size: medium;
            color: white;
        }


    </style>


</head>
<body>

<div class="Contact_info">

    <h2 class="titre_contact"> Contact </h2>
    </br>

        <div class="info_egghome">

           <p> <span class="titre_contact" >
                Informations sur Egghome
            </span>
        </br> </br> </br>

            01 57 43 90 87
            </br> </br> </br>

            contact.electronique@egghome.fr
           </p>

        </div>

    <div class="capteur_panne">

       <p> <span class="titre_contact" >
                Un capteur en panne ?
            </span>
        </br></br> </br>

        01 57 43 90 87
        </br></br> </br>

        contact.telecom@egghome.fr

       </p>




    </div>


</div>

<p>Formulaire de contact</p>


<form method="post" action="traitement.php">

    <fieldset>

        <legend> Coordonnées</legend>

        <p> <label for="nom"> Nom: </label> <input type="text" 		name="nom" id="nom" maxlength="50" size="40" 				 placeholder="Votre Nom" autofocus /> </p>

        <p> <label for="prénom"> Prénom: </label> <input type="text" 	 name="prénom" id="prénom" maxlength="50" size="40" 				placeholder="Votre Prénom" /> </p>

    </fieldset>

    <p> <label for="message"> Message: </label>
        </br><textarea rows="20" cols="70" type="text" name="message" id="message" placeholder="Votre message" required /> </textarea>
    </p>

    <input type="submit" value="Envoyer" />


</form>

<p>Texte à l'intérieur du formulaire</p>

</form>


<p>Texte après le formulaire</p>


</body>

</html>

