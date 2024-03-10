<?php
    session_start();

    $id_user_prof = $_SESSION["id_user"];

    include "j_cn_db.php";

 ?>

 <?php

     if (isset($_POST["username_edt"]) && isset($_POST["password_edt"]) && isset($_POST["email_edt"]) && isset($_FILES["img_prof"])){

         // Display the content of the $_POST array for debugging purposes

         echo "<pre>";
           print_r($_POST);
         echo "</pre>";

         echo "<pre>";
           print_r($_FILES);
         echo "</pre>";


         $the_username = $_POST["username_edt"];
         $the_email = $_POST["email_edt"];
         $the_password = $_POST["password_edt"];
         $the_age = $_POST["age_edt"];
         $the_location = $_POST["location_edt"];

 		if(!empty($_FILES["img_prof"]['name'])){
 			// Récupération des informations sur l'image

 			$img_name = $_FILES["img_prof"]["name"];
 			$img_type = $_FILES["img_prof"]["type"];
 			$img_size = $_FILES["img_prof"]["size"];
 			$img_data = addslashes(file_get_contents($_FILES["img_prof"]["tmp_name"]));
 		}else {
       echo "img empty";
     }

 		if(empty($the_username) || strlen($the_username) < 5){
 			header("location: page_profile.php?err_or_e_c=the username is required and should large more then 5 chars.#sign_in_div_con");
 			exit();
 		}elseif(empty($the_email) || strpos($the_email, "@") === false || strpos($the_email, ".") === false){
 			header("location: page_profile.php?err_or_e_c=the email is required and should valid email puisque should include '@' , '.' .#sign_in_div_con");
 			exit();
 		}elseif(empty($the_password) || strlen($the_password) < 8){
 			header("location: page_profile.php?err_or_e_c=the password is required and should more then 8 chars.#sign_in_div_con");
 			exit();
 		}else{

 			// Préparation et exécution de la requête
 			// $query = "INSERT INTO user (username, email, password, age, location, img_data, img_name, img_type, img_size) VALUES ('$the_username','$the_email','$the_password','$the_age','$the_location','$img_data', '$img_name', '$img_type', '$img_size')";

      // Requête SQL pour mettre à jour la ligne avec l'ID correspondant
      $sql = "UPDATE user SET username='$the_username', email='$the_email', password='$the_password', age='$the_age', location='$the_location', img_data='$img_data', img_name='$img_name', img_type='$img_type', img_size='$img_size' WHERE id=$id_user_prof";

 			if (mysqli_query($conn, $sql)) {
 				echo "L'image a été enregistrée avec succès dans la base de données.";
         header("location: page_profile.php?good_news_e_c=votre compte a été modifee avec succès dans la base de données.");
   			exit();
 			} else {
 				echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
         header("location: page_profile.php?err_or_e_c=votre compte <strong> ne pas </strong> modifee avec succès dans la base de données.#sign_in_div_con");
   			exit();
 			}

 		}


 		mysqli_close($conn);


     }else {
       header("location: page_profile.php?err_or_e_c=we have an error!");
       exit();
     }
  ?>
