<?php
    require 'header.php';
    include 'includes/admin_functions.php'
    ?>
<main>
    <!--Title Secton-->
    <section>
        <div class="row m-5">
            <div class="col text-center">
                <h1 class="text-uppercase text-dark mb-0">
                    <strong>HOSTEL MANAGENET SYSTEM</strong>
                </h1>
                <p class="mt-2 text-captalize text-black!!">Hostel Of Your Choice</p>

            </div>
        </div>
    </section>

    <!--ROOM CATEGORIES Section-->
    <section id="rooms" class="py-5  bg-secondary">
        <div class="container">
            <!--Pricing Tittle-->
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-uppercase text-white mb-0">
                        <strong>Room Categories</strong>
                    </h1>
                    <div class="title-underline bg-warning"></div>
                    <p class="mt-2 text-captalize text-light">Find YOur Choice</p>
                </div>
            </div>
            <!--End ROOM CATEGORIES -->

            <div class="row">
                <!--Sinle Bed room-->
                <div class="col-md-4 my-4">
                    <div class="card ">
                        <!--Card Header-->
                        <div class="card-header bg-primary text-white text-uppercase py-2">
                            <h3 class="text-center rmfont">-- Single Bedroom --</h3>
                        </div>
                        <!--Card Header-->
                        <div class="card-img">
                            <img src="images/beds-182965_1920.jpg" class="img-fluid" alt="">
                        </div>
                        <!--Card Title-->
                        <div class="card-title text-center my-2">
                            <h4 class="mb-0">
                                <sup>KSH</sup>7000
                                <sub>/month</sub>
                            </h4>
                        </div>
                        <button id="singleBedRoom" class="btn btn-sm w-auto mx-auto btn-success  mb-1">See Room
                            Details</button>
                        <button id="singleBedRoomHide"
                            class="btn btn-sm w-auto mx-auto btn-success btn-outline-success ">Hide Room
                            Details</button>
                        <div id="room1" class="card-body">
                            <!--List Item-->
                            <ul class="list-group list-group-flash text-center">
                                <li class="list-group-item">1 Bedroom</li>
                                <li class="list-group-item">Kitchen Area</li>
                                <li class="list-group-item">Waiting Room</li>
                            </ul>
                        </div>
                        <!--Card Footer-->
                        <div class="card-footer ">
                            <div class="d-flex border-warning justify-content-center pb-1">
                                <?php
                                    $obj_availableSinge = new ROOMS;
                                   $datas = $obj_availableSinge->avilable_roomType('SINGLE BEDROOM');
                                    echo'
                                   <a class="badge ">Available</a> <a class="btn-sm btn-success ">'.$datas.'</a>';
                                ?>

                            </div>

                            <a href="book.php" class="btn btn-outline-primary btn-block">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card-->

                <!--Bedsetter-->
                <div class="col-md-4 my-4">
                    <div class="card ">
                        <!--Card Header-->
                        <div class="card-header bg-primary text-white text-uppercase py-2">
                            <h3 class="text-center">--Bedsetter--</h3>
                        </div>
                        <!--Card Header-->
                        <div class="card-img">
                            <img src="images/bed-142517_1920.jpg" class="img-fluid" alt="">
                        </div>
                        <!--Card Title-->
                        <div class="card-title text-center my-2">
                            <h4 class="mb-0">
                                <sup>KSH</sup>5,000
                                <sub>/month</sub>
                            </h4>
                        </div>
                        <button id="singleBedRoom2" class="btn btn-sm w-auto mx-auto btn-success mb-1">See Room
                            Details</button>
                        <button id="singleBedRoomHide2"
                            class="btn btn-sm w-auto mx-auto btn-success btn-outline-success ">Hide Room
                            Details</button>

                        <div id="room2" class="card-body">
                            <!--List Item-->
                            <ul class="list-group list-group-flash text-center">
                                <li class="list-group-item">1 Bedroom</li>
                                <li class="list-group-item">Kitchen Area</li>
                                <li class="list-group-item">Waiting Room</li>
                            </ul>
                        </div>
                        <!--Card Footer-->
                        <div class="card-footer">
                            <div class="d-flex border-warning justify-content-center pb-1">
                                <?php
                                    $obj_availableSinge = new ROOMS;
                                   $datas = $obj_availableSinge->avilable_roomType('BEDSETTER');
                                    echo'
                                   <a class="badge ">Available</a> <a class="btn-sm btn-success ">'.$datas.'</a>';
                                ?>
                            </div>
                            <a href="book.php" class="btn btn-outline-primary btn-block">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card-->

                <!--Single Room-->
                <div class="col-md-4 my-4">
                    <div class="card ">
                        <!--Card Header-->
                        <div class="card-header bg-primary text-white text-uppercase py-2">
                            <h3 class="text-center">-- Single Room --</h3>
                        </div>
                        <!--Card Header-->
                        <div class="card-img">
                            <img src="images/kimono-1986491_1920.jpg" class="img-fluid" alt="">
                        </div>
                        <!--Card Title-->
                        <div class="card-title text-center my-2">
                            <h4 class="mb-0">
                                <sup>KSH</sup>3,000
                                <sub>/month</sub>
                            </h4>
                        </div>
                        <button id="singleBedRoom3" class="btn btn-sm w-auto mx-auto btn-success  mb-1">See Room
                            Details</button>
                        <button id="singleBedRoomHide3"
                            class="btn btn-sm w-auto mx-auto btn-success btn-outline-success ">Hide Room
                            Details</button>

                        <div id="room13" class="card-body">
                            <!--List Item-->
                            <ul class="list-group list-group-flash text-center">
                                <li class="list-group-item">1 Bedroom</li>
                                <li class="list-group-item">Kitchen Area</li>
                                <li class="list-group-item">Waiting Room</li>
                            </ul>
                        </div>
                        <!--Card Footer-->
                        <div class="card-footer">
                            <div class="d-flex border-warning justify-content-center pb-1">
                                <?php
                                    $obj_availableSinge = new ROOMS;
                                   $datas = $obj_availableSinge->avilable_roomType('SINGLE ROOM');
                                    echo'
                                   <a class="badge ">Available</a> <a class="btn-sm btn-success ">'.$datas.'</a>';
                                ?>
                            </div>
                            <a href="book.php" class="btn btn-outline-primary btn-block">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card-->
            </div>

        </div>
    </section>

    <!--Title Secton-->
    <section class="m-3">

    </section>

</main>
<footer id="footer">
    <div class="container-fluid">
        <div class="row py-4 text-center">
            <!-- Contact Us-->
            <div class="col-md-4 ">
                <h4>Contact Us</h4>
                <div class="card">
                    <ul class="list-group list-group-flash text-center">
                        <li class="list-group-item"> Opposite Kirinyaga University</li>
                        <li class="list-group-item"> <i class="fas fa-phone-volume fa-1x"></i> +254701702734</li>
                        <li class="list-group-item"> <i class="fas fa-envelope fa-1x"></i> +254701702734</li>
                        <li class="list-group-item"> P. O. Box 183–10303 <br>
                            kutus </li>
                    </ul>
                </div>


            </div>

            <!-- Location-->
            <div class="col-md-4 ">
                <h4>Location</h4>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6668083106415!2d37.2762948145031!3d-0.4993280996356987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18288039aaaaaaab%3A0x527dc91abb8b9071!2sKutus!5e0!3m2!1sen!2ske!4v1557244315957!5m2!1sen!2ske"
                        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Feedback-->
            <div class="col-md-4 ">
                <h4>Feedback</h4>
                <div class="card card-body">
                    <form method="post" action="includes\comment.inc.php">
                        <div class="row text-dark">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" cols="30" rows="4" class="w-100"
                                    placeholder="Write Your Comment Here"></textarea>
                            </div>

                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bd-example-modal-sm">Submit</button>

                        <!-- Submit modal -->
                        <div class="modal fade bd-example-modal-sm text-dark" tabindex="-1" role="dialog"
                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content p-3">
                                    <p> Are You sure You Want to Submit Your Feedback?</p>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-4 white mx-auto">
                <a href="" class="text-white"> FACEBOOK <i class="fab fa-facebook fa-lg"></i></a> </a>
                <a href="" class="text-white"> TWITER <i class="fab fa-twitter fa-lg"></i></a>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-4 mx-auto"><i class="fa fa-copyright" aria-hidden="true"></i>dijiflex@gmail.com
            </div>
        </div>
    </div>
</footer>



<!-- log n modal-->
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <form action="includes\login.inc.php" method="POST" class="form-container">
            <div class="modal-content">
                <!--modal header-->
                <div class="modal-header">
                    <h4 class="modal-titile">
                        Log In To See Your Profile
                    </h4>
                    <button type="button" class="close" data-dismiss="modal"> &times;

                    </button>

                </div>

                <!--modal body form-->

                <div class="modal-body">
                    <div class="fg form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="mail"
                            aria-describedby="emailHelp" placeholder="Enter email" required>

                    </div>
                    <div class="fg form-group">
                        <label for="exampleInputPassword1"> Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd"
                            placeholder="Password" required>
                    </div>
                </div>
                <!--modal footer-->
                <div class="modal-footer">
                    Are you a New User? <a href="register.php"> SignUp Here</a>
                    <button type="button" class="btn btn-outline-danger " data-dismiss="modal">Close</button>
                    <button type="submit" name="stdlogin" class="btn btn-outline-success ">LOG IN</button>
                </div>


            </div>

        </form>
    </div>
</div>






<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
<script src="js/main.js"></script>
</body>

</html>