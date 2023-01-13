<?php

class User extends Connection 
{ 
	
    private $conn = '';
    public $user_id = '';
    public $username = '';
    public $password = '';
    public $status = '';


    function __construct() {
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

    public function setUsername($uname)
    {
        return $this->username = $uname;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        return $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setStatus($status)
    {
        return $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function save()
    {
        $qry = "INSERT INTO tblusers SET user_id =:user_id, username =:username, password =:password";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->bindParam('user_id', $this->user_id);
        $stmt->bindParam('username', $this->username);
        $stmt->bindParam('password', $this->password);
        
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
        $qry = "DELETE FROM tblusers WHERE user_id =:userid";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('userid', $this->user_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }

    public function find()
    {
        $qry = "SELECT 
                tblusers.username, 
                tblprofile.id,
                CONCAT(tblprofile.fname, ' ', tblprofile.lname) as fullname,
                tblusers.password, tblavatar.avatar_id
                FROM tblusers 
                LEFT JOIN tblprofile ON tblprofile.id = tblusers.user_id
                LEFT JOIN tblavatar ON tblavatar.user_id = tblusers.user_id
                WHERE tblusers.username =:username AND tblusers.status = true AND tblprofile.role = 2";
        $stmt = $this->conn->prepare($qry);

        $stmt->bindParam('username', $this->username);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            if (password_verify($this->password, $user['password'])) {
                return $user = [
                    'id'        => $user['id'],
                    'username'  => $user['username'],
                    'fullname'  => $user['fullname'],
                    'avatar_id'  => $user['avatar_id'],
                ];    
            }
        }

        return false;
    }

    public function update()
    {
        if ($this->password != null) {
            $qry = "UPDATE tblusers SET username =:username, password =:password WHERE user_id =:user_id";
        
            $stmt = $this->conn->prepare($qry);
            $stmt->bindParam('user_id', $this->user_id);
            $stmt->bindParam('username', $this->username);
            $stmt->bindParam('password', $this->password);    
        } else {
            $qry = "UPDATE tblusers SET username =:username WHERE user_id =:user_id";
        
            $stmt = $this->conn->prepare($qry);
            $stmt->bindParam('user_id', $this->user_id);
            $stmt->bindParam('username', $this->username);
        }
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}