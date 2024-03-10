
        <style>
            .the_footer{
                text-align: center;
                margin-bottom: 0px;
                background-color: whitesmoke;
                padding: 20px;
                padding-bottom: 0px;
                /* background-image: url("media/img_s/img_2.jpg"); */
                /* background-repeat: no-repeat; */
                /* background-attachment: fixed; */
                background-size: cover;
                color: black;
                border-top: 2px solid black;
            }

            .logo_name_f{
                /* display: inline-block; */
                /* vertical-align: middle; */
                padding: 0px 10px;
                text-shadow: 2px 2px 8px #888888;
                border-radius: 20px;
                border-bottom: 2px solid black;
            }
            .the_logo_f{
                display: inline-block;
            }
            .the_name_f{
                display: inline-block;
                margin: 0px 10px;
                text-transform: capitalize;
                border-radius: 30px;
            }
            .the_name_f a{
                text-decoration: none;
                color: black;
            }
            .title{
                text-transform: capitalize;
            }
            .para_gdn_mes{
                background-color: #d6ffcc;
                color: #00e600;
                padding: 5px;
                margin: 10px auto;
                border-radius: 10px;
                width: 80%;
                /* width:170px; */
            }
            form .inp_t{
                border: none;
                border-radius: 10px;
                margin-bottom: 10px;
                margin-top: 10px;
                padding: 10px;
                background-color: white;

            }
            .btn_sbt:hover{
                background-color: rgb(75, 225, 0);
                color: white;
            }
            .btn_rst:hover{
                background-color: rgb(225, 75, 0);
                color: white;
            }
            .para_error{
                background-color: #ffd6cc;
                color: #ff3300;
                padding: 5px;
                margin: 10px auto;
                border-radius: 10px;
                width:170px;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">

        <style>
            ul{
                padding-inline-start: 0em;
            }
            .item_end{
                display: inline-block;
                padding: auto;
            }
            .icon_wtp{
                color: black;
                font-size: 30px;
            }
            .icon_wtp:hover{
                 color: rgb(37, 211, 102);
            }
            .icon_fcb:hover{
                color: rgb(59, 89, 152);
            }
            .icon_call:hover{
                color: white;
            }
            .icon_email:hover{
                color: rgb(0, 120, 212);
            }
            .ti_end{
                letter-spacing: 3px;
                text-transform: uppercase;
            }
            .di_cantacte{
                display: inline-block;
                vertical-align: middle;
                margin: 0px 10px;
            }



            .the_end{
              border-top: 2px solid black;
              border-radius: 20px;
            }
            .di_block_2{
              display: flex;
              flex-direction: row;
              margin: 20px;
            }
            .di_block_2 > div{
              width: 600px;
            }
            .info_to_cnt_il{
              list-style-type: none;
              text-align: justify;
              /* margin-left: 160px; */
              background-color: white;
              border-radius: 20px;
              padding: 10px;
              /* display: flex; */
              /* flex-direction: column; */
              display: inline-block;
            }
            .info_to_cnt_il > li{
              font-size: 20px;
            }
            /* .icon_s{
              font-size: 30px;
            } */
            li > a{
              text-decoration: none;
              color: black;
            }
        </style>

        <footer class="the_footer" id="footer_id">
            <div class="the_container" >
                <div class="logo_name_f">
                    <div class="the_logo_f">
                        <!-- <img src="" alt="logo" srcset=""> -->
                    </div>
                    <div class="the_name_f">
                        <!-- <h2><a href="page_acceuil.php">something / <?php echo getFileNameWithoutExtension($_SERVER["PHP_SELF"]); ?></a></h2> -->
                        <h2><a href="page_acceuil.php">SOMETHING</a></h2>
                    </div>
                    <?php
                        // function getFileNameWithoutExtension($path)
                        // {
                        //     // Récupérer le nom de base du fichier sans le chemin
                        //     $fileName = basename($path);

                        //     // Récupérer le nom du fichier sans extension
                        //     $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

                        //     return $fileNameWithoutExtension;
                        // }
                    ?>
                </div>
                <div class="di_block_2">
                  <div class="">
                      <div class="">
                          <h2 class="title">are we ?</h2>
                          <p>This just a web site for stocking some articles.</p>
                          <details>
                              <summary>more details!</summary>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil nam natus vel doloribus animi eligendi! Soluta, sit quas consequuntur tenetur qui quisquam molestias, laborum, blanditiis quaerat in enim fugiat quam?</p>
                          </details>
                      </div>
                      <div class="info_to_cnt">
                        <h3>Informations about us.</h3>
                        <ul class="info_to_cnt_il">
                          <li><span class="mdi mdi-map-marker-radius icon_s"></span> : location ------------.</li>
                          <li><span class="mdi mdi-phone-outline icon_s"></span> : +212 690874619 </li>
                          <li><a href="mailto: youssefelwafi77@gmail.com"> <span class="mdi mdi-email-outline icon_s"></span> </a> : youssefelwafi77@gmail.com </li>
                        </ul>
                      </div>
                  </div>
                  <div class="info_s_a_us contact_us" id="contact_us">
                      <h2 class="title">cantact us</h2>
                      <p>we provide many options to contact us for more information or services.</p>

                      <?php if (isset($_GET['g_n'])) { ?>
                          <p class="para_gdn_mes"> <?php echo $_GET["g_n"]; ?> </p>
                      <?php } ?>

                      <?php if (isset($_GET["err_or"])) { ?>
                          <p class="para_error"><?php echo $_GET["err_or"] ; ?></p>
                      <?php } ?>

                      <form action="form_mes_user.php" method="post">
                          <input class="inp_t" type="text" name="username_mes" placeholder="full name"><br>
                          <?php if (isset($_GET["err_un_mes"])) { ?>
                              <p class="para_error"><?php echo $_GET["err_un_mes"] ; ?></p>
                          <?php } ?>

                          <input class="inp_t" type="email" name="email_mes" placeholder="email address"><br>
                          <?php if (isset($_GET["err_em_mes"])) { ?>
                              <p class="para_error"><?php echo $_GET["err_em_mes"] ; ?></p>
                          <?php } ?>

                          <input class="inp_t" type="text" name="objectif_mes" placeholder="objectif"><br>
                          <?php if (isset($_GET["err_from_obj"])) { ?>
                              <p class="para_error"><?php echo $_GET["err_from_obj"] ; ?></p>
                          <?php } ?>

                          <textarea class="inp_t" name="messages" id="" cols="20" rows="10"></textarea><br>
                          <?php if (isset($_GET["err_from_mesg"])) { ?>
                              <p class="para_error"><?php echo $_GET["err_from_mesg"] ; ?></p>
                          <?php } ?>

                          <input class="inp_t btn_sbt" type="submit" name="sbt_mes">
                          <input class="inp_t btn_rst" type="reset" name="sbt_mes">
                      </form>

                  </div>
                </div>

                <div class="the_end">
                  <h3 class="title di_cantacte" style="display:inline-block">to follow us </h3>
                  <div class="di_cantacte">
                      <nav class="the_nav_end">
                          <ul type="none">
                              <li class="item_end">
                                  <a href="https://web.whatsapp.com"> <span class="mdi mdi-whatsapp icon_wtp"></span>  </span> </a>
                              </li>
                              <li class="item_end">
                                  <a href="https://www.facebook.com"> <span class="mdi mdi-facebook icon_wtp icon_fcb"> </span> </a>
                              </li>
                              <!-- <li class="item_end">
                                  <a href="tel : +212 690874619"> <span class="mdi mdi-phone-outline icon_wtp icon_call"></span> </span> </a>
                              </li> -->
                              <li class="item_end">
                                  <a href="mailto: youssefelwafi77@gmail.com"> <span class="mdi mdi-email-outline icon_wtp icon_email"></span> </a>
                              </li>
                          </ul>
                      </nav>
                  </div>
                  <div class="ti_end di_cantacte">
                      <h3 class="tih3_1_end"> something <span class="mdi mdi-copyright"></span> COPYRIHT</h3>
                  </div>
                </div>
            </div>
        </footer>
