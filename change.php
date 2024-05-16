<?php

  session_start();
  $id="";
  if (isset($_COOKIE["user"])) {
    $cookie = $_COOKIE["user"];
    $value = explode("-",$cookie);
    $user_id = $value[2];
    if (stripos($_COOKIE["user"], "admin") !== false) {
      $user = "admin";
    }    
  else {
    $user = "user";
  }
}
else {
  $user = "oauth";
  $user_id = "";
}

?>

<html lang="en" data-bs-theme="light"><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Framework Vulnerable">
    <meta name="author" content="Fernando Mengali">
    <link rel="icon" href="img/favicon.svg">

    <title>YRprey - Change Password</title>

    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php
    include("nav.php");
  ?>

<main class="form-signin w-100 m-auto">
  <?php

if ($user === "oauth") {

print '<br><br><div class="alert alert-danger" role="alert">
❌ Is necessary be authenticard!
</div>';
exit;
}
include("database.php");

if (isset($_GET["password"])) {

  $password = $_GET["password"];


$query  = "UPDATE users set pass='" . $password . "' where id='$user_id'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  print '<br><br><div class="alert alert-success" role="alert">
  Change password success!
</div>';

}
?>
  <form action="change.php" method="GET">
<br>
    <h1 class="h3 mb-3 fw-normal">Change password</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Change password..." name="password" required>
      <label for="floatingInput">Password...</label>
    </div>

    <div class="form-check text-start my-3">
    <input class="btn btn-primary w-100 py-2" type="submit" style="margin-left: -10px; background-color: #ff1a56; border-color: #ff1a56;" value="Change" name="login">           
    </div><br>
    <br><br><br><br>
    <div class="container"><p class="m-0 text-center text-white"><a href="https://yrprey.com" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Copyright &copy; YRprey 2023 - 2050</a><br><br> 
            <a href="https://yrprey.com/#contact" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Contact</a> - 
            <a href="policies.php" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Policies</a> - 
            <a href="terms.php" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Terms</a></p></div>
  </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    

</body></html>