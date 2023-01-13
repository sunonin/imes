<?php

class Program extends Connection 
{ 
	
    private $conn = '';
    public $id = '';
    public $title = '';
    public $major = '';
    public $code = '';
    public $year_level = '';
    public $length_of_program = '';
    public $department = '';
    public $ojt_hours = '';
    public $created_at = '';
    public $updated_at = '';


    function __construct() {
        $this->path = "../_images/";
        $this->conn = $this->connect();
    }



    public function setProgramId($id)
    {
        return $this->id = $id;
    }

    public function getProgramId()
    {
        return $this->id;
    }

    public function setProgramtitle($title)
    {
        return $this->title = $title;
    }

    public function getProgramtitle()
    {
        return $this->title;
    }
    
    public function setProgramCode($code)
    {
        return $this->code = $code;
    }

    public function getProgramCode()
    {
        return $this->code;
    }

    public function setProgramMajor($major)
    {
        return $this->major = $major;
    }

    public function getProgramMajor()
    {
        return $this->major;
    }

    public function setProgramYearLevel($year_level)
    {
        return $this->year_level = $year_level;
    }

    public function getProgramYearLevel()
    {
        return $this->year_level;
    }

    public function setProgramLength($length_of_program)
    {
        return $this->length_of_program = $length_of_program;
    }

    public function getProgramLength()
    {
        return $this->length_of_program;
    }

    public function setProgramDepartment($department)
    {
        return $this->department = $department;
    }

    public function getProgramDepartment()
    {
        return $this->department;
    }

    public function setProgramOjtHours($ojt_hours)
    {
        return $this->ojt_hours = $ojt_hours;
    }

    public function getProgramOjtHours()
    {
        return $this->ojt_hours;
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
        $qry = "INSERT INTO tblschool_programs SET title =:title, major =:major, code =:code, department =:department, length_of_program =:length_of_program, ojt_hours =:ojt_hours";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('major', $this->major);
        $stmt->bindParam('code', $this->code);
        $stmt->bindParam('department', $this->department);
        $stmt->bindParam('length_of_program', $this->length_of_program);
        $stmt->bindParam('ojt_hours', $this->ojt_hours);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblschool_programs WHERE id =:company_id";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('company_id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function update()
    {
        $qry = "UPDATE tblschool_programs SET title =:title, major =:major, code =:code, department =:department, length_of_program =:length_of_program, ojt_hours =:ojt_hours WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('title', $this->title);
        $stmt->bindParam('major', $this->major);
        $stmt->bindParam('code', $this->code);
        $stmt->bindParam('department', $this->department);
        $stmt->bindParam('length_of_program', $this->length_of_program);
        $stmt->bindParam('ojt_hours', $this->ojt_hours);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}