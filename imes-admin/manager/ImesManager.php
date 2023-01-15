<?php

class ImesManager extends Connection {

    private $conn = '';
    public $route = 'route/';


    function __construct() {
        $this->conn = $this->connect();
    }

	public function fetchUsers($id=null) 
	{
        $data = [];
		$qry = "SELECT 
                p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name as role, a.avatar_id
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblavatar a ON a.user_id = p.id
                LEFT JOIN tblrole r ON p.role = r.id";

        if (!empty($id)) {
            $qry .= " WHERE p.id = ".$id;
        }

        $qry .= " ORDER BY p.id ASC";
		
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($profiles as $profile) {
            $data[] = [
                'id'        => $profile['id'],
                'fullname'  => $profile['fname'] .' '. substr($profile['mname'], 0, 1) .'. '. $profile['lname'],
                'lname'     => $profile['lname'],
                'fname'     => $profile['fname'],
                'mname'     => substr($profile['mname'], 0, 1),
                'username'  => $profile['username'],
                'status'    => $profile['status'],
                'avatar_id'    => $profile['avatar_id'],
                'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
            ];
        }

        return $data;
	}

    public function fetchRegisteredUsers($type=null) 
    {
        $data = [];
        $qry = "SELECT 
                    p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name as role, a.avatar_id
                FROM 
                    tblprofile p
                LEFT JOIN 
                    tblusers u ON p.id = u.user_id
                LEFT JOIN 
                    tblavatar a ON a.user_id = p.id
                LEFT JOIN 
                    tblrole r ON p.role = r.id";
        
        if ($type == 0) {
            $qry .= " WHERE r.id IS NULL";
        } else if ($type == 1) {
            $qry .= " WHERE r.id IS NOT NULL";
        } else if ($type == 2) {
            $qry .= " WHERE r.id = 4";
        } else if ($type == 3) {
            $qry .= " WHERE r.id = 3";
        } else if ($type == 4) {
            $qry .= " WHERE r.id = 2";
        }

        $qry .= " ORDER BY p.id ASC";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->rowCount(PDO::FETCH_ASSOC);

        return json_encode($profiles);
    }

    public function fetchUser($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id, 
                    tblprofile.lname, 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblusers.username, 
                    tblusers.status, 
                    tblprofile.section, 
                    tblrole.name AS role, 
                    tblprofile.province, 
                    tblprofile.citymun, 
                    tblprofile.exact_address, 
                    tblprofile.extn_name, 
                    DATE_FORMAT(tblprofile.birth_date, '%Y-%m-%d') AS birth_date, 
                    tblprofile.gender, 
                    tblprofile.mobile, 
                    tblprofile.email, 
                    tblprofile.role, 
                    tblusers.status, 
                    tblavatar.avatar_id,
                    tblschool_programs.id AS program_id,
                    tblschool_programs.title AS program,
                    tblschool_programs.major,
                    tblschool_programs.year_level,
                    tblschool_programs.length_of_program,
                    tblschool_department.title AS department,
                    tblschool_department.dean,
                    tblschool_department.phone AS schoolDeanNo,
                    up.id AS ojt_coordinator,
                    up.mobile AS schoolCoordinatorNo,
                    hp.id AS ojt_head,
                    hp.mobile AS schoolHeadNo
                FROM tblprofile
                LEFT JOIN tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN tblavatar ON tblavatar.user_id = tblprofile.id
                LEFT JOIN tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN tblschool_information ON tblschool_information.uid = tblprofile.id
                LEFT JOIN tblschool_programs ON tblschool_programs.id = tblschool_information.program
                LEFT JOIN tblschool_department ON tblschool_department.id = tblschool_programs.department
                LEFT JOIN tblprofile up ON up.id = tblschool_information.ojt_coordinator
                LEFT JOIN tblprofile hp ON hp.id = tblschool_information.ojt_head
                WHERE tblprofile.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($profile);
    }

    public function fetchProvinces() 
    {
        $data = [];
        $qry = "SELECT * from tblprovince";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $provinces = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($provinces as $province) {
            $data[$province['province_c']] = $province['province_m'];
        }

        return $data;
    }

    public function fetchCityMuns($province) 
    {
        $data = [];

        $qry = "SELECT * FROM tblcitymun WHERE province_c = ".$province;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $citymuns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($citymuns as $citymun) {
            $data[$citymun['citymun_c']] = utf8_encode($citymun['citymun_m']);
        }

        return $data;
    }

    public function fetchRoles() 
    {
        $data = [];

        $qry = "SELECT * FROM tblrole";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($roles as $role) {
            $data[$role['id']] = [
                'name'          => $role['name'],
                'description'   => $role['description']
            ];
        }

        return json_encode($data);
    }

    public function fetchCompanies($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                c.id,
                c.name AS compName,
                c.type AS compType,
                c.address AS compAddress,
                c.email AS compEmail,
                c.phone AS compPhone,
                CONCAT(p.fname, ' ', p.lname) AS supervisor,
                s.position AS supPosition,
                al.id as alid
                FROM tblcompany c
                LEFT JOIN tblsupervisors s ON s.company_id = c.id
                LEFT JOIN tblprofile p ON p.id = s.supervisor_id
                LEFT JOIN tblassessment_links al ON al.comp_id = c.id AND al.is_done = false";

        if (!empty($id)) {
            $qry .= " WHERE c.id = ".$id;
        }

        $qry.= " ORDER BY c.id ASC";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($companies as $company) {
            $checker = false;
            if ($this->fetchForAssessment($company['id'])) {
                $checker = true;
            }

            $data[] = [
                'id'          => $company['id'],
                'name'        => $company['compName'],
                'type'        => $company['compType'] == 1 ? 'Private' : 'Government',
                'address'     => $company['compAddress'],
                'supervisor'  => $company['supervisor'],
                'position'    => $company['supPosition'],
                'alid'        => $company['alid'],
                'aschecker'   => $checker,
                'email'       => $company['compEmail']
            ];
        }

        return json_encode($data);
    }

    public function fetchCompany($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                c.id, 
                c.name AS compName, 
                c.type AS compType,
                IF(c.type = 1, 'Private', 'Public') AS compTypeText, 
                c.address AS compAddress, 
                c.email AS compEmail, 
                c.phone AS compPhone, 
                s.supervisor_id AS supervisor, 
                s.position AS supPosition, 
                s.department AS supDepartment, 
                s.email AS supEmail, 
                s.phone AS supPhone
                FROM tblcompany c
                LEFT JOIN tblsupervisors s ON s.company_id = c.id
                LEFT JOIN tblprofile p ON p.id = s.supervisor_id
                WHERE c.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($profile);
    }


    public function fetchSupervisors($id=null, $role=null) 
    {
        $data = [];
        $qry = "SELECT 
                p.id, CONCAT(p.fname, ' ', p.lname) as fullname, u.username, u.status, r.name as role, p.mobile, p.email
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id
                WHERE p.role = $role";

        if (!empty($id)) {
            $qry .= " AND p.id = ".$id;
        }
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[$profile['id']] = [
                'fullname'  => $profile['fullname'],
                'mobile'    => $profile['mobile'],
                'email'     => $profile['email'],
            ];
        }

        return json_encode($data);
    }


    public function fetchStudents($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id, 
                    tblprofile.lname, 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblprofile.section, 
                    tblusers.username, 
                    tblusers.status, 
                    tblrole.name AS role,
                    tblschool_programs.code AS program,
                    tblschool_programs.major,
                    tblschool_programs.ojt_hours,
                    (SELECT SUM(hours) FROM tblstudent_dtr WHERE tblstudent_dtr.sid = tblprofile.id) AS completedHours
                FROM 
                    tblprofile 
                LEFT JOIN 
                    tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN 
                    tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN 
                    tblschool_information ON tblprofile.id = tblschool_information.uid
                LEFT JOIN 
                    tblschool_programs ON tblschool_information.program = tblschool_programs.id
                WHERE 
                    tblprofile.role = 4 AND tblschool_information.uid IS NOT NULL";

        if (!empty($id)) {
            $qry .= " AND p.id = ".$id;
        }

        $qry .= " ORDER BY tblschool_programs.id, tblprofile.section, tblprofile.lname";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[] = [
                'id'        => $profile['id'],
                'fullname'  => $profile['lname'] .' '. $profile['fname'] .' '. ucfirst(substr($profile['mname'], 0, 1)) .'. ',
                'lname'     => $profile['lname'],
                'fname'     => $profile['fname'],
                'mname'     => $profile['mname'],
                'section'     => $profile['section'],
                'username'  => $profile['username'],
                'status'    => $profile['status'],
                'program'   => $profile['program'],
                'major'     => $profile['major'],
                'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
                'reqHours'  => $profile['ojt_hours'],
                'compHours' => number_format($profile['completedHours'], 2),
            ];
        }

        return json_encode($data);
    }

    public function fetchStudents2($program=null,$section=null,$name=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id, 
                    tblprofile.lname, 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblprofile.section, 
                    tblusers.username, 
                    tblusers.status, 
                    tblprofile.gender, 
                    tblrole.name AS role,
                    tblschool_programs.code AS program,
                    tblschool_programs.major,
                    tblschool_programs.ojt_hours,
                    (SELECT SUM(hours) FROM tblstudent_dtr WHERE tblstudent_dtr.sid = tblprofile.id) AS completedHours
                FROM 
                    tblprofile 
                LEFT JOIN 
                    tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN 
                    tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN 
                    tblschool_information ON tblprofile.id = tblschool_information.uid
                LEFT JOIN 
                    tblschool_programs ON tblschool_information.program = tblschool_programs.id
                WHERE 
                    tblprofile.role = 4 AND tblschool_information.uid IS NOT NULL";

        if (!empty($program) && $program != "") {
            $qry .= " AND tblschool_programs.id = ".$program;
        }

        if (!empty($section) && $section != "") {
            $qry .= " AND tblprofile.section = '".$section."'";
        }

        if (!empty($name) && $name != "") {
            $qry .= " AND tblprofile.lname LIKE '%".$name."%'";
            $qry .= " OR tblprofile.fname LIKE '%".$name."%'";
            $qry .= " OR tblprofile.mname LIKE '%".$name."%'";
        }

        $qry .= " ORDER BY tblschool_programs.id, tblprofile.section, tblprofile.lname";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[] = [
                'id'        => $profile['id'],
                'fullname'  => $profile['lname'] .' '. $profile['fname'] .' '. ucfirst(substr($profile['mname'], 0, 1)) .'. ',
                'lname'     => $profile['lname'],
                'fname'     => $profile['fname'],
                'mname'     => $profile['mname'],
                'section'     => $profile['section'],
                'username'  => $profile['username'],
                'status'    => $profile['status'],
                'program'   => $profile['program'],
                'gender'    => $profile['gender'] == "f" ? "Female" : "Male",
                'major'     => $profile['major'],
                'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
                'reqHours'  => $profile['ojt_hours'],
                'compHours' => number_format($profile['completedHours'], 2),
            ];
        }

        return json_encode($data);
    }

    public function fetchStudent($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id, 
                    tblprofile.lname, 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblusers.username, 
                    tblusers.status, 
                    tblrole.name AS role,
                    tblschool_programs.title AS program,  
                    tblschool_programs.major,  
                    tblschool_programs.year_level,  
                    tblschool_programs.length_of_program,  
                    tblschool_programs.ojt_hours,  
                    tblschool_department.title AS department,
                    tblschool_department.dean,
                    tblschool_department.phone AS dean_phone,
                    tblschool_department.email AS dean_email,
                    tblprofile.extn_name, 
                    tblprofile.gender, 
                    tblprofile.req, 
                    DATE_FORMAT(tblprofile.birth_date, '%m-%d-%Y') AS birthDate, 
                    tblstudent_history.birthplace,
                    tblstudent_history.citizenship, 
                    tblstudent_history.civil_status, 
                    CONCAT(tblprofile.exact_address, ', ', tblcitymun.citymun_m, ', ', tblprovince.province_m) AS present_address, 
                    tblprofile.mobile, 
                    tblstudent_history.provincial_address, 
                    tblstudent_history.provincial_phone, 
                    CONCAT(ss.fname, ' ', ss.lname) as ojt_coordinator, 
                    CONCAT(sj.fname, ' ', sj.lname) as ojt_head, 
                    ss.mobile AS ojt_coordinator_mobile, 
                    sj.mobile AS ojt_head_mobile, 
                    tblstudent_history.father, 
                    tblstudent_history.mother, 
                    tblstudent_history.father_occupation, 
                    tblstudent_history.mother_occupation, 
                    tblstudent_history.parents_address, 
                    tblstudent_history.guardians_name as guardian, 
                    tblstudent_history.guardians_mobile, 
                    tblstudent_history.parents_mobile, 
                    tblstudent_history.notify,
                    tblavatar.avatar_id,
                    tblschool_programs.ojt_hours,
                    (SELECT SUM(hours) FROM tblstudent_dtr WHERE tblstudent_dtr.sid = tblprofile.id) AS completedHours,
                    sw.start AS startTime,
                    sw.end AS endTime
                FROM 
                    tblprofile
                LEFT JOIN 
                    tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN 
                    tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN 
                    tblstudent_history ON tblstudent_history.id = tblprofile.id
                LEFT JOIN 
                    tblschool_information ON tblschool_information.uid = tblprofile.id
                LEFT JOIN 
                    tblschool_programs ON tblschool_programs.id = tblschool_information.program
                LEFT JOIN 
                    tblschool_department ON tblschool_department.id = tblschool_programs.department
                LEFT JOIN 
                    tblavatar ON tblavatar.user_id = tblprofile.id
                LEFT JOIN 
                    tblprovince ON tblprovince.province_c = tblprofile.province
                LEFT JOIN 
                    tblcitymun ON tblcitymun.region_c = tblprofile.region AND tblcitymun.province_c = tblprofile.province AND tblcitymun.citymun_c = tblprofile.citymun
                LEFT JOIN 
                    tblprofile ss ON ss.id = tblschool_information.ojt_coordinator
                LEFT JOIN 
                    tblprofile sj ON sj.id = tblschool_information.ojt_head
                LEFT JOIN 
                    tblstudent_workschedule sw ON sw.sid = tblprofile.id

                WHERE tblprofile.role = 4";

        if (!empty($id)) {
            $qry .= " AND tblprofile.id = ".$id;
        }

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        $birthDate = explode("-", $profile['birthDate']);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));

        $data = [
            'fullname'  => $profile['fname'] .' '. substr($profile['mname'], 0, 1) .'. '. $profile['lname'],
            'lname'     => $profile['lname'],
            'fname'     => $profile['fname'],
            'mname'     => $profile['mname'],
            'username'  => $profile['username'],
            'status'    => $profile['status'],
            'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
            'program'   => $profile['program'],
            'extn_name' => $profile['extn_name'],
            'gender'    => $profile['gender'],
            'birth_date'    => $profile['birthDate'],
            'age'       => $age,
            'birth_place'    => $profile['birthplace'],
            'citizenship'    => $profile['citizenship'],
            'civil_status'    => $profile['civil_status'],
            'present_address'    => $profile['present_address'],
            'mobile'    => $profile['mobile'],
            'provincial_address'    => $profile['provincial_address'],
            'provincial_phone'    => $profile['provincial_phone'],
            'ojt_coordinator'    => $profile['ojt_coordinator'],
            'ojt_head'    => $profile['ojt_head'],
            'ojt_coordinator_mobile' => $profile['ojt_coordinator_mobile'],
            'ojt_head_mobile' => $profile['ojt_head_mobile'],
            'father' => $profile['father'],
            'father_occupation' => $profile['father_occupation'],
            'mother' => $profile['mother'],
            'mother_occupation' => $profile['mother_occupation'],
            'parents_address' => $profile['parents_address'],
            'parents_mobile' => $profile['parents_mobile'],
            'guardian' => $profile['guardian'],
            'guardians_mobile' => $profile['guardians_mobile'],
            'notify' => $profile['notify'],
            'avatar_id' => $profile['avatar_id'],
            'year_level' => $profile['year_level'],
            'major' => $profile['major'],
            'length_of_program' => $profile['length_of_program'],
            'department' => $profile['department'],
            'reqHours' => $profile['ojt_hours'],
            'compHours' => $profile['completedHours'],
            'req' => $profile['req'],
            'startTime' => !empty($profile['startTime']) ? date('h:i A', strtotime($profile['startTime'])) : '',
            'endTime' => !empty($profile['endTime']) ? date('h:i A', strtotime($profile['endTime'])) : '',

        ];

        return json_encode($data);
    }

    public function fetchStudentTwo($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id, 
                    tblprofile.lname, 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblusers.username, 
                    tblusers.status, 
                    tblrole.name AS role,
                    tblschool_programs.title AS program,  
                    tblschool_programs.major,  
                    tblschool_programs.year_level,  
                    tblschool_programs.length_of_program,  
                    tblschool_programs.ojt_hours,  
                    tblschool_department.title AS department,
                    tblschool_department.dean,
                    tblschool_department.phone AS dean_phone,
                    tblschool_department.email AS dean_email,
                    tblprofile.extn_name, 
                    tblprofile.gender, 
                    DATE_FORMAT(tblprofile.birth_date, '%m-%d-%Y') AS birthDate, 
                    tblstudent_history.birthplace,
                    tblstudent_history.citizenship, 
                    tblstudent_history.civil_status, 
                    CONCAT(tblprofile.exact_address, ', ', tblcitymun.citymun_m, ', ', tblprovince.province_m) AS present_address, 
                    tblprofile.mobile, 
                    tblstudent_history.provincial_address, 
                    tblstudent_history.provincial_phone, 
                    CONCAT(ss.fname, ' ', ss.lname) as ojt_coordinator, 
                    CONCAT(sj.fname, ' ', sj.lname) as ojt_head, 
                    ss.mobile AS ojt_coordinator_mobile, 
                    sj.mobile AS ojt_head_mobile, 
                    tblstudent_history.father, 
                    tblstudent_history.mother, 
                    tblstudent_history.father_occupation, 
                    tblstudent_history.mother_occupation, 
                    tblstudent_history.parents_address, 
                    tblstudent_history.guardians_name as guardian, 
                    tblstudent_history.guardians_mobile, 
                    tblstudent_history.parents_mobile, 
                    tblstudent_history.notify,
                    tblavatar.avatar_id
                FROM 
                    tblprofile
                LEFT JOIN 
                    tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN 
                    tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN 
                    tblstudent_history ON tblstudent_history.id = tblprofile.id
                LEFT JOIN 
                    tblschool_information ON tblschool_information.uid = tblprofile.id
                LEFT JOIN 
                    tblschool_programs ON tblschool_programs.id = tblschool_information.program
                LEFT JOIN 
                    tblschool_department ON tblschool_department.id = tblschool_programs.department
                LEFT JOIN 
                    tblavatar ON tblavatar.user_id = tblprofile.id
                LEFT JOIN 
                    tblprovince ON tblprovince.province_c = tblprofile.province
                LEFT JOIN 
                    tblcitymun ON tblcitymun.region_c = tblprofile.region AND tblcitymun.province_c = tblprofile.province AND tblcitymun.citymun_c = tblprofile.citymun
                LEFT JOIN 
                    tblprofile ss ON ss.id = tblschool_information.ojt_coordinator
                LEFT JOIN 
                    tblprofile sj ON sj.id = tblschool_information.ojt_head

                WHERE tblprofile.role = 4";

        if (!empty($id)) {
            $qry .= " AND tblprofile.id = ".$id;
        }

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        $birthDate = explode("-", $profile['birthDate']);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));

        $total = 30;

        $total += !empty($profile['birthplace']) ? 2 : 0;
        $total += !empty($profile['citizenship']) ? 2 : 0;
        $total += !empty($profile['civil_status']) ? 2 : 0;
        $total += !empty($profile['provincial_address']) ? 2 : 0;
        $total += !empty($profile['provincial_phone']) ? 2 : 0;

        return json_encode($total);
    }


    public function fetchSchool($id=null)
    {
        $qry = "SELECT * FROM tblschool";

        if (!empty($id)) {
            $qry .= " WHERE id =".$id;
        }

        $qry .= " LIMIT 1";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $school = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($school);
    }

    public function fetchPrograms($id=null)
    {
        $qry = "SELECT 
                tblschool_programs.id AS id,
                tblschool_programs.title,
                tblschool_programs.major,
                tblschool_programs.length_of_program AS length,
                tblschool_department.title AS department,
                tblschool_department.id AS dept_id,
                tblschool_programs.ojt_hours,
                tblschool_programs.code
                FROM tblschool_programs
                LEFT JOIN tblschool_department ON tblschool_department.id = tblschool_programs.department";

        if (!empty($id)) {
            $qry .= " WHERE tblschool_programs.id =".$id;
        }

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        if (!empty($id)) {
            $school = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $school = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return json_encode($school);
    }

    public function fetchDepartments($id=null)
    {
        $qry = "SELECT * FROM tblschool_department";

        if (!empty($id)) {
            $qry .= " WHERE id =".$id;
        }

        $qry .= " ORDER BY id ASC";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        if (empty($id)) {
            $school = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $school = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return json_encode($school);
    }

    public function fetchSchoolData($id=null)
    {
        $qry = "SELECT 
                tblschool_department.title AS department,
                tblschool_programs.title AS program,
                tblschool_programs.major AS major,
                (SELECT COUNT(*) FROM tblschool_information WHERE tblschool_information.program = tblschool_programs.id) AS count
                FROM tblschool_programs
                LEFT JOIN tblschool_department ON tblschool_department.id = tblschool_programs.department
                ORDER BY tblschool_department.id";
                
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $dd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        if (!empty($dd)) {
            foreach ($dd as $key => $d) {
                $data[] = [
                    'department' => $d['department'],
                    'program' => $d['program'],
                    'major' => $d['major'],
                    'count' => $d['count']
                ]; 
            }
        }

        return json_encode($data);
    }

    public function fetchDeptOpts()
    {
        $qry = "SELECT * FROM tblschool_department";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $dd = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        if (!empty($dd)) {
            foreach ($dd as $key => $d) {
                $data[$d['id']] = [
                    'title' => $d['title'],
                    'dean' => $d['dean']
                ]; 
            }
        }

        return json_encode($data);
    }

    public function fetchProgramOpts($id=null)
    {
        $qry = "SELECT 
                    tblschool_programs.id,
                    tblschool_programs.title,
                    tblschool_programs.major,
                    tblschool_programs.year_level,
                    tblschool_programs.length_of_program,
                    tblschool_department.dean,
                    tblschool_department.title AS department,
                    tblschool_department.phone AS dean_phone
                FROM
                    tblschool_programs
                INNER JOIN tblschool_information ON tblschool_information.program = tblschool_programs.id
                INNER JOIN tblprofile ON tblprofile.id = tblschool_information.uid
                LEFT JOIN tblschool_department ON tblschool_department.id = tblschool_programs.department";

        if (!empty($id)) {
            $qry .= " WHERE tblschool_programs.id =".$id;
        }

        $qry .= " ORDER BY tblschool_programs.title";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        if (empty($id)) {
            $dd = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $data = [];
            if (!empty($dd)) {
                foreach ($dd as $key => $d) {
                    $data[$d['id']] = [
                        'title' => $d['title'],
                        'major' => $d['major'],
                        'year_level' => $d['year_level'],
                        'length_of_program' => $d['length_of_program'],
                        'dean' => $d['dean']
                    ]; 
                }
            }

            return json_encode($data);
        } else {
            $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return json_encode($dd);
        }

    }

    public function fetchProgramOpts2($id=null)
    {
        $qry = "SELECT 
                    tblprofile.section
                FROM
                    tblschool_programs
                INNER JOIN tblschool_information ON tblschool_information.program = tblschool_programs.id
                INNER JOIN tblprofile ON tblprofile.id = tblschool_information.uid
                LEFT JOIN tblschool_department ON tblschool_department.id = tblschool_programs.department";

        if (!empty($id)) {
            $qry .= " WHERE tblschool_programs.id =".$id;
        }

        $qry .= " GROUP BY tblprofile.section ORDER BY tblprofile.section";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        if (empty($id)) {
            $dd = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $data = [];
            if (!empty($dd)) {
                foreach ($dd as $key => $d) {
                    $data[$d['section']] = $d['section']; 
                }
            }

            return json_encode($data);
        } else {
            $dd = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return json_encode($dd);
        }

    }

    public function fetchSchoolInfo()
    {
        $qry = "SELECT * FROM tblschool";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
        return json_encode($dd);
    }

    public function fetchStudentPreOjtReq($id=null)
    {
        $qry = "SELECT * FROM tblstudent_preojt WHERE student_id =".$id;
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'reqId'         => $doc['id'],
                'filename'      => $doc['filename'],
                'status'        => $doc['status'],
                'notes'         => $doc['notes'],
                'dateUploaded'  => date('Y-m-d h:i:s', strtotime($doc['date_accomplished'])),
            ];
        }

        return json_encode($data);
    }

    public function fetchStudentPostOjtReq($id=null)
    {
        $qry = "SELECT * FROM tblstudent_postojt WHERE student_id = $id";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'reqId'     => $doc['id'],
                'filename'  => $doc['filename'],
                'status'    => $doc['status'],
                'notes'     => $doc['notes'],
                'dateUploaded' => date('Y-m-d h:i:s', strtotime($doc['date_accomplished'])),
            ];
        }
        
        return json_encode($data);
    }

    public function fetchSupervisorRate($id=null)
    {
        $qry = "SELECT * FROM tblstudent_postojt WHERE student_id = $id";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'reqId'     => $doc['id'],
                'filename'  => $doc['filename'],
                'status'    => $doc['status'],
                'notes'     => $doc['notes'],
                'dateUploaded' => date('Y-m-d h:i:s', strtotime($doc['date_accomplished'])),
            ];
        }
        
        return json_encode($data);
    }

    public function fetchStudentOverview($id=null)
    {
        $qry = "SELECT 
                    tblprofile.fname, 
                    tblprofile.mname, 
                    tblprofile.lname,
                    tblstudent_overview.type_id,
                    tblstudent_overview.remarks,
                    tblstudent_overview.rate,
                    tblstudent_overview.supervisor,
                    DATE_FORMAT(tblstudent_overview.date_created, '%m/%d/%Y %h:%i:%s') AS date_created, 
                    DATE_FORMAT(tblstudent_overview.date_updated, '%m/%d/%Y %h:%i:%s') AS date_updated,
                    evar.fname AS evarFname,
                    evar.mname AS evarMname,
                    evar.lname AS evarLname,
                    tblstudent_overview.upload
                FROM 
                    tblstudent_overview 
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_overview.sid
                LEFT JOIN 
                    tblprofile evar ON evar.id = tblstudent_overview.evaluated_by
                WHERE tblstudent_overview.sid=".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'student'       => $doc['fname'] .' '. substr($doc['mname'], 0, 1) .'. '. $doc['lname'],
                'evaluator'     => $doc['evarFname'] .' '. substr($doc['evarMname'], 0, 1) .'. '. $doc['evarLname'],
                'remarks'       => $doc['remarks'],
                'rate'          => $doc['rate'],
                'date_created'  => $doc['date_created'],
                'date_updated'  => $doc['date_updated'],
                'supervisor'    => $doc['supervisor'],
                'supervisor_upload'    => $doc['upload'],
            ];
        }

        return json_encode($data);
    }

    public function fetchCompanyConnected($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblcompany.id,
                    tblcompany.name AS compName,
                    tblcompany.type AS compType,
                    tblcompany.address AS compAddress,
                    tblcompany.email AS compEmail,
                    tblcompany.phone AS compPhone
                FROM tblstudent_connection
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.sid = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchJournals($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_journal.id,
                    DATE_FORMAT(tblstudent_journal.start_date, '%b. %d, %Y %h:%i %p') AS start_date,    
                    DATE_FORMAT(tblstudent_journal.end_date, '%b. %d, %Y %h:%i %p') AS end_date,    
                    DATE_FORMAT(tblstudent_journal.end_date, '%d/%m/%Y %h:%i %p') AS end_date_format,    
                    CASE
                        WHEN tblstudent_journal.status = 0 THEN 'Draft'
                        WHEN tblstudent_journal.status = 1 THEN 'On-Going'
                        WHEN tblstudent_journal.status = 2 THEN 'Hold'
                        WHEN tblstudent_journal.status = 3 THEN 'Completed'
                    END AS status,
                    tblstudent_journal.title,      
                    tblstudent_journal.remarks,
                    CONCAT(pp.fname, ' ', pp.lname) AS author,     
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS creator,
                    CONCAT(appr.fname, ' ', appr.lname) AS approver,
                    tblstudent_journal.status AS statusId     
                FROM tblstudent_journal
                    LEFT JOIN tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblprofile pp ON pp.id = tblstudent_journal.created_by
                LEFT JOIN 
                    tblprofile appr ON appr.id = tblstudent_journal.approved_by
                WHERE tblstudent_journal.sid = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[] = [
                'id' => $profile['id'],
                'start_date'  => $profile['start_date'],
                'end_date'  => $profile['end_date'],
                'status'  => $profile['status'],
                'title'  => $profile['title'],
                'remarks'  => $profile['remarks'],  
                'author'  => $profile['author'],  
                'creator'  => $profile['creator'],  
                'statusId'  => $profile['statusId'], 
                'approver'  => $profile['approver'] 
            ];
        }

        return json_encode($data);
    }

    public function fetchJournalsCompleted($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_journal.id,
                    DATE_FORMAT(tblstudent_journal.start_date, '%b. %d, %Y %h:%i %p') AS start_date,    
                    DATE_FORMAT(tblstudent_journal.end_date, '%b. %d, %Y %h:%i %p') AS end_date,    
                    DATE_FORMAT(tblstudent_journal.end_date, '%d/%m/%Y %h:%i %p') AS end_date_format,    
                    CASE
                        WHEN tblstudent_journal.status = 0 THEN 'Draft'
                        WHEN tblstudent_journal.status = 1 THEN 'On-Going'
                        WHEN tblstudent_journal.status = 2 THEN 'Hold'
                        WHEN tblstudent_journal.status = 3 THEN 'Completed'
                    END AS status,
                    tblstudent_journal.title,      
                    tblstudent_journal.remarks,
                    CONCAT(pp.fname, ' ', pp.lname) AS author,     
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS creator,
                    tblstudent_journal.status AS statusId     
                FROM tblstudent_journal
                    LEFT JOIN tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblprofile pp ON pp.id = tblstudent_journal.created_by
                WHERE tblstudent_journal.status = 3 AND tblstudent_journal.sid = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->rowCount(PDO::FETCH_ASSOC);

        return json_encode($profiles);
    }

    public function fetchJournal($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_journal.id,
                    DATE_FORMAT(tblstudent_journal.start_date, '%b. %d, %Y %h:%i %p') AS start_date,    
                    DATE_FORMAT(tblstudent_journal.end_date, '%b. %d, %Y %h:%i %p') AS end_date, 
                    DATE_FORMAT(tblstudent_journal.end_date, '%Y-%m-%dT%H:%i') AS end_date_format,       
                    CASE
                        WHEN tblstudent_journal.status = 0 THEN 'Draft'
                        WHEN tblstudent_journal.status = 1 THEN 'On-Going'
                        WHEN tblstudent_journal.status = 2 THEN 'Hold'
                        WHEN tblstudent_journal.status = 3 THEN 'Completed'
                    END AS status,
                    tblstudent_journal.status AS status_id,
                    tblstudent_journal.title,      
                    tblstudent_journal.remarks,
                    tblstudent_journal.created_by,
                    CONCAT(pp.fname, ' ', pp.lname) AS author,
                    CONCAT(appr.fname, ' ', appr.lname) AS approver
                FROM 
                    tblstudent_journal
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblprofile pp ON pp.id = tblstudent_journal.created_by
                LEFT JOIN 
                    tblprofile appr ON appr.id = tblstudent_journal.approved_by
                WHERE tblstudent_journal.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return json_encode($data);
    }

    public function fetchProfilePercentage($id=null)
    {
        $total = 0;

        $total += $this->fetchStudentTwo($id);
        $total += $this->fetchStudentFamilyBackground($id);

        if (!empty($this->fetchStudentSchoolInfo($id))) {
            $total += 30;
        }

        return $total;
    }

    public function fetchStudentFamilyBackground($id=null)
    {
        $qry = "SELECT * FROM tblstudent_history WHERE id = $id";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = 0;
            
        $total += !empty($data['father']) ? 4 : 0;
        $total += !empty($data['father_occupation']) ? 3 : 0;
        $total += !empty($data['mother']) ? 4 : 0;
        $total += !empty($data['mother_occupation']) ? 3 : 0;
        $total += !empty($data['parents_address']) ? 3 : 0;
        $total += !empty($data['guardians_name']) ? 4 : 0;
        $total += !empty($data['parents_mobile']) ? 3 : 0;
        $total += !empty($data['guardians_mobile']) ? 3 : 0;
        $total += $data['notify'] > 0 ? 3 : 0;

        return $total;
    }

    public function fetchStudentSchoolInfo($id=null)
    {
        $qry = "SELECT * FROM tblschool_information WHERE uid = $id";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            return true;
        }

        return false;
    }

    public function fetchPreOjtPercentage($id=null)
    {
        $total = 0;

        $qry = "SELECT * FROM tblstudent_preojt WHERE student_id = $id AND status = 20";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pps = ['rsm', 'elr', 'acf', 'iaf', 'pcf', 'rgf', 'gmc', 'moa', 'otf', 'sef', 'iic'];
        
        foreach ($pps as $pp) {
            foreach ($docs as $key => $doc) {
                if ($doc['type_id'] == $pp) {
                    $total += 9;
                }
            }
        }

        return $total >= 99 ? 100 : $total;
    }

    public function fetchUserSignature($id)
    {
        $qry = "SELECT signature_id FROM tblsignatures WHERE user_id = $id";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
        return json_encode($dd['signature_id']);
    }

    public function fetchPreRequirements($id=null)
    {
        $qry = "SELECT 
                    COUNT(*) as total
                FROM 
                    tblstudent_overview 
                WHERE tblstudent_overview.type_id = 1";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($docs['total']);
    }

    public function fetchPostRequirements($id=null)
    {
        $qry = "SELECT 
                    COUNT(*) as total
                FROM 
                    tblstudent_overview 
                WHERE tblstudent_overview.type_id = 3";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($docs['total']);
    }

    public function fetchForAssessment($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name as role, sp.title, sp.major
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblschool_information si ON si.uid = p.id
                LEFT JOIN tblschool_programs sp ON sp.id = si.program
                LEFT JOIN tblstudent_connection sc ON sc.sid = p.id
                LEFT JOIN tblcompany c ON c.id = sc.comp_id
                LEFT JOIN tblassessment_links al ON al.comp_id = c.id AND al.is_done = false
                LEFT JOIN tblrole r ON p.role = r.id";

        if (!empty($id)) {
            $qry .= " WHERE p.role = 4 AND c.id = ".$id;
        }

        $qry .= " ORDER BY p.lname, p.fname, p.mname";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $p = $this->fetchAssessedStudents();

        $checker = false;

        foreach ($profiles as $profile) {
            if (!in_array($profile['id'], $p)) {
                $checker = true;
            }
        }

        return $checker;
    }

    public function fetchAssessedStudents() 
    {
        $data = [];
        $qry = "SELECT 
                    sid
                FROM tblstudent_overview WHERE type_id = 2 GROUP BY sid";
    
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[] = $profile['sid'];
        }

        return $data;
    }

    public function fetchAppraisalCriteria() 
    {
        $data = [];
        $qry = "SELECT 
                    *
                FROM tblappraisal_criteria";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[$profile['parent_id']][] = [
                'id'     => $profile['id'],
                'order'  => $profile['order'],
                'name'   => $profile['name'],
            ];
        }

        return json_encode($data);
    }

    public function fetchStudentAppraisal($id) 
    {
        $data = [];
        $qry = "SELECT 
                    *
                FROM tblappraisal WHERE sid = $id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[$profile['criteria']] = $profile['rate'];
        }

        return json_encode($data);
    }

}