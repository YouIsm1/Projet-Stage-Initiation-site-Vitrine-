<?php
   // if (!isset($_GET['id']) || empty($_GET['id'])) {
   //   echo "no id existe!";
   // } else {
   //   $id_ex = urldecode($id);
   //   $sql = "SELECT * FROM user WHERE id = '$id_ex'";
   //
   //   if (mysqli_query($conn, $sql)) {
   //     echo "string";
   //   } else {
   //     echo "not string";
   //   }
   // }

   function coll_data_user($id, $conn){
     // if (isset($_GET['id']) && !empty($_GET['id'])) {
     //   // Use urldecode() to decode the 'id' query parameter
     //   $id_ex = urldecode($_GET['id']);

     // $id_ex = $id;
     $id_ex = mysqli_real_escape_string($conn, $id); // Sanitize the user ID to prevent SQL injection

       // Now you can use $id_ex to query the database and retrieve the user's information
       // Make sure to properly sanitize and validate the user ID before using it in the database query

       // Example of querying the database with the decoded user ID (Assuming you have a connection to the database)
       $sql = "SELECT * FROM user WHERE id = '$id_ex'";

       $res = mysqli_query($conn, $sql);

       if ($res) {
           $row = mysqli_fetch_assoc($res);
           // echo "User information retrieved successfully.".$row['id'];
           return $row;
       } else {
           echo "Failed to retrieve user information.";
       }
     // } else {
     //     echo "No user ID found in the query parameter.";
     // }
  }

 ?>
