<?php
    require 'header.php';
    

    if (!$_SESSION['std_email']) {
        header("Location: index.php?pleaseLoginFirst");
    } else {
        $stdSession = $_SESSION['std_email'];
        require 'includes\admin_functions.php';
        $objAllStdData= new STUDENTS;
        $all_stdDetails =  $objAllStdData->allStdDetail($stdSession);
        $stdid= $all_stdDetails['std_id'];// this will be used to retrieve the data infor
    }
   ?>

<div class="ccontainer-fluid">

    <div class="row">
        <div class="col-2 bg-dark pt-2" style="height: 100vh">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#studentProfile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">
                    <i class="fas fa-user"></i>
                    Profile</a>
                <!--PAY RENT-->
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#payRent" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">
                    <i class="fas fa-money-check-alt"></i>
                    Pay Rent
                </a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#studentSettings" role="tab"
                    aria-controls="v-pills-settings" aria-selected="false">
                    <i class="fas fa-cogs"></i>
                    Settings</a>
                <form action="includes/logout.inc.php" method="POST">
                    <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#studentLogout" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">

                        <i class="fas fa-sign-out-alt"></i>



                    </a>
                    <button type="submit" class="btn-outline-primary" name="logout-submit"> Log Out</button>
                </form>
            </div>
        </div>
        <div class="col-10">
            <!-- STUDENT DETAILS TABLE-->
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="studentProfile" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-auto">
                                <div class="card">
                                    <h6 class="bg-success">PERSONAL DETAILS</h6>
                                    <table class="table table-sm table-bordered">

                                        <tbody>
                                            <?php
                                                    echo'
                                                    <tr>
                                                    
                                                        <th scope="row">NAME</th>
                                                        <td>'.$all_stdDetails['std_fname'].' '.$all_stdDetails['std_lname'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">EMAIL</th>
                                                        <td>'.$all_stdDetails['std_email'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ROOM NO</th>
                                                        <td>'.$all_stdDetails['rm_no'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ROOM TYPE</th>
                                                        <td>'.$all_stdDetails['fk_rm_type_name'].'</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">MONTHLY RENT</th>
                                                        <td class="text-primary font-weight-bold">KSH '.$all_stdDetails['rm_fee'].'/-</td>
                                                    </tr>';

                                                
                                                    ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6 class="bg-success">RENT PAYMENT HISTORY</h6>
                                <table class="table table-sm table-bordered">

                                    <tbody>

                                        <tr>
                                            <th scope="row">Pay ID</th>
                                            <th scope="row">Month Paid For</th>
                                            <th scope="row">Amount</th>
                                            <th scope="row">Pay Method</th>

                                        </tr>
                                        <?php
                                        $obj_StdPayData = new PAYMENTS;
                                        $payDatas = $obj_StdPayData->stdPayData($stdSession);

                                       if (empty($payDatas)) {
                                       } else {
                                           foreach ($payDatas as $payData) {
                                               echo'
                                            <tr>
                                                <td>'.$payData['pyt_id'].'</td>
                                                <td>'.$payData['fk_month_id'].' /'.$payData['fk_year_id'].'</td>
                                                <td>'.$payData['pyt_amount'].'</td>
                                                <td>'.$payData['pyt_method'].'</td>
                                            </tr>
                                            
                                           ';

                                           }
                                       }
                                        ?>
                                    </tbody>
                                </table>
                               
                                 
                                 
                                 <h6 class="bg-success">DEPOSIT PAYMENT</h6> 
                                 <table class="table table-sm table-bordered">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Deposit ID</th>
                                        <th scope="row">Deposit Amount</th>
                                        <th scope="row">Pay Method</th>
                                        <th scope="row">Pay Date</th>
                                    </tr> 
                                        <?php
                                    $deposit=   $objAllStdData->stdDeposit($stdid);                                
                                    echo ' 
                                    <tr>
                                        <td>'.$deposit['depst_id'].'</td>
                                        <td>'.$deposit['depst_amount'].' </td>
                                        <td>'.$deposit['depst_payMethod'].'</td>
                                        <td>'.$deposit['depst_payDate'].'</td>
                                    </tr>
                                    ';
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//=============== MPESA PAYMENT ==========================-->
                <div class="tab-pane fade" id="payRent" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="container py-3">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="card border-primary">
                                    <div class="card-img">
                                        <img src="images/mpesaPaybill.jpg" class="card-img" alt="">
                                    </div>
                                    <form action="includes/register.inc.php" method="POST">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flash">

                                                <h6 class="text-center">PAYMENT INSTRUCTIONS</h6>

                                                <li class="list-group-item font-weight-bold"> 1.NOTE: You should pay
                                                    EXACTY KSH <?php echo$all_stdDetails['rm_fee'];?>/-
                                                </li>
                                                <li class="list-group-item"> 2. Pay to Mpesa PayBill 343166 </li>
                                                <li class="list-group-item"> 3. Enter The Ref. CODE Below</li>
                                            </ul>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="inputPassword4" class="font-weight-bold">Month</label>
                                                    <select id="inputState" name="month" class="form-control" required>
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
                                                    <label for="inputPassword4" class="font-weight-bold">Year</label>
                                                    <select id="inputState" name="year" class="form-control" required>
                                                        <option>2019</option>
                                                        <option>2020</option>
                                                        <option>2021</option>
                                                        <option>2022</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="form-group col">
                                                <label for="inputPassword4">Ref. CODE</label>
                                                <input type="text" name="refCODE" class="form-control border-primary"
                                                    id="inputPassword4" placeholder="e.g NF55EE98PP" required>
                                            </div>
                                        </div>
                                        <div class="card-footer justify-content-center ">
                                            <button type="submit" name="mpesacode"
                                                class="btn btn-outline-success btn-block ">
                                                SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="studentSettings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <form class="" action="includes\register.inc.php" method="POST">
                                    <div class="card">
                                        <div class="card-header bg-warning">Reset Password</div>
                                        <div class="card-body">
                                            <!--PASSWORD-->
                                            <div class="form-group col">
                                                <label for="inputPassword4">New Password</label>
                                                <input type="password" name="std_pwd" class="form-control"
                                                    id="inputPassword4" placeholder="Password" required>
                                            </div>
                                            <div class="form-group col">
                                                <label for="inputPassword4">Confirm New Password</label>
                                                <input type="password" name="std_pwd-repeat" class="form-control"
                                                    id="inputPassword4" placeholder="Confirm Password" required>
                                            </div>

                                            <!--Student REg Submit Button-->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button type="submit" name="std_resetPWD" class="btn btn-warning ">RESET
                                                    PASSWORD</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>


</body>

</html>