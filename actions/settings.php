<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_GET['do']) && isset($_SESSION['id'])){

    switch ($_GET['do']) {
        case 'updateLinks':
            if(isset($_POST['facebook']) && isset($_POST['instagram'])){
                $social_media = [
                    'facebook' => htmlspecialchars($_POST['facebook']),
                    'instagram' => htmlspecialchars($_POST['instagram'])
                ];

                $updateSettings = $bdd->prepare('UPDATE settings SET social_media=:social_media, update_date=NOW(), update_author=:username');
                $updateSettings->execute([
                    'social_media' => json_encode($social_media),
                    'username' => $_SESSION['username']
                ]);

                header('Location: ../settings?r=linkUpdated');
            }else{
                header('Location: ../settings?r=error');
            }
            break;
        case 'updateBg':
            if(isset($_FILES['background'])){
                $img_size = $_FILES['background']['size'];
                $error = $_FILES['background']['error'];
                if($_FILES['background']['error'] != 4 && ($_FILES['background']['size'] != 0)){
                    $img_name = $_FILES['background']['name'];
                    $tmp_name = $_FILES['background']['tmp_name'];

                    if($error === 0){
                        if($img_size > 1000000) {
                            header('Location: ../settings?r=too_large');
                        }else{
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg");

                            if(in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = "bg".'.'.$img_ex_lc;
                                $img_upload_path = '../img/'.$new_img_name;
                                if(file_exists("../img/bg.png")) unlink("../img/bg.png");
                                move_uploaded_file($tmp_name, $img_upload_path);

                                header('Location: ../settings?r=bgUpdated');
                            }else{
                                header('Location: ../settings?r=invalid_type');
                            }
                        }
                    }else{
                        header('Location: ../settings?r=error');
                    }
                }
            }else{
                header('Location: ../settings?r=error');
            }
            break;
        default:
            header('Location: ../settings');
            break;
    }

}else{
    header('Location: ../settings');
}