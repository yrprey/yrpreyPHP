<?php

  session_start();
  $user_id="";
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
    <title>YRprey - Signin</title>

    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php
    include("nav.php");
  ?>

<main class="form-signin w-100 m-auto">
  <?php

include("database.php");

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $pass = $_POST["pass"];


$query  = "SELECT * FROM users where username='" . $username . "' AND pass='" . $pass . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$row = mysqli_num_rows($result);

if ($row > 0) {

  $rw = mysqli_fetch_assoc($result);
    
    $id = $rw["id"];
    $permission = $rw["permission"];

    $tempo_expiracao = time() + 3600;
    $cookie =  $tempo_expiracao."-".$permission."-".$id;

    setcookie("user", $cookie, $tempo_expiracao);

    header("location: index.php");

}
else {
  print '<br><br><div class="alert alert-danger" role="alert">
  User Not found!
</div>';
} 

}
?>
  <form action="login.php" method="POST">
<br>
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" required>
      <label for="floatingInput">Username...</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
      <label for="floatingPassword">Password...</label>
    </div>

    <div class="form-check text-start my-3">
    <input class="btn btn-primary w-100 py-2" type="submit" style="margin-left: -10px; background-color: #ff1a56; border-color: #ff1a56;" value="Sign in" name="login">           
    </div><br>
    <a class="btn btn-primary w-100 py-2" href="register.php" style="background-color: #ff1a56; border-color: #ff1a56;"><span>&#127918;</span> Account SignUp</a>
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