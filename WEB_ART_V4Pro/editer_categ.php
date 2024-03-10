

<?php

  include "j_cn_db.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Récupérer les données du formulaire
      $id_catg = $_POST["chos_id_catg"];
      $nom_catg = $_POST["nom_categorie"];

      if (empty($nom_catg) || empty($id_catg)) {
        header("Location: ajouter_cat_mar.php?err=nom de categorie est vide ou id est vide.");
        exit();
      }else {
        $sql = "UPDATE categorie SET nom_catg = '$nom_catg' WHERE id_catg = '$id_catg'";
        if (mysqli_query($conn, $sql)) {
          header("Location: ajouter_cat_mar.php?g_n=categorie est modifiee avec succes.");
          exit();
        }else {
          header("Location: ajouter_cat_mar.php?err=il ya une erreur.");
          exit();
        }
      }

  }else {
    header("Location: ajouter_cat_mar.php");
    exit();
  }

?>
