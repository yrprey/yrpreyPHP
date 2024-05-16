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
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>YRprey - Buy</title>

    <link href="css/styles.css" rel="stylesheet" />

  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
  <?php
    include("nav.php");
  ?>

<main class="form-signin w-100 m-auto">
  <?php

include("database.php");

if (isset($_GET["product"])) {

  $product = $_GET["product"];
  $msg = '';

$query  = "SELECT * FROM users where id='" . $user_id . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
$exist = 0;
$exist = mysqli_num_rows($result);

if ($exist > 0) {

  $rw = mysqli_fetch_assoc($result);
    
    $username = $rw["username"];

}

$query  = "SELECT * FROM tool where id='" . $product . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$row = mysqli_num_rows($result);

if ($row > 0 and $user !== "admin" and $user === "user") {

  $rw = mysqli_fetch_assoc($result);
    
    $id = $rw["id"];
    $name = $rw["name"];
    $category = $rw["category"];
    $img = $rw["img"];
    $price = $rw["price"];
    $description = $rw["description"];

    $q = "INSERT INTO orders (id, name, product, img, price) VALUES (NULL, '$username', '$name', '$img', '$price')";
    $inserted = mysqli_query($mysqli, $q);

}

if ($row > 0 and $user !== "admin" and $user === "user") {

    $query  = "SELECT * FROM warrior where id='" . $product . "'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

    $row = mysqli_num_rows($result);

    if ($row > 0 and $user !== "admin") {

    $rw = mysqli_fetch_assoc($result);
    
    $id = $rw["id"];
    $name = $rw["name"];
    $category = $rw["category"];
    $img = $rw["img"];
    $price = $rw["price"];   
    $description = $rw["description"];
    
    $q = "INSERT INTO orders (id, name, product, img, price) VALUES (NULL, '$username', '$name', '$img', '$price')";
    $inserted = mysqli_query($mysqli, $q);
        

} 
}

if (empty($name)) {
  $msg ='<div class="alert alert-danger" role="alert">
Product not found!
</div>';

}

if ($user === "oauth") {
  $msg ='<div class="alert alert-danger" role="alert">
  Not authenticated!
</div>';
}

if ($user === "admin") {
    $msg ='<div class="alert alert-danger" role="alert">
  You are admin, not have permission!
</div>';

}

}
?>
  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Framework Vulnerable">
    <meta name="author" content="Fernando Mengali">
    <link rel="icon" href="img/favicon.svg">

    <title>Checkout for Product</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">
<br><br>
    <div class="container">
      <div class="py-5 text-center">
      <?php
        if (empty($msg)) {
      ?>
        <h2 style="color: rgb(25,135,84,1);">✅ Purchase made successfully!!</h2>
        <p class="lead">Thank you very much for your purchase.</p>
      <?php
        }
        else {
            print $msg."";
        }
      ?>
      </div>

      <?php

        if (empty($msg)) {

      ?>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your Purchase</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $name; ?></h6>
                <small class="text-muted"><?php echo $description; ?></small>
              </div>
              <span class="text-muted"><?php echo $price; ?> BTC</span>
            </li>            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BTC)</span>
              <strong><?php echo $price; ?></strong>
            </li>
          </ul>          
        </div>
        <div class="col-md-8 order-md-1">
          

            

            <div class="mb-3">
              <img class="card-img-top mb-5 mb-md-0" src="img/<?php echo $img; ?>" alt="...">
            </div>        
          </form>
        </div>
      </div>
<?php
        }
?>
</div>
    <?php include("footer.php"); ?>
  </body>
</html>
