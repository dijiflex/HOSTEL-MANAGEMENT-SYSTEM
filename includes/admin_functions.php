<?php
class AllocateRooms extends Dbh
{
    public function laststudents()
    {
        $sql= "SELECT std_fname,std_lname,std_email,rm_no FROM student
        left outer JOIN room on fkrm_std_id = std_id WHERE fkrm_std_id IS NULL ORDER BY std_id DESC ;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $data=[];
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
//================ ROOMS =====
class ROOMS extends Dbh
{
    public function total_availableRooms_Count()
    {
        $sql= "SELECT rm_no from room  WHERE fkrm_std_id IS NULL;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $data = $stmt->rowCount();
        return $data;
    }

    public function total_availableRooms()
    {
        $sql= "SELECT rm_no from room  WHERE fkrm_std_id IS NULL;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $data=[];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }


    public function avilable_roomType($room)
    {
        $sql= "SELECT fk_rm_type_name from room 
        WHERE fkrm_std_id IS  NULL and fk_rm_type_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$room]);
        $data = $stmt->rowCount();
        return $data;
    }
    public function roomfees($roomType)
    {
        $sql= " SELECT * from roomtype where rm_type_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$roomType]);
        $data=[];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}


class STUDENTS extends Dbh
{
    public function registredstd()
    {
        $sql= "SELECT rm_no from room LEFT OUTER JOIN student ON rm_no =fk_rm_no WHERE fk_rm_no IS NULL";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $data=[];
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    public function allocatedStd()
    {
        $sql= "SELECT std_id,std_fname,std_lname,std_email,rm_no,fk_rm_type_name FROM student 
                inner JOIN ROOM on fkrm_std_id = std_id
                ORDER BY std_id DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
            $data=[];
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function allocatedStd_Count()
    {
        $sql= "SELECT std_id,std_fname,std_lname,std_email,rm_no,fk_rm_type_name FROM student 
                inner JOIN ROOM on fkrm_std_id = std_id
                ORDER BY std_id DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        // $count = $stmt->rowCount();

        return $count;
    }

    ///====THIS FUNCTION GETS ALL STUDENT DETAILS
    public function allStdDetail($user)
    {
        $sql = ("SELECT std_id,std_email,std_fname,std_lname,std_course_name,std_mobno,std_nat_id,rm_no, fk_rm_type_name,rm_fee
                FROM student
                left outer join room
                on std_id=fkrm_std_id
                left outer join roomtype
                on fk_rm_type_name =rm_type_name where std_email = ?
                ;");
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
      
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data = $row;
        }
      return $data;
    }

    public function studentSession()
    {
        $user = $_SESSION['std_email'];
        return $user;
    }
    //this function get the the paid deposit fees if the student
    public function stdDeposit($stdID)
    {
        $sql="SELECT * FROM deposit where student_std_id=? ";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$stdID]);
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data = $row;
        }
        return $data;
    }
}

class PAYMENTS extends Dbh
{
    public function paymentRecords($month, $year)
    {
        $sql = "SELECT pyt_id,pyt_method,pyt_amount,std_fname,std_lname,std_id,rm_no,fk_month_id,fk_year_id
                FROM payment
                inner join  student
                on fk_pyt_std_id=std_id
                inner join room
                on std_id=fkrm_std_id
                WHERE(fk_month_id = ? AND fk_year_id= ?)  ORDER BY pyt_id DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$month,$year]);
        $data =[];
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[]=$row;
        }
        return $data;
    }
    public function stdPayData($stdEmail)
    {
        $sql = "SELECT pyt_id,pyt_method,pyt_amount,fk_month_id,fk_year_id
                FROM payment
                inner join  student
                on fk_pyt_std_id=std_id
                WHERE(std_email=?) ORDER BY pyt_date DESC;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stdEmail]);
        $count = $stmt->rowCount();
        $data=[];
        if ($count<0) {
            return $data;
        } else {
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                $data[]=$row;
            }
            return $data;
        }
    }
    public function defaultedPayments($month, $year)
    {
        $sql = "SELECT DISTINCT std_email
                FROM payment
                inner join  student
                on fk_pyt_std_id=std_id
                inner join room
                on std_id=fkrm_std_id
                WHERE(fk_month_id = ? AND fk_year_id= ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$month,$year]);
        $data=[];
        while ($row=$stmt->fetch()) {
            $data[]=$row;
        }
        return $data;
    }

    public function stdIDS()
    {
        $sql= "SELECT std_email from student";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        while ($row=$stmt->fetch()) {
            $data[]=$row;
        }
        return $data;
    }
}
