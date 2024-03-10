
<style media="screen">

    .sec_mar_cat{
      background-color: whitesmoke;
      border-radius: 20px;
      padding: 10px;
      margin: 10px;
      /* display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap; */
      text-align: center;
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
    h3{
      display: block;
      text-transform: capitalize;
    }
    span{
      color: black;
    }

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
    .di_option{
      margin: 10px;
    }
    table, th, td, tr{
      border: 1px solid black;
      text-align: center;
    }
    .di_tab_catg{
      display: none;
      margin: 15px;
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

<?php
    include "j_cn_db.php";
    include "catg_marq_db_v2.php";
 ?>

<section class="sec_mar_cat">
  <article class="">
    <h3>add a category or brand.</h3>
    <div class="">
      <?php if (isset($_GET["err"])) { ?>
          <p class="para_error"><?php echo $_GET["err"] ; ?></p>
      <?php } ?>


      <?php if (isset($_GET["g_n"])) { ?>
              <p class="para_gdn"><?php echo $_GET["g_n"] ; ?></p>
      <?php } ?>
    </div>
    <div class="di_option">
      <button id="btn_catg" class="inp_btn" type="button" name="button">category</button>
      <button id="btn_marq" class="inp_btn" type="button" name="button">brand</button>
    </div>
    <div class="di_option">
      <a href="page_profile.php" class="inp_btn"> back </a>
    </div>
    <div class="di_tableau">
      <div id="tab_catg" class="di_tab_catg">
        <table>
          <tr>
            <th>category id</th>
            <th>category name</th>
            <!-- <th>action</th> -->
          </tr>
          <?php $tab_catg = aff_all_catg($conn); $a=0; ?>
          <?php while (isset($tab_catg[$a])) { ?>
            <tr>
              <!-- <form class="" action="index.html" method="post"> -->
                <td> <?php echo $tab_catg[$a]['id_catg']; ?> </td>
                <!-- <td> <input type="text" name="" value="<?php echo $tab_catg[$a]['nom_catg']; ?>"></td> -->
                <td> <?php echo $tab_catg[$a]['nom_catg']; ?> </td>
                <!-- <td> <input type="submit" name="" value="enregestrer"> <input type="reset" name="" value="annuller"> </td> -->
              <!-- </form> -->
            </tr>
          <?php $a++; } ?>
        </table>
        <br>
        <table>
          <tr>
            <th>category id</th>
            <th>category name</th>
            <th>action</th>
          </tr>
          <tr>
            <form class="" action="editer_categ.php" method="post">
              <td>

                <select class="" name="chos_id_catg" onchange="show_id_catg(this.value)">
                  <option value="">--id--</option>
                  <?php $tab_catg = aff_all_catg($conn); $a=0; ?>
                  <?php while (isset($tab_catg[$a])) { ?>
                  <option value="<?php echo $tab_catg[$a]['id_catg']; ?>"><?php echo $tab_catg[$a]['id_catg']; ?></option>
                  <?php $a++; } ?>
                </select>

              </td>
              <td>
                <input id="inp_n_catg" type="text" name="nom_categorie" value="">
              </td>
              <td> <input type="submit" name="" value="save"> <input type="reset" name="" value="cancel"> </td>
            </form>
          </tr>
          <tr>
            <td colspan="4"> <button id="btn_add_catg" type="button" name="button">add a category.</button> </td>
          </tr>
          <tr id="l_f_ac">
            <form class="" action="add_catg_db.php" method="post">
              <td colspan="2"> <input placeholder="category name" type="text" name="catg_add" value=""> </td>
              <td colspan="2"> <input type="submit" name="" value="save"> <input type="reset" name="" value="cancel"> </td>
            </form>
          </tr>
        </table>

        <script>

          let btn_add_catg_js = document.getElementById("btn_add_catg");
          let l_f_ac_js = document.getElementById("l_f_ac");
          l_f_ac_js.style.display="none";
          ind=true;

          btn_add_catg_js.onclick=function(){
            if (ind) {
              l_f_ac_js.style.display="table-row";
              ind = false;
            }else {
              l_f_ac_js.style.display="none";
              ind = true;
            }
          }

          function show_id_catg(str) {

            if (str=="") {
              document.getElementById("inp_n_catg").setAttribute("value","----nom categorie----");
              // document.getElementById("txtHint").style.display="none";
              return;
            }

            var xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function() {
              if (this.readyState==4 && this.status==200) {
                document.getElementById("inp_n_catg").setAttribute("value",this.responseText);
                // document.getElementById("txtHint").style.display="inline-block";
              }
            }

            xmlhttp.open("GET","ajax_id_name_catg.php?q="+str,true);
            xmlhttp.send();
          }
        </script>


      </div>

      <div id="tab_marq" class="di_tab_catg di_tab_catg">
        <table>
          <tr>
            <th>brand id</th>
            <th>brand name</th>
            <th>category id</th>
            <!-- <th>action</th> -->
          </tr>
          <?php $tab_marq = aff_all_marq($conn); $b=0; ?>
          <?php while (isset($tab_marq[$b])) { ?>
            <tr>
              <td><?php echo $tab_marq[$b]['id_marq']; ?></td>
              <td><?php echo $tab_marq[$b]['nom_marq']; ?></td>
              <td><?php echo $tab_marq[$b]['id_catg']; ?></td>
              <!-- <td>- - - -</td> -->
            </tr>
          <?php $b++; } ?>
        </table>
        <br>
        <table>
          <tr>
            <th>brand id</th>
            <th>brand name</th>
            <th>action</th>
          </tr>
          <tr>
            <form class="" action="index.html" method="post">
              <td> <input type="text" name="" value=""> </td>
              <td> <input type="text" name="" value=""> </td>
              <td> <input type="submit" name="" value="save"> <input type="reset" name="" value="cancel"> </td>
            </form>
          </tr>
        </table>
      </div>
    </div>
  </article>
</section>

<script>

  let btn_catg_js = document.getElementById("btn_catg");
  let btn_marq_js = document.getElementById("btn_marq");

  let tab_catg_js = document.getElementById("tab_catg");
  let tab_marq_js = document.getElementById("tab_marq");

  btn_catg_js.onclick = function(){
    tab_catg_js.style.display = "inline-block";
    tab_marq_js.style.display = "none";
  }

  btn_marq_js.onclick = function(){
    tab_catg_js.style.display = "none";
    tab_marq_js.style.display = "inline-block";
  }


</script>
