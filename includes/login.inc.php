<?php
include 'dbh.inc.php';
$obj = new Dbh;
$pdo =$obj->connect();

if (isset($_POST['stdlogin'])) {
    include_once 'dbh.inc.php';
       
    $std_email = $_POST['mail'];
    $std_pwd = $_POST['pwd'];
   

    if (empty($std_email) || empty($std_pwd) ) {
        header( "Location:../index.php?emptyfields");
    } else {
        $sql = ("SELECT std_email,std_pwd FROM student WHERE std_email = ?");
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$std_email]);
            $row =$stmt->fetch();
            $pwdCheck= password_verify($std_pwd, $row['std_pwd']);

            if (!$pwdCheck== true) {
               // header( "Location:../index.php?wrongpassword");
               echo "<script> alert('Wrong Password');window.location='../index.php'</script>";
            } else {
                session_start();
				
					$_SESSION['std_email'] = $row['std_email'];
                   // header("Location: ../student.php?login=sucess");
                    echo "<script> alert('LOGIN SUCCESS');window.location='../student.php'</script>";
            }
        } else {
           echo " prepare failed";
        }
    }
} elseif (isset($_POST['adm_login-submit'])) {
    include_once 'dbh.inc.php';
       
    $adm_email = $_POST['adm_email'];
    $adm_pwd = $_POST['adm_pwd'];
   

    if (empty($adm_email) || empty($adm_pwd) ) {
        echo"<script> alert('Fill-in Allllllllllll The Fields');window.location='../admin_login.php'</script>";
    } else {
        $sql = ("SELECT adm_email,adm_pwd FROM admin WHERE adm_email = ?");
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$adm_email]);
            $row =$stmt->fetch();
            $pwdCheck= password_verify($adm_pwd, $row['adm_pwd']);

            if (!$pwdCheck== true) {
               echo "<script> alert('Wrong Password');window.location='../admin_login.php'</script>";
            } else {
                session_start();
				
					$_SESSION['adm_email'] = $row['adm_email'];
                   // header("Location: ../student.php?login=sucess");
                    echo "<script> alert('LOGIN SUCCESS');window.location='../admin.php#tr'</script>";
            }
        } else {
           echo " prepare failed";
        }
    }
}
 else {
    header( "Location:../index.php?joker");
}
