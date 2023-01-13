<?php

class Supervisor extends Connection 
{ 
	
    private $conn = '';
    public $company = '';
    public $supervisor = '';
    public $position = '';
    public $department = '';
    public $email = '';
    public $phone = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setCompany($id)
    {
        return $this->company = $id;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setSupervisor($supervisor_id)
    {
        return $this->supervisor = $supervisor_id;
    }

    public function getSupervisor()
    {
        return $this->supervisor;
    }

    public function setSupervisorPosition($position)
    {
        return $this->position = $position;
    }

    public function getSupervisorPosition()
    {
        return $this->position;
    }

    public function setSupervisorDepartment($department)
    {
        return $this->department = $department;
    }

    public function getSupervisorDepartment()
    {
        return $this->department;
    }

    public function setSupervisorEmail($email)
    {
        return $this->email = $email;
    }

    public function getSupervisorEmail()
    {
        return $this->email;
    }

    public function setSupervisorPhone($phone)
    {
        return $this->phone = $phone;
    }

    public function getSupervisorPhone()
    {
        return $this->phone;
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
        $qry = "INSERT INTO tblsupervisors SET company_id =:company, supervisor_id =:supervisor, position =:position, department =:department, email =:email, phone =:phone";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('company', $this->company);
        $stmt->bindParam('supervisor', $this->supervisor);
        $stmt->bindParam('position', $this->position);
        $stmt->bindParam('department', $this->department);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('phone', $this->phone);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblsupervisors WHERE company_id =:company_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('company_id', $this->company);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

}