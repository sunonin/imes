<?php

class StudentWorkSchedule extends Connection {

    private $conn = '';
    private $sid = '';
    private $start = '';
    private $end = '';
    private $table = 'tblstudent_workschedule';
	
	function __construct() {
        $this->conn = $this->connect();
    }

    public function setSid($sid)
    {
        return $this->sid = $sid;
    }

    public function getSid()
    {
        return $this->sid;
    }

    public function setStartTime($startTime)
    {
        return $this->start = $startTime;
    }

    public function getStartTime()
    {
        return $this->start;
    }

    public function setEndTime($endTime)
    {
        return $this->end = $endTime;
    }

    public function getEndTime()
    {
        return $this->end;
    }


    public function save()
    {
        $qry = "INSERT INTO $this->table SET sid =:sid, start =:start, end =:end";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('start', $this->start);
        $stmt->bindParam('end', $this->end);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $qry = "DELETE FROM $this->table WHERE sid =:sid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('sid', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        } 
    }

    public function find($id) 
    {
        $qry = "SELECT 
                    *
                FROM $this->table 
                WHERE sid =:sid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('sid', $id);
        $stmt->execute();

        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        return $users;
    }

}