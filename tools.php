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
        <title>YRprey - Shop Tools</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php
    include("database.php");
    if (isset($_GET["id"]) AND $_GET["id"] != "") {
      $id = $_GET["id"];      
    }
    else {
      $id = "6";
    }
    ?>

    <body>
        <!-- Navigation-->
        <?php

include("nav.php");

?>

<?php

                $query  = "SELECT * FROM tool where id = '".$id."'";                

                $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

                $rows = mysqli_num_rows($results);

                    $row = mysqli_fetch_assoc($results);
                    
                        $id = $row["id"];
                        $name = $row["name"];
                        $img = $row["img"];
                        $category = $row["category"];
                        $price = $row["price"];
                        $description = $row["description"];

                    ?>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="img/<?php echo $img; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo "IDENTIFICATOR: $id"; ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $name; ?></h1>
                        <div class="fs-5 mb-5">
                            <span><?php echo $price; ?> BTC</span>
                        </div>
                        <p class="lead"><?php echo $description; ?></p>
                        <div class="d-flex">
                            <form action="buy.php" method="GET">
                            <input type="hidden" value="<?php echo $id; ?>" name="product">
                                    <input class="btn btn-outline-dark flex-shrink-0" type="submit" value="&#128722; Add to cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related tools</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php

$query  = "SELECT * FROM tool where id <> '".$id."' LIMIT 4";     

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
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="tools.php?id=<?php echo $id; ?>" style="background-color: #ff1a56;border-color: #ff1a56;color: #fff;">Buy Tool</a></div>
                            </div>
                        </div>
                    </div>
<?php
    }
    ?>                    
                    
                            
                    
                  
                    </div>
                </div>
            </div>
        </section>
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
