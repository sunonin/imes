<?php

class DailyTimeRecord extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $sid = '';
    public $time_in = '';
    public $time_out = '';
    public $ot_time_in = '';
    public $ot_time_out = '';
    public $hours = '';
    public $ot_hours = '';
    public $status = '';
    

    function __construct() {
        $this->conn = $this->connect();
    }


    public function setDailyTimeRecord($id)
    {
        return $this->id = $id;
    }

    public function getDailyTimeRecord()
    {
        return $this->id;
    }

    public function setStudentId($sid)
    {
        return $this->sid = $sid;
    }

    public function getStudentId()
    {
        return $this->sid;
    }

    public function setTimeIn($time_in)
    {
        return $this->time_in = $time_in;
    }

    public function getTimeIn()
    {
        return $this->time_in;
    }

    public function setTimeOut($time_out)
    {
        return $this->time_out = $time_out;
    }

    public function getTimeOut()
    {
        return $this->time_out;
    }

    public function setHours($hours)
    {
        return $this->hours = $hours;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function setStatus($status)
    {
        return $this->status = $status;
    }

    public function setOtTimeIn($ot_time_in)
    {
        return $this->ot_time_in = $ot_time_in;
    }

    public function getOtTimeIn()
    {
        return $this->ot_time_in;
    }

    public function setOtTimeOut($ot_time_out)
    {
        return $this->ot_time_out = $ot_time_out;
    }

    public function getOtTimeOut()
    {
        return $this->ot_time_out;
    }

    public function setOtHours($ot_hours)
    {
        return $this->ot_hours = $ot_hours;
    }

    public function getOtHours()
    {
        return $this->ot_hours;
    }
    

    public function save()
    {
        $qry = "INSERT INTO tblstudent_dtr SET 
                time_in =:time_in, 
                sid =:sid,
                am_status =:status";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_in', $this->time_in);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('status', $this->status);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE tblstudent_dtr SET 
                time_out =:time_out, hours =:hours, pm_status =:status WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_out', $this->time_out);
        $stmt->bindParam('status', $this->status);
        $stmt->bindParam('hours', $this->hours);
        $stmt->bindParam('id', $this->id);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function updateOvertimeIn()
    {
        $qry = "UPDATE tblstudent_dtr SET 
                ot_in =:time_in WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_in', $this->ot_time_in);
        $stmt->bindParam('id', $this->id);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function updateOvertimeOut()
    {
        $qry = "UPDATE tblstudent_dtr SET 
                ot_out =:time_out, ot_hours =:ot_hours WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_out', $this->ot_time_out);
        $stmt->bindParam('ot_hours', $this->ot_hours);
        $stmt->bindParam('id', $this->id);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblcompany WHERE id =:company_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('company_id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

}