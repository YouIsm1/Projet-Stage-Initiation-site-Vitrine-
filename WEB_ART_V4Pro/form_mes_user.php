<?php

    if (isset($_POST['username_mes']) || isset($_POST['email_mes']) || isset($_POST['objectif_mes']) || isset($_POST['messages'])) {

      $from_email = $_POST['email_mes'];
      $from_username = $_POST['username_mes'];
      $from_obj = $_POST['objectif_mes'];
      $from_mesg = $_POST['messages'];

      if(empty($from_username)){
  			header("location: page_connection.php?err_un_mes=the username is required.#contact_us");
  			exit();
  		}elseif(empty($from_email) || strpos($from_email, "@") === false || strpos($from_email, ".") === false){
  			header("location: page_connection.php?err_em_mes=the email is required and should valid email puisque should include '@' , '.' .#contact_us");
  			exit();
      }elseif (empty($from_obj)) {
        header("location: page_connection.php?err_from_obj=the object is required.#contact_us");
  			exit();
      }elseif (empty($from_mesg)) {
        header("location: page_connection.php?err_from_mesg=the message is required.#contact_us");
  			exit();
      }else {

        $to = 'elwafiyoussef82@gmail.com';
        $subject = 'Email from form footer.';
        $message = "Hello, this user : $from_username,\nsent from this email : $from_email,\nabout object : $from_obj,\nwhen the message is :\n\n $from_mesg.";
        $headers = "From: $from_email\r\n";
        $headers .= "Reply-To: $from_email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo " Email sent successfully! to $to ";
            header("location: page_connection.php?g_n=Email sent successfully!#contact_us");
      			exit();
        } else {
            echo 'Error sending email. Please check your configuration.';
            header("location: page_connection.php?err_or=Error sending email. Please check your configuration.#contact_us");
      			exit();
        }
      }




    } else {
      echo "probleme_0";
      header("location: page_connection.php?err_or= We encountered some problems, let's return another time.#footer_id");
			exit();
    }

?>
