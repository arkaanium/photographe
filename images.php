<?php 
require('includes/refresh.php');
require('includes/config.php');
require('functions/portfolio.function.php');

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
        <div class="container">
            <h5 class="display-6 d-flex">Panneau d'administration</h5>
            <p class="text-muted text-left"><a href="gestion">Accueil</a> / Portfolio</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 custom-spacing">
                    <?php include('includes/userInfosCard.php');?>
                </div>
                <div class="col-md verticalSeperatorLeft">
                    <br>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'published'){?><div class="alert alert-success" role="alert">Photo publiée avec succès</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'deleted'){?><div class="alert alert-success" role="alert">Photo supprimée avec succès</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'invavlid_type'){?><div class="alert alert-danger" role="alert">Format d'image invalide. Format accepté : jpeg, jpg et png</div><?php }?>
                    <?php if(isset($_GET['r']) && $_GET['r'] == 'too_large'){?><div class="alert alert-danger" role="alert">Poids de l'image trop élevé (Max 3Mo)</div><?php } ?>
                    <?php include('includes/passwordUpdateMessages.php');?>
                    <?php
                    $getImages = $bdd->query('SELECT id, image, nametag, type, author, DATE_FORMAT(upload_date, \'%d/%m/%Y\') AS upload_date FROM portfolio ORDER BY id DESC');
                    ?>
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nom de l'image</th>
                                <th scope="col">Catégorie</th>
                                <th scope="col">Date d'ajout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($images = $getImages->fetch()){
                            ?>
                                <tr>
                                    <td><a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#delImageConfirmation<?=$images['id'];?>"><i class="fa-solid fa-trash text-light"></i></span></a></td>
                                    <td><a class="text-muted" href="img/uploads/<?=$images['image'];?>" target="_blank"><?=$images['image'];?></a><br><?=htmlspecialchars($images['nametag']);?></td>
                                    <td><?=getCategory($images['type'])?></td>
                                    <td><?=$images['upload_date'];?></td>
                                </tr>
                                <div class="modal fade" id="delImageConfirmation<?=$images['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer la photo n°<?=$images['id'];?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-danger">Cette action est <b>irréversible</b></h5>
                                            <span>Voulez vous vraiment supprimer l'image <b><?=$images['image']?></b> mise en ligne le <b><?=$images['upload_date'];?></b></span><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="actions/portfolio.php?do=deleteImage&id=<?=$images['id'];?>"><button type="button" class="btn btn-sm btn-outline-danger">Confirmer la suppression</button></a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button data-bs-toggle="modal" data-bs-target="#addImage" class="btn btn-sm btn-success"><i class="fa-solid fa-square-plus"></i> Publier une image</button>
                    <div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une image</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="actions/portfolio.php?do=addImage" method="post" enctype="multipart/form-data">
                                        <input type="file" name="picture" class="form-control mb-3" required>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                                            <select class="form-select" id="inputGroupSelect01" name="type" required>
                                                <?php foreach($categories as $key => $item){?>
                                                    <option value="<?=$key?>" selected><?=$item?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Étiquette</label>
                                            <input type="text" class="form-control" name="nametag" placeholder="Exemple : Mariage Mélanie (repas)" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-sm btn-success" data-bs-dismiss="modal">Publier</button>
                                    </div>
                                </form>
                            </div>
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