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
    </head>
    <body>
        <?php require('includes/menu.php');?>
        <div class="bg-image">
            <div class="overlay">
                <h1 class="site-heading text-center text-white">
                    <span class="site-heading-upper text-primary mb-3">Photographe</span>
                    <span class="site-heading-lower">Charles Cantin</span>
                    <br />
                </h1>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <footer class="footer text-center py-5" style="background-color: #292a2b;">
            <div class="container" bis_skin_checked="1">
                <p class="m-0 small text-secondary">Copyright &copy; Charles Cantin - Développé par Teddy Hervier</p>
            </div>
        </footer>
    </body>
</html>