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
    </head>
    <body>
        <?php require('includes/menu.php');?>
        <br>
        <div class="container imgPortofolio">
        <h1 class="pageTitle site-heading text-left text-white"><span class="site-heading-upper text-primary mb-3">Mes prestations</span></h1>
        <br>
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card" style=" background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/portrait/portrait1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« Juste moi »</h5>
                            <p class="card-text">Séance pour une personne, en extérieur ou en studio.</p>
                            <span class="badge text-bg-lightwarning">130 €</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=1" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/couple/couple3.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« Pour deux »</h5>
                            <p class="card-text">Pour deux personnes, en extérieur ou en studio</p>
                            <span class="badge text-bg-lightwarning">195 €</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=2" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/bapt%C3%AAme/bapteme1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« J'immortalise l'évènement » sur mesure</h5>
                            <p class="card-text">Prestation de mariage ou baptême</p>
                            <span class="badge text-bg-lightwarning">Sur devis</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=3" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/grossesse/grossesse1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« Il était une fois »</h5>
                            <p class="card-text">Photo de grossesse (À votre domicile, en extérieur ou en studio)</p>
                            <span class="badge text-bg-lightwarning">160 €</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=4" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/b%C3%A9b%C3%A9/b%C3%A9b%C3%A91.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« Mon bébé »</h5>
                            <p class="card-text">Photo d'enfant jusqu'à 3 ans (photo à domicile)</p>
                            <span class="badge text-bg-lightwarning">100 €</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=5" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #292A2B">
                        <img src="https://cantincharles-portefolio.netlify.app/images/famille/famille4.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-white">
                            <h5 class="card-title">« Famille »</h5>
                            <p class="card-text">Pour la famille ou les amis jusqu’à 4 personnes, en extérieur ou en studio.<br>30 euros en supplément par personne au-delà de 4 (hormis enfant jusqu’à 2 ans)</p>
                            <span class="badge text-bg-lightwarning">220 €</span>
                        </div>
                        <div class="card-footer">
                            <a href="contact?about=6" class="btn btn-lightwarning">Me contacter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <?php require('includes/footer.php');?>
    </body>
</html>