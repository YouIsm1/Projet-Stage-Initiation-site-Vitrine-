<?php

    include "db_conn.php";

    // if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){

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
        $img_name = $_FILES["img"]["name"];
        $img_type = $_FILES["img"]["type"];
        $img_size = $_FILES["img"]["size"];
        $img_data = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));


        // Préparation et exécution de la requête
        $query = "INSERT INTO user (username, email, password, age, location, img_data, img_name, img_type, img_size) VALUES ('$the_username','$the_email','$the_password','$the_age','$the_location','$img_data', '$img_name', '$img_type', '$img_size')";

        if (mysqli_query($conn, $query)) {
            echo "L'image a été enregistrée avec succès dans la base de données.";
        } else {
            echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
        }


    // }else {
      // header("location: di_connection.php");
      // exit();
    // }



   //  // Préparation et exécution de la requête
   // $query = "INSERT INTO user (username, email, password, age, location) VALUES (?, ?, ?, ?, ?)";
   //
   // // Prepare the statement
   // $stmt = mysqli_prepare($conn, $query);
   //
   // if ($stmt === false) {
   //     echo "Error preparing the statement: " . mysqli_error($conn);
   // } else {
   //     // Bind parameters
   //     mysqli_stmt_bind_param($stmt, "sssis", $the_username, $the_email, $the_password, $the_age, $the_location);
   //
   //     // Execute the statement
   //     if (mysqli_stmt_execute($stmt)) {
   //         echo "L'info a été enregistrée avec succès dans la base de données.";
   //     } else {
   //         echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
   //     }
   //
   //     // Close the statement
   //     mysqli_stmt_close($stmt);
   // }
   //

  //  // Préparation et exécution de la requête
  // $query = "INSERT INTO user ( img_data, img_name, img_type, img_size) VALUES (?, ?, ?, ?)";
  //
  // // Prepare the statement
  // $stmt = mysqli_prepare($conn, $query);
  //
  // if ($stmt === false) {
  //     echo "Error preparing the statement: " . mysqli_error($conn);
  // } else {
  //     // Bind parameters
  //     mysqli_stmt_bind_param($stmt, "bssi", $img_data, $img_name, $img_type, $img_size);
  //
  //     // Execute the statement
  //     if (mysqli_stmt_execute($stmt)) {
  //         echo "L'img a été enregistrée avec succès dans la base de données.";
  //     } else {
  //         echo "Erreur lors de l'enregistrement de l'image : " . mysqli_error($conn);
  //     }
  //
  //     // Close the statement
  //     mysqli_stmt_close($stmt);
  // }


  // // Requête SQL avec des marqueurs de paramètres (?)
  // $query = "INSERT INTO user (img_data, img_name, img_type, img_size) VALUES (?, ?, ?, ?)";
  //
  // // Création de l'instruction préparée
  // $stmt = mysqli_prepare($conn, $query);
  //
  // // Vérification si l'instruction préparée a réussi
  // if ($stmt) {
  //     // Lier les valeurs aux marqueurs de paramètres
  //     mysqli_stmt_bind_param($stmt, "bssi", $img_data, $img_name, $img_type, $img_size);
  //
  //     // Conversion de l'image en données binaires
  //     // $image_data = file_get_contents('$_FILES["img"]["tmp_name"];'); // Remplacez par votre logique pour obtenir les données binaires de l'image
  //
  //     // Exécution de l'instruction préparée
  //     if (mysqli_stmt_execute($stmt)) {
  //         echo "Enregistrement inséré avec succès.";
  //     } else {
  //         echo "Erreur lors de l'insertion : " . mysqli_error($conn);
  //     }
  //
  //     // Fermer l'instruction préparée
  //     mysqli_stmt_close($stmt);
  //
  //     // Fermer l'instruction préparée
  //     mysqli_stmt_close($stmt);
  // } else {
  //     echo "Erreur lors de la préparation de l'instruction : " . mysqli_error($conn);
  // }

 ?>
