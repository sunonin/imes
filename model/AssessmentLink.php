<?php

class AssessmentLink extends Connection 
{ 
    private $conn = '';
    public $id = '';
    public $uid = '';
    public $comp_id = '';
    public $token = '';
    public $is_done = '';
    public $created_at = '';
    public $updated_at = '';
    public $link = "imes/assessment-link.php";


    function __construct()
    {
        $this->conn = $this->connect();
    }


    public function setUser($uid) 
    {
        return $this->uid = $uid;
    }

    public function getUser()
    {
        return $this->uid;
    }

    public function setID($id) 
    {
        return $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setCompany($comp_id) 
    {
        return $this->comp_id = $comp_id;
    }

    public function getCompany()
    {
        return $this->comp_id;
    }

    public function setToken($token) 
    {
        return $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setIsDone($is_done) 
    {
        return $this->is_done = $is_done;
    }

    public function getIsDone()
    {
        return $this->is_done;
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
        $qry = "INSERT INTO tblassessment_links SET sid =:uid, comp_id =:comp_id, date_created =:created_at";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('uid', $this->uid);
        $stmt->bindParam('comp_id', $this->comp_id);
        $stmt->bindParam('created_at', $this->created_at);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE tblassessment_links SET is_done =true, date_updated =:updated_at WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('updated_at', $this->updated_at);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCustom()
    {
        $qry = "UPDATE tblassessment_links SET is_done =true, date_updated =:updated_at WHERE comp_id =:comp_id AND is_done=false";
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('comp_id', $this->comp_id);
        $stmt->bindParam('updated_at', $this->updated_at);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}