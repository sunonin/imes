<?php

class Journal extends Connection 
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
    public $rate = '';
    public $created_by = '';
    public $date_created = '';
    public $date_updated = '';


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

    public function setStudentId($sid)
    {
        return $this->sid = $sid;
    }

    public function getStudentId()
    {
        return $this->sid;
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

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setRemarks($remarks)
    {
        return $this->remarks = $remarks;
    }

    public function getRemarks()
    {
        return $this->remarks;
    }

    public function setStatus($status)
    {
        return $this->status = $status;
    }

    public function getStatus()
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

    public function setRate($rate)
    {
        return $this->rate = $rate;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setDateCreated($date_created)
    {
        return $this->date_created = $date_created;
    }

    public function getDateCreated()
    {
        return $this->date_created;
    }

    public function setDateUpdated($date_updated)
    {
        return $this->date_updated = $date_updated;
    }

    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    
    

    public function save()
    {
        $qry = "INSERT INTO tblstudent_journal 
                SET sid =:sid, start_date =:start_date, end_date =:end_date, title =:title, remarks =:remarks, status =:status, approved_by =:approved_by, date_approved =:date_approved, created_by =:created_by, date_created =:date_created";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('start_date', $this->start_date);
        $stmt->bindParam('end_date', $this->end_date);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('remarks', $this->remarks);
        $stmt->bindParam('status', $this->status);
        $stmt->bindParam('approved_by', $this->approved_by);
        $stmt->bindParam('date_approved', $this->date_approved);
        $stmt->bindParam('created_by', $this->created_by);
        $stmt->bindParam('date_created', $this->date_created); 
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE tblstudent_journal 
                SET sid =:sid, 
                start_date =:start_date, 
                end_date =:end_date, 
                title =:title, 
                remarks =:remarks, 
                status =:status, 
                date_updated =:date_updated 
                WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('start_date', $this->start_date);
        $stmt->bindParam('end_date', $this->end_date);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('remarks', $this->remarks);
        $stmt->bindParam('status', $this->status);
        $stmt->bindParam('date_updated', $this->date_updated);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function updateTwo()
    {
        $qry = "UPDATE tblstudent_journal 
                SET title =:title, 
                remarks =:remarks, 
                date_updated =:date_updated 
                WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('remarks', $this->remarks);
        $stmt->bindParam('date_updated', $this->date_updated);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }


    }

    public function complete()
    {
        $qry = "UPDATE tblstudent_journal 
                SET approved_by =:approved_by, 
                date_approved =:date_approved, 
                rate =:rate, 
                date_updated =:date_updated 
                WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('approved_by', $this->approved_by);
        $stmt->bindParam('date_approved', $this->date_approved);
        $stmt->bindParam('rate', $this->rate);
        $stmt->bindParam('date_updated', $this->date_updated);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }


    }


    public function delete()
    {
        $qry = "DELETE FROM tblavatar WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->user_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

}