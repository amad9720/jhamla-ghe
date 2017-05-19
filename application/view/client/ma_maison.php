<div class="dashboard-content">
	<h3>Gestion de ma Maison</h3>
	<div class="spacer-small"></div>
	<p>Cette page vous permet de gérer votre domicile</p>
	<div class="spacer-large"></div>
	<?php foreach ($pieces_client as $piece): ?>
		<form method="POST" action="<?php echo URL; ?>client/ma_maison" class="form spacer-small">
			<button type="submit" name="delete_room" value="<?php echo $piece->id ?>">Delete</button>
		</form>
		<h3 class="piece_name"><?php echo $piece->nom ?></h3>
		<?php $capteurs_piece = Capteur::get_room_capteurs($piece->id); ?>
		<?php foreach ($capteurs_piece as $capteur): ?>
			<?php $array_holder = array(

                1 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} °</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" , 

                2 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} Prt</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                3 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} CO2</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                4 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} Watt</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                5 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur}</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                6 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur}</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                7 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} %</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" ,

                8 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\" id=\"card_{$capteur->id}\">
                                <p class=\"card-main-info\">{$capteur->valeur} Tox</p>
                                <p class=\"card-main-info green-text\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                            <button type=\"submit\" name=\"off\" value=\"{$capteur->id}\" >Eteindre </button>
                            <button type=\"submit\" name=\"on\" value=\"{$capteur->id}\" >Allumer </button>
                        </div>" 
        		); 
        	?>
       		<form method="POST" action="<?php echo URL; ?>client/ma_maison" class="form spacer-small card_holder form_mamaison">
    		<?php echo $array_holder[$capteur->id_type]; ?>
    		</form>
     
		<?php endforeach ?>
	<?php endforeach ?>
</div>
