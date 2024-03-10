<?php
  session_start();

 ?>

<?php

    include "j_cn_db.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['sbt'])) {

        // if (!empty($_FILES['img_art_n']['name'][0])) {
        //   echo count($_FILES['img_art_n']['name']);
        // } else {
        //   echo "file is empty";
        // }

        // if (isset($_POST['name_art']) && isset($_POST['desc_art']) && isset($_POST['price_art']) && isset($_POST['mark_art']) && isset($_POST['catg_art']) && isset($_FILES['img_art_n'])) {
        if (isset($_POST['name_art']) && isset($_POST['desc_art']) && isset($_POST['price_art']) && isset($_POST['mark_art']) && isset($_POST['catg_art'])) {

            if (empty($_FILES['img_art_n']['name'][0]) || empty($_FILES['img_art_n']['name'][1]) || empty($_FILES['img_art_n']['name'][2]) || empty($_FILES['img_art_n']['name'][3])) {
              header("location: page_profile.php?err_pi=the produit img is required.#id_art_info");
              exit();
            }
            elseif (empty($_POST['name_art']) || strlen($_POST['name_art']) < 5) {
              header("location: page_profile.php?err_pn=the produit name is required and should large more then 5 chars.#id_art_info");
              exit();
            }elseif (empty($_POST['desc_art']) || strlen($_POST['desc_art']) < 5) {
              header("location: page_profile.php?err_pd=the produit description is required and should large more then 50 chars.#id_art_info");
              exit();
            }elseif (empty($_POST['price_art']) || $_POST['price_art'] < 0) {
              header("location: page_profile.php?err_pp=the produit price is required and should positive number.#id_art_info");
              exit();

            // }elseif (empty($_POST['mark_art']) || strlen($_POST['mark_art']) < 3) {

            }elseif (empty($_POST['mark_art'])) {
              header("location: page_profile.php?err_pm=the produit marque is required.#id_art_info");
              exit();
            }elseif (empty($_POST['catg_art'])) {
              header("location: page_profile.php?err_pc=the produit categprie is required.#id_art_info");
              exit();

            }else {
              echo "all is right <br><br>";

              // Supposons que vous ayez un tableau pour stocker toutes les informations des images
              $images_info = array();
              $a = 0; // Assurez-vous que $a est initialisé ailleurs dans votre code.
              while ($a < 4) {
                  // Récupérer les informations du fichier image courant
                  $img_name = $_FILES["img_art_n"]["name"][$a];
                  $img_type = $_FILES["img_art_n"]["type"][$a];
                  $img_size = $_FILES["img_art_n"]["size"][$a];
                  $img_data = addslashes(file_get_contents($_FILES["img_art_n"]["tmp_name"][$a]));
                  // Stocker les informations de l'image courante dans le tableau $images_info
                  $image_info = array(
                      "name" => $img_name,
                      "type" => $img_type,
                      "size" => $img_size,
                      "data" => $img_data
                  );
                  $images_info[] = $image_info; // Ajouter les informations de l'image au tableau
                  $a++;
              }

              $name_prod = $_POST['name_art'];
              $desc_prod = $_POST['desc_art'];
              $price_prod = $_POST['price_art'];

              $catg_id = $_POST['catg_art'];
              $marque_id = $_POST['mark_art'];

              // $id_user = $_POST['id_user_ex'];
              // $query_id = "SELECT id FROM user WHERE id = $id_user";
              // $result = mysqli_query($conn, $query_id);
              // if (mysqli_num_rows($result) === 0) {
              //     // The user with the specified id does not exist.
              //     // You should handle this case appropriately, e.g., show an error message or redirect back to the form.
              //
              //     header("location: page_connection.php?err_or= no id user exist.#sign_in_div_con");
            	// 		exit();
              // }

              $id_user = $_SESSION["id_user"];

              $query_id = "SELECT id FROM user WHERE id = ?";
              $stmt = mysqli_prepare($conn, $query_id);
              mysqli_stmt_bind_param($stmt, "i", $id_user); // Assuming id column is of integer type
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              if (mysqli_num_rows($result) === 0) {
                  // The user with the specified id does not exist.
                  // You should handle this case appropriately, e.g., show an error message or redirect back to the form.

                  header("location: page_connection.php?err_or=no id user exist.#sign_in_div_con");
                  exit();
              }


              // echo $images_info[2]['name'];

              // Préparation et exécution de la requête
        			$query = "INSERT INTO article (nom_p, description_p, price_p, id_catg, id_marq, id_user) VALUES ('$name_prod','$desc_prod','$price_prod','$catg_id','$marque_id', '$id_user')";

        			if (mysqli_query($conn, $query)) {
          				// echo "L'article a été enregistrée avec succès dans la base de données.";
                  // // header("location: page_connection.php?good_news=votre article a été enregistrée avec succès dans la base de données.");
            			// // exit();
                  //
                  // $id_produit = mysqli_insert_id($conn);
                  //
                  // $sql = "INSERT INTO article_img (name_img, type_img, size_img, data_img, id_art)
                  // VALUES ('$images_info[0]['name']', '$images_info[0]['type']', '$images_info[0]['size']', '$images_info[0]['data']', $id_produit);";
                  // $sql .= "INSERT INTO article_img (name_img, type_img, size_img, data_img, id_art)
                  // VALUES ('$images_info[1]['name']', '$images_info[1]['type']', '$images_info[1]['size']', '$images_info[1]['data']', $id_produit);";
                  // $sql .= "INSERT INTO article_img (name_img, type_img, size_img, data_img, id_art)
                  // VALUES ('$images_info[2]['name']', '$images_info[2]['type']', '$images_info[2]['size']', '$images_info[2]['data']', $id_produit);";
                  // $sql .= "INSERT INTO article_img (name_img, type_img, size_img, data_img, id_art)
                  // VALUES ('$images_info[3]['name']', '$images_info[3]['type']', '$images_info[3]['size']', '$images_info[3]['data']', $id_produit)";
                  //
                  // if (mysqli_multi_query($conn, $sql)) {
            			// 	echo "Les images de article ont été enregistrée avec succès dans la base de données.";
                  // else {
                  //   echo "Les images de article <strong> ne ont pas </strong> été enregistrée avec succès dans la base de données.";
                  // }

                  echo "L'article a été enregistrée avec succès dans la base de données.";

                  $id_produit = mysqli_insert_id($conn);

                  $sql = "INSERT INTO article_img (name_img, type_img, size_img, data_img, id_art) VALUES ";
                  foreach ($images_info as $image) {
                      $name_img = $image['name'];
                      $type_img = $image['type'];
                      $size_img = $image['size'];
                      $data_img = $image['data'];
                      $sql .= "('$name_img', '$type_img', '$size_img', '$data_img', '$id_produit'),";
                  }
                  $sql = rtrim($sql, ','); // Remove the trailing comma

                  if (mysqli_multi_query($conn, $sql)) {
                      echo "Les images de l'article ont été enregistrées avec succès dans la base de données.";
                      header("location: page_profile.php?good_news=votre article enregistrée avec succès dans la base de données.#sign_in_div_con");
                			exit();
                  } else {
                      echo "Les images de l'article <strong>n'ont pas</strong> été enregistrées avec succès dans la base de données.";
                      header("location: page_profile.php?good_news=votre article enregistrée avec succès dans la base de données.#sign_in_div_con");
                			exit();
                  }

        			} else {
        				echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
                header("location: page_connection.php?err_or=votre article <strong> ne pas </strong> enregistrée avec succès dans la base de données.#sign_in_div_con");
          			exit();
        			}

              // header("location: page_profile.php?good_news=the produit has beeen register.#id_art_info");
              // exit();

            }


        } else {
          echo "something not set";
          header("location: page_profile.php?err_or=we face some problemes return as soon as .#id_art_info");
          exit();
        }

    }

 ?>
