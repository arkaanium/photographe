<?php

include('../includes/db.php');

// default parameters value
$category = 0;

if(isset($_GET['cat']) && $_GET['cat'] != ""){
    $category = $_GET['cat'];
}

$perPage = 21;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $perPage;

if($category > 0){
    $getPortfolio = $bdd->prepare('SELECT * FROM portfolio WHERE type=:category ORDER BY id DESC LIMIT :l OFFSET :o');
    $getPortfolio->bindValue(':category', $category, PDO::PARAM_INT);
    $getPortfolio->bindParam(':l', $perPage, PDO::PARAM_INT);
    $getPortfolio->bindParam(':o', $offset, PDO::PARAM_INT);
    $getPortfolio->execute();
    $items = $getPortfolio->rowCount();

    $getTotal = $bdd->prepare('SELECT COUNT(*) as total FROM portfolio WHERE type=:category');
    $getTotal->bindValue(':category', $category, PDO::PARAM_INT);
    $getTotal->execute();
    $totalCount = $getTotal->fetch()['total'];
    $totalPages = ceil($totalCount / $perPage);
}else{
    $getPortfolio = $bdd->prepare('SELECT * FROM portfolio ORDER BY id DESC LIMIT :l OFFSET :o');
    $getPortfolio->bindParam(':l', $perPage, PDO::PARAM_INT);
    $getPortfolio->bindParam(':o', $offset, PDO::PARAM_INT);
    $getPortfolio->execute();
    $items = $getPortfolio->rowCount();

    $getTotal = $bdd->query('SELECT COUNT(*) as total FROM portfolio');
    $totalCount = $getTotal->fetch()['total'];
    $totalPages = ceil($totalCount / $perPage);
}

if($items>0){
?>
<div class="row">
    <?php 
    while($portfolio = $getPortfolio->fetch()){
    ?>
        <div class="col-md">
            <div class="card mb-4 text-white" style=" border-radius: 0; background-color: #292a2b; width: 18rem;">
                <div data-bs-toggle="modal" data-bs-target="#img" style="background-image:url('img/uploads/<?=$portfolio['image']?>'); height:200px; background-size:cover;" class="catalog-image" bis_skin_checked="1"></div>
            </div>
            <div class="modal fade" id="img" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xxl">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="img/uploads/<?=$portfolio['image']?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<nav aria-label="Page navigation">
    <ul class="pagination pagination-danger">
        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
            <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                <a class="page-link" href="#" onClick="getPortfolio(<?php echo $page; ?>); event.preventDefault();"><?php echo $page; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
<?php }else{?>
<div class="alert alert-secondary text-center" role="alert">Aucun résultat</div>
<?php } ?>