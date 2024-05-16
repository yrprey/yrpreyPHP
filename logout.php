<?php

setcookie("user", "", time() - 3600);

header("location: index.php");

?>