<?php

class StudentOverview extends Connection 
{ 
	
    const TYPE_PREOJT = 1;
    const TYPE_TOTALHOURS = 2;

    private $conn = '';
    public $sid = '';
    public $cid = '';
    public $type_id = '';
    public $evaluated_by = '';
    public $remarks = '';
    public $final_rate = '';
    public $date_created = '';
    public $date_updated = '';
    public $supervisor = '';
    public $position = '';
    public $filename = '';
    public $tempname = '';
    public $fileSize = '';
    public $fileType = '';
    public $path = '';
    public $upload = '';
    

    function __construct() {
        $this->path = "../imes-admin/_images/";
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

    public function setCid($cid)
    {
        return $this->cid = $cid;
    }

    public function getCid()
    {
        return $this->cid;
    }

     public function setUpload($upload)
    {
        return $this->upload = $upload;
    }

    public function getUpload()
    {
        return $this->upload;
    }

    public function setTypeId($type_id)
    {
        return $this->type_id = $type_id;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setEvaluatedBy($evaluated_by)
    {
        return $this->evaluated_by = $evaluated_by;
    }

    public function getEvaluatedBy()
    {
        return $this->evaluated_by;
    }

    public function setRemarks($remarks)
    {
        return $this->remarks = $remarks;
    }

    public function getRemarks()
    {
        return $this->remarks;
    }

    public function setFinalRate($final_rate)
    {
        return $this->final_rate = $final_rate;
    }

    public function getFinalRate()
    {
        return $this->final_rate;
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

    public function setSupervisor($supervisor)
    {
        return $this->supervisor = $supervisor;
    }

    public function getSupervisor()
    {
        return $this->supervisor;
    }

    public function setPosition($position)
    {
        return $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
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
        $qry = "INSERT INTO tblstudent_overview SET sid =:sid, start =:start, end =:end";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('start', $this->start);
        $stmt->bindParam('end', $this->end);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function saveAssessment()
    {
        $qry = "INSERT INTO tblstudent_overview SET sid =:sid, type_id =:type_id, remarks =:remarks, rate =:rate, evaluated_by =:evaluated_by, supervisor =:supervisor, position =:position, date_created =:date_created, upload =:upload";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        $stmt->bindParam('type_id', $this->type_id);
        $stmt->bindParam('remarks', $this->remarks);
        $stmt->bindParam('rate', $this->final_rate);
        $stmt->bindParam('evaluated_by', $this->evaluated_by);
        $stmt->bindParam('supervisor', $this->supervisor);
        $stmt->bindParam('position', $this->position);
        $stmt->bindParam('date_created', $this->date_created);
        $stmt->bindParam('upload', $this->filename);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
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

    public function delete()
    {
        $qry = "DELETE FROM tblstudent_overview WHERE sid=:sid";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function reopen()
    {
        $qry = "UPDATE tblstudent_preojt SET status= '20' WHERE student_id=:sid";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('sid', $this->sid);
        
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