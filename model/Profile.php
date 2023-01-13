<?php

class Profile extends Connection 
{ 
    private $conn = '';
    public $id = '';
    public $lname = '';
    public $mname = '';
    public $fname = '';
    public $extn_name = '';
    public $birth_date = '';
    public $exact_address = '';
    public $email = '';
    public $mobile = '';
    public $gender = '';
    public $role = '';
    public $citizenship = '';
    public $civil_status = '';
    public $disability = '';
    public $region = '';
    public $province = '';
    public $citymun = '';
    public $created_at = '';
    public $updated_at = '';
    public $section = '';
    public $req = '';


    function __construct()
    {
        $this->conn = $this->connect();
    }


    public function setUserID($id) 
    {
        return $this->id = $id;
    }

    public function getUserID()
    {
        return $this->id;
    }

    public function setLastname($lname) 
    {
        return $this->lname = $lname;
    }

    public function getLastname()
    {
        return $this->lname;
    }

    public function setFirstname($fname) 
    {
        return $this->fname = $fname;
    }

    public function getFirstname()
    {
        return $this->fname;
    }

    public function setMiddlename($mname) 
    {
        return $this->mname = $mname;
    }

    public function getMiddlename()
    {
        return $this->mname;
    }

    public function setExtnName($extn_name) 
    {
        return $this->extn_name = $extn_name;
    }

    public function getExtnName()
    {
        return $this->extn_name;
    }

    public function setBirthDate($birth_date) 
    {
        return $this->birth_date = $birth_date;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setExactAddress($exact_address) 
    {
        return $this->exact_address = $exact_address;
    }

    public function getExactAddress()
    {
        return $this->exact_address;
    }

    public function setEmail($email) 
    {
        return $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMobile($mobile) 
    {
        return $this->mobile = $mobile;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setGender($gender) 
    {
        return $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setRegion($region) 
    {
        return $this->region = $region;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setProvince($province) 
    {
        return $this->province = $province;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setCityMun($citymun) 
    {
        return $this->citymun = $citymun;
    }

    public function getCityMun()
    {
        return $this->citymun;
    }

    public function setCitizenship($citizenship) 
    {
        return $this->citizenship = $citizenship;
    }

    public function getCitizenship()
    {
        return $this->citizenship;
    }

    public function setCivilStatus($civil_status) 
    {
        return $this->civil_status = $civil_status;
    }

    public function getCivilStatus()
    {
        return $this->civil_status;
    }

    public function setDisability($disability) 
    {
        return $this->disability = $disability;
    }

    public function getDisability()
    {
        return $this->disability;
    }

    public function setRole($role) 
    {
        return $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
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

    public function setSection($section) 
    {
        return $this->section = $section;
    }

    public function getSection()
    {
        return $this->section;
    }


    public function setRequest($req) 
    {
        return $this->req = $req;
    }

    public function getRequest()
    {
        return $this->req;
    }

    public function update()
    {
        $qry = "UPDATE tblprofile SET lname =:lname, fname =:fname, mname =:mname, extn_name =:extn_name, birth_date =:birth_date, exact_address =:exact_address, email =:email, mobile =:mobile, gender =:gender, disability =:disability, updated_at =:updated_at WHERE id =:id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->id);
        $stmt->bindParam('lname', $this->lname);
        $stmt->bindParam('fname', $this->fname);
        $stmt->bindParam('mname', $this->mname);
        $stmt->bindParam('extn_name', $this->extn_name);
        $stmt->bindParam('birth_date', $this->birth_date);
        $stmt->bindParam('exact_address', $this->exact_address);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('mobile', $this->mobile);
        $stmt->bindParam('gender', $this->gender);
        $stmt->bindParam('disability', $this->disability);
        $stmt->bindParam('updated_at', $this->created_at);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function updateRole()
    {
        $qry = "UPDATE tblprofile SET role =:role, updated_at =:updated_at WHERE id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('role', $this->role);
        $stmt->bindParam('updated_at', $this->updated_at);
        $stmt->bindParam('userid', $this->id);

        if ($stmt->execute()) {
            return $this->id;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM tblprofile WHERE id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function save()
    {
        $qry = "INSERT INTO tblprofile SET lname =:lname, fname =:fname, mname =:mname, extn_name =:extn_name, birth_date =:birth_date, exact_address =:exact_address, email =:email, mobile =:mobile, gender =:gender, province =:province, citymun =:citymun, section =:section, created_at =:created_at";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('lname', $this->lname);
        $stmt->bindParam('fname', $this->fname);
        $stmt->bindParam('mname', $this->mname);
        $stmt->bindParam('extn_name', $this->extn_name);
        $stmt->bindParam('birth_date', $this->birth_date);
        $stmt->bindParam('exact_address', $this->exact_address);
        $stmt->bindParam('email', $this->email);
        $stmt->bindParam('mobile', $this->mobile);
        $stmt->bindParam('gender', $this->gender);
        $stmt->bindParam('province', $this->province);
        $stmt->bindParam('citymun', $this->citymun);
        $stmt->bindParam('created_at', $this->created_at);
        $stmt->bindParam('section', $this->section);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function insertReq()
    {
        $qry = "UPDATE tblprofile SET req =:req, updated_at =:updated_at WHERE id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('req', $this->req);
        $stmt->bindParam('updated_at', $this->updated_at);
        $stmt->bindParam('userid', $this->id);

        if ($stmt->execute()) {
            return $this->id;
        } else {
            return false;
        }
    }
}