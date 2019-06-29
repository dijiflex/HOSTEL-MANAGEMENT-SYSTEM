<?php
 
    require 'header.php';
    ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <form class="" action="includes/register.inc.php" method="POST">
                    <div class="card">
                        <div class="card-header bg-primary">Personal Info</div>
                        <div class="card-body">
                            <!--Personal Details-->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Firts Name</label>
                                    <input type="text" name="sfname" class="form-control" id="inputEmail4"
                                        placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Last Name</label>
                                    <input type="text" name="slname" class="form-control" id="inputPassword4"
                                        placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <!--NATIONA ID-->
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">NATIONAL ID</label>
                                    <input type="number" name="sNID" class="form-control" id="inputPassword4"
                                        placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">MOBILE NO</label>
                                    <input type="tel" name="sphoneNumber" class="form-control" id="inputPassword4"
                                        placeholder="e.g 0701702734" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <!--course and reg number-->
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlSelect1">Course</label>
                                  
                                    <select class="form-control" id="exampleFormControlSelect1" name="sCourseName" required>
                                        <option>COMPUTER SCIENCE</option>
                                        <option>INFORMATION TECHNOLOGY</option>
                                        <option>SOFTWARE ENGENEERING</option>
                                        <option>DATA SCIENCE</option>
                                        <option>ARTIFICIAL INTELLIGENCE</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">School Reg No.</label>
                                    <input type="text" name="sRegNo" class="form-control" id="inputPassword4"
                                        placeholder="e.g CT101/G/3127/17" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Email</label>
                                <input type="email" name="sEmail" class="form-control" id=""
                                    placeholder="example@gmail.com" required>
                            </div>

                        </div>

                        <!--Parent/Guardina Details-->
                        <div class="card-header bg-primary">Parent/Guardina Details</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Parent/Guardina Name</label>
                                    <input type="text" name="sPg_name" class="form-control" id="inputEmail4"
                                        placeholder="Parent/Guardina Name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Mobile No</label>
                                    <input type="number" name="sPg_pPhoneNo" class="form-control" id="inputPassword4"
                                        placeholder="0712345678" required>
                                </div>
                            </div>
                        </div>
                        <!--Student REg Submit Button-->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" name="stdREgSubmit" class="btn btn-success ">REGISTER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--Register  NEW Students-->


    </div>
     <!-- log n modal-->
    
   



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
</body>

</html>