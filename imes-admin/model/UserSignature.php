<?php

class UserSignature extends Connection 
{ 
	
    private $conn = '';
    public $user_id = '';
    public $signature_id = '';
    public $filename = '';
    public $tempname = '';
    public $filetype = '';
    public $filesize = '';
    public $path = '';

    function __construct() {
        $this->path = "../_signatures/";
        $this->conn = $this->connect();
    }


    public function setUserId($id)
    {
        return $this->user_id = $id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setSignatureId($signature_id)
    {
        return $this->signature_id = $signature_id;
    }

    public function getSignatureId()
    {
        return $this->signature_id;
    }

    public function setFileName($filename)
    {
        return $this->filename = rand().'-'.$filename;
    }

    public function getFileName()
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
    

    public function save()
    {
        $qry = "INSERT INTO tblsignatures SET user_id =:user_id, signature_id =:signature_id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('user_id', $this->user_id);
        $stmt->bindParam('signature_id', $this->filename);
        
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

    public function delete()
    {
        $qry = "DELETE FROM tblsignatures WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->user_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function removeUpload()
    {
        $qry = "SELECT * FROM tblsignatures WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->user_id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        unlink( $this->path.$user['signature_id'] );

        return true;
    }

}