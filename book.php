<?php
    require 'header.php';
    require 'includes/admin_functions.php';
    ?>
<div class="container mt-2">
    <div class="row">
        <div class="col-auto">
            <form action="includes\register.inc.php" method="POST">
                <div class="card border-primary">
                    <!--BOOK ROOM-->
                    <div class="card-header bg-primary">Room Details</div>

                    <div class="card-body">
                        <?php
                        $stdSession = $_SESSION['std_email'];
                        $objAllStdData= new STUDENTS;
                        $all_stdDetails =  $objAllStdData->allStdDetail($stdSession);

                                    echo '
                                    <div class="form-group col-auto">
                                    <label for="inputState">SELECT STUDENT</label>
                                    <select id="inputState" name="std_email" class="form-control" required>
                                       
                                        <option>'.$all_stdDetails['std_email'].'</option>
                                       
                                    </select>
                                </div> ';
                            
                                ?>
                        <div class="form-row">

                            <div class="form-group col-auto">
                                <label for="inputState">Room Type</label>
                                <select id="inputState" name="rmType" class="form-control" required>
                                    <option selected>SINGLE BEDROOM</option>
                                    <option>BEDSETTER</option>
                                    <option>SINGLE ROOM</option>
                                </select>
                            </div>
                            <div class="form-group col-auto">
                                <label for="inputZip">Room Number</label>
                                <select class="form-control" name="rmNumber" id="exampleFormControlSelect1">
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
                        <ul class="list-group list-group-flash">

                            <h6 class="text-center">PAYMENT INSTRUCTIONS</h6>
                            <li class="list-group-item"> 2. Pay to Mpesa PayBill 343166 </li>
                            <li class="list-group-item"> 3. Enter The Ref. CODE Below</li>
                        </ul>
                        <div class="form-group col">
                            <label for="inputPassword4">Ref. CODE</label>
                            <input type="text" name="refCODE" class="form-control border-primary" id="inputPassword4"
                                placeholder="e.g NF55EE98PP" required>
                        </div>


                        <div class="card-footer">
                            <?php
                                $roomNo = $all_stdDetails['rm_no'];
                                if (empty($roomNo)) {
                                    echo '<button type="submit" name="allocateRoom" class="btn btn-outline-success">
                                   CONFIRM ROOM BOOKING</button>';
                                } else {
                                    echo'<button type="button" name="allocateRoom" class="btn btn-outline-danger text-wrap">
                                   SORRY YOU ALREADY HAVE A ROOM ALLOCATED TO YOU</button>';
                                }
                            ?>

                        </div>

                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
</body>

</html>