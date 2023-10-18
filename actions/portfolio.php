<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_SESSION['id']) && isset($_GET['do'])){

    switch ($_GET['do']) {
        case 'addImage':
            if(isset($_FILES['picture']) && isset($_POST['nametag']) && isset($_POST['type'])){
                $img_size = $_FILES['picture']['size'];
                $error = $_FILES['picture']['error'];
                if($_FILES['picture']['error'] != 4 && ($_FILES['picture']['size'] != 0)){
                    $img_name = $_FILES['picture']['name'];
                    $tmp_name = $_FILES['picture']['tmp_name'];

                    if($error === 0){
                        if($img_size > 3000000) {
                            header('Location: ../images?r=too_large');
                        }else{
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");

                            if(in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                                $img_upload_path = '../img/uploads/'.$new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);

                                $insertImage = $bdd->prepare('INSERT INTO portfolio (image, nametag, type, author, upload_date) VALUES (:image, :nametag, :type, :author, NOW())');
                                $insertImage->execute([
                                    'image' => $new_img_name,
                                    'nametag' => htmlspecialchars($_POST['nametag']),
                                    'type' => htmlspecialchars($_POST['type']),
                                    'author' => $_SESSION['name']
                                ]);
                                header('Location: ../images?r=published');
                            }else{
                                header('Location: ../images?r=invalid_type');
                            }
                        }
                    }else{
                        header('Location: ../images?r=error');
                    }
                }
            }else{
                header('Location: ../images');
            }
            break;
        case 'deleteImage':
            if(isset($_GET['id'])){
                $deleteImage = $bdd->prepare('DELETE FROM portfolio WHERE id=:id');
                $deleteImage->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../images?r=deleted');
            }else{
                header('Location: ../images');
            }
            break;
        default:
            header('Location: ../gestion');
            break;
    }

}else{
    header('Location: ../gestion');
}