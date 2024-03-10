
<link rel="stylesheet" href="form_style.css">

<style media="screen">
  .icon_s_as{
    font-size: 18px;
    cursor: pointer;
    margin: 3px;
  }
  /* .icon_s_as:hover{
    background-color: white;
    border-radius: 50%;
  } */
  .btn_sbt_rech{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .btn_sbt:hover *{
      background-color: rgb(75, 225, 0);
      color: white;
  }
  .para{
    margin-block-start: 0em;
    margin-block-end: 0em;
  }
  .form_fil{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-block-end: 0em;
  }
  .input_int{
    border: 1px solid black;
    padding: 5px;
    margin: 5px;
  }

  hr{
    margin: 5px auto;
  }
  .art_fil{
    border-bottom: 2px solid black;
    margin: 2px;
  }
</style>

<section>
  <article class="art_fil">
    <form class="form_fil" action="form_fil.php" method="post">
    <!-- <form class="form_fil" action="di_produit.php?$ind='f'" method="post"> -->

      <?php
            include "catg_marq_db.php";
            include "j_cn_db.php";
      ?>


            <select title="categorie" class="input input_int" name="catg_pro" onchange="show_marq(this.value)">
              <option value="">-----category----</option>
              <?php aff_catg($conn); ?>
            </select><br>


            <select style="display:none;" id="txtHint" title="marque" class="input input_int" name="marq_pro">
              <option value="">----brand----</option>
            </select><br>


    <script>
      function show_marq(str) {
        if (str=="") {
          document.getElementById("txtHint").innerHTML="";
          document.getElementById("txtHint").style.display="none";
          return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("txtHint").innerHTML=this.responseText;
            document.getElementById("txtHint").style.display="inline-block";
          }
        }
        xmlhttp.open("GET","ajax_php_mr_cg.php?q="+str,true);
        xmlhttp.send();
      }
    </script>

      <!-- <input type="submit" name="sbt" value='<span class="mdi mdi-text-search-variant"></span>' >
      <input type="submit" name="sbt" value='<span class="mdi mdi-text-search-variant"></span> Rechercher' > -->

      <input class="input input_int" placeholder="type the product name" type="search" name="search_fil" value="">

      <button class="btn_sbt_rech input_int input" type="submit" name="button"> <span class="mdi mdi-text-search-variant icon_s_as"></span> <p class="para">search</p> </button>


    </form>
  </article>

  <!-- <hr> -->

  <style media="screen">
    .sec_pr{
      background-color: whitesmoke;
      border-radius: 20px;
      padding: 10px;
      margin: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }
    /* .sec_pro{
      width: 30%;
    } */
  </style>
</section>

<section class="sec_pr">
  <?php
      // include "j_cn_db.php";
      //
      // $id_ex = $_SESSION['id_user'];
      //
      // // include "admin_art.php";
      // // include "admin_art_v2.php";
      //
      // include "admin_art_pro.php";
      //
      // $articles = aff_art($conn, $id_ex);
      // aff_art_info($articles, $conn);
      //
      // echo "<style> .sec_pro{ width: 30%; } </style>";

      // include "aff_all_pro.php";
      // include "di_produit_v2.php";
      // $ind = $_GET['ind'];
      //
      // if ($ind == "f") {
      //   include "from_fil.php";
      // } else {
        include "aff_all_pro.php";
      // }

   ?>
</section>
