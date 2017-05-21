<h3> Inscription</h3>

<form method="post" action="traitement.php">
    <p> 
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="Nom" maxlength="20" placeholder="Dupont"/>
     </p>
         <p> 
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" maxlength="20" placeholder="Louis"/>
     </p> 
   <p> 
        <label for="photo">Photo:</label>
        <input type="img" name="Photo" id="photo" />
     </p>
  <p> 
        <label for="type">Type:</label>
        <select name="type" id="type" />
        <option value="truc">Truc</option>
        <option value="Machin">Machin</option></select>
     </p>
   <p> 
        <label for="non_utilisateur">non_utilisateur:</label>
        <input type="text" name="non_utilisateur" id="non_utilisateur" />
     </p>
   <p> 
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" id="mdp" />
     </p>
     <p> 
        <label for="adresse">Adresse:</label>
        <input type="number" name="numero" id="numero" maxlength="5" placeholder="13"/>
        <input type="texte" name="rue" id="rue" maxlength="40" placeholder="rue du pont"/>
     </p>

     <p> 
        <label for="ville">Ville:</label>
        <input type="text" name="ville" id="ville" maxlength="30" placeholder="Paris"/>
     </p>
     <p> 
        <label for="pays">Pays:</label>
        <input type="text" name="pays" id="pays" maxlength="30" placeholder="France"/>
     </p>
     <p> 
        <label for="offre">Offre:</label>
        <select name="offre" id="offre" />
        <option value="classique">clasique</option>
        <option value="prenium">Prenium</option></select>
     </p>
    <p> 
        <label for="role">Role:</label>
        <select name="Role" id="role" />
        <option value="Client">client</option>
        <option value="technicien">Technicien</option></select>
     </p>
     
     <!--<p> 
        <label for="date de naissance">Date de Naissance:</label>
        <input type="date" name="date de naissance" id="DDN" maxlength="30" />
     </p>-->
     <p> 
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" maxlength="30" placeholder="XXX@XXX.com"/>
     </p>
     <!--<p> 
        <label for="telephone">Telephone:</label>
        <input type="tel" name="nom" id="Nom" maxlength="20" placeholder="0123456789"/>
     </p>   -->   
</form>
<div>
