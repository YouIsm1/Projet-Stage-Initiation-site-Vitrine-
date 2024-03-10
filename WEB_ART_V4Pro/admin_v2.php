<?php

    include "db_conn.php";

    // if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_FILES["img"])){
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_FILES["img"])){

        // Display the content of the $_POST array for debugging purposes

        echo "<pre>";
          print_r($_POST);
        echo "</pre>";

        echo "<pre>";
          print_r($_FILES);
        echo "</pre>";


        $the_username = $_POST["username"];
        $the_email = $_POST["email"];
        $the_password = $_POST["password"];
        $the_age = $_POST["age"];
        $the_location = $_POST["location"];

        // Récupération des informations sur l'image
       /*  $img_name = $_FILES["img"]["name"];
        $img_type = $_FILES["img"]["type"];
        $img_size = $_FILES["img"]["size"];
        $img_data = addslashes(file_get_contents($_FILES["img"]["tmp_name"])); */

    // if(!isset($_FILES["img"])){
    // if(empty($_FILES["img"])){
		if(!empty($_FILES["img"]['name'])){
			// Récupération des informations sur l'image
      // echo "img empty";

			$img_name = $_FILES["img"]["name"];
			$img_type = $_FILES["img"]["type"];
			$img_size = $_FILES["img"]["size"];
			$img_data = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
		}else {
      echo "img empty";
    }

		if(empty($the_username) || strlen($the_username) < 5){
			header("location: page_connection.php?err_un=the username is required and should large more then 5 chars.#sign_in_div_con");
			exit();
		}elseif(empty($the_email) || strpos($the_email, "@") === false || strpos($the_email, ".") === false){
			header("location: page_connection.php?err_em=the email is required and should valid email puisque should include '@' , '.' .#sign_in_div_con");
			exit();
		}elseif(empty($the_password) || strlen($the_password) < 8){
			header("location: page_connection.php?err_psw=the password is required and should more then 8 chars.#sign_in_div_con");
			exit();
		}else{

			// Préparation et exécution de la requête
			$query = "INSERT INTO user (username, email, password, age, location, img_data, img_name, img_type, img_size) VALUES ('$the_username','$the_email','$the_password','$the_age','$the_location','$img_data', '$img_name', '$img_type', '$img_size')";

			if (mysqli_query($conn, $query)) {
				echo "L'image a été enregistrée avec succès dans la base de données.";
        header("location: page_connection.php?good_news=votre compte a été enregistrée avec succès dans la base de données.");
  			exit();
			} else {
				echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
        header("location: page_connection.php?err_or=votre compte <strong> ne pas </strong> enregistrée avec succès dans la base de données.#sign_in_div_con");
  			exit();
			}

		}


		mysqli_close($conn);


    }else {
      header("location: page_connection.php?err_or=we have an error!");
      exit();
    }
 ?>
