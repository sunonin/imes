<?php

class Notification extends Connection 
{ 
	private $base_table = 'tblnotification';
    private $conn = '';
    private $id = '';
    public $user_id = '';
    public $msg = '';
    public $type = '';
    public $header = '';
    public $interval = '';
    public $has_read = '';
    public $created_at = '';


    function __construct() {
        $this->conn = $this->connect();
        $this->msg = '';
        $this->type = '';
        $this->header = '';
        $this->has_read = false;
    }


    public function setUserId($id)
    {
        return $this->user_id = $id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setMessage($msg)
    {
        return $this->msg = $msg;
    }

    public function getMessage()
    {
        return $this->msg;
    }

    public function setType($type)
    {
        return $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setHeader($header)
    {
        return $this->header = $header;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setInterval($interval)
    {
        return $this->interval = $interval;
    }

    public function getInterval()
    {
        return $this->interval;
    }

    public function setHasRead($has_read)
    {
        return $this->has_read = $has_read;
    }

    public function getHasRead()
    {
        return $this->has_read;
    }

    public function setCreatedAt($created_at)
    {
        return $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }


    public function save()
    {
        $qry = "INSERT INTO $this->base_table SET user_id =:user_id, msg =:msg, type =:type, has_read =:has_read, created_at =:created_at";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('user_id', $this->user_id);
        $stmt->bindParam('msg', $this->msg);
        $stmt->bindParam('type', $this->type);
        $stmt->bindParam('has_read', $this->has_read);
        $stmt->bindParam('created_at', $this->created_at);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE $this->base_table SET has_read = 1 WHERE id =:id";
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);

        if ($stmt->execute()) {
            return $this->id;
        } else {
            return false;
        }
    }

}