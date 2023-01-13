<?php

class StudentHistory extends Connection 
{ 
    private $conn = '';
    public $uid = '';
    public $birth_place = '';
    public $citizenship = '';
    public $civil_status = '';
    public $provincial_address = '';
    public $provincial_phone = '';
    public $father = '';
    public $father_occupation = '';
    public $mother = '';
    public $mother_occupation = '';
    public $parents_address = '';
    public $parents_mobile = '';
    public $guardian = '';
    public $guardian_mobile = '';
    public $emergency_contact = '';


    function __construct()
    {
        $this->conn = $this->connect();
    }


    public function setUserId($uid) 
    {
        return $this->uid = $uid;
    }

    public function getUserId()
    {
        return $this->uid;
    }

    public function setBirthPlace($birth_place) 
    {
        return $this->birth_place = $birth_place;
    }

    public function getBirthPlace()
    {
        return $this->birth_place;
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

    public function setProvincialAddress($provincial_address) 
    {
        return $this->provincial_address = $provincial_address;
    }

    public function getProvincialAddress()
    {
        return $this->provincial_address;
    }

    public function setProvincialPhone($provincial_phone) 
    {
        return $this->provincial_phone = $provincial_phone;
    }

    public function getProvincialPhone()
    {
        return $this->provincial_phone;
    }

    public function setFatherName($father) 
    {
        return $this->father = $father;
    }

    public function getFatherName()
    {
        return $this->father;
    }

    public function setMotherName($mother) 
    {
        return $this->mother = $mother;
    }

    public function getMotherName()
    {
        return $this->mother;
    }

    public function setFatherOccupation($father_occupation) 
    {
        return $this->father_occupation = $father_occupation;
    }

    public function getFatherOccupation()
    {
        return $this->father_occupation;
    }

    public function setMotherOccupation($mother_occupation) 
    {
        return $this->mother_occupation = $mother_occupation;
    }

    public function getMotherOccupation()
    {
        return $this->mother_occupation;
    }

    public function setParentsAddress($parents_address) 
    {
        return $this->parents_address = $parents_address;
    }

    public function getParentsAddress()
    {
        return $this->parents_address;
    }

    public function setParentsMobile($parents_mobile) 
    {
        return $this->parents_mobile = $parents_mobile;
    }

    public function getParentsMobile()
    {
        return $this->parents_mobile;
    }

    public function setGuardianName($guardian) 
    {
        return $this->guardian = $guardian;
    }

    public function getGuardianName()
    {
        return $this->guardian;
    }

    public function setGuardianMobile($guardian_mobile) 
    {
        return $this->guardian_mobile = $guardian_mobile;
    }

    public function getGuardianMobile()
    {
        return $this->guardian_mobile;
    }

    public function setEmergencyContact($emergency_contact) 
    {
        return $this->emergency_contact = $emergency_contact;
    }

    public function getEmergencyContact()
    {
        return $this->emergency_contact;
    }




    public function save()
    {
        $qry = "INSERT INTO tblstudent_history SET birthplace =:birth_place, citizenship =:citizenship, civil_status =:civil_status, provincial_address =:provincial_address, provincial_phone =:provincial_phone, id =:id";
    
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->uid);
        $stmt->bindParam('birth_place', $this->birth_place);
        $stmt->bindParam('citizenship', $this->citizenship);
        $stmt->bindParam('civil_status', $this->civil_status);
        $stmt->bindParam('provincial_address', $this->provincial_address);
        $stmt->bindParam('provincial_phone', $this->provincial_phone);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE tblstudent_history SET birthplace =:birth_place, citizenship =:citizenship, civil_status =:civil_status, provincial_address =:provincial_address, provincial_phone =:provincial_phone WHERE id =:id";
    
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->uid);
        $stmt->bindParam('birth_place', $this->birth_place);
        $stmt->bindParam('citizenship', $this->citizenship);
        $stmt->bindParam('civil_status', $this->civil_status);
        $stmt->bindParam('provincial_address', $this->provincial_address);
        $stmt->bindParam('provincial_phone', $this->provincial_phone);
        
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function updateCustom()
    {
        $qry = "UPDATE tblstudent_history 
                SET 
                    father =:father, 
                    father_occupation =:father_occupation, 
                    mother =:mother, 
                    mother_occupation =:mother_occupation, 
                    parents_address =:parents_address, 
                    parents_mobile =:parents_mobile, 
                    guardians_name =:guardian, 
                    guardians_mobile =:guardian_mobile, 
                    notify =:emergency_contact
                WHERE id =:id";
    
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('id', $this->uid);
        $stmt->bindParam('father', $this->father);
        $stmt->bindParam('father_occupation', $this->father_occupation);
        $stmt->bindParam('mother', $this->mother);
        $stmt->bindParam('mother_occupation', $this->mother_occupation);
        $stmt->bindParam('parents_address', $this->parents_address);
        $stmt->bindParam('parents_mobile', $this->parents_mobile);
        $stmt->bindParam('guardian', $this->guardian);
        $stmt->bindParam('guardian_mobile', $this->guardian_mobile);
        $stmt->bindParam('emergency_contact', $this->emergency_contact);
        
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

    public function find()
    {
        $qry = "SELECT *
                FROM tblstudent_history 
                WHERE id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->uid);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($user) ? true : false;
    }
}