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
    <title>YRprey - Create Account</title>

    

    

    


<link href="css/styles.css" rel="stylesheet" />

    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php
    include("nav.php");

    include("database.php");

  ?>

<main class="form-signin w-100 m-auto">
    <?php

if (isset($_POST["create"])) {

    $name = $_POST["name"];
    $nick = $_POST["nick"];
    $pass = $_POST["pass"];
    
    $q = "INSERT INTO users (id, username, nick, pass, saldo, permission, qtde) VALUES (NULL, '$name', '$nick', '$pass', '0', '0', '0')";

        if (mysqli_query($mysqli, $q)) {                

            $rce = system("mkdir /var/www/html/$name");

            print '<br><br><div class="alert alert-success" role="alert">
            User Created!
          </div>';
        
        }
        else {

            print '<br><br><div class="alert alert-danger" role="alert">
            User Not found!
          </div>';

        }

}
else {

}
?>
  <form action="register.php" method="post">
  <br><br>
    <h1 class="h3 mb-3 fw-normal">Create your Account</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" required>
      <label for="floatingInput">Name</label>
    </div><br>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="username" name="nick" required>
      <label for="floatingInput">Username...</label>
    </div><br>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
      <label for="floatingPassword">Password...</label>
    </div>
    <input class="btn btn-primary w-100 py-2" type="submit" style="background-color: #ff1a56; border-color: #ff1a56;" value="&#127918; Create Account" name="create">
  </form>
  <br><br><br><br>
    <div class="container"><p class="m-0 text-center text-white"><a href="https://yrprey.com" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Copyright &copy; YRprey 2023 - 2050</a><br><br> 
            <a href="https://yrprey.com/#contact" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Contact</a> - 
            <a href="policies.php" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Policies</a> - 
            <a href="terms.php" style="color: #000; text-decoration: none;" target="_blank" rel="noopener noreferrer">Terms</a></p></div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    

</body></html>