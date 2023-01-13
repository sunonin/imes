<?php

class School extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $sid = '';
    public $start_date = '';
    public $end_date = '';
    public $title = '';
    public $remarks = '';
    public $status = '';
    public $approved_by = '';
    public $date_approved = '';
    public $created_by = '';
    public $date_created = '';


    function __construct() {
        $this->conn = $this->connect();
    }


    public function setJournalId($id) 
    {
        return $this->id = $id;
    }

    public function getJournalId()
    {
        return $this->id;
    }

    public function setSid($id) 
    {
        return $this->id = $id;
    }

    public function getSid()
    {
        return $this->id;
    }

    public function setStartDate($start_date) 
    {
        return $this->start_date = $start_date;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setEndDate($end_date) 
    {
        return $this->end_date = $end_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function setJournalTitle($title) 
    {
        return $this->title = $title;
    }

    public function getJournalTitle()
    {
        return $this->title;
    }

    public function setJournalRemarks($remarks) 
    {
        return $this->remarks = $remarks;
    }

    public function getJournalRemarks()
    {
        return $this->remarks;
    }

    public function setJournalStatus($status) 
    {
        return $this->status = $status;
    }

    public function getJournalStatus()
    {
        return $this->status;
    }

    public function setApprovedBy($approved_by) 
    {
        return $this->approved_by = $approved_by;
    }

    public function getApprovedBy()
    {
        return $this->approved_by;
    }

    public function setDateApproved($date_approved) 
    {
        return $this->date_approved = $date_approved;
    }

    public function getDateApproved()
    {
        return $this->date_approved;
    }

    public function setCreatedBy($created_by) 
    {
        return $this->created_by = $created_by;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setDateCreated($date_created) 
    {
        return $this->date_created = $date_created;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }
    

    public function save()
    {
        $qry = "INSERT INTO tblstudent_journal 
                SET sid =:sid, 
                start_date =:start_date, 
                title =:title,
                remarks =:remarks,
                status =:status,
                date_created =:date_created,
                created_by =:created_by";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('remarks', $this->remarks);
        $stmt->bindParam('status', $this->status);
        $stmt->bindParam('date_created', $this->date_created);
        $stmt->bindParam('created_by', $this->created_by);
        $stmt->bindParam('start_date', $this->start_date);
        
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