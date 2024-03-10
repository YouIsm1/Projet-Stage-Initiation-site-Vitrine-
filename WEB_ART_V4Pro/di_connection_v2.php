
    <style media="screen">
      .the_body{
        text-align: center;
      }
      .di_container{
        /* display: flex; */
        /* display: inline-block; */
        /* flex-direction: row; */
        margin: 20px;
      }
      .di_container > .di_info{
        margin: 10px;
        vertical-align: top;
        /* background-color: rgba(242, 242, 242, 0.509); */
        background-color: whitesmoke;
        border-radius: 20px;
        color: black;
        padding: 20px;
        display: inline-block;
        border: none;
      }

      .btn_opt{
          display: inline-block;
      }
      .inp_btn{
          margin: 10px;
          padding: 10px;
          border-radius: 20px;
          border: none;
          background-color: white;
      }
      .inp_btn:hover {
          background-color: rgb(75, 225, 0);
          color: white;
      }
      input{
          margin: 10px;
          padding: 10px;
          border-radius: 20px;
          border: none;
          /* display: flex; */
		      border: 1px solid black;
      }
      form > .di_img_pro{
        /* background-color: white; */
        border-radius: 20px;
        padding: 10px;
      }

      form{
        position: relative;
      }

      .di_img_pro input{
        position: absolute;
        z-index: -1;
        width: 0;
        height: 0;
        opacity: 0;
      }
      .di_img_pro label{
        /* background-color: whitesmoke; */
        color: black;
        border-radius: 20px;
        /* border: 1px solid black; */
      }

      .para_error{
          background-color: #ffd6cc;
          color: #ff3300;
          padding: 5px;
          margin: 10px auto;
          border-radius: 10px
      }
      .para_gdn{
          background-color: #d6ffcc;
          color: #00e600;
          padding: 5px;
          margin: 10px auto;
          border-radius: 10px
      }
    </style>

            <div class="the_body">
                    <div class="di_container">

                        <div class="di_info">
                            <div class="di_tit_h1">
                                <h1>welcome</h1>
                            </div>
                            <div class="di_para_tit">
                                <p id="di_para_tit_si_para_con">you can enter by use email address.</p>
                                <p id="di_para_tit_si_para" style="display: none;">please enter your informations.</p>
                            </div>
                            <div class="option_de_connection">
                                <div class="btn_opt">
                                    <button id="btn_si_conn" class="inp_btn">sign up</button>
                                </div>
                                <div class="btn_opt">
                                    <button id="inp_btn_sign_up" class="inp_btn">sign in</button>
                                </div>
                            </div>
                        </div>



                        <div id="di_sign_up" class="di_info di_the_form_connention">

                            <form action="sign_up_v2_profile.php" method="post">
                                <?php if (isset($_GET["err_or"])) { ?>
                                    <p class="para_error"><?php echo $_GET["err_or"] ; ?></p>
                                <?php } ?>

                                <?php if(isset($_GET["err_un"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_un"] ?></p>
                                <?php } ?>

                                <?php if(isset($_GET["err_em"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_em"] ?></p>
                                <?php } ?>

                                <?php if(isset($_GET["err_psw"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_psw"] ?></p>
                                <?php } ?>

                                <?php if(isset($_GET["er_ea_exps"])) { ?>
                                        <p class="para_error"><?php echo $_GET["er_ea_exps"] ?></p>
                                <?php } ?>

                                <div class="di_user_name">
                                    <input placeholder="type your email" type="email" name="email">
                                </div>
                                <div class="pass_word">
                                    <input placeholder="type your password" type="password" name="password" class="psw"><br>
                                    <!-- <input type="checkbox" class="rd_man_psw"> -->
                                    <!-- <p class="p_s_rd_man_psw para_aff" style="display:inline-block;">afficher</p> <p class="p_s_rd_man_psw para_mas" style="display:none;">masquer</p> <br> -->
                                </div>

                                <?php if(isset($_GET["er_emex_ps"])) { ?>
                                        <p class="para_error"><?php echo $_GET["er_emex_ps"] ?></p>
                                <?php } ?>

                                <div class="di_submit">
                                    <input class="inp_btn" type="submit">

                                    <?php if (isset($_GET["good_news"])) { ?>
                                        <p class="para_gdn"><?php echo $_GET["good_news"] ; ?></p>
                                    <?php } ?>

                                </div>
                            </form>


                        </div>




                        <div id="sign_in_div_con" class="di_info sign_in_div" style="display: none;">
                            <div class="form">

                                <?php if (isset($_GET["err_or"])) { ?>
                                    <p class="para_error"><?php echo $_GET["err_or"] ; ?></p>
                                <?php } ?>


                                <?php if (isset($_GET["good_news"])) { ?>
                                        <p class="para_gdn"><?php echo $_GET["good_news"] ; ?></p>
                                <?php } ?>




                                <form action="admin_v2.php" method="post" enctype="multipart/form-data">
                                    <div class="di_img_pro">
                                        <label class="inp_btn" for="photo"> select profile image </label><br>
                                        <!-- <input placeholder="img profile" type="file" name="photo_profile" id="photo" accept="image/*"><br> -->
                                        <input placeholder="img profile" type="file" name="img" id="photo"><br>
                                    </div>

                                    <input placeholder="username" name="username" type="text"><br>
                                    <?php if(isset($_GET["err_un"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_un"] ?></p>
                                    <?php } ?>

                                    <input placeholder="address email" type="email" name="email" id=""><br>
                                    <?php if(isset($_GET["err_em"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_em"] ?></p>
                                    <?php } ?>

                                    <input placeholder="password" name="password" type="password"><br>
                                    <!-- <input type="checkbox" class="rd_man_psw"> -->
                                    <!-- <p class="p_s_rd_man_psw para_aff" style="display:inline-block;">afficher</p> <p class="p_s_rd_man_psw para_mas" style="display:none;">masquer</p> <br> -->
                                    <?php if(isset($_GET["err_psw"])) { ?>
                                        <p class="para_error"><?php echo $_GET["err_psw"] ?></p>
                                    <?php } ?>

                                    <input placeholder="age" name="age" type="number"><br>
                                    <input placeholder="location" name="location" type="text"><br>
                                    <input class="inp_btn" type="submit">
                                </form>



                            </div>
                        </div>


                    </div>
                </div>


        <script>
            let btn_si_conn_js=document.getElementById("btn_si_conn");

            let di_sign_up_js = document.getElementById("di_sign_up");
            let di_para_tit_si_para_js = document.getElementById("di_para_tit_si_para");
            let di_para_tit_si_para_con_js = document.getElementById("di_para_tit_si_para_con");
            let sign_in_div_con_js = document.getElementById("sign_in_div_con");

            btn_si_conn_js.onclick=function(){
                console.log("yuuu");
                di_para_tit_si_para_js.style.display = "block";
                di_sign_up_js.style.display = "none";
                di_para_tit_si_para_con_js.style.display  = "none";
                sign_in_div_con_js.style.display = "inline-block";
            }

            let inp_btn_sign_up_js = document.getElementById("inp_btn_sign_up");

            inp_btn_sign_up_js.onclick = function(){
                di_sign_up_js.style.display = "inline-block";
                sign_in_div_con_js.style.display = "none";

                di_para_tit_si_para_con_js.style.display  = "block";
                di_para_tit_si_para_js.style.display = "none";
            }

            // let psw_js = document.getElementsByClassName("psw");
            // let rd_man_psw_js = document.getElementsByClassName("rd_man_psw");
            // let para_aff_js = document.getElementsByClassName("para_aff");
            // let para_mas_js = document.getElementsByClassName("para_mas");
            //
            // console.log(psw_js);
            // console.log(rd_man_psw_js);
            // console.log(para_aff_js);
            // console.log(para_mas_js);
            //
            // for (let i = 0; i < rd_man_psw_js.length; i++) {
            //
            //     rd_man_psw_js.onchange = function(){
            //         if (this.checked) {
            //             psw_js[i].type = "text";
            //             para_mas_js[i].style.display="inline-block";
            //             para_aff_js[i].style.display="none";
            //         } else {
            //             psw_js[i].type = "password";
            //             para_mas_js[i].style.display="none";
            //             para_aff_js[i].style.display="inline-block";
            //         }
            //     }
            //
            // }
        </script>
