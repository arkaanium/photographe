<?php
session_start([
    'cookie_lifetime' => 315360000,
]);

require '../includes/db.php';

if(isset($_GET['do'])){
    switch ($_GET['do']) {
        case 'sendMessage':
            if(isset($_GET['return']) && isset($_POST['nom']) && $_POST['nom'] != '' && isset($_POST['prenom']) && $_POST['prenom'] != '' && isset($_POST['telephone']) && $_POST['telephone'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['subject']) && $_POST['subject'] != '' && isset($_POST['message']) && $_POST['message'] != ''){
                $sendMessage = $bdd->prepare('INSERT INTO messages (author, subject, message, email, phone, creation_date, status) VALUES (:author, :subject, :message, :email, :phone, NOW(), 0)');
                $sendMessage->execute([
                    'author' => htmlspecialchars(ucfirst(strtolower($_POST['prenom'])).' '.ucfirst(strtolower($_POST['nom']))),
                    'subject' => htmlspecialchars($_POST['subject']),
                    'message' => htmlspecialchars($_POST['message']),
                    'email' => htmlspecialchars($_POST['email']),
                    'phone' => htmlspecialchars($_POST['telephone'])
                ]);
                header('Location: ../contact?r=messageSent');
            }else{
                header('Location: ../contact?r=incompleteFields');
            }
            break;
        case 'markAsRead':
            if(isset($_SESSION['id']) && isset($_GET['id']) && isset($_SESSION['id'])){
                $markAsRead = $bdd->prepare('UPDATE messages SET status=1 WHERE id=:id');
                $markAsRead->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../messages?r=read');
            }else{
                header('Location: ../messages?r=error');
            }
            break;
        case 'deleteMessage':
            if(isset($_SESSION['id']) && isset($_GET['id']) && isset($_SESSION['id'])){
                $deleteMessage = $bdd->prepare('DELETE FROM messages WHERE id=:id');
                $deleteMessage->execute([ 'id' => htmlspecialchars($_GET['id']) ]);
                header('Location: ../messages?r=deleted');
            }else{
                header('Location: ../messages?r=error');
            }
            break;
        default:
            header('Location: ../index');
            break;
    }
}else{
    header('Location: ../index');
}