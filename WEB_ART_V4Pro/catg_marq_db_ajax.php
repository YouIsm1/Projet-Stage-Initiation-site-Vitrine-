<?php

  include "j_cn_db.php";
  include "catg_marq_db.php";

  $val_q = intval($_GET['q']);

  aff_marq($conn, $val_q);

 ?>
