<?php

class Department extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $title = '';
    public $dean = '';
    public $phone = '';
    public $email = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setDepartmentId($id)
    {
        return $this->id = $id;
    }

    public function getDepartmentId()
    {
        return $this->id;
    }

    public function setDepartmentTitle($title)
    {
        return $this->title = $title;
    }

    public function getDepartmentTitle()
    {
        return $this->title;
    }

    public function setDepartmentDean($dean)
    {
        return $this->dean = $dean;
    }

    public function getDepartmentDean()
    {
        return $this->dean;
    }

    public function setDepartmentPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function getDepartmentPhone()
    {
        return $this->phone;
    }

    public function setDepartmentEmail($email)
    {
        return $this->email = $email;
    }

    public function getDepartmentEmail()
    {
        return $this->email;
    }

    public function setCreatedAt($created_at) 
    {
        return $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setUpdatedAt($updated_at) 
    {
        return $this->updated_at = $updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    

    public function save()
    {
        $qry = "INSERT INTO tblschool_department SET title =:title, dean =:dean, email =:email, phone =:phone";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('dean', $this->dean);
        $stmt->bindParam('phone', $this->phone);
        $stmt->bindParam('email', $this->email);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblschool_department WHERE id =:department_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('department_id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function update()
    {
        $qry = "UPDATE tblschool_department SET title =:title, dean =:dean, phone =:phone, email =:email WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('dean', $this->dean);
        $stmt->bindParam('phone', $this->phone);
        $stmt->bindParam('email', $this->email);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}