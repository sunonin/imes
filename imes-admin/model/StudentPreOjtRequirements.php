<?php

class StudentPreOjtRequirements extends Connection 
{ 
	
    const STATUS_DRAFT = 19;
    const STATUS_APPROVED = 20;
    const STATUS_RETURNED = 21;

    private $conn = '';
    public $id = '';
    public $student_id = '';
    public $notes = '';
    public $status = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setStudentId($student_id)
    {
        return $this->student_id = $student_id;
    }

    public function getStudentId()
    {
        return $this->student_id;
    }

    public function setNotes($notes)
    {
        return $this->notes = $notes;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setStatus($status)
    {
        return $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function update()
    {
        $qry = "UPDATE tblstudent_preojt SET notes=:notes, status=:status WHERE id=:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('notes', $this->notes);
        $stmt->bindParam('status', $this->status);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}