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
            <div class="row">
                <div class="col">
                    <h1 class="pageTitle site-heading text-left text-white"><span class="site-heading-upper text-primary mb-3">Portfolio</span></h1>
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text categoryLabel" id="basic-addon1">Catégorie</span>
                        <select class="custom-select" id="category" aria-label="Default select example">
                            <option value="0" selected>Tout afficher</option>
                            <?php foreach($categories as $key => $item){?>
                                <option value="<?=$key?>"><?=$item?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div id="items" class="text-white"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/portfolio.js"></script>
        <?php require('includes/footer.php');?>
    </body>
</html>