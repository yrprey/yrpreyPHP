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
        <title>YRpreyPHP - Guestbook</title>
        <!-- Favicon-->
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
    <div class="row">
        <div class="col-md-12">
            <div class="people-nearby">
              
              <?php

              if (isset($_POST["send"])) {
                $name = $_POST["user"];
                $pass = $_POST["pass"];
                $comment = $_POST["comment"];

                $query  = "SELECT * FROM users where nick='" . $name . "' AND pass='" . $pass . "'";
                $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

                $auth = mysqli_num_rows($result);

                if ($auth > 0) {

                    $rw = mysqli_fetch_assoc($result);
    
                    $username = $rw["username"];

                    $q = "DELETE FROM comment where id > 2";
                    $remove = mysqli_query($mysqli, $q);
                    
                    $q = "INSERT INTO comment (id, name, comment) VALUES (NULL, '$name', '$comment')";

                    if (mysqli_query($mysqli, $q)) {                

                        print '<br><br><div class="alert alert-success" role="alert">
                        ✅ Success published!
                        </div>';
                }
                }
                else {
                    print '<br><br><div class="alert alert-danger" role="alert">
                    ❌ Credential invalid!
</div>';
                }
              }
                $query  = "SELECT * FROM comment ORDER BY id DESC LIMIT 4";                

                $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

                $rows = mysqli_num_rows($results);

                    while ($row = mysqli_fetch_assoc($results)) {

                        $id = $row["id"];
                        $name = $row["name"];
                        $comment = $row["comment"];

                    ?>

              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="img/avatar.png" alt="user" class="profile-photo-lg" style="width: 70px;height: 70px;">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><?php echo $name; ?></h5>
                    <p><?php echo $comment; ?></p>
                    <p class="text-muted"></p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <a href="#" class="btn btn-primary pull-right" style="background-color: #ff1a56;border-color: #ff1a56;"><span>🗑</span> Remove</a>
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
<div class="mb-3">
    <form action="guestbook.php" method="POST">
              <label for="address2">Access Credentials <span class="text-muted">(Required)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Username" name="user"><br>
              <input type="password" class="form-control" id="address2" placeholder="Password" name="pass">   <br>
              <textarea class="form-control" id="address2" placeholder="Your comment" name="comment"></textarea>   <br>
              <input type="submit" class="btn btn-primary pull-right" style="background-color: #ff1a56;border-color: #ff1a56;" value="💬 Send" name="send">
            </div>
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
