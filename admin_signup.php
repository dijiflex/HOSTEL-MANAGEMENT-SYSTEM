<?php
   
    require 'header.php';
    ?>
<!-- body code goes here -->

<!-- body code goes here -->
<div class="container-fluid bg">

  <div class="row">
    <div class="col-md-4 col-xs-12">
    </div>
    <div class="col-md-4 col-xs-12">

      <!-- form starts-->
      <div class="card">
        <form action="includes\register.inc.php" method="POST">
          <div class="card-header">
            <h5 class ="text-center">Admin Signup</h5>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Firts Name</label>
                <input type="text" name="adm_fname" class="form-control" id="adm_fname" placeholder="First Name"
                  required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Last Name</label>
                <input type="text" name="adm_lname" class="form-control" id="adm_lname" placeholder="Last Name"
                  required>
              </div>
            </div>
            <div class="form-row">
              <!--NATIONA ID-->
              <div class="form-group col-md-6">
                <label for="inputPassword4">NATIONAL ID</label>
                <input type="number" name="adm_NID" class="form-control" id="adm_fname" placeholder="" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">MOBILE NO</label>
                <input type="tel" name="adm_phoneNumber" class="form-control" id="inputPassword4"
                  placeholder="e.g 0701702734" required>
              </div>
            </div>
            <div class="form-row">
              <!--NATIONA ID-->
              <div class="form-group col-md-6">
                <label for="inputPassword4">Email Address</label>
                <input type="email" name="adm_email" class="form-control" id="inputPassword4" placeholder="example@gmail"
                  required>
              </div>
                         
            </div>
            <div class="form-row">
              <!--PASSWORD-->
              <div class="form-group col">
                <label for="inputPassword4">Password</label>
                <input type="password" name="adm_pwd" class="form-control" id="inputPassword4" placeholder="Password"
                  required>
              </div>
              <div class="form-group col">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" name="adm_pwd-repeat" class="form-control" id="inputPassword4" placeholder="Confirm Password"
                  required>
              </div>
                         
            </div>
            
          </div>

          <div class="card-footer">
            <button type="submit" name="adm_signup-submit" class="btn btn-outline-success">
              Register</button>
          </div>
        </form>
      </div>

    </div>
    <div class="col-md-4 col-xs-12"></div>
  </div>

</div>

</html>