<?php
function getCategory($id){
    require 'includes/config.php';
    return $categories[$id];
}