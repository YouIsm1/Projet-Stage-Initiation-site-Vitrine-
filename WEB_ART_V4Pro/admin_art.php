

<style media="screen">

</style>

<?php

    function aff_art($conn_art, $id_user){

      $d_art_db = "SELECT * FROM article";
      $res_d_art_db = mysqli_query($conn_art, $d_art_db);

      if ($res_d_art_db) {
        $row_res_d_art_db = mysqli_fetch_assoc($res_d_art_db);

        $id_art = $row_res_d_art_db["id"];
        $n_art = $row_res_d_art_db["nom_p"];
        $d_art = $row_res_d_art_db["description_p"];
        $p_art = $row_res_d_art_db["price_p"];
        $d_a_art = $row_res_d_art_db["date_ajoute_p"];
        $id_user_art = $row_res_d_art_db["id_user"];
        $id_catg_art = $row_res_d_art_db["id_catg"];
        $id_marq_art = $row_res_d_art_db["id_marq"];

        $d_img_art_db = "SELECT * FROM article_img WHERE id_art = '$id_art'";
        $res_d_img_art_db = mysqli_query($conn_art, $d_img_art_db);

        if ($res_d_img_art_db) {
          $row_res_d_img_art_db = mysqli_fetch_assoc($res_d_img_art_db);

          $id_img_art = $row_res_d_img_art_db["id_img"];
          $name_img_art = $row_res_d_img_art_db["name_img"];
          $type_img_art = $row_res_d_img_art_db["type_img"];
          $size_img_art = $row_res_d_img_art_db["size_img"];

          $data_img_art = $row_res_d_img_art_db["data_img"];
          $src_data_img_art = "data:' . $type_img_art . ';base64,' . base64_encode($data_img_art) . '";

          $id_img_art = $row_res_d_img_art_db["id_art"];

        } else {
          header("location: page_profile.php?err_or=votre article <strong> ne pas </strong> bien recuperer de la base de données.#sign_in_div_con");
          exit();
        }


      } else {
        header("location: page_profile.php?err_or=votre article <strong> ne pas </strong> bien recuperer de la base de données.#sign_in_div_con");
        exit();
      }

    }
 ?>


<section>
    

</section>
