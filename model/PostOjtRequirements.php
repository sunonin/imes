<?php

class PostOjtRequirements extends Connection 
{ 
	// tblstudent_postojt
    private $conn = '';
    public $student_id = '';
    public $type_id = '';
    public $filename = '';
    public $tempname = '';
    public $filetype = '';
    public $filesize = '';
    public $date_accomplished = '';
    public $path = '';


    function __construct() {
        $this->path = "../imes-admin/_uploads/pre-ojt-requirements/";
        $this->conn = $this->connect();
    }


    public function setStudentId($id)
    {
        return $this->student_id = $id;
    }

    public function getStudentId()
    {
        return $this->user_id;
    }

    public function setTypeId($type_id)
    {
        return $this->type_id = $type_id;
    }

    public function getTypeId()
    {
        return $this->type_id;
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
        $qry = "INSERT INTO tblstudent_postojt SET student_id =:student_id, type_id =:type_id, filename =:filename, date_accomplished =:date_accomplished";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('student_id', $this->student_id);
        $stmt->bindParam('type_id', $this->type_id);
        $stmt->bindParam('filename', $this->filename);
        $stmt->bindParam('date_accomplished', $this->date_accomplished);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus()
    {
        $qry = "UPDATE tblusers SET status = 1 WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('userid', $this->user_id);

        if ($stmt->execute()) {
            return $this->user_id;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblstudent_postojt WHERE tblstudent_postojt.student_id =:student_id AND tblstudent_postojt.type_id =:type_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('student_id', $this->student_id);
        $stmt->bindParam('type_id', $this->type_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function find()
    {
        $qry = "SELECT *
                FROM tblstudent_postojt 
                WHERE tblstudent_postojt.student_id =:student_id AND tblstudent_postojt.type_id =:type_id AND tblstudent_postojt.status = 21";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('student_id', $this->student_id);
        $stmt->bindParam('type_id', $this->type_id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($user) ? true : false;
    }

    public function upload()
    {
        $path = $this->path . $this->filename;

        if (move_uploaded_file($this->tempname, $path)) {
            return $this->tempname;
        }
        
        return false;
    }

    public function removeUpload()
    {
        $qry = "SELECT * FROM tblstudent_postojt WHERE tblstudent_postojt.student_id =:student_id AND tblstudent_postojt.type_id =:type_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('student_id', $this->student_id);
        $stmt->bindParam('type_id', $this->type_id);
        $stmt->execute();

        $file = $stmt->fetch(PDO::FETCH_ASSOC);
    
        unlink( $this->path.$file['filename'] );

        return true;
    }

}