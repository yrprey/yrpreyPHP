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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Framework Vulnerable">
    <meta name="author" content="Fernando Mengali">
    <link rel="icon" href="img/favicon.svg">
        <title>Welcome to YRpreyPHP</title>
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/bootstrap-3.3.5.js"></script>
        <script src="js/jquery-1.5.1"></script>
        <script src="js/lodash-3.9.0.js"></script>
    </head>
    <body>
        <!-- Responsive navbar-->
<?php

  include("nav.php");
  include("database.php");

?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="home.jpg" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Exploit ever Point</h1>
                    <p>Start the process of searching, identifying and exploiting vulnerabilities.<br>If you want, you can fix SQL Injection, XSS, CSRF and other vulnerabilities</p>
                    <a class="btn btn-primary" href="login.php" style="background-color: #ff1a56;border-color: #ff1a56;">Start now!</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Find vulnerabilities based on the OWASP TOP 10 2021 and improve your exploitation skills and techniques.<br>
            If you want, you can fix SQL Injection, XSS, CSRF and other vulnerabilities</p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                
            <?php

$query  = "SELECT * FROM warrior LIMIT 4";     

$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$rows = mysqli_num_rows($results);

    while ($row = mysqli_fetch_assoc($results)) {
    
        $id = $row["id"];
        $name = $row["name"];
        $img = $row["img"];
        $category = $row["category"];
        $price = $row["price"];
        $description = $row["description"];
        $estrelas = $row["estrelas"];

?>
            <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/<?php echo $img; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $name; ?></h5>
                                    <!-- Product price-->
                                    <?php echo $price; ?> BTC
                                </div>
                            </div>                           
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php echo str_repeat("<div class=\"bi-star-fill\"></div>",$estrelas); ?>
                                        
                                    </div><br> 
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="warriors.php?id=<?php echo $id; ?>" style="background-color: #ff1a56;border-color: #ff1a56;color: #fff;">Buy warrior</a></div>
                            </div>
                        </div>
                    </div>
<?php
    }
    ?>  
            

        <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Exploit every input vulnerable!</h1>
                        <p class="fs-4">This is very easy! Enjoy! Exploit the Application!</p>
                        <a class="btn btn-primary btn-lg" href="tools.php" style="background-color: #ff1a56;border-color: #ff1a56;color: #fff;">Buy tools</a>
                    </div>
</div>

<div class="row gx-4 gx-lg-5">
                
            <?php

$query  = "SELECT * FROM tool LIMIT 4";     

$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$rows = mysqli_num_rows($results);

    while ($row = mysqli_fetch_assoc($results)) {
    
        $id = $row["id"];
        $name = $row["name"];
        $img = $row["img"];
        $category = $row["category"];
        $price = $row["price"];
        $description = $row["description"];
        $estrelas = $row["estrelas"];

?>
            <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/<?php echo $img; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $name; ?></h5>
                                    <!-- Product price-->
                                    <?php echo $price; ?> BTC
                                </div>
                            </div>                           
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php echo str_repeat("<div class=\"bi-star-fill\"></div>",$estrelas); ?>
                                        
                                    </div><br> 
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="tools.php?id=<?php echo $id; ?>" style="background-color: #ff1a56;border-color: #ff1a56;color: #fff;">Buy warrior</a></div>
                            </div>
                        </div>
                    </div>
<?php
    }
    ?>  
            </div>
        </div>
        </div></div>
                
                              
        <!-- Footer-->
        <?php

include("footer.php");

?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
