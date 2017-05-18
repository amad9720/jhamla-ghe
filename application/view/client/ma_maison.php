<div class="dashboard-content">
	<h3>Gestion de ma Maison</h3>
	<div class="spacer-small"></div>
	<p>Cette page vous permet de gérer votre domicile</p>
	<div class="spacer-large"></div>
	<?php foreach ($pieces_client as $piece): ?>
		<h3><?php echo $piece->nom ?></h3>
		<?php $capteurs_piece = Capteur::get_room_capteurs($piece->id); ?>
		<?php foreach ($capteurs_piece as $capteur): ?>
			<form method="" action=""></form>
			<?php $array_holder = array(

                1 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} °</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" , 

                2 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} Prt</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                3 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} CO<sub>2</sub></p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                4 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} Watt</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                5 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur}</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                6 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur}</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                7 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} %</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" ,

                8 => "<div class=\"medium card\">
                            <h5>{$capteur->type}</h5>
                            <div class=\"spacer-small\"></div>
                            <div class=\"card-content\">
                                <p class=\"card-main-info\">{$capteur->valeur} Tox</p>
                                <p class=\"card-main-info green-text\" data-idCapteur=\"{$capteur->id}\" >{$array_etat[$capteur->etat]}</p>
                                <p class=\"card-bottom-text\">{$capteur->date}, France</p>
                            </div>
                        </div>" 
        		); 
        	?>
        	<?php echo $array_holder[$capteur->id_type]; ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>
