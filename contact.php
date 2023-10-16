<?php require('includes/config.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$title?></title>
        <link rel="icon" type="image/png" href="<?=$favicon?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
        <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/leaflet/leaflet.css" />
        <script src="assets/leaflet/leaflet.js"></script>
    </head>
    <body>
        <?php require('includes/menu.php');?>
        <br>
        <div class="container">
            <h1 class="pageTitle site-heading text-left text-white"><span class="site-heading-upper text-primary mb-3">Me contacter</span></h1>
            <br>
            <div class="row text-white">
                <div class="col-md">
                    <h5 class="site-heading text-left text-white"><span class="section-heading-lower mb-3">Mes coordonnées</span></h5>
                    <div id="map" style="height: 400px;"></div>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <h3>Charles Cantin</h3>
                            <p>14 Rue Jean Claudeville, 25896 Bordeaux</p>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col text-end">
                                    <b><i class="fa-solid fa-phone"></i> Téléphone :</b><br>
                                    <b><i class="fa-solid fa-mobile"></i> Portable :</b>
                                </div>
                                <div class="col">
                                    <span>0254248956</span><br>
                                    <span>0654248956</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <h5 class="site-heading text-left text-white"><span class="section-heading-lower mb-3">Envoyer un message</span></h5>
                    <form action="actions/messages.php?do=sendMessage&return=contactus" method="post" id="contactForm">
                        <div class="mb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" required>
                                </div>
                                <div class="col">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="telephone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control" name="telephone" placeholder="Entrez votre numéro de téléphone" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse e-mail" required>
                        </div>
                        <div class="mb-2">
                            <label for="subject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" name="subject" value="Demande de renseignement" required>
                        </div>
                        <div class="mb-2">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="6" placeholder="Entrez votre message" required></textarea>
                        </div>
                        <button type="submit" id="submitBtn" data-sitekey="6Lep-hkoAAAAAHwYItfXA4ddsuBJLTAo15ZPwet4" data-callback='onSubmit' data-action='submit' class="btn btn-lightwarning g-recaptcha">Envoyer</button>
                        <br>
                        <br>
        <br>
        <br>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <script>
            // Initialisez la carte avec des coordonnées et un niveau de zoom
            var map = L.map('map').setView([44.87318456091879, -0.5852668633185883], 15);

            // Ajoutez une couche de carte OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Ajoutez un marqueur pour votre magasin
            var marker = L.marker([44.87318456091879, -0.5852668633185883]).addTo(map);
            marker.bindPopup("Studio Charles Cantin").openPopup();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <?php require('includes/footer.php');?>
    </body>
</html>