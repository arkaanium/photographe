<?php 
require('functions/settings.function.php');

$social_media = getSettings();
?>
<footer class="footer text-center py-5" style="background-color: #292a2b;">
    <div class="container" bis_skin_checked="1">
        <a href="<?=$social_media->facebook?>" target="_blank"><i class="fa-brands fa-facebook fa-xl"></i></a> <a href="<?=$social_media->instagram?>" target="_blank"><i class="fa-brands fa-instagram fa-xl"></i></a><br>
        <span class="m-0 small text-secondary">Copyright &copy; Charles Cantin - Développé par Teddy Hervier</span><br>
        <span class="small text-primary"><a href="confidentialite">Politique de confidentialité</a> · <a href="mentions-legales">Mentions légales</a></span>    
    </div>
</footer>