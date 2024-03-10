<?php

      // Assurez-vous d'inclure le fichier de connexion à la base de données
      // include "j_cn_db.php"; // Assurez-vous que le chemin est correct

      function aff_catg($conn_catg) {
          $sql = "SELECT * FROM categorie";
          $res = mysqli_query($conn_catg, $sql);

          if ($res) {
              echo "right collection. <br>";

              while ($row = mysqli_fetch_assoc($res)) {
                  // Utilisation correcte des indices pour accéder aux valeurs de la ligne
                  $id_catg = $row["id_catg"];
                  $nom_catg = $row["nom_catg"];

                  // Utilisation de guillemets doubles pour les attributs HTML
                  echo "<option value='$id_catg'>$nom_catg</option>";
              }
          } else {
              // Gérer le cas d'erreur de requête
              echo "Erreur de requête : " . mysqli_error($conn_catg);
          }
      }

      // function aff_marq($conn_marq, $id_catg){
      //   $sql_marq = "SELECT * FROM marque WHERE id_catg = '$id_catg'";
      //   $res_marq = mysqli_query($conn_marq, $sql_marq);
      //
      //   if ($res_marq) {
      //     echo "Right marque.";
      //
      //     while ($row_marque = mysqli_fetch_assoc($res_marq)) {
      //       $id_catg_marq = $row_marque["id_catg"];
      //       $nom_marq = $row_marque["nom_marq"];
      //       $id_marq = $row_marque["id_marq"];
      //
      //       echo "<option value='$id_marq'>$nom_marq</option>";
      //     }
      //
      //   } else {
      //     // Gérer le cas d'erreur de requête
      //     echo "Erreur de requête : " . mysqli_error($conn_marq);
      //   }
      //
      // }

      function aff_marq($conn_marq, $id_catg){
        $sql_marq = "SELECT * FROM marque WHERE id_catg = '$id_catg'";
        $res_marq = mysqli_query($conn_marq, $sql_marq);

        if ($res_marq) {
          echo "Right marque.";

          // $arr_opt = array();

          while ($row_marque = mysqli_fetch_assoc($res_marq)) {
            $id_catg_marq = $row_marque["id_catg"];
            $nom_marq = $row_marque["nom_marq"];
            $id_marq = $row_marque["id_marq"];

            // Utilisation de guillemets doubles pour les attributs HTML
            // $arr_opt[] = echo "<option value='$id_marq'>$nom_marq</option>";
            echo "<option value='$id_marq'>$nom_marq</option>";
          }

          // return $arr_opt;
        } else {
          // Gérer le cas d'erreur de requête
          echo "Erreur de requête : " . mysqli_error($conn_marq);
        }

      }

      // $val_q = intval($_GET['q']);
      // function aff_marq_ajax($val_q, $conn_marq){
      //   aff_marq($conn_marq, $val_q);
      // }

      // Assurez-vous que $conn_catg est une connexion MySQL valide
      // ...

      // Appelez la fonction pour afficher les options de catégorie
      // aff_catg($conn_catg);




      // function aff_catg_art($conn_catg_art, $id_catg){
      //   $d_aff_catg_art = "SELECT * FROM categorie WHERE id_catg = '$id_catg'";
      //   $res_d_aff_catg_art = mysqli_query($conn_catg_art, $d_aff_catg_art);
      //
      //   if ($res_d_aff_catg_art) {
      //     $row_res_d_aff_catg_art = mysqli_fetch_assoc($res_d_aff_catg_art);
      //
      //     return $row_res_d_aff_catg_art;
      //   } else {
      //     echo "we face somme probleme to collecte catgorie.";
      //   }
      //
      // }

?>
