<?php

    $conn = mysqli_connect("localhost", "root", "","db_stage_test_1_rdu_v4");

    if (!$conn) {
        echo "db not connected ".mysqli_connect_error();
    }



?>
