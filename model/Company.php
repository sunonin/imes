<?php

class Company extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $name = '';
    public $type = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->path = "../_images/";
        $this->conn = $this->connect();
    }


    public function setCompanyName($name)
    {
        return $this->name = $name;
    }

    public function getCompanyName()
    {
        return $this->name;
    }

    public function setCompanyType($type)
    {
        return $this->type = $type;
    }

    public function getCompanyType()
    {
        return $this->type;
    }

    public function setCompanyEmail($email)
    {
        return $this->email = $email;
    }

    public function getCompanyEmail()
    {
        return $this->email;
    }

    public function setCompanyPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function getCompanyPhone()
    {
        return $this->phone;
    }

    public function setCompanyAddress($address)
    {
        return $this->address = $address;
    }

    public function getCompanyAddress()
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
        $qry = "INSERT INTO tblcompany SET name =:name, type =:type, address =:address, email =:email, phone =:phone, created_at =:created_at";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('name', $this->name);
        $stmt->bindParam('type', $this->type);
        $stmt->bindParam('address', $this->address);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('phone', $this->phone);
        $stmt->bindParam('created_at', $this->created_at);
        
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