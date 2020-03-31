<?php session_start();
    $usernameAccount = "root";
    $passwordAccount = "";

    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=pdud_aumetz', $usernameAccount, $passwordAccount);

    $delUser = $bdd -> prepare('DELETE FROM utilisateur WHERE  id = "'.$_POST['id'].'" ');
    $delUser -> execute();
?>