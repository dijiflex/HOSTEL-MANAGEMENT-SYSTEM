<?php
if (isset($_POST['admin_payment'])) {
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
            //convert the month into a int
        }elseif ($paidAmount>$stdRent) {
            $extraRent= $paidAmount - $stdRent;
            $count = floor($extraRent/$stdRent);
            $rem = $extraRent%$stdRent;

            
           
        }
        
        else {
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