
<?php

  include "header_v2.php";

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
      header("location: page_produit.php");
      exit();
      $sql = "SELECT * FROM article ";
    }elseif (empty($nam) || (!empty($id_catg) && !empty($id_marq))) {
      $sql = "SELECT * FROM article WHERE id_catg = '$id_catg' AND id_marq = '$id_marq' ";
    }else {
      // code...
    }


    $res = mysqli_query($conn, $sql);
    if ($res) {

        // if (empty($row = mysqli_fetch_assoc($res))) {
        //   header("location: page_produit.php?");
        //   exit();
        // } else {
        //   // code...


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

          // echo "<pre>";
          //   print_r($articles);
          // echo "</pre>";
      }

    // }

    } else {
      header("location: page_produit.php");
      exit();
    }


  } else {
    // header("location: page_produit.php?err_or=votre article <strong> ne pas </strong> bien recuperer de la base de données.#sign_in_div_con");
    header("location: page_produit.php");
    exit();
  }

 ?>


 <?php include "catg_marq_db_v2.php"; ?>

    <style media="screen">
       .sec_pro{
				background-color: white;
				padding: 5px;
				margin: 20px;
				border-radius: 20px;
				color: black;
				display: inline-block;
				text-align: center;
        width: 25%;
			}

       /* Styles pour la partie "aside" (images) */
      .containner_img{
				display: block;
				text-align: center;
				background-color: whitesmoke;
				border-radius: 20px;
				padding: 10px;
				margin: 10px;
			}

      .containner_img img{
				display: none;
				margin: 3px auto;
				border-radius: 10px;
				width: 70%;
        text-align: center;
			}
			.containner_img button{
				margin: 5px;
				border-radius: 20px;
			}

       /* style pour la partie info */
      .containner_info {
        display: block;
        text-align: left;
        background-color: whitesmoke;
        border-radius: 20px;
        padding: 10px;
        margin: 10px;
      }

       /* style pour le grand section  */
       .the_big_section{
         /* text-align: center; */
         display: flex;
         flex-wrap: wrap;
         align-items: center;
         justify-content: center;
       }
       .sec_pr{
         background-color: whitesmoke;
         border-radius: 20px;
         padding: 10px;
         margin: 10px;
         /* display: flex;
         justify-content: center;
         align-items: center;
         flex-wrap: wrap; */
         text-align: center;
       }
    </style>



<section class="sec_pr">
  <h1>Resulte of your searche.</h1>

  <section class="the_big_section">


     <?php
       // Check if there are articles to display
       if (isset($articles) && count($articles) > 0) {
    ?>

     <?php $a=0; while (isset($articles[$a])) { ?>

      <section class="sec_pro">
    
    <!-- <aside class="as_img_art"> -->
      <div class="containner_img">
        <?php $b=0; while (isset($articles[$a]['images'][$b])) { ?>
          <img class="image_pro" width="100px" src="<?php echo $articles[$a]['images'][$b]['src_data_img'] ; ?>" alt="">
        <?php $b++; } ?>
        <button onclick="CHANGE(this, 'B')">back</button>
        <button onclick="CHANGE(this, 'N')">next</button>
      </div>
    <!-- </aside> -->
    <!-- <article class="ar_info_art"> -->
      <div class="containner_info">
        <h4>Product Name : <?php echo $articles[$a]['nom_p']; ?></h4>
        <p>Product Description : <?php echo $articles[$a]['description_p']; ?></p>
        <p>Product price : <?php echo $articles[$a]['price_p']; ?> mad</p>
        <p>Date the product was added : <?php echo $articles[$a]['date_ajoute_p']; ?></p>
        <p>category : <?php $catg_pro = aff_catg_art($conn, $articles[$a]['id_catg']); echo $catg_pro['nom_catg']; ?></p>
        <p>brand : <?php $marq_pro = aff_marq_art($conn, $articles[$a]['id_catg'], $articles[$a]['id_marq']); echo $marq_pro['nom_marq']; ?></p>
      </div>
    <!-- </article> -->
  </section>

     <?php $a++; } ?>

     <?php
        } else {
          // Display a message if no articles are found
          // echo "<br>";
          echo "<h4>No articles found.</h4>";
        }
      ?>

   </section>
</section>

<script>
    // Fonction pour afficher la première image
    function showFirstImage(section) {
      var image_pro_js = section.getElementsByClassName("image_pro");
      if (image_pro_js.length > 0) {
        image_pro_js[0].style.display = "block";
      }
    }
  
    // Appeler la fonction pour afficher la première image pour chaque section
    var sections = document.querySelectorAll('.sec_pro');
    sections.forEach(function(section) {
      showFirstImage(section);
    });
  
    function CHANGE(button, d) {
      var section = button.closest('.sec_pro');
      var image_pro_js = section.getElementsByClassName("image_pro");
  
      var ind = 0;
  
      // Trouver l'indice de l'image active
      for (var i = 0; i < image_pro_js.length; i++) {
        if (image_pro_js[i].style.display === "block") {
          ind = i;
          break;
        }
      }
  
      image_pro_js[ind].style.display = "none"; // Cacher l'image actuelle
  
      if (d === "N") {
        ind = (ind + 1) % image_pro_js.length; // Passer à l'image suivante
      } else {
        ind = (ind - 1 + image_pro_js.length) % image_pro_js.length; // Revenir à l'image précédente
      }
  
      image_pro_js[ind].style.display = "block"; // Afficher la nouvelle image
    }
  </script>

<?php include "footer_.php"; ?>
