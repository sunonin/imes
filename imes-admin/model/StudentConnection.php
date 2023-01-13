<?php

class StudentConnection extends Connection 
{ 
	
    private $conn = '';
    public $sid = '';
    public $comp_id = '';
    public $date_created = '';
    public $date_updated = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setStudentId($sid)
    {
        return $this->sid = $sid;
    }

    public function getStudentId()
    {
        return $this->sid;
    }

    public function setCompId($comp_id)
    {
        return $this->comp_id = $comp_id;
    }

    public function getCompId()
    {
        return $this->comp_id;
    }

    public function setCreatedAt($date_created)
    {
        return $this->date_created = $date_created;
    }

    public function getCreatedAt()
    {
        return $this->date_created;
    }

    public function setUpdatedAt($updated_at)
    {
        return $this->date_updated = $date_updated;
    }

    public function getUpdatedAt()
    {
        return $this->date_updated;
    }

    

    public function save()
    {
        $qry = "INSERT INTO tblstudent_connection SET sid =:sid, comp_id =:comp_id, date_created =:date_created";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('comp_id', $this->comp_id);
        $stmt->bindParam('date_created', $this->date_created);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblstudent_connection WHERE sid =:sid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('sid', $this->sid);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function update()
    {
        $qry = "UPDATE tblschool SET name =:name, address =:address, email =:email, phone =:phone WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('name', $this->name);
        $stmt->bindParam('address', $this->address);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('phone', $this->phone);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}