
    <style media="screen">
    		/* section *{
    			margin: 10px;
    		} */
    		.para_err{
            background-color: #ffd6cc;
            color: #ff3300;
            padding: 5px;
            margin: 10px auto;
            border-radius: 10px;
    			  display: inline-block;
        }
    </style>

    <div class="the_body">
            <div class="di_container">
                <!-- <div class="di_info">
                    <div class="di_tit_h1">
                        <h1>welcome</h1>
                    </div>
                    <div class="di_para_tit">
                        <p id="di_para_tit_si_para_con">you can enter by use email address.</p>
                        <p id="di_para_tit_si_para" style="display: none;">please enter your informations.</p>
                    </div>
                    <div class="option_de_connection">
                        <div class="btn_opt">
                            <button id="btn_si_conn" class="inp_btn">sign in</button>
                        </div>
                        <div class="btn_opt">
                            <button id="inp_btn_sign_up" class="inp_btn">sign up</button>
                        </div>
                    </div>
                </div> -->
                <section title="connection_compte">
                  <form class="form" action="index.html" method="post">

                  </form>
                </section>
                <section title="register_compte" class="sec_1">
                  <form class="form_1" action="admin_v2.php" method="post" enctype="multipart/form-data">
                      profile : <input type="file" name="img" value=""><br>
                      username : <input type="text" name="username" value=""><br>
                  		<?php if(isset($_GET["err_un"])){ ?>
                  			<p class="para_err"> <?php echo $_GET["err_un"] ; ?> </p><br>
                  		<?php } ?>
                      email : <input type="email" name="email" value=""><br>
                  		<?php if(isset($_GET["err_em"])){ ?>
                  			<p class="para_err"> <?php echo $_GET["err_em"] ; ?> </p><br>
                  		<?php } ?>
                      password : <input type="password" name="password" value=""><br>
                  		<?php if(isset($_GET["err_psw"])){ ?>
                  			<p class="para_err"> <?php echo $_GET["err_psw"] ; ?> </p><br>
                  		<?php } ?>
                      age : <input type="number" name="age" value=""><br>
                      location : <input type="text" name="location" value=""><br>
                      <input type="submit" name="sbt" value="submit"><br>
                  </form>
                </section>
          </div>
      </div>

  </body>
</html>
