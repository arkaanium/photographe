<?php
require('includes/refresh.php');
require('includes/config.php');

if(!isset($_SESSION['id'])){
    header('Location: login');
    exit("Vous n'avez pas accès à cette page");
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Panel administration">
        <meta name="robots" content="noindex,nofollow">
        <title><?=$title;?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="<?=$favicon;?>">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/gestion.css">
        <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="assets/fontawesome/css/solid.css" rel="stylesheet">
    </head>
    <body>
        <?php include('includes/adminNavBar.php');?>
        <br>
        <div class="container ">
            <h5 class="display-6 d-flex">Panneau d'administration</h5>
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Paramètres du site</p>
            <hr>
            <div class="row ">
                <div class="col-md-3 custom-spacing text-center">
                    <?php include('includes/userInfosCard.php');?>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <?php
                    $getSettings = $bdd->query('SELECT social_media, DATE_FORMAT(update_date, \'%d/%m/%Y\') AS update_date, update_author FROM settings');
                    $settings = $getSettings->fetch();
                    $social_media = json_decode($settings['social_media']);
                    ?>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="d-flex">Réseaux sociaux</h5>
                            <br>
                            <?php if(isset($_GET['r']) && $_GET['r'] == 'linkUpdated'){?><div class="alert alert-success" role="alert">Liens mis à jour avec succès</div><?php }?>
                            <?php if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Une erreur s'est produite, veuillez réessayer</div><?php }?>
                            <?php include('includes/passwordUpdateMessages.php');?>
                            <form action="actions/settings.php?do=updateLinks" method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Facebook</span>
                                    <input type="text" class="form-control" name="facebook" placeholder="" value="<?=$social_media->facebook?>" required>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Instagram</span>
                                    <input type="text" class="form-control" name="instagram" placeholder="" value="<?=$social_media->instagram?>" required>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md">
                            <h5 class="d-flex">Fond d'écran accueil</h5>
                            <br>
                            <?php 
                            if(isset($_GET['r']) && $_GET['r'] == 'bgUpdated'){?><div class="alert alert-success" role="alert">Fond d'écran mis à jour avec succès</div><?php }
                            if(isset($_GET['r']) && $_GET['r'] == 'error'){?><div class="alert alert-danger" role="alert">Une erreur s'est produite, veuillez réessayer</div><?php } 
                            if(isset($_GET['r']) && $_GET['r'] == 'invavlid_type'){?><div class="alert alert-danger" role="alert">Format d'image invalide. Format accepté : jpg</div><?php }
                            if(isset($_GET['r']) && $_GET['r'] == 'too_large'){?><div class="alert alert-danger" role="alert">Poids de l'image trop élevé (Max 3Mo)</div><?php }
                            ?>
                            <p>Image actuelle:</p>
                            <img src="img/bg.jpg" class="mb-3" width="200">
                            <form action="actions/settings.php?do=updateBg" method="post" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Image</span>
                                    <input type="file" name="background" class="form-control" required>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-muted d-flex">Charles Cantin &copy; 2023 Développé par Teddy Hervier</p>
        </div>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/annonce.js"></script>
    </body>
</html>