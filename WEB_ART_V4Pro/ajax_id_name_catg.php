<?php

    include "j_cn_db.php";


    $q = intval($_GET['q']);

    $sql = "SELECT * FROM categorie WHERE id_catg=$q";
    $res = mysqli_query($conn, $sql);

    if ($res) {

        while ($row = mysqli_fetch_assoc($res)) {
            // Utilisation correcte des indices pour accéder aux valeurs de la ligne
            $id_catg = $row["id_catg"];
            $nom_catg = $row["nom_catg"];

            // Utilisation de guillemets doubles pour les attributs HTML
            echo $nom_catg;
        }
    } else {
        // Gérer le cas d'erreur de requête
        echo "Erreur de requête : " . mysqli_error($conn_catg);
    }

 ?>
