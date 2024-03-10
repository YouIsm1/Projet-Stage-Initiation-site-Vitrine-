<?php
  session_start();

 ?>
 
<?php

    include "j_cn_db.php";

    if (isset($_POST["password"]) && isset($_POST["email"])){

        $the_email = $_POST["email"];
        $the_password = $_POST["password"];

        if (empty($the_email) || empty($the_password)) {
            header("location: page_connection.php?err_or=email, and password are required");
            exit();

        } else {

            if (strpos($the_email, "@") === false || strpos($the_email, ".") === false){
                header("location: page_connection.php?er_ea=incoorrect email");
                exit();
            }

            if (strlen($the_password) < 8 ) {
                header("location: page_connection.php?er_ps=password doit etre more then 8 chars");
                exit();
            }

            $sql = "SELECT * FROM user ";
            $res = mysqli_query($conn,$sql);

            if ($res) {

                // creer un table vide pour stocker emails
                $email_array = array();

               while ($row = mysqli_fetch_assoc($res)) {
                    // boucle pour stocker emails d'apres db
                    $email_array[] = $row['email'];
                    // echo "<pre>";
                    //     print_r($row);
                    // //     print_r($email_array);
                    // echo "</pre>";
               }

               echo "<pre>";
                    // print_r($row);
                    print_r($email_array);
                echo "</pre>";

                // Vérifier si l'adresse e-mail est présente dans le tableau

                if (in_array($the_email, $email_array)) {
                    echo "L'adresse e-mail existe dans la base de données.";

                    $sql = "SELECT * FROM user WHERE email = '$the_email'";
                    $res_2 = mysqli_query($conn,$sql);

                    if ($res_2) {
                       $row_2 = mysqli_fetch_assoc($res_2);

                            //    echo "<pre>";
                            //         print_r($row_2);
                            // //         print_r($email_array);
                            //     echo "</pre>";

                       echo "<br>".$row_2['password'];
                       if ($the_password === $row_2['password']) {
                            // $sql_3 = "SELECT username FROM user WHERE email = '$the_email'";
                            // $res_3 = mysqli_query($conn,$sql_3);
                            // if ($res_3) {
                            //     $row_3 = mysqli_fetch_assoc($res_3);
                                echo "<br> welcome " . $row_2['username'];
                                // Affichage de l'image
                                echo '<br><img style="width:200px;" src="data:' . $row_2['img_type'] . ';base64,' . base64_encode($row_2['img_data']) . '" alt="Image depuis la base de données"><br><br>';
                            // } else {

                            // }
                       } else {
                            echo "<br> password incorrcte";
                            header("location: page_connection.php?er_emex_ps=email deja exister mais password incorrect.<br> essay une autre fois.");
                            exit();
                       }

                    }


                } else {
                    echo "L'adresse e-mail n'existe pas dans la base de données.";
                    header("location: page_connection.php?er_ea_exps=email pas exister");
                    exit();
                }


            }

        }


    }else{
        header("location: page_connection.php?err_or=we face some problemes return anthore time.");
        exit();
    }

?>
