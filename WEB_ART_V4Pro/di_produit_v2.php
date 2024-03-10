<?php

if ($ind == 'f') {

  include "j_cn_db.php";

  if (isset($_POST["catg_pro"]) && isset($_POST["marq_pro"]) && isset($_POST["search_fil"])) {

    $id_catg = $_POST["catg_pro"];
    $id_marq = $_POST["marq_pro"];
    $nam = $_POST["search_fil"];

    if (!empty($nam) && (empty($id_catg) || empty($id_marq))) {
      // header("location: page_produit.php");
      // exit();

      $sql = "SELECT * FROM article WHERE nom_p = '$nam'";
    }elseif (empty($nam) && empty($id_catg) && empty($id_marq)) {
      $sql = "SELECT * FROM article ";
    }elseif (empty($nam) || (!empty($id_catg) && !empty($id_marq))) {
      $sql = "SELECT * FROM article WHERE id_catg = '$id_catg' AND id_marq = '$id_marq' ";
    }else {
      // code...
    }


    $res = mysqli_query($conn, $sql);
    if ($res) {

        if (empty($row = mysqli_fetch_assoc($res))) {
          header("location: page_produit.php?");
          exit();
        } else {
          // code...
        }

        while ($row = mysqli_fetch_assoc($res)) {
          $article = array(
              "id" => $row["id"],
              "nom_p" => $row["nom_p"],
              "description_p" => $row["description_p"],
              "price_p" => $row["price_p"],
              "date_ajoute_p" => $row["data_ajoute_p"],
              "id_user" => $row["id_user"],
              "id_catg" => $row["id_catg"],
              "id_marq" => $row["id_marq"],
              "images" => array() // Tableau pour stocker les informations des images de l'article
          );

          $id_art = $row["id"];
          $d_img_art_db = "SELECT * FROM article_img WHERE id_art = '$id_art'";
          $res_d_img_art_db = mysqli_query($conn, $d_img_art_db);

          while ($row_res_d_img_art_db = mysqli_fetch_assoc($res_d_img_art_db)) {
              $image = array(
                  "id_img" => $row_res_d_img_art_db["id_img"],
                  "name_img" => $row_res_d_img_art_db["name_img"],
                  "type_img" => $row_res_d_img_art_db["type_img"],
                  "size_img" => $row_res_d_img_art_db["size_img"],
                  "data_img" => $row_res_d_img_art_db["data_img"],
                  "src_data_img" => "data:" . $row_res_d_img_art_db["type_img"] . ";base64," . base64_encode($row_res_d_img_art_db["data_img"])
              );

              $article["images"][] = $image; // Ajouter l'image au tableau des images de l'article
          }

          $articles[] = $article; // Ajouter l'article au tableau des articles
      }

    } else {
      header("location: page_produit.php");
      exit();
    }


  } else {
    // header("location: page_produit.php?err_or=votre article <strong> ne pas </strong> bien recuperer de la base de données.#sign_in_div_con");
    header("location: page_produit.php");
    exit();
  }
} else {
  include "j_cn_db.php";

  $d_art_db = "SELECT * FROM article ";
  $res_d_art_db = mysqli_query($conn, $d_art_db);

  if ($res_d_art_db) {
    $articles = array(); // Tableau pour stocker les informations des articles

    while ($row_res_d_art_db = mysqli_fetch_assoc($res_d_art_db)) {
        $article = array(
            "id" => $row_res_d_art_db["id"],
            "nom_p" => $row_res_d_art_db["nom_p"],
            "description_p" => $row_res_d_art_db["description_p"],
            "price_p" => $row_res_d_art_db["price_p"],
            "date_ajoute_p" => $row_res_d_art_db["data_ajoute_p"],
            "id_user" => $row_res_d_art_db["id_user"],
            "id_catg" => $row_res_d_art_db["id_catg"],
            "id_marq" => $row_res_d_art_db["id_marq"],
            "images" => array() // Tableau pour stocker les informations des images de l'article
        );

        $id_art = $row_res_d_art_db["id"];
        $d_img_art_db = "SELECT * FROM article_img WHERE id_art = '$id_art'";
        $res_d_img_art_db = mysqli_query($conn, $d_img_art_db);

        while ($row_res_d_img_art_db = mysqli_fetch_assoc($res_d_img_art_db)) {
            $image = array(
                "id_img" => $row_res_d_img_art_db["id_img"],
                "name_img" => $row_res_d_img_art_db["name_img"],
                "type_img" => $row_res_d_img_art_db["type_img"],
                "size_img" => $row_res_d_img_art_db["size_img"],
                "data_img" => $row_res_d_img_art_db["data_img"],
                "src_data_img" => "data:" . $row_res_d_img_art_db["type_img"] . ";base64," . base64_encode($row_res_d_img_art_db["data_img"])
            );

            $article["images"][] = $image; // Ajouter l'image au tableau des images de l'article
        }

        $articles[] = $article; // Ajouter l'article au tableau des articles
    }

    // Maintenant, $articles contient toutes les informations des articles et de leurs images associées
    // echo "all right<br>";
    // echo "<pre>";
    //   print_r($articles);
    // echo "</pre>";
    // return $articles;

    } else {
      header("location: page_profile.php?err_or=votre article <strong> ne pas </strong> bien recuperer de la base de données.");
      exit();
    }
}


 ?>


 <?php include "catg_marq_db_v2.php"; ?>

    <style media="screen">
       .sec_pro{
         background-color: white;
         border-radius: 20px;
         display: flex;
         justify-content: center;
         align-items: center;
         padding: 10px;
         margin: 10px;
         width: 30%;
       }

       /* Styles pour la partie "aside" (images) */
       .as_img_art {
         /* flex: 1; */
         /* margin: 20px; */
         display: inline-block;
         vertical-align: top;
       }

       .containner_img {
         display: flex;
         flex-wrap: wrap;
         gap: 10px;
         /* width: 240px; */
         height: 90%;
         max-width: 40%;
       }

       .containner_img img {
         max-width: 100px;
         height: auto;
         display: inline-block;
         /* display: flex; */
         /* width: 20%; */
         /* height: 20%; */
       }

       /* style pour la partie info */
       .ar_info_art{
         display: inline-block;
         /* margin: 20px; */
         vertical-align: top;
         font-size: 12px;
       }

       /* style pour le grand section  */
       .the_big_section{
         /* text-align: center; */
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         justify-content: center;
       }
    </style>

   <section class="the_big_section">

     <?php $a=0; while (isset($articles[$a])) { ?>

       <section class="sec_pro">
         <aside class="as_img_art">
           <div class="containner_img">
             <?php $b=0; while (isset($articles[$a]['images'][$b])) { ?>
               <img width="100px" src="<?php echo $articles[$a]['images'][$b]['src_data_img'] ; ?>" alt="">
             <?php $b++; } ?>
           </div>
         </aside>
         <article class="ar_info_art">
           <div class="containner_info">
             <h4>Nom de produit : <?php echo $articles[$a]['nom_p']; ?></h4>
             <p>Description de produit : <?php echo $articles[$a]['description_p']; ?></p>
             <p>Prix du produit : <?php echo $articles[$a]['price_p']; ?> mad</p>
             <p>Date d'ajoute du produit : <?php echo $articles[$a]['date_ajoute_p']; ?></p>
             <p><?php $catg_pro = aff_catg_art($conn, $articles[$a]['id_catg']); echo $catg_pro['nom_catg']; ?></p>
             <p><?php $marq_pro = aff_marq_art($conn, $articles[$a]['id_catg'], $articles[$a]['id_marq']); echo $marq_pro['nom_marq']; ?></p>
           </div>
         </article>
       </section>

     <?php $a++; } ?>
