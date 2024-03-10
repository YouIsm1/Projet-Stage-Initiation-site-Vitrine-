

<?php

  include "j_cn_db.php";

 ?>

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">


 <style media="screen">
    .icon_s_as{
      font-size: 30px;
      cursor: pointer;
      margin: 5px;
    }
    .icon_s_as:hover{
      /* background-color: white; */
      color: rgb(75, 225, 0);
      border-radius: 10px;
    }
    .aside_1{
      display: inline-block;
      background-color: whitesmoke;
      text-align: center;
      margin: 20px;
      margin-right: 10px;
      border-radius: 20px;
    }


    .article_1{
      width: 85%;
      display: inline-block;
      background-color: whitesmoke;
      border-radius: 20px;
      margin: 20px;
      margin-left: 10px;
      padding: 20px;
    }
    .div_icon{
      padding: 10px;
      margin: 20px auto;
    }
    .mid{
      vertical-align: top;
    }
    .ib{
      display: inline-block;
    }
    .img_prof{
      width: 200px;
      /* display: block; */
      border-radius: 50%;
    }
    .di_prof{
      width: 100%;
    }
    .img_name{
      /* display: flex; */
      /* justify-content: space-around; */
      /* justify-content: center; */
      /* flex-direction: column; */
      margin-bottom: 20px;
      text-align: center;

    }


    .autre_info{
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }
    .di_email{
      display: inline-block;
    }
    .in_p{
      border-radius: 20px;
      border: none;
      padding: 10px;
      margin: 5px;
    }

    .inp_t{
        border: none;
        border-radius: 10px;
        /* margin-bottom: 10px; */
        /* margin-top: 10px; */
        margin: 20px;
        padding: 10px;
        background-color: white;
    }
    .btn_sbt:hover *{
        background-color: rgb(75, 225, 0);
        color: white;
    }
    .btn_rst:hover{
        background-color: rgb(225, 75, 0);
        color: white;
    }
    .smp_link{
      text-decoration: none;
      color: black;
    }
    /* label{
      display: flex;
      justify-content: center;
      align-items: center;
    } */
    .wit{
      width: 300px;
    }
 </style>


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


    // if (isset($_GET['id']) && !empty($_GET['id'])) {
      if($_SESSION["id_user"]){

          // Use urldecode() to decode the 'id' query parameter
          // $id_ex = urldecode($_GET['id']);

          $id_ex = $_SESSION["id_user"];

          include "coll_data_user.php";

          $row = coll_data_user($id_ex, $conn);

        //
        //   // Now you can use $id_ex to query the database and retrieve the user's information
        //   // Make sure to properly sanitize and validate the user ID before using it in the database query
        //
        //   // Example of querying the database with the decoded user ID (Assuming you have a connection to the database)
        //   $sql = "SELECT * FROM user WHERE id = '$id_ex'";
        //
        //   $res = mysqli_query($conn, $sql);
        //   if ($res) {
        //       $row = mysqli_fetch_assoc($res);
        //       echo "User information retrieved successfully.".$row['id'];
        //   } else {
        //       echo "Failed to retrieve user information.";
        //   }

    } else {
        echo "No user ID found in the query parameter.";
    }

  ?>


<section>

  <aside class="aside_1 mid">
    <div class="div_icon">
      <span onclick="btn_comp_art('c')" id="comp" title="profile" class="mdi mdi-account-circle-outline icon_s_as"></span>
    </div>
    <div class="div_icon">
      <span onclick="btn_comp_art('a')" id="art" title="articles" class="mdi mdi-basket icon_s_as"></span>
    </div>
    <div class="div_icon">
      <!-- <span id="art" title="articles" class="mdi mdi-basket icon_s_as"></span> -->
      <!-- <span title="logout" class="mdi mdi-logout icon_s_as"></span> -->
      <a class="smp_link" href="log_out.php"><span title="logout" class="mdi mdi-logout icon_s_as"></span></a>
    </div>
    <div class="div_icon">
      <!-- <a class="smp_link" href="log_out.php"><span title="remove account" class="mdi mdi-account-cancel-outline icon_s_as"></span></a> -->
      <a class="smp_link" href="remove_account.php"><span title="remove account" class="mdi mdi-account-cancel icon_s_as"></span></a>
    </div>
    <div class="div_icon">
      <a class="smp_link" href="attestation_affiliation.php" target="_blank"><span title="affiliation certificate" class="mdi mdi-file-pdf-box icon_s_as"></span></a>
    </div>
    <div class="div_icon">
      <a class="smp_link" href="ajouter_cat_mar.php"><span title="add category" class="mdi mdi-shape-outline icon_s_as"></span></a>
    </div>
  </aside>

  <article id="art_1" class="article_1 mid">
    <div class="di_prof">

      <form class="" action="edt_info_user.php" method="post" enctype="multipart/form-data">

        <div style="text-align: center;" id="id_ann_para" class="ann_para">

            <?php if (isset($_GET["good_news_e_c"])) { ?>
                <p class="para_gdn"><?php echo $_GET["good_news_e_c"] ; ?></p>
            <?php } ?>



            <?php if (isset($_GET["err_or_e_c"])) { ?>
                <p class="para_error"><?php echo $_GET["err_or_e_c"] ; ?></p>
            <?php } ?>

        </div>

        <div class="img_name">
          <div class="di_img_prof">
            <?php echo '<img class="img_prof" src="data:' . $row['img_type'] . ';base64,' . base64_encode($row['img_data']) . '" alt="Image depuis la base de données">'; ?>
          </div>
          <div class="di_email img_name">
            <input style="text-align: center;" title="img profile" class="in_p" type="file" name="img_prof">
          </div>
        </div>
        <hr style="width:70%;">

        <div class="autre_info">
          <div class="name_prof">
            <input title="username" class="in_p" type="text" name="username_edt" value="<?php echo $row['username']; ?>">
          </div>
          <div class="di_email">
            <input title="email" class="in_p" type="email" name="email_edt" value="<?php echo $row['email']; ?>">
          </div>
          <div class="di_email">
            <input title="password" class="in_p" type="text" name="password_edt" value="<?php echo $row['password']; ?>">
          </div>
          <div class="di_email">
            <input title="location" class="in_p" type="text" name="location_edt" value="<?php echo $row['location']; ?>">
          </div>
          <div class="di_email">
            <input title="age" class="in_p" type="number" name="age_edt" value="<?php echo $row['age']; ?>">
          </div>
        </div>
        <div class="autre_info btn_s">
          <input class="btn_rst inp_t" type="reset" name="rst" value="annuler">
          <input class="btn_sbt inp_t" type="submit" name="sbt" value="save">
        </div>
      </form>
    </div>
  </article>

  <style media="screen">

    .di_art_s{
      /* display: flex;
      justify-content: center;
      align-items: center; */
      text-align: center;
    }
    #art_2{
      display: none;
    }
    .art_info{
      display: none;
      margin-top: 20px;
    }
    label{
      margin: 20px;
      /* display: flex; */
    }
    /* label:hover{
      color: white;
    } */

  </style>

  <link rel="stylesheet" href="form_style.css">

  <article id="art_2" class="article_1">
    <div class="di_art_s">

        <div id="id_ann_para" class="ann_para">

          <?php if (isset($_GET["good_news"])) { ?>
              <p class="para_gdn"><?php echo $_GET["good_news"] ; ?></p>
          <?php } ?>



          <?php if (isset($_GET["err_or"])) { ?>
              <p class="para_error"><?php echo $_GET["err_or"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pn"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pn"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pd"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pd"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pp"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pp"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pm"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pm"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pc"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pc"] ; ?></p>
          <?php } ?>

          <?php if (isset($_GET["err_pi"])) { ?>
              <p class="para_error"><?php echo $_GET["err_pi"] ; ?></p>
          <?php } ?>

        </div>



        <!-- /////////////////////article//////////////////// -->

        <?php

          // include "admin_art.php";
          include "admin_art_v2.php";

          $articles = aff_art($conn, $id_ex);
          aff_art_info($articles, $conn);

        ?>

        <div class="di_btn">
          <button class="input inp_t btn_sbt" id="btn_add_art" type="button" name="add_art"> add articles </button>
        </div>

        <div id="id_art_info" class="art_info containner">

          <!-- <form class="" action="reg_art_test.php" method="post" enctype="multipart/form-data"> -->
          <form class="" action="reg_art.php" method="post" enctype="multipart/form-data">
            <div class="img_file" id="id_img_file">
              <!-- <label  title="add img"  id="btn_add_img" class="input inp_t btn_sbt"><span class="mdi mdi-file-image-plus add_img_cl"></span> <p>ajouter des img pour votre article</p> </label><br><br> -->
                <label  title="add img"  id="btn_add_img" class="input inp_t btn_sbt wit"><span class="mdi mdi-file-image-plus add_img_cl"></span>  add images to your article </label><br><br>
                <!-- <input class="input inp_file" type="file" name="img_art_n[]" multiple id="img_art_i" value=""><br> -->
                <!-- <input class="input" type="file" name="img_art_n[]" multiple id="img_art_i" value=""><br> -->
                <?php if (isset($_GET["err_pi"])) { ?>
                    <p class="para_error wit"><?php echo $_GET["err_pi"] ; ?></p>
                <?php } ?>
            </div>
            <input class="input wit" type="text" name="name_art" placeholder="name of article" value=""><br>
            <?php if (isset($_GET["err_pn"])) { ?>
                <p class="para_error wit"><?php echo $_GET["err_pn"] ; ?></p>
            <?php } ?>

            <textarea class="input wit" name="desc_art" placeholder="description of article" rows="8" cols="20"></textarea><br>
            <?php if (isset($_GET["err_pd"])) { ?>
                <p class="para_error wit"><?php echo $_GET["err_pd"] ; ?></p>
            <?php } ?>

            <input class="input wit" type="number" name="price_art" placeholder="price of an article" value=""><br>
            <?php if (isset($_GET["err_pp"])) { ?>
                <p class="para_error wit"><?php echo $_GET["err_pp"] ; ?></p>
            <?php } ?>



            <?php include "catg_marq_db.php"; ?>

            <!-- <input class="input" type="text" name="catg_art" placeholder="la categorie d'article" value=""><br> -->
            <select title="categorie" class="input wit" name="catg_art" onchange="show_marq(this.value)">
              <option value="21">category</option>
              <?php aff_catg($conn); ?>
            </select><br>
            <?php if (isset($_GET["err_pc"])) { ?>
                <p class="para_error wit"><?php echo $_GET["err_pc"] ; ?></p>
            <?php } ?>

            <!-- <input class="input" type="text" name="mark_art" placeholder="la marque d'article" value=""><br> -->
            <select id="txtHint" title="marque" class="input wit" name="mark_art">
              <option value="1">brand</option>
            </select><br>
            <?php if (isset($_GET["err_pm"])) { ?>
              <p class="para_error wit"><?php echo $_GET["err_pm"] ; ?></p>
            <?php } ?>

            <!-- <input style="display:none" type="number" name="id_user_ex" value="<?php // echo $id_ex ; ?>"> -->

            <input class="input inp_t btn_rst" type="reset" name="rst" value="reset">
            <input class="input inp_t btn_sbt" type="submit" name="sbt" value="save">

            <?php if (isset($_GET["good_news"])) { ?>
                <p class="para_gdn"><?php echo $_GET["good_news"] ; ?></p>
            <?php } ?>
          </form>
        </div>

    </div>
  </article>

</section>

<script>

  let id_ann_para_js = document.getElementById("id_ann_para");

  let id_img_file_js = document.getElementById("id_img_file");
  let btn_add_img_js = document.getElementById("btn_add_img");
  let i=0;

  let id_art_info_js = document.getElementById("id_art_info");
  let btn_add_art_js = document.getElementById("btn_add_art");
  let ind_add_art = true;

  let btn_comp = document.getElementById("comp");
  let btn_art = document.getElementById("art");

  let art_1_js = document.getElementById("art_1");
  let art_2_js = document.getElementById("art_2");

  function btn_comp_art(i){
    if (i == "c") {
      console.log("c click")
      art_1_js.style.display = "inline-block";
      art_2_js.style.display = "none";
    } else {
      console.log("a click")
      art_1_js.style.display = "none";
      art_2_js.style.display = "inline-block";
    }
  }


  btn_add_art_js.onclick=function(){
    if(ind_add_art){
      id_ann_para_js.style.display = "none";
      id_art_info_js.style.display="Block";
      ind_add_art = false;
    }else {
      id_ann_para_js.style.display = "Block";
      id_art_info_js.style.display="none";
      ind_add_art = true;
    }
  }

  btn_add_img_js.onclick=function(){
    console.log("click");
    console.log(i);
    if(i<4) {
      console.log("click interne");
      console.log(i);

      let ino_file_js = document.createElement("input");
      let br_js = document.createElement("br");

      ino_file_js.setAttribute('type','file');

      ino_file_js.setAttribute('id','file_img'+i);
      // btn_add_img_js.setAttribute('for','file_img');
      btn_add_img_js.setAttribute('for','file_img'+i);

      ino_file_js.setAttribute('class','input');
      ino_file_js.setAttribute('name','img_art_n[]');
      ino_file_js.setAttribute('multiple', true);

      id_img_file_js.appendChild(ino_file_js);
      id_img_file_js.appendChild(br_js);
      // ino_file_js.style.display="Block";

      i++;
    }else {
      // window.alret("this enough");
      alert("this enough");
      i++;
    }

  }

  function show_marq(str) {
        if (str=="") {
          document.getElementById("txtHint").innerHTML="";
          return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("txtHint").innerHTML=this.responseText;
          }
        }
        xmlhttp.open("GET","catg_marq_db_ajax.php?q="+str,true);
        xmlhttp.send();
      }



</script>
