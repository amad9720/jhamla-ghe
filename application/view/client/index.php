<div class=" dashboard-content">
	<div class="slider">
    	<div class="slides">
    	  	<?php foreach ($n as $nouveaute) :?>
    					<div class="slide content-box" style="background-image: url('<?php echo URL . 'public/img/nouveautes/' . $nouveaute->image;  ?>');">
    						<h3><?php echo $nouveaute->titre; ?></h3>
    						<p><?php echo $nouveaute->description; ?></p>
    					</div>
    		<?php endforeach ?>
    	</div>
    	<div class="slider-controls">
    	</div>
	</div>		
	<div class="afterspace">
	<div class="spacer-large"></div> 	
	<h1>Mon Dashboard</h1>
	<div class="spacer-large"></div>

	<?php foreach ($capteurs as $capteur): ?>
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
    	<form method="POST" action="<?php echo URL; ?>client/" class="form spacer-small form_mamaison">
		<?php echo $array_holder[$capteur->id_type]; ?>
		</form>  
		<?php endforeach ?>
	</div>

    <div class="afterspace">
    <div class="spacer-large"></div>    
    <h1>Notifications</h1>
    <div class="spacer-large"></div>
        <table class="table spacer-small">
            <thead>
            <tr class="first">
                <th>Titre</th>
                <th>Contenu</th>
                
            </tr>
            </thead>
            <tbody>
            <?php foreach($notifications as $notification): ?>
            <tr>
                <td><?php echo $notification->titre ?></td>
                <td><?php echo $notification->contenu ?></td>
            </tr>
            <?php endforeach ?>
            </tbody>

        </table>
    </div>

</div>
