
        <style>
            *{
              color: black;
            }
            body{
                margin: 0px;
            }
            header{
                background-color: whitesmoke;
                /* margin-bottom: 20px; */
                /* background-image: url("media/img_s/img_3.jpg"); */
                /* background-repeat: no-repeat; */
                /* background-attachment: fixed; */
                /* background-size: cover; */
                color: black;
                padding: 5px;
                border-bottom: 2px solid black;

                /* display: flex; */
                /* flex-direction: row; */
            }
            .di_head{
                text-align: center;
            }
            .the_name a{
                text-decoration: none;
                color: black;
            }
            .logo_name{
                display: inline-block;
                vertical-align: middle;
                /* padding: 10px; */
                text-shadow: 2px 2px 8px #888888;
                border-radius: 20px;
            }
            .the_logo{
                display: inline-block;
            }
            .the_name{
                display: inline-block;
                /* margin: 10px; */
                /* padding: 10px; */
                text-transform: capitalize;
                border-radius: 30px;
            }
            .navigation{
                display: inline-block;
                vertical-align: middle;
            }
            .the_links{
                padding-inline-start: 0px;
                margin-block-start: 0em;
                margin-block-end: 0em;
            }
            .links{
                display: inline-block;
                margin: 20px;
                text-transform:capitalize;
                padding: 10px;
                margin-block-start: 0em;
                margin-block-end: 0em;
            }
            .links a{
                text-decoration: none;
                color: black;
            }
            .links:hover{
                background-color: white;
                color: black;
                border-radius: 10px;
                padding: 10px;
            }

            /* .the_logo{
                width: 200px;
            } */
            /* .logo{
                width: 90%;
            } */
        </style>



                    <header class="di_head">
                        <div class="logo_name">
                            <div class="the_logo">
                                <!-- <img class="logo" src="media/img_s/logo_v2.png" alt="" srcset=""> -->
                            </div>
                            <div class="the_name">
                                <h2><a href="page_acceuille.php">SOMETHING / <?php echo getFileNameWithoutExtension($_SERVER["PHP_SELF"]); ?></a></h2>
                            </div>
                        </div>

                        <?php
                            function getFileNameWithoutExtension($path)
                            {
                                // Récupérer le nom de base du fichier sans le chemin
                                $fileName = basename($path);

                                // Récupérer le nom du fichier sans extension
                                $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

                                return $fileNameWithoutExtension;
                            }
                        ?>

                        <div class="navigation">
                            <nav class="the_nav">
                                <ul class="the_links">
                                    <li class="links"><a href="page_acceuille.php">Home</a></li>
                                    <li class="links"><a href="page_produit.php">products</a></li>
                                    <!-- <li class="links"><a href="a_propose.php">a propos de nous</a></li> -->
                                    <?php
                                      if (isset($_SESSION["id_user"])) {
                                          // User is logged in, show the profile link
                                          echo '<li class="links"><a href="page_profile.php">profile</a></li>';
                                      } else {
                                          // User is not logged in, show the connection link
                                          echo '<li class="links"><a href="page_connection.php">connection</a></li>';
                                      }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </header>
