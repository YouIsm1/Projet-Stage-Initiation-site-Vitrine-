<?php

  include "j_cn_db.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["catg_add"]) || strlen($_POST["catg_add"]) <= 3) {
      header("Location: ajouter_cat_mar.php?err=nom de categorie est vide ou inferiuer de 3 caracteres.");
      exit();
    }else {
      $n_catg_add = $_POST["catg_add"];

      $sql = "INSERT INTO categorie (nom_catg) VALUES ('$n_catg_add')";
      if (mysqli_query($conn, $sql)) {
        header("Location: ajouter_cat_mar.php?g_n=categorie est ajoutee avec succes.");
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
