<?php

class StudentAppraisal extends Connection 
{ 
	
    private $conn = '';
    public $sid = '';
    public $criteria = '';
    public $rate = '';
    public $table = 'tblappraisal';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setUserId($id)
    {
        return $this->sid = $id;
    }

    public function getUserId()
    {
        return $this->sid;
    }

    public function setCriteria($criteria)
    {
        return $this->criteria = $criteria;
    }

    public function getCriteria()
    {
        return $this->criteria;
    }

    public function setRate($rate)
    {
        return $this->rate = $rate;
    }

    public function getRate()
    {
        return $this->rate;
    }

    

    public function save()
    {
        $qry = "INSERT INTO $this->table SET sid =:sid, criteria =:criteria, rate =:rate";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('criteria', $this->criteria);
        $stmt->bindParam('rate', $this->rate);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}