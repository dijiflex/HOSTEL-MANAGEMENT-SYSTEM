<?php
    require 'header.php';
    ?>
<!-- body code goes here -->
<div class="container-fluid bg">

  <div class="row">
    <div class="col-md-4 col-xs-12">
    </div>
    <div class="col-md-4 col-xs-12">

      <!-- form starts-->
      <form class="form-container" action="includes/login.inc.php" method="post">
        <div class="col-12 ">
          <img src="images\profile.jpg" alt="cu-logo" class="rounded-circle img-fluid lo-img">
        </div>
        <h2 class="text-center">ADMIN LOG IN</h2>
        <div class="fg form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="adm_email" aria-describedby="emailHelp"
            placeholder="Enter email">

        </div>
        <div class="fg form-group">
          <label for="exampleInputPassword1"> Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="adm_pwd" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-success btn-block" name="adm_login-submit"><i
            class="fas fa-sign-in-alt"></i> Log In</button>
        <a href="admin_signup.php">Signup Instead</a>
      </form>

    </div>
    <div class="col-md-4 col-xs-12"></div>
  </div>

</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>

</body>

</html>