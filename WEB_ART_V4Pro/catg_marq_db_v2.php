
<?php
  function aff_catg_art($conn_catg_art, $id_catg){
    $d_aff_catg_art = "SELECT * FROM categorie WHERE id_catg = '$id_catg'";
    $res_d_aff_catg_art = mysqli_query($conn_catg_art, $d_aff_catg_art);

    if ($res_d_aff_catg_art) {
      $row_res_d_aff_catg_art = mysqli_fetch_assoc($res_d_aff_catg_art);

      return $row_res_d_aff_catg_art;
    } else {
      echo "we face somme probleme to collecte catgorie.";
    }
  }

  function aff_marq_art($conn_catg_art, $id_catg, $id_marqu){
    $d_aff_marq_art = "SELECT * FROM marque WHERE id_catg = '$id_catg' AND id_marq = '$id_marqu'";
    $res_d_aff_marq_art = mysqli_query($conn_catg_art, $d_aff_marq_art);

    if ($res_d_aff_marq_art) {
      $row_res_d_aff_marq_art = mysqli_fetch_assoc($res_d_aff_marq_art);

      return $row_res_d_aff_marq_art;
    } else {
      echo "we face somme probleme to collecte catgorie.";
    }
  }

  function aff_all_marq($conn_catg_art){
    $d_aff_marq_art = "SELECT * FROM marque";
    $res_d_aff_marq_art = mysqli_query($conn_catg_art, $d_aff_marq_art);

    $tab_marq = array();

    if ($res_d_aff_marq_art) {
      while ($row_res_d_aff_marq_art = mysqli_fetch_assoc($res_d_aff_marq_art)) {
        $tab_marq[] = $row_res_d_aff_marq_art;
      }
      return $tab_marq;
    } else {
      echo "we face somme probleme to collecte catgorie.";
    }
  }

  function aff_all_catg($conn_catg_art){
    $d_aff_catg_art = "SELECT * FROM categorie";
    $res_d_aff_catg_art = mysqli_query($conn_catg_art, $d_aff_catg_art);

    $tab_catg = array();

    if ($res_d_aff_catg_art) {
      while($row_res_d_aff_catg_art = mysqli_fetch_assoc($res_d_aff_catg_art)){
        $tab_catg[] = $row_res_d_aff_catg_art;
      }
      return $tab_catg;
    } else {
      echo "we face somme probleme to collecte catgorie.";
    }
  }

 ?>
