<?php

class SchoolInformation extends Connection 
{ 
	
    private $conn = '';
    public $uid = '';
    public $program = '';
    public $ojt_coordinator = '';
    public $ojt_head = '';
    public $section = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setUserId($uid)
    {
        return $this->uid = $uid;
    }

    public function getUserId()
    {
        return $this->uid;
    }

    public function setProgram($program)
    {
        return $this->program = $program;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function setOjtCoordinator($ojt_coordinator)
    {
        return $this->ojt_coordinator = $ojt_coordinator;
    }

    public function getOjtCoordinator()
    {
        return $this->ojt_coordinator;
    }

    public function setOjtHead($ojt_head)
    {
        return $this->ojt_head = $ojt_head;
    }

    public function getOjtHead()
    {
        return $this->ojt_head;
    }

    public function setSection($section)
    {
        return $this->section = $section;
    }

    public function getSection()
    {
        return $this->section;
    }
    

    public function save()
    {
        $qry = "INSERT INTO tblschool_information SET uid =:uid, program =:program, ojt_coordinator =:ojt_coordinator, ojt_head =:ojt_head";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('uid', $this->uid);
        $stmt->bindParam('program', $this->program);
        $stmt->bindParam('ojt_coordinator', $this->ojt_coordinator);
        $stmt->bindParam('ojt_head', $this->ojt_head);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblschool_information WHERE uid =:uid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('uid', $this->uid);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function update()
    {
        $qry = "UPDATE tblschool_information SET program =:program, ojt_coordinator =:ojt_coordinator, ojt_head =:ojt_head WHERE uid =:uid";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('uid', $this->uid);
        $stmt->bindParam('program', $this->program);
        $stmt->bindParam('ojt_coordinator', $this->ojt_coordinator);
        $stmt->bindParam('ojt_head', $this->ojt_head);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function find()
    {
        $qry = "SELECT * FROM tblschool_information WHERE uid =:uid";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('uid', $this->uid);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($student) {
            return true; 
        } else {
            return false;
        }
    }

    public function updateProfileSection() 
    {
        $qry = "UPDATE tblprofile SET section =:section WHERE id =:id";
            
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->uid);
        $stmt->bindParam('section', $this->section);
        
        $stmt->execute();

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        } 
    }

}