<nav class="navbar sticky-top navbar-expand-lg navbar-dark py-lg-4" id="mainNav" style="background-color: #292A2B">
    <div class="container" bis_skin_checked="1">
        <a class="navbar-brand px-5" href="index"><img class="logo" width="200" src="<?=$logo?>"></a>
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="index.php">Charles Cantin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" bis_skin_checked="1">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'index.php'){?>active<?php } ?> px-lg-4">
                    <a class="nav-link text-uppercase text-expanded " href="index">Accueil</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'portfolio.php'){?>active<?php } ?> px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="portfolio">Portfolio</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'tarifs.php'){?>active<?php } ?> px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="tarifs">Prestations</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php'){?>active<?php } ?> px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>