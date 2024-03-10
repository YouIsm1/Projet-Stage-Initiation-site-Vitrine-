

<?php
    include "j_cn_db.php";

    $a=0;

    if (empty($a)) {
      echo "a empty";
    } else {
      echo "a not empty";
    }

    if (isset($a)) {
      echo "<br> a set";
    } else {
      echo "<br> a not set";
    }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <form class="" action="reg_art_test.php" method="post" enctype="multipart/form-data">
       <input type="file" name="file_img" value=""><br>
       <input type="submit" name="sbt" value="save">
     </form>

   </body>
 </html>

 <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['sbt'])) {
  if (isset($_FILES['file_img'])) {
    echo "inp  are set <br>";
    if (empty($_FILES['file_img']['name'])) {
      echo "inp are empty , true <br>";
    } else {
      echo "inp not empty , false <br>";
    }

  } else {
    echo "inp not set <br>";
  }
} else {
  echo "not yet";
}


  ?>
