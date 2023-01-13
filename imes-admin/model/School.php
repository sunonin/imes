<?php

class School extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setSchoolId($id)
    {
        return $this->id = $id;
    }

    public function getSchoolId()
    {
        return $this->id;
    }

    public function setSchoolName($name)
    {
        return $this->name = $name;
    }

    public function getSchoolName()
    {
        return $this->name;
    }

    public function setSchoolType($type)
    {
        return $this->type = $type;
    }

    public function getSchoolType()
    {
        return $this->type;
    }

    public function setSchoolEmail($email)
    {
        return $this->email = $email;
    }

    public function getSchoolEmail()
    {
        return $this->email;
    }

    public function setSchoolPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function getSchoolPhone()
    {
        return $this->phone;
    }

    public function setSchoolAddress($address)
    {
        return $this->address = $address;
    }

    public function getSchoolAddress()
    {
        return $this->address;
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
        $qry = "INSERT INTO tblschool SET name =:name, email =:email, phone =:phone, address =:address";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('name', $this->name);
        $stmt->bindParam('address', $this->address);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('phone', $this->phone);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblschool WHERE id =:school_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('school_id', $this->id);

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