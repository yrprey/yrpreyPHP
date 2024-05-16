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
        <title>YRprey - My Account</title>
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
      $id = "0";
    }

    ?>

    <body>
        <!-- Navigation-->
        <?php

include("nav.php");

?>

<?php

if ($user === "oauth") {
    $msg ='
    <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="alert alert-danger" role="alert">
    Not authenticated!
    </div></div></div></section>
    ';
  print $msg;
  exit;
  }

                $query  = "SELECT * FROM users where id = '".$id."'"; 
                $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

                $rows = mysqli_num_rows($results);
                    
                        if ($rows > 0) {

                            $row = mysqli_fetch_assoc($results);
                    
                            $id = $row["id"];
                            $nick = $row["nick"];
                            $name = $row["username"];
                            $saldo = $row["saldo"];
                            $permission = $row["permission"];                            

                    ?>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="img/profile.png" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo "USER IDENTIFICATOR: $id"; ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $name; ?></h1>
                        <div class="fs-5 mb-5">
                            <span><b>Nick name:</b> <?php echo $nick; ?></span>
                        </div>
                        <p class="lead"><b>Balance:</b> <?php echo $saldo; ?></p>
                        <p class="lead"><b>Permission:</b> <?php echo $permission; ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <?php

                        }
                        else {
                            ?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="img/profile1.png" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">USER IDENTIFICATOR: <p style="color: red">NOT FOUND</div>
                        <h1 class="display-5 fw-bolder"><p style="color: red">USER NOT FOUND</h1>
                        <div class="fs-5 mb-5">
                            <span><b>Nick name:</b> <p style="color: red">NOT FOUND   </span>
                        </div>
                        <p class="lead"><b>Balance:</b> <p style="color: red">NOT FOUND</p>
                        <p class="lead"><b>Permission:</b> <p style="color: red">NOT FOUND</p>
                    </div>
                </div>
            </div>
        </section>
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
