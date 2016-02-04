<?php

    require("../includes/config.php");

    header("Content-type: application/json");
    print(json_encode($_SESSION['reps'], JSON_PRETTY_PRINT));

    ?>
