        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/"><img src="https://yrprey.com/assets/images/logo-letter.svg" width="100"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item">
                    <a class="nav-link active" href="tools.php">Tools</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="warriors.php">Warriors</a>
                  </li>                  
                  <li class="nav-item">
                    <a class="nav-link active" href="guestbook.php">Guestbook</a>
                  </li>
                  <?php

                  if ($user === "admin") {
                    ?>
                       <li class="nav-item">
                       <a class="nav-link active" href="orders.php">Orders</a>
                       </li>
                       <?php
                  }
                    if ($user === "oauth") {
                      ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="login.php">Login</a>
                  </li>
                    <?php
                    }
                    else {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link active" href="profile.php?id=<?php echo $user_id; ?>  ">My Account</a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="change.php">Change Password</a>
                  </li>
                      <li class="nav-item">
                    <a class="nav-link active" href="logout.php">Logout</a>
                  </li>
                  <?php
                    }                    
                  ?>
                </ul>
                <form class="d-flex" role="search" method="GET" action="search.php">
                  <input class="form-control me-2" type="search" placeholder="Search for warrior, tool..." aria-label="Search" name="search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav><br><br>          