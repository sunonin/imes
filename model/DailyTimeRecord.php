<?php

class DailyTimeRecord extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $sid = '';
    public $time_in = '';
    public $time_out = '';
    public $hours = '';
    

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
    

    public function save()
    {
        $qry = "INSERT INTO tblstudent_dtr SET 
                time_in =:time_in, 
                sid =:sid";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_in', $this->time_in);
        $stmt->bindParam('sid', $this->sid);
        
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
                time_out =:time_out, hours =:hours WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('time_out', $this->time_out);
        $stmt->bindParam('hours', $this->hours);
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