<?php
function getSettings(){
    require 'includes/db.php';
    $getSettings = $bdd->query('SELECT social_media FROM settings');
    return json_decode($getSettings->fetch()['social_media']);
}