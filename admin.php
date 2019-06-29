    <?php
     require 'header.php';
    require 'includes/admin_functions.php';
   
   
    ?>
    <div class="ccontainer-fluid ">

        <div class="row">
            <!--------SIDE NAV--------->
            <div id="verticalNav" class="col-2 bg-dark pt-2" style="height: 100vh">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">
                        <i class="fas fa-columns"></i>
                        Dashboard</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false">
                        <i class="fas fa-user-friends"></i>
                        Students</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fas fa-bed "></i>
                        Rooms</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-payments" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">
                        <i class="fab fa-amazon-pay"></i>
                        Payments</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">
                        <i class="fas fa-cogs"></i>
                        Settings</a>
                </div>
            </div>
            <!--------SIDE NAV--------->
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--Dashboard-->
                    <div class="tab-pane fade show active container" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="row my-4 text-center">
                            <!--Allocated Users-->
                            <div class="col-md-4">
                                <div class="card admcardwidth">
                                    <div class="card-header font-weight-bold ">
                                        Students With Rooms
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <i class="fas fa-users fa-5x text-primary"></i>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                    $objAllocatedCOUNT = new STUDENTS;
                                    $count = $objAllocatedCOUNT->allocatedStd_Count();
                                        echo' <h3>'.$count.'</h3> ';
                                    ?>

                                    </div>

                                </div>
                            </div>
                            <!--RAvailable Rooms-->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header font-weight-bold">
                                        Total Available Rooms
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <i class="fas fa-bed fa-5x text-primary"></i>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        $objFreeRooms= new ROOMS;
                                        $spitRooms = $objFreeRooms->total_availableRooms_Count();
                                        echo '<h3>'.$spitRooms.'</h3>';
                                                    ?>

                                    </div>

                                </div>
                            </div>
                            <!--UnpaidRooms Rooms -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header font-weight-bold ">
                                        Unpaid rooms
                                    </div>
                                    <div class="card-body d-flex justify-content-center">
                                        <i class="fas fa-user-clock fa-5x text-primary"></i>
                                    </div>
                                    <div class="card-footer">
                                        <h3 class="text-danger">300</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Students-->
                    <div class="tab-pane fade container my-5" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <nav>
                            <div class="nav nav-tabs border-primary" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true"> <i
                                        class="fas fa-user-check"></i>
                                    STUDENTS WITH ROOMS</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false"> <i
                                        class="fas fa-user-plus"></i>
                                    REGISTER NEW
                                    STUDENT</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false"> <i
                                        class="fas fa-user-edit"></i>
                                    ALLOCATE ROOM</a>
                                <a class="nav-item nav-link text-danger" id="nav-contact-tab" data-toggle="tab"
                                    href="#nav-deallocate" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="fas fa-user-times"></i>
                                    DE-ALLOCATE ROOM</a>
                            </div>
                        </nav>

                        <!-----------------ACTUAL CONTENT---------->
                        <div class="tab-content " id="nav-tabContent">
                            <!--Registered Students-->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <!--Table of Students-->
                                <table class="table table-sm mt-4">
                                    <thead class="thead-dark">
                                        <tr id="">
                                            <th scope="col">Hostel ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Room No</th>
                                            <th scope="col">Room Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                           
                                            $objAllocated = new STUDENTS;
                                            $allocaredStds =$objAllocated-> allocatedStd();
                                           
                                            foreach ($allocaredStds as $allocaredStd) {
                                                echo '
                                                <tr>
                                                    <th scope="row">'.$allocaredStd['std_id'].'</th>
                                                    <td>'.$allocaredStd['std_fname'].' '.$allocaredStd['std_lname'].'</td>
                                                    <td>'.$allocaredStd['std_email'].'</td>
                                                    <td>'.$allocaredStd['rm_no'].'</td>
                                                    <td>'.$allocaredStd['fk_rm_type_name'].'</td>
                                                </tr>';
                                            }

                                        ?>


                                    </tbody>
                                </table>
                            </div>
                            <!--Register  NEW Students-->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <form class="" action="includes\register.inc.php" method="POST">
                                    <div class="card">
                                        <div class="card-header bg-primary">Personal Info</div>
                                        <div class="card-body">
                                            <!--Personal Details-->
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Firts Name</label>
                                                    <input type="text" name="sfname" class="form-control"
                                                        id="inputEmail4" placeholder="First Name" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Last Name</label>
                                                    <input type="text" name="slname" class="form-control"
                                                        id="inputPassword4" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <!--NATIONA ID-->
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">NATIONAL ID</label>
                                                    <input type="number" name="sNID" class="form-control"
                                                        id="inputPassword4" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">MOBILE NO</label>
                                                    <input type="tel" name="sphoneNumber" class="form-control"
                                                        id="inputPassword4" placeholder="e.g 0701702734" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <!--course and reg number-->
                                                <div class="form-group col-md-6">
                                                    <label for="exampleFormControlSelect1">Course</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="sCourseName" required>
                                                        <option>COMPUTER SCIENCE</option>
                                                        <option>INFORMATION TECHNOLOGY</option>
                                                        <option>SOFTWARE ENGENEERING</option>
                                                        <option>DATA SCIENCE</option>
                                                        <option>ARTIFICIAL INTELLIGENCE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">School Reg No.</label>
                                                    <input type="text" name="sRegNo" class="form-control"
                                                        id="inputPassword4" placeholder="e.g CT101/G/3127/17" required>
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
                                                    <input type="text" name="sPg_name" class="form-control"
                                                        id="inputEmail4" placeholder="Parent/Guardina Name" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Mobile No</label>
                                                    <input type="number" name="sPg_pPhoneNo" class="form-control"
                                                        id="inputPassword4" placeholder="0712345678" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Student REg Submit Button-->
                                        <div class="card-footer d-flex justify-content-center">
                                            <button type="submit" name="adm_stdREgSubmit"
                                                class="btn btn-success ">REGISTER STUDENT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Allocate Room-->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="conainer py-2">
                                    <div class="row">
                                        <div class="col">
                                            <form action="includes\register.inc.php" method="POST">
                                                <div class="card">

                                                    <div class="card-header bg-primary">Room Details</div>
                                                    <div class="card-body">
                                                        <div class="form-group col-md-4">
                                                            <label for="inputState">SELECT STUDENT</label>
                                                            <select id="inputState" name="std_email"
                                                                class="form-control" required>
                                                                <?php
                                                                    $object = new AllocateRooms();
                                                                    $value = $object->laststudents();
                                                                    foreach ($value as $name) {
                                                                        //echo $name['std_email'];
                                                                        echo '<option>'.$name['std_email'].'</option>';
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="inputState">Room Type</label>
                                                                <select id="inputState" name="rmType"
                                                                    class="form-control" required>
                                                                    <option selected>SINGLE BEDROOM</option>
                                                                    <option>BEDSETTER</option>
                                                                    <option>SINGLE ROOM</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="inputZip">Room Number</label>
                                                                <select class="form-control" name="rmNumber"
                                                                    id="exampleFormControlSelect1">
                                                                    <?php
                                                                        $objFreeRooms= new ROOMS;
                                                                        $spitRooms = $objFreeRooms->total_availableRooms();

                                                                        foreach ($spitRooms  as $spitRoom) {
                                                                            echo '
                                                                        <option>'.$spitRoom['rm_no'].'</option>
                                                                        ';
                                                                        }

                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" name="allocateRoom"
                                                            class="btn btn-success ">ALLOCATE ROOM TO STUDENT</button>
                                                    </div>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--DE-Allocate Room-->
                            <div class="tab-pane fade" id="nav-deallocate" role="tabpanel"
                                aria-labelledby="nav-contact-tab">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-auto">
                                            <form class="" action="includes\register.inc.php" method="POST">
                                                <div class="card">
                                                    <div class="card-header bg-danger">Select Student</div>
                                                    <div class="card-body">
                                                        <!--Personal Details-->
                                                        <div class="form-group col-auto">
                                                            <label for="inputPassword4">Email</label>
                                                            <select class="form-control" name="stdEmail"
                                                                id="exampleFormControlSelect1">
                                                                <?php  foreach ($allocaredStds as $allocaredStd) {
                                                                        echo '
                                                            <option>'.$allocaredStd['std_email'].'</option>
                                                            ';
                                                                    }?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!--Student REg Submit Button-->
                                                    <div class="card-footer d-flex justify-content-center">
                                                        <button type="submit" name="de_allocate"
                                                            class="btn btn-danger ">DE-ALLOCATE ROOM</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>

                    <!------- ROOM DETAILS -------------->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <div class="container my-3">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="card">
                                        <form action="includes/register.inc.php" method="POST">
                                            <div class="card-header text-center bg-primary">
                                                ADD ROOM
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group ">
                                                    <label for="exampleFormControlSelect1">ROOM TYPE</label>
                                                    <select class="form-control" name="rmType"
                                                        id="exampleFormControlSelect1">

                                                        <option>BEDSETTER</option>
                                                        <option>SINGLE ROOM</option>
                                                        <option>SINGLE BEDROOM</option>
                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="inputPassword4">Room Number</label>
                                                    <input type="text" name="rmNo" class="form-control"
                                                        id="inputPassword4" required>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" name="roomREgSubmit"
                                                    class="btn btn-success ">REGISTER
                                                    ROOM</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>

                    </div>
                    <!--=========== PAYMENTS SECTION --->
                    <div class="tab-pane fade" id="v-pills-payments" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-success" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-payRecoeds" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Payment Records</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#acceptPay"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Accept Payments</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#defaultedPay"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Defaulted Payments</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-payRecoeds" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <form class="form-control-sm" action="">
                                    <!--====filter Search Results-->
                                    <div class="form-row">
                                        <div class="form-group col-auto">
                                            <label for="inputEmail4">Filter Month</label>
                                            <select class="form-control form-control-sm" name="payMethod"
                                                id="exampleFormControlSelect1">
                                                <option>JANUARY</option>
                                                <option>FEBRUARY</option>
                                                <option>MARCH</option>
                                                <option>APRIL</option>
                                                <option selected>MAY</option>
                                                <option>JUNE</option>
                                                <option>JULY</option>
                                                <option>AUGUST</option>
                                                <option>SEPTEMBER</option>
                                                <option>OCTOBER</option>
                                                <option>NOVEMBER</option>
                                                <option>DECEMBER</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-auto">
                                            <label for="inputEmail4">Filter Year</label>
                                            <select class="form-control form-control-sm" name="payMethod"
                                                id="exampleFormControlSelect1">
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-auto d-flex align-items-end">

                                            <button type="submit" class="btn btn-sm btn-outline-dark">Filter</button>
                                        </div>

                                    </div>

                                </form>
                                <table class="table table-sm mt-4">
                                    <thead class="thead-dark">
                                        <tr id="">
                                            <th scope="col">Pay ID</th>
                                            <th scope="col">Pay Method</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Month Paid For</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Room No</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                             $obj_payDetails = new PAYMENTS;
                                            $month =5;
                                            $year=2019;
                                            $payRecords =$obj_payDetails -> paymentRecords($month, $year);
                                            foreach ($payRecords as $payRecord) {
                                                echo '
                                            <tr class="">
                                                <th scope="row">'.$payRecord['pyt_id'].'</th>
                                                <td class="text-capitalize"> '.$payRecord['pyt_method'].'</td>
                                                <td>'.$payRecord['pyt_amount'].'</td>
                                                <td class="text-capitalize">'.$payRecord['fk_month_id'].'/ '.$payRecord['fk_year_id'].'</td>
                                                <td>'.$payRecord['std_fname'].' '.$payRecord['std_lname'].'</td>
                                                <td>'.$payRecord['rm_no'].'</td>
                                               </tr>';
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- =====ACCEPT PAYMNETS-->
                            <div class="tab-pane fade" id="acceptPay" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="container">
                                    <form class="" action="includes\register.inc.php" method="POST">
                                        <div class="card">
                                            <div class="card-header bg-primary">Payment INFO</div>
                                            <div class="card-body">
                                                <!--Personal Details-->
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Email</label>
                                                    <select class="form-control" name="stdEmail"
                                                        id="exampleFormControlSelect1">
                                                        <?php  foreach ($allocaredStds as $allocaredStd) {
                                            echo '
                                                            <option>'.$allocaredStd['std_email'].'</option>
                                                            ';
                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Payment Method</label>
                                                        <select class="form-control" name="payMethod"
                                                            id="exampleFormControlSelect1">
                                                            <option>CASH</option>
                                                            <option>MPESA</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Amount</label>
                                                        <input type="number" name="payAmount" class="form-control"
                                                            id="inputPassword4" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="inputPassword4"
                                                            class="font-weight-bold">Month</label>
                                                        <select id="inputState" name="month" class="form-control"
                                                            required>
                                                            <option>JANUARY</option>
                                                            <option>FEBRUARY</option>
                                                            <option>MARCH</option>
                                                            <option>APRIL</option>
                                                            <option selected>MAY</option>
                                                            <option>JUNE</option>
                                                            <option>JULY</option>
                                                            <option>AUGUST</option>
                                                            <option>SEPTEMBER</option>
                                                            <option>OCTOBER</option>
                                                            <option>NOVEMBER</option>
                                                            <option>DECEMBER</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="inputPassword4"
                                                            class="font-weight-bold">Year</label>
                                                        <select id="inputState" name="year" class="form-control"
                                                            required>
                                                            <option>2019</option>
                                                            <option>2020</option>
                                                            <option>2021</option>
                                                            <option>2022</option>
                                                        </select>

                                                    </div>
                                                </div>


                                            </div>

                                            <!--Student REg Submit Button-->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button type="submit" name="admin_payment"
                                                    class="btn btn-success ">SUBMIT PAYMENT</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="defaultedPay" role="tabpanel"
                                aria-labelledby="nav-contact-tab">

                                
                                <?php
                                $obj_paidstudent= new PAYMENTS;

                                //this will collect all the email address if those who havae not paid for a specific month
                                $paidStds = $obj_paidstudent->defaultedPayments($month, $year);
                               
                                $allStdEmails = $obj_paidstudent->stdIDS();
                                foreach ($allStdEmails  as $allStdEmail) {
                                   $data[] =$allStdEmail['std_email'];
                                }

                                foreach ($paidStds as $paidStd) {
                                    $passed[] = $paidStd['std_email'];
                                }
                               
                                ?>

                                <table class="table table-sm mt-4" >
                                    <thead class="thead-dark">
                                        <tr id="">
                                            <th scope="col">Student(s) Email</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody> 

                                        <?php
                                         if (empty($passed)) {
                                            echo '
                                            <tr>
                                                 <td>
                                                    No Student Has Made Payment For This Month
                                                 </td>
                                             </tr>
                                            '; 
                                        } else {
                                            $results[] = array_diff( $data,$passed);
                                            
                                           // echo print_r($results);
                                            foreach ($results as $result) {
                                                foreach ($result as $value) {
                                                    echo '
                                                    <tr>
                                                         <td>
                                                        '.$value.'
                                                         </td>
                                                     </tr>
                                                    '; 
                                                }
                                            }                                           
                                           
                                        }
                                          
                                        ?>
                                    
                                       
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                    <!---SETTINGS -------------------------------------------->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        this is the settings section for the admin
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"> </script>
    <script src="js/popper.min.js"> </script>
    <script src="js/bootstrap-4.0.0.js"> </script>
    </body>

    </html>