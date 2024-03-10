<?php

    session_start();

    // Vérifier l'authentification de l'utilisateur
   if (!isset($_SESSION["id_user"])) {
    header("location: page_connection.php?err_or=we face some probleme to delete your account where we dont find the id in data base.#sign_in_div_con");
    exit();
   }
   
    $id_user_prof = $_SESSION["id_user"];

    include "j_cn_db.php";

 ?>

 <?php

    $sql_del_acc = "DELETE FROM user WHERE id = '$id_user_prof'";

    if (mysqli_query($conn, $sql_del_acc)) {

        session_unset();
        session_destroy();

      header("location: page_connection.php?good_news=votre compte a été supprimer avec succès dans la base de données.#sign_in_div_con");
			exit();

    } else {
      header("location: page_profile.php?err_or_e_c=we face some probleme to delete your account.#art_1");
 			exit();
    }

  ?>
