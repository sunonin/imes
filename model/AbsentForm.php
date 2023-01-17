<?php

class AbsentForm extends Connection 
{ 
	private $table = 'tblabsent_form';
    private $conn = '';
    public $sid = '';
    public $reason = '';
    public $datetime = '';
    public $filename = '';
    public $tempname = '';
    public $filetype = '';
    public $filesize = '';
    public $path = '';


    function __construct() {
        $this->path = "../imes-admin/_uploads/absent-forms/";
        $this->conn = $this->connect();
    }


    public function setSid($sid)
    {
        return $this->sid = $sid;
    }

    public function getSid()
    {
        return $this->sid;
    }

    public function setDateTime($datetime)
    {
        return $this->datetime = $datetime;
    }

    public function getDateTime()
    {
        return $this->datetime;
    }

    public function setReason($reason)
    {
        return $this->reason = $reason;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setFilename($filename)
    {
        return $this->filename = rand().'-'.$filename;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setTempName($tempname)
    {
        return $this->tempname = $tempname;
    }

    public function getTempName()
    {
        return $this->tempname;
    }

    public function setFileType($filetype)
    {
        return $this->filetype = $filetype;
    }

    public function getFileType()
    {
        return $this->filetype;
    }

    public function setFileSize($filesize)
    {
        return $this->filesize = $filesize;
    }

    public function getFileSize()
    {
        return $this->filesize;
    }

    public function setDateAccomplished($date_accomplished)
    {
        return $this->date_accomplished = $date_accomplished;
    }

    public function getDateAccomplished()
    {
        return $this->date_accomplished;
    }


    public function save()
    {
        $qry = "INSERT INTO $this->table SET sid =:sid, reason =:reason, datetime =:datetime, attachment =:attachment";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('reason', $this->reason);
        $stmt->bindParam('datetime', $this->datetime);
        $stmt->bindParam('attachment', $this->filename);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function upload()
    {
        $path = $this->path . $this->filename;

        if (move_uploaded_file($this->tempname, $path)) {
            return $this->tempname;
        }
        
        return false;
    }

}