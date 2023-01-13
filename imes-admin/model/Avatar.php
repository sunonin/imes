<?php

class Avatar extends Connection 
{ 
	
    private $conn = '';
    public $user_id = '';
    public $avatar_id = '';
    public $filename = '';
    public $tempname = '';
    public $filetype = '';
    public $filesize = '';
    public $path = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->path = "../_images/";
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

    public function setAvatarId($avatar_id)
    {
        return $this->avatar_id = $avatar_id;
    }

    public function getAvatarId()
    {
        return $this->avatar_id;
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
        $qry = "INSERT INTO tblavatar SET user_id =:user_id, avatar_id =:avatar_id, created_at =:created_at";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('user_id', $this->user_id);
        $stmt->bindParam('avatar_id', $this->filename);
        $stmt->bindParam('created_at', $this->created_at);
        
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
        $qry = "DELETE FROM tblavatar WHERE user_id =:userid";
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
        $qry = "SELECT * FROM tblavatar WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->user_id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        unlink( $this->path.$user['avatar_id'] );

        return true;
    }

}