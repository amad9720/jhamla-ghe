<!--<div class="dashboard-content">
<h3>Gestion de ma Maison</h3>
<div class="spacer-small"></div>
<p>Cette page vous permet de gérer votre domicile</p>
<div class="spacer-large"></div>
<h3>Le salon</h3>
<div class="spacer-small"></div>
<div class="medium card">
	<h5>Temperature</h5>
	<div class="spacer-small"></div>
	<div class="card-content">
		<p class="card-main-info">20°</p>
		<p class="card-bottom-text">11:21 AM - Lille, France</p>
	</div>
	</div>
<div class="medium card">
	<h5>Humidité</h5>
	<div class="spacer-small"></div>
	<div class="card-content">
		<p class="card-main-info">60%</p>
		<p class="card-bottom-text">11:21 AM - Lille, France</p>
	</div>
	</div>
<div class="medium card">
	<h5>Consomation</h5>
	<div class="spacer-small"></div>
	<div class="card-content">
		<p class="card-main-info">12kW/h</p>
		<p class="card-bottom-text">11:21 AM - Lille, France</p>
	</div>
	</div>
<div class="medium card">
	<h5>Lampe</h5>
	<div class="spacer-small"></div>
	<div class="card-content">
		<p class="card-main-info green-text">ON</p>
		<p class="card-bottom-text">11:21 AM - Lille, France</p>
	</div>
	</div>
<div class="medium card">
	<h5>Lampe</h5>
	<div class="spacer-small"></div>
	<div class="card-content">
		<p class="card-main-info green-text">ON</p>
		<p class="card-bottom-text">11:21 AM - Lille, France</p>
	</div>
	</div>
</div>
</div>
</div>-->

<?php include("../_templates/head.php") ?>

<body>

<?php include("../_templates/header.php") ?>

<?php include("includes/sidebar.php") ?>

//Mnt que la BDD est remplie, je compte faire une boucle php pour afficher les pièces et capteurs de la BDD. Voilà voilà :)
<section>
    <h1> Salon </h1>

    <div class="conteneur">
        <aside >
            <h2> Présence </h2>
            <figure>
                <img src ="../img/MaMaison/presence.png" alt="présence"/>
                <figcaption>
                    <p class = "v "> YES </p> <br>
                    <p class = "x" > NO </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Luminosité </h2>
            <figure>
                <img src ="../img/MaMaison/luminosite.png" alt="luminosité"/>
                <figcaption> 70 % </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Caméra </h2>
            <figure>
                <img src ="../img/MaMaison/camera.png" alt="caméra"/>
                <figcaption>
                    <p class = "v"> ON </p> <br>
                    <p class = "x"> OFF </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Volet </h2>
            <figure>
                <img src ="../img/MaMaison/volet.png" alt="volet"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class = "x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Température </h2>
            <figure>
                <img src ="../img/MaMaison/temperature.png" alt="température"/>
                <figcaption> 15°C </figcaption>
        </aside>

        <aside>
            <h2> Pollution </h2>
            <figure>
                <img src ="../img/MaMaison/pollution.png" alt="pollution"/>
                <figcaption> 70% </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Lumière </h2>
            <figure>
                <img src ="../img/MaMaison/lumiere.png" alt="lumière"/>
                <figcaption>
                    <p class = "v"> ON </p> <br>
                    <p class = "x"> OFF </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Porte </h2>
            <figure>
                <img src ="../img/MaMaison/porte.png" alt="porte"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class = "x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>
    </div>

</section>

<section>
    <h1> Chambre </h1>

    <div class ="conteneur">
        <aside>
            <h2> Température </h2>
            <figure>
                <img src ="../img/MaMaison/temperature.png" alt="température"/>
                <figcaption> 20°C </figcaption>
        </aside>

        <aside>
            <h2> Luminosité </h2>
            <figure>
                <img src ="../img/MaMaison/luminosite.png" alt="luminosité"/>
                <figcaption> 70 % </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Caméra </h2>
            <figure>
                <img src ="../img/MaMaison/camera.png" alt="caméra"/>
                <figcaption>
                    <p class = "v"> ON </p> <br>
                    <p class = "x"> OFF </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Volet </h2>
            <figure>
                <img src ="../img/MaMaison/volet.png" alt="volet"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class ="x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Humidité </h2>
            <figure>
                <img src ="../img/MaMaison/humidite.png" alt="humidité"/>
                <figcaption> 70% </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Pollution </h2>
            <figure>
                <img src ="../img/MaMaison/pollution.png" alt="pollution"/>
                <figcaption> 70% </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Lumière </h2>
            <figure>
                <img src ="../img/MaMaison/lumiere.png" alt="lumière"/>
                <figcaption>
                    <p class = "v"> ON </p> <br>
                    <p class = "x" > OFF </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Porte </h2>
            <figure>
                <img src ="../img/MaMaison/porte.png" alt="porte"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class = "x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>
    </div>
</section>

<section>
    <h1> Cuisine </h1>

    <div class = "conteneur">
        <aside>
            <h2> Présence </h2>
            <figure>
                <img src ="../img/MaMaison/presence.png" alt="présence"/>
                <figcaption>
                    <p class = "v"> YES </p> <br>
                    <p class = "x"> NO </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Luminosité </h2>
            <figure>
                <img src ="../img/MaMaison/luminosite.png" alt="luminosité"/>
                <figcaption> 70 % </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Température </h2>
            <figure>
                <img src ="../img/MaMaison/temperature.png" alt="température"/>
                <figcaption> 15°C </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Volet </h2>
            <figure>
                <img src ="../img/MaMaison/volet.png" alt="volet"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class = "x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Humidité </h2>
            <figure>
                <img src ="../img/MaMaison/humidite.png" alt="humidité"/>
                <figcaption> 70 % </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Pollution </h2>
            <figure>
                <img src ="../img/MaMaison/pollution.png" alt="pollution"/>
                <figcaption> 70 % </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Lumière </h2>
            <figure>
                <img src ="../img/MaMaison/lumiere.png" alt="lumière"/>
                <figcaption>
                    <p class = "v"> ON </p> <br>
                    <p class = "x"> OFF </p>
                </figcaption>
            </figure>
        </aside>

        <aside>
            <h2> Porte </h2>
            <figure>
                <img src ="../img/MaMaison/porte.png" alt="porte"/>
                <figcaption>
                    <p class = "v"> OPEN </p> <br>
                    <p class = "x"> CLOSE </p>
                </figcaption>
            </figure>
        </aside>
    </div>

</section>

<?php include ("../_templates/footer.php") ?>

</body>

