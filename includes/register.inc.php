<?php

include 'dbh.inc.php';
$obj = new Dbh;
$pdo =$obj->connect();
class GETSESSION
{
    public function usersession()
    {
        session_start();
        $userSession = $_SESSION['std_email'];
        return $userSession;
    }
}

//=============== STUDENT REGISTRSATION ===========================================
if (isset($_POST['stdREgSubmit'])) {
    
    //include 'dbh.inc.php';
    //THIS
    $std_email = $_POST['sEmail'];
    $std_fname = $_POST['sfname'];
    $std_lname = $_POST['slname'];
    $std_course_name = $_POST['sCourseName'];
    $std_mobno = $_POST['sphoneNumber'];
    $std_nat_id = $_POST['sNID'];
    $std_regno = $_POST['sRegNo'];
    $std_pg_name = $_POST['sPg_name'];
    $std_pg_mobno = $_POST['sPg_pPhoneNo'];
    $std_pwd = $_POST['sNID'];
   
    //check if the fields are empty
    if (empty($std_email)||empty($std_fname)||empty($std_lname)||empty($std_course_name)||empty($std_mobno)||empty($std_nat_id)||empty($std_regno)||empty($std_pg_name)||empty($std_pg_mobno)||empty($std_pwd)) {
        $username_err="Some of the fields are empty";
        echo $username_err;
        exit();
    //validate email
    } elseif (!filter_var($std_email, FILTER_VALIDATE_EMAIL)) {
        $email_error="Wrong Email Format";
        echo $email_error;
    } else {
        $sql = ("SELECT std_email,std_nat_id FROM student WHERE std_email = ?  OR std_nat_id = ?");

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$std_email,$std_nat_id]);
            if ($stmt->rowCount() > 0) {
                header("Location: ../register.php?someonehasthesedetials");
                exit();
            } else {
                $sql = "INSERT INTO  student (std_email,std_fname,std_lname,std_course_name,std_mobno,std_nat_id,std_regno,std_pg_name,std_pg_mobno,std_pwd)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
    
                if (!$stmt = $pdo->prepare($sql)) {
                    echo "second preparation failed";
                } else {
                    $hashedpwd = password_hash($std_pwd, PASSWORD_DEFAULT);
                   
                    $stmt->execute([$std_email,$std_fname,$std_lname,$std_course_name,$std_mobno,$std_nat_id,$std_regno,$std_pg_name,$std_pg_mobno,$hashedpwd]);
                    echo"<script> alert('Signup Success. You Can now Log In to Access Your Profile');window.location='../index.php'</script>";
                }
            }
        } else {
            echo " prepare failed";
        }
    }
    //=============== ADMIN SIGNUP ===========================================
} elseif (isset($_POST['adm_signup-submit'])) {
    include_once 'dbh.inc.php';
    $adm_email = $_POST['adm_email'];
    $adm_fname = $_POST['adm_fname'];
    $adm_lname = $_POST['adm_lname'];
    $adm_mobno = $_POST['adm_phoneNumber'];
    $adm_nat_id = $_POST['adm_NID'];
    $adm_pwd = $_POST['adm_pwd'];
    $adm_pwd_repeat = $_POST['adm_pwd-repeat'];
  
   
    //check if the fields are empty
    if (empty($adm_email)||empty($adm_pwd)  || empty($adm_pwd_repeat)) {
        echo"<script> alert('Some of the fields are emplty');window.location='../admin_signup.php'</script>";
        exit();
    //validate email
    } elseif (!filter_var($adm_email, FILTER_VALIDATE_EMAIL)) {
        echo"<script> alert('Invalid Email');window.location='../admin_signup.php'</script>";
        exit();
    } else {
        $sql = ("SELECT adm_email FROM admin WHERE adm_email = ?  ");

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$adm_email]);
            if ($stmt->rowCount() > 0) {
                echo"<script> alert('Email you Entered already Exists in The database');window.location='../admin_signup.php'</script>";
                exit();
            } else {
                if (!$adm_pwd===$adm_pwd_repeat) {
                    echo"<script> alert('Password Dont match');window.location='../admin_signup.php'</script>";
                    exit();
                } else {
                    $sql = "INSERT INTO  admin (adm_email,adm_fname,adm_lname,adm_mobno,adm_nat_id,adm_pwd)
                    VALUES (?,?,?,?,?,?)";
    
                    if (!$stmt = $pdo->prepare($sql)) {
                        echo "second preparation failed";
                        exit();
                    } else {
                        $hashedpwd = password_hash($adm_pwd, PASSWORD_DEFAULT);
                        $stmt->execute([$adm_email,$adm_fname,$adm_lname,$adm_mobno,$adm_nat_id,$hashedpwd]);
                        echo"<script> alert('Signup Success. you can Now log in');window.location='../admin_login.php'</script>";
                    }
                }
            }
        } else {
            echo " prepare failed";
        }
    }
    //=============== ADMIN REG STUDENTS ===========================================
} elseif (isset($_POST['adm_stdREgSubmit'])) {
    include_once 'dbh.inc.php';
    
    //THIS
    $std_email = $_POST['sEmail'];
    $std_fname = $_POST['sfname'];
    $std_lname = $_POST['slname'];
    $std_course_name = $_POST['sCourseName'];
    $std_mobno = $_POST['sphoneNumber'];
    $std_nat_id = $_POST['sNID'];
    $std_regno = $_POST['sRegNo'];
    $std_pg_name = $_POST['sPg_name'];
    $std_pg_mobno = $_POST['sPg_pPhoneNo'];
    $std_pwd = $_POST['sNID'];
   
    //check if the fields are empty
    if (empty($std_email)||empty($std_fname)||empty($std_lname)||empty($std_course_name)||empty($std_mobno)||empty($std_nat_id)||empty($std_regno)||empty($std_pg_name)||empty($std_pg_mobno)||empty($std_pwd)) {
        $username_err="Some of the fields are empty";
        echo $username_err;
        exit();
    //validate email
    } elseif (!filter_var($std_email, FILTER_VALIDATE_EMAIL)) {
        $email_error="Wrong Email Format";
        echo $email_error;
    } else {
        $sql = ("SELECT std_email,std_nat_id FROM student WHERE std_email = ?  OR std_nat_id = ?");
        
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$std_email,$std_nat_id]);
            if ($stmt->rowCount() > 0) {
                echo"<script> alert('Someone is already registered with the same email address or the NATIONAL ID');window.location='../admin.php'</script>";
                exit();
            } else {
                $sql = "INSERT INTO  student (std_email,std_fname,std_lname,std_course_name,std_mobno,std_nat_id,std_regno,std_pg_name,std_pg_mobno,std_pwd)
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
    
                if (!$stmt = $pdo->prepare($sql)) {
                    echo "second preparation failed";
                } else {
                    $hashedpwd = password_hash($std_pwd, PASSWORD_DEFAULT);
        
                    $stmt->execute([$std_email,$std_fname,$std_lname,$std_course_name,$std_mobno,$std_nat_id,$std_regno,$std_pg_name,$std_pg_mobno,$hashedpwd]);
                    echo"<script> alert('Student Registered Successfully. You can now allocate a room to the student');window.location='../admin.php'</script>";
                }
            }
        } else {
            echo " prepare failed";
        }
    }
    //===================== ROOM REG
} elseif (isset($_POST['roomREgSubmit'])) {
    $rm_Type = $_POST['rmType'];
    $rm_No = $_POST['rmNo'];

    echo $rm_No,$rm_Type;

    if (empty($rm_Type)||empty($rm_No)) {
        echo"<script> alert('Fill all the input fields FOR room registration');window.location='../admin.php'</script>";
        exit();
    } else {
        $sql = ("SELECT rm_no FROM room WHERE rm_no = ?");
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$rm_No]);
            if ($stmt->rowCount() > 0) {
                echo"<script> alert('This room is already  registered');window.location='../admin.php'</script>";
                exit();
            } else {
                $sql = ("INSERT INTO room (rm_no,fk_rm_type_name) VALUES (?,?)");
        
                if ($stmt = $pdo->prepare($sql)) {
                    $stmt->execute([$rm_No,$rm_Type]);
                    echo"<script> alert('Room Registered Successfuly');window.location='../admin.php'</script>";
                } else {
                    echo " prepare failed";
                }
            }
        }
    }
    //=============== ALLOCATE ROOMS ===========================================
} elseif (isset($_POST['allocateRoom'])) {
    $std_email = $_POST['std_email'];
    $rm_Type = $_POST['rmType'];
    $rm_No = $_POST['rmNumber'];
    $mpesaCode= $_POST['refCODE'];

    if (empty($std_email || $rm_Type)||empty($rm_No)) {
        echo"<script> alert('Fill all the input fields FOR Allocate Students');window.location='../admin.php'</script>";
        exit();
    } else {
        //get room details and confirm with the  room type
        $sql = "SELECT rm_no,fk_rm_type_name FROM room WHERE rm_no = ?;";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$rm_No]);
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $roomNo = $row['rm_no'];
                $roomtype = $row['fk_rm_type_name'] ;
            }
        } else {
            echo " prepare failed";
        }

        if ($roomtype === $rm_Type) {
            //get records froom the database about the mpesa code submitted by the user
            $sql = "SELECT mpesa_code,mp_amount,student_std_id from mpesa WHERE mpesa_code = ?;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$mpesaCode]);
            // Check if the mpesa code is inthe database
            if ($stmt->rowCount()>0) {
                while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $paidAmount = $row['mp_amount'];
                    $foreighID = $row['student_std_id'];
                }
                //check is the mpesa code has already been used
                if (!is_null($foreighID)) {
                    echo"<script> alert('tHE MPESA CODE YOU ENTERED HAS ALREADY BEEEN SUBMITED');window.location='../book.php'</script>";
                } else {
                    //getting the student session
                    $objStudentSession = new GETSESSION;
                    $stdSESSON = $objStudentSession->usersession();
                    //retrieving data for the student session
                    require 'admin_functions.php';
                    $obj_getStdRoomFee = new STUDENTS;
                    $stdIDarray= $obj_getStdRoomFee->allStdDetail($stdSESSON);
                    $stdID=$stdIDarray['std_id'];
                    //getting the deposit fee of the specific room
                    $obj_RoomType= new ROOMS;
                    $rmTypes = $obj_RoomType->roomfees($rm_Type);
                    // print_r($rmTypes);
                   
                    foreach ($rmTypes as $key => $rmType) {
                        $depositFee=  $rmType['rm_fee'] ;
                    }
                                      
                    //check if the amount paid by mpesa id the same ad the deposit fee
                    if ($depositFee!=$paidAmount) {
                        echo '<script >alert(" Error! Depost Fee for a '.$rm_Type.' is '.$depositFee.' yet you paid '.$paidAmount.' You must now see the caretaker for help na Uache Ujinga");window.location="../student.php"</script>';
                    } else {
                        $sql="UPDATE mpesa SET student_std_id = ? WHERE (mpesa_code = ?);";
                        $stmt = $pdo->prepare($sql);
                        if ($stmt->execute([$stdID,$mpesaCode])) {

                            //inserting data into the mpesa table
                            $sql= "INSERT into deposit (depst_amount,depst_payMethod,student_std_id) VALUES (?,?,?)";
                            $stmt = $pdo->prepare($sql);
                            $payMethod = 'MPESA';
                            
                            if ($stmt->execute([$paidAmount,$payMethod,$stdID])) {
                                $sql = ("UPDATE room SET fkrm_std_id =? WHERE (rm_no = ? );
                                ");
                                
                                if ($stmt = $pdo->prepare($sql)) {
                                    $stmt->execute([$stdID,$roomNo]);
                                   // echo"<script> alert('Student Allocated Room Successfuly');window.location='../student.php'</script>";
                                } else {
                                    echo " prepare failed"; 
                                }
                            } else {
                                echo 'deposit execution failled';
                            }
                        } else {
                            echo 'mpesa execution failled';
                        }
                    }
                }
            } else {
                echo '<script >alert("Error your Mpesa CODE '.$mpesaCode.' Was Noy found in the databse. Please copy Paste The code Correcty and if the error pasists please contact the admin");window.location="../book.php"</script>';
            }
        } else {
            echo '<script >alert("Error Room '.$rm_No.' is not a '.$rm_Type.' but '.$roomtype.' ");window.location="../book.php"</script>';
        }
    }
} elseif (isset($_POST['mpesacode'])) {
    $mpesaCode = $_POST['refCODE'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if (empty($mpesaCode) || empty($month) ||empty($year)) {
        echo"<script> alert('MPESA FIELD IS EMPTY');window.location='../student.php'</script>";
    } else {
        $sql = "SELECT mpesa_code,mp_amount,student_std_id from mpesa WHERE mpesa_code = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mpesaCode]);
        //check if the mpesa code is in the database
        if ($stmt->rowCount()>0) {
            while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
                $paidAmount = $row['mp_amount'];
                $foreighID = $row['student_std_id'];
            }
            if (!is_null($foreighID)) {
                echo"<script> alert('tHE MPESA CODE YOU ENTERED HAS ALREADY BEEEN SUBMITED');window.location='../student.php'</script>";
            } else {
                //getting the student session
                $objStudentSession = new GETSESSION;
                $stdSESSON = $objStudentSession->usersession();
                //retrieving data for the student session
                require 'admin_functions.php';
                $obj_getStdRoomFee = new STUDENTS;
                $stdIDarray= $obj_getStdRoomFee->allStdDetail($stdSESSON);
            
                $stdID=$stdIDarray['std_id'];
                $monthlyRent = $stdIDarray['rm_fee'];
           
                if ($paidAmount != $monthlyRent) {
                    echo 'the amount you paid is '.$paidAmount.' yet Your monthly rent is '.$monthlyRent.'
                Please See The Hostel Caretaker for HELP ';
                } else {
                    $sql="UPDATE hms2.mpesa SET student_std_id = ? WHERE (mpesa_code = ?);";
                    $stmt = $pdo->prepare($sql);
                    if ($stmt->execute([$stdID,$mpesaCode])) {
                        switch ($month) {
                            case 'JANUARY':
                            $newMonth =1; break;
                            case 'FEBRUARY':
                                $newMonth =2; break;
                            case 'MARCH':
                                $newMonth =3; break;
                            case 'APRIL':
                                $newMonth =4; break;
                            case 'MAY':
                                $newMonth =5; break;
                            case 'JUNE':
                                $newMonth =6; break;
                            case 'JULY':
                                $newMonth =7; break;
                            case 'AUGUST':
                                $newMonth =8; break;
                            case 'SEPTEMBER':
                                $newMonth =9; break;
                            case 'OCTOBER':
                                $newMonth =10; break;
                            case 'NOVEMBER':
                                $newMonth =11; break;
                            case 'DECEMBER':
                                $newMonth =12; break;
                            default:
                            
                                break;
                        }
                        $sql= "INSERT into  payment(
                        pyt_method,pyt_amount,fk_pyt_std_id,fk_month_id,fk_year_id
                        )
                        VALUES(?,?,?,?,?)";
                        if ($stmt = $pdo->prepare($sql)) {
                            $payMethod='MPESA';
                            $stmt->execute([$payMethod,$paidAmount,$stdID,$newMonth,$year]);
                            echo'<script> alert("Your Payment of '.$stdRent.' Was Successfully Received ");window.location="../admin.php"</script>';
                        } else {
                            echo 'prepare failed';
                        }
                   
                        echo 'your payment has been recieved succesfuly';
                    } else {
                        echo 'Update Failed';
                    }
                }
            }
        } else {
            echo '<script >alert("Error your Mpesa CODE '.$mpesaCode.' Was NoT found in the databse. Please copy Paste The code Correcty and if the error pasists please contact the admin");window.location="../student.php"</script>';
        }
    }
}
//===============ADMIN ACCEPT PAYMENT=============================================
elseif (isset($_POST['admin_payment'])) {
    $std_email =  $_POST['stdEmail'];
    $payMethod = $_POST['payMethod'];
    $paidAmount = $_POST['payAmount'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if (empty($std_email) ||empty($payMethod) || empty($month) ||empty($year)) {
        echo"<script> alert('SOME FIELDS ARE EMPTY');window.location='../admin.php'</script>";
    } else {
        include 'admin_functions.php';
        $objStdData = new STUDENTS;
        $stdIDDATA = $objStdData->allStdDetail($std_email);
        $stdID = $stdIDDATA['std_id'];
        $stdRent = $stdIDDATA['rm_fee'];

        if ($paidAmount < $stdRent) {
            echo'<script> alert("AMOUNT PAID IS LESS THAN MONTH RENT WHICH IS '.$stdRent.' ");window.location="../admin.php"</script>';
        } else {
            switch ($month) {
                case 'JANUARY':
                 $newMonth =1; break;
                case 'FEBRUARY':
                    $newMonth =2; break;
                case 'MARCH':
                    $newMonth =3; break;
                case 'APRIL':
                    $newMonth =4; break;
                case 'MAY':
                    $newMonth =5; break;
                case 'JUNE':
                    $newMonth =6; break;
                case 'JULY':
                    $newMonth =7; break;
                case 'AUGUST':
                    $newMonth =8; break;
                case 'SEPTEMBER':
                    $newMonth =9; break;
                case 'OCTOBER':
                    $newMonth =10; break;
                case 'NOVEMBER':
                    $newMonth =11; break;
                case 'DECEMBER':
                    $newMonth =12; break;
                default:
                
                    break;
            }
            $sql= "INSERT into  payment(
              pyt_method,pyt_amount,fk_pyt_std_id,fk_month_id,fk_year_id
               )
             VALUES(?,?,?,?,?)";
            if ($stmt = $pdo->prepare($sql)) {
                $stmt->execute([$payMethod,$paidAmount,$stdID,$newMonth,$year]);
                echo'<script> alert("Your Payment of '.$stdRent.' Was Successfully Received ");window.location="../admin.php"</script>';
            } else {
                echo 'prepare failed';
            }
        }
    }
}
//=======DEALLOCATE ROOM FROM THE STUDENT==================================
elseif (isset($_POST['de_allocate'])) {
    $std_email =  $_POST['stdEmail'];
    include 'admin_functions.php';
    $objStdData = new STUDENTS;
    $stdIDDATA = $objStdData->allStdDetail($std_email);
    $stdID = $stdIDDATA['std_id'];
    $roomNo = $stdIDDATA['rm_no'];
    $sql= "UPDATE room SET fkrm_std_id = NULL WHERE (rm_no = ?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$roomNo]);
    echo'<script> alert("'.$std_email.' Has Been De-allocated The Room Successfuly");window.location="../admin.php"</script>';
}
//=============STUDENT RESET PASSWORD
elseif (isset($_POST['std_resetPWD'])) {
    $std_pwd = $_POST['std_pwd'];
    $std_pwd_repeat = $_POST['std_pwd-repeat'];
    if (empty($std_pwd) || empty($std_pwd_repeat)) {
        echo'<script> alert("Error! Please Fill All The Password Fields");window.location="../student.php"</script>';
    } else {
        if ($std_pwd===$std_pwd_repeat) {
            $hashedpwd = password_hash($std_pwd, PASSWORD_DEFAULT);
            include 'admin_functions.php';
            $obj_SESSION = new GETSESSION;
            $std_email = $obj_SESSION->usersession();

            $objStdData = new STUDENTS;
            $stdIDDATA = $objStdData->allStdDetail($std_email);
            $stdID = $stdIDDATA['std_id'];

            $sql= "UPDATE student SET std_pwd = ? WHERE (std_id = ?);";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$hashedpwd, $stdID]);
            echo'<script> alert("SUCCESS: Your Password Has Been Updated ");window.location="../student.php"</script>';
        } else {
            echo'<script> alert("Error! Password You Entered Do Not Match");window.location="../student.php"</script>';
        }
    }
} else {
    echo 'You area tryibg to acces this page the wrong way pliz click the registration button';
}
