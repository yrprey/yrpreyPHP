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
        <title>YRpreyPHP - Search</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .people-nearby .google-maps{
  background: #f8f8f8;
  border-radius: 4px;
  border: 1px solid #f1f2f2;
  padding: 20px;
  margin-bottom: 20px;
}

.people-nearby .google-maps .map{
  height: 300px;
  width: 100%;
  border: none;
}

.people-nearby .nearby-user{
  padding: 20px 0;
  border-top: 1px solid #f1f2f2;
  border-bottom: 1px solid #f1f2f2;
  margin-bottom: 20px;
}

img.profile-photo-lg{
  height: 80px;
  width: 80px;
  border-radius: 50%;
}
</style>
    </head>
    <?php
    include("database.php");
    if (isset($_GET["search"]) AND $_GET["search"] != "") {
      $search = $_GET["search"];
      $result = "<h2>Search result: ".$_GET["search"]."</h2><br>";

    }
    else {
      $result = "";
      $search = "a";
    }
    ?>
    <body>
        <!-- Responsive navbar-->
<?php

    include("nav.php");

?>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">

                <div class="col-lg-5">
                   
                </div>
            </div>
            <!-- Call to Action-->

            <!-- Content Row-->
            <div class="container">
              <?php echo $result; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="people-nearby">
              
              <?php

                $query  = "SELECT * FROM tool where name LIKE '%".$search."%'";                

                $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

                $rows = mysqli_num_rows($results);

                    while ($row = mysqli_fetch_assoc($results)) {

                        $id = $row["id"];
                        $name = $row["name"];
                        $img = $row["img"];
                        $category = $row["category"];

                    ?>

              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="img/<?php echo $img; ?>" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="tools.php?id=<?php echo $id; ?>  " class="profile-link"><?php echo $name; ?></a></h5>
                    <p>Category: <?php echo $category; ?></p>
                    <p class="text-muted"></p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <a href="tools.php?id=<?php echo $id; ?>" class="btn btn-primary pull-right" style="background-color: #ff1a56;border-color: #ff1a56;">Buy Tool</a>
                  </div>
                </div>
              </div>
            
<?php
                    }
                    if ($rows == 0) {
                      ?>
                      <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <h5 style="font-size:7.25rem;">404</h5>
                    <p style="font-size:7.25rem;">NOT FOUND</p>
                    <p class="text-muted"></p>
                  </div>
                </div>
              </div>
              <?php

                    }
?>              
              <div class="nearby-user">
              </div>
                <br><br><br>

    	</div>
	</div>
</div>
            </div>
        </div>
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
