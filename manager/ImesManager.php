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
                p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name as role
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id";

        if (!empty($id)) {
            $qry .= " WHERE p.id = ".$id;
        }
		
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($profiles as $profile) {
            $data[$profile['id']] = [
                'lname'     => $profile['lname'],
                'fname'     => $profile['fname'],
                'mname'     => $profile['mname'],
                'username'  => $profile['username'],
                'status'    => $profile['status'],
                'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
            ];
        }

        return json_encode($data);
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

    public function fetchUser($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name as role, p.province, p.citymun, p.exact_address, p.extn_name, DATE_FORMAT(p.birth_date, '%d/%m/%Y') as birth_date, p.gender, p.mobile, u.username, p.email, p.role, u.status
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id
                WHERE p.id = ".$id;
        
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
                s.position AS supPosition
                FROM tblcompany c
                LEFT JOIN tblsupervisors s ON s.company_id = c.id
                LEFT JOIN tblprofile p ON p.id = s.supervisor_id";

        if (!empty($id)) {
            $qry .= " WHERE c.id = ".$id;
        }
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($companies as $company) {
            $data[$company['id']] = [
                'name'        => $company['compName'],
                'type'        => $company['compType'] == 1 ? 'Private' : 'Government',
                'address'     => $company['compAddress'],
                'supervisor'  => $company['supervisor'],
                'position'    => $company['supPosition'],
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


    public function fetchSupervisors($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                p.id, CONCAT(p.fname, ' ', p.lname) as fullname, u.username, u.status, r.name as role, p.mobile, p.email
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id
                WHERE p.role = 3";

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


    public function fetchSupervisorss($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                p.id, CONCAT(p.fname, ' ', p.lname) as fullname, u.username, u.status, r.name as role, p.mobile, p.email
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id
                WHERE p.role = 2";

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
                p.id, p.lname, p.fname, p.mname, u.username, u.status, r.name AS role
                FROM tblprofile p
                LEFT JOIN tblusers u ON p.id = u.user_id
                LEFT JOIN tblrole r ON p.role = r.id
                WHERE p.role = 4";

        if (!empty($id)) {
            $qry .= " AND p.id = ".$id;
        }
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[$profile['id']] = [
                'fullname'  => $profile['fname'] .' '. substr($profile['mname'], 1, 1) .'. '. $profile['lname'],
                'lname'     => $profile['lname'],
                'fname'     => $profile['fname'],
                'mname'     => $profile['mname'],
                'username'  => $profile['username'],
                'status'    => $profile['status'],
                'role'      => !empty($profile['role']) ? $profile['role'] : 'No role',
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
                    tblprofile.extn_name, 
                    tblprofile.section, 
                    tblprofile.gender, 
                    tblprofile.mobile, 
                    tblprofile.email,
                    tblprofile.disability,
                    tblprofile.req,
                    DATE_FORMAT(tblprofile.birth_date, '%Y-%m-%d') AS birthDate,
                    DATE_FORMAT(tblprofile.birth_date, '%m-%d-%Y') AS birthDateFormat, 
                    tblstudent_history.birthplace,
                    tblstudent_history.citizenship, 
                    tblstudent_history.civil_status, 
                    CONCAT(tblprofile.exact_address, ', ', tblcitymun.citymun_m, ', ', tblprovince.province_m) AS present_address, 
                    tblstudent_history.provincial_address, 
                    tblstudent_history.provincial_phone,  
                    tblstudent_history.father, 
                    tblstudent_history.mother, 
                    tblstudent_history.father_occupation, 
                    tblstudent_history.mother_occupation, 
                    tblstudent_history.parents_address, 
                    tblstudent_history.guardians_name as guardian, 
                    tblstudent_history.guardians_mobile, 
                    tblstudent_history.parents_mobile, 
                    tblstudent_history.notify, 
                    tblrole.name AS role,
                    tblavatar.avatar_id, 
                    IF (tblschool_programs.code IS NULL, CONCAT(tblschool_programs.title, ' - ', tblschool_programs.major), CONCAT(tblschool_programs.code, ' - ', tblschool_programs.major)) AS course,
                    tblschool_programs.title AS program,
                    tblschool_programs.id AS program_id,
                    tblschool_programs.year_level,
                    CONCAT(tblschool_programs.code, ' ', tblschool_programs.major) as fullCourse,
                    tblschool_programs.length_of_program,
                    tblschool_programs.major,
                    tblschool_department.title AS department,
                    CONCAT(tp.fname, ' ', tp.lname) AS ojt_coordinator,
                    tp.id AS ojt_coordinator_id,
                    tp.mobile AS ojt_coordinator_mobile,
                    CONCAT(tph.fname, ' ', tph.lname) AS ojt_head,
                    tph.id AS ojt_head_id,
                    tph.mobile AS ojt_head_mobile,
                    tblschool_programs.ojt_hours,
                    (SELECT SUM(hours) FROM tblstudent_dtr WHERE tblstudent_dtr.sid = tblprofile.id) AS completedHours,
                    tblstudent_connection.comp_id,
                    CONCAT(tblcompany.name, ' ', tblcompany.address) as compAddress,
                    tblcompany.name as compName
                FROM tblprofile 
                LEFT JOIN 
                    tblusers ON tblprofile.id = tblusers.user_id
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                LEFT JOIN 
                    tblrole ON tblprofile.role = tblrole.id
                LEFT JOIN 
                    tblavatar ON tblavatar.user_id = tblprofile.id
                LEFT JOIN 
                    tblstudent_history ON tblstudent_history.id = tblprofile.id
                LEFT JOIN 
                    tblschool_information ON tblschool_information.uid = tblprofile.id
                LEFT JOIN 
                    tblschool_programs ON tblschool_programs.id = tblschool_information.program
                LEFT JOIN 
                    tblschool_department ON tblschool_department.id = tblschool_programs.department
                LEFT JOIN
                    tblprofile tp ON tp.id = tblschool_information.ojt_coordinator
                LEFT JOIN
                    tblprofile tph ON tph.id = tblschool_information.ojt_head
                LEFT JOIN 
                    tblprovince ON tblprovince.province_c = tblprofile.province
                LEFT JOIN 
                    tblcitymun ON tblcitymun.region_c = tblprofile.region AND tblcitymun.province_c = tblprofile.province AND tblcitymun.citymun_c = tblprofile.citymun

                WHERE tblprofile.role = 4";

        if (!empty($id)) {
            $qry .= " AND tblprofile.id = ".$id;
        }
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        $birthDate = explode("-", $profile['birthDateFormat']);
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
            'email' => $profile['email'],
            'course' => $profile['course'],
            'program' => $profile['program'],
            'program_id' => $profile['program_id'],
            'year_level' => $profile['year_level'],
            'major' => $profile['major'],
            'length_of_program' => $profile['length_of_program'],
            'department' => $profile['department'],
            'ojt_coordinator' => $profile['ojt_coordinator'],
            'ojt_coordinator_id' => $profile['ojt_coordinator_id'],
            'ojt_coordinator_mobile' => $profile['ojt_coordinator_mobile'],
            'ojt_head' => $profile['ojt_head'],
            'ojt_head_id' => $profile['ojt_head_id'],
            'ojt_head_mobile' => $profile['ojt_head_mobile'],
            'disability' => $profile['disability'],
            'reqHours' => $profile['ojt_hours'],
            'compHours' => $profile['completedHours'],
            'section' => $profile['section'],
            'req' => $profile['req'],
            'compId' => $profile['comp_id'],
            'fullCourse' => $profile['fullCourse'],
            'compAddress' => $profile['compAddress'],
            'compName' => $profile['compName'],
        ];

        return json_encode($data);
    }


    public function fetchSupervisor($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblcompany.id AS compId,
                    tblcompany.name AS compName,
                    tblcompany.type AS compType,
                    IF (tblcompany.type = 1, 'Private', 'Government') AS compTypeText,
                    tblcompany.email AS compEmail,
                    tblcompany.phone AS compPhone,
                    tblcompany.address AS compAddress,
                    DATE_FORMAT(tblcompany.created_at, '%b %d, %Y') AS compDateCreated,
                    DATE_FORMAT(tblprofile.birth_date, '%Y-%m-%d') AS supervisorBirthDate,  
                    tblprofile.lname AS supervisorLname,
                    tblprofile.fname AS supervisorFname,
                    tblprofile.mname AS supervisorMname,
                    tblprofile.gender AS supervisorGender,
                    tblsupervisors.position AS supervisorPosition,
                    tblsupervisors.department AS supervisorDepartment,
                    tblsupervisors.email AS supervisorEmail,
                    tblsupervisors.phone AS supervisorPhone
                FROM 
                    tblprofile 
                LEFT JOIN 
                    tblsupervisors ON tblsupervisors.supervisor_id = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblsupervisors.company_id
                LEFT JOIN 
                    tblprovince ON tblprovince.province_c = tblprofile.province
                LEFT JOIN 
                    tblcitymun ON tblcitymun.region_c = tblprofile.region AND tblcitymun.province_c = tblprofile.province AND tblcitymun.citymun_c = tblprofile.citymun

                WHERE tblprofile.role = 3 AND tblprofile.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($profile);
    }

    public function fetchPreOjtReq($id=null)
    {
        $data = [];
        $qry = "SELECT 
                *
                FROM tblstudent_preojt
                LEFT JOIN tblprofile ON tblstudent_preojt.student_id = tblprofile.id
                WHERE tblstudent_preojt.student_id = $id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $requirements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($requirements as $key => $req) {
            $data[$req['type_id']] = [
                'filename' => $req['filename'],
                'status' => $req['status'],
                'notes' => $req['notes'],
            ]; 
        }

        return json_encode($data);
    }

    public function fetchPostOjtReq($id=null)
    {
        $data = [];
        $qry = "SELECT 
                    *
                FROM 
                    tblstudent_postojt
                LEFT JOIN 
                    tblprofile ON tblstudent_postojt.student_id = tblprofile.id
                WHERE 
                    tblstudent_postojt.student_id = $id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $requirements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($requirements as $key => $req) {
            $data[$req['type_id']] = [
                'filename' => $req['filename'],
                'status' => $req['status'],
                'notes' => $req['notes'],
            ]; 
        }

        return json_encode($data);
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

    public function fetchStudentPreOjtReq()
    {
        $qry = "SELECT * FROM tblstudent_preojt";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'reqId'     => $doc['id'],
                'filename'  => $doc['filename'],
                'status'    => $doc['status'],
                'notes'     => $doc['notes']
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
                    DATE_FORMAT(tblstudent_overview.date_created, '%m/%d/%Y') AS date_created, 
                    DATE_FORMAT(tblstudent_overview.date_updated, '%m/%d/%Y') AS date_updated
                FROM tblstudent_overview 
                LEFT JOIN tblprofile ON tblprofile.id = tblstudent_overview.evaluated_by
                WHERE tblstudent_overview.sid=".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = [];
        $docs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        foreach ($docs as $key => $doc) {
            $data[$doc['type_id']] = [
                'evaluator'     => $doc['fname'] .' '. substr($doc['mname'], 0, 1) .'. '. $doc['lname'],
                'date_created'  => $doc['date_created'],
                'date_updated'  => $doc['date_updated']
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
                    IF(tblcompany.type = 1, 'Private', 'Public') AS compTypeText, 
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

    public function fetchWorkSchedule($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    *
                FROM tblstudent_workschedule
                WHERE sid = ".$id;
        
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
                    tblstudent_journal.approved_by     
                FROM tblstudent_journal
                    LEFT JOIN tblprofile ON tblprofile.id = tblstudent_journal.sid
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
                'approved_by'  => $profile['approved_by'],  
            ];
        }

        return json_encode($data);
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
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee,
                    tblstudent_journal.approved_by
                FROM 
                    tblstudent_journal
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblprofile pp ON pp.id = tblstudent_journal.created_by
                WHERE tblstudent_journal.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($data);
    }

    public function fetchJournalsSupervisor($id=null, $compId=null) 
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
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee,
                    tblprofile.id AS traineeId,     
                    tblstudent_journal.approved_by
                FROM 
                    tblstudent_journal
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.comp_id = $compId";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[] = [
                'id'    => $profile['id'],
                'start_date'  => $profile['start_date'],
                'end_date'  => $profile['end_date'],
                'status'  => $profile['status'],
                'title'  => $profile['title'],
                'remarks'  => $profile['remarks'],  
                'trainee'  => $profile['trainee'],  
                'approved_by'  => $profile['approved_by'],  
            ];
        }

        return json_encode($data);
    }

    public function fetchCompletedJournalsSupervisor($id=null, $compId=null) 
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
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee,
                    tblprofile.id AS traineeId,     
                    tblstudent_journal.approved_by
                FROM 
                    tblstudent_journal
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.comp_id = $compId AND tblstudent_journal.status = 3 AND tblstudent_journal.approved_by > 0";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->rowCount(PDO::FETCH_ASSOC);

        return json_encode($profiles);
    }

    public function fetchJournalsSupervisorLimit($id=null, $compId=null) 
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
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee,
                    tblprofile.id AS traineeId     
                FROM 
                    tblstudent_journal
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_journal.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.comp_id = $compId 
                GROUP BY tblprofile.id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($profiles as $profile) {
            $data[$profile['id']] = [
                'start_date'  => $profile['start_date'],
                'end_date'  => $profile['end_date'],
                'status'  => $profile['status'],
                'title'  => $profile['title'],
                'remarks'  => $profile['remarks'],  
                'trainee'  => $profile['trainee'],  
                'traineeId'  => $profile['traineeId'],  
            ];
        }

        return json_encode($data);
    }

    public function fetchDailyTimeRecord($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_dtr.id,
                    tblstudent_dtr.sid,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%a. %b %d, %Y') AS dateFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') AS timeInFormat,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') AS timeOutFormat,
                    tblstudent_dtr.hours
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                WHERE tblstudent_dtr.sid = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchDailyTimeRecordAll($id=null, $compId=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_dtr.id,
                    tblstudent_dtr.sid,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%a. %b %d, %Y') AS dateFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') AS timeInFormat,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') AS timeOutFormat,
                    tblstudent_dtr.hours,
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.comp_id = ".$compId;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchDailyTimeRecordLimit($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_dtr.id,
                    tblstudent_dtr.sid,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%a. %b %d, %Y') AS dateFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') AS timeInFormat,
                    DATE_FORMAT(tblstudent_dtr.ot_in, '%h:%i %p') AS otInFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%Y-%m-%d %H:%i') AS timeInRaw,
                    DATE_FORMAT(tblstudent_dtr.ot_in, '%Y-%m-%d %H:%i') AS otInRaw,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') AS timeOutFormat,
                    DATE_FORMAT(tblstudent_dtr.ot_out, '%h:%i %p') AS otOutFormat,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%m/%d/%Y %H:%i') AS timeOutRaw,
                    DATE_FORMAT(tblstudent_dtr.ot_out, '%m/%d/%Y %H:%i') AS otOutRaw,
                    tblstudent_dtr.hours
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                WHERE tblstudent_dtr.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchDailyTimeRecordLimitOne($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_dtr.id,
                    tblstudent_dtr.sid,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%a. %b %d, %Y') AS dateFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') AS timeInFormat,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') AS timeOutFormat,
                    DATE_FORMAT(tblstudent_dtr.ot_in, '%h:%i %p') AS otInFormat,
                    DATE_FORMAT(tblstudent_dtr.ot_out, '%h:%i %p') AS otOutFormat,
                    tblstudent_dtr.hours
                    tblstudent_dtr.ot_hours
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_dtr.id = ".$id;
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchDailyTimeRecordCurrent($id) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_dtr.id,
                    tblstudent_dtr.sid,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%a. %b %d, %Y') AS dateFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') AS timeInFormat,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%Y-%m-%d %H:%i') AS timeInRaw,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') AS timeOutFormat,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%m/%d/%Y %H:%i') AS timeOutRaw,
                    DATE_FORMAT(tblstudent_dtr.ot_in, '%h:%i %p') AS otInFormat,
                    DATE_FORMAT(tblstudent_dtr.ot_out, '%h:%i %p') AS otOutFormat,
                    tblstudent_dtr.hours,
                    tblstudent_dtr.ot_hours,
                    tblstudent_dtr.am_status,
                    tblstudent_dtr.pm_status
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE DAY(tblstudent_dtr.time_in) = DAY(NOW())
                AND tblstudent_dtr.sid = $id";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchOverallHours($id=null, $compId=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblprofile.id,
                    SUM(tblstudent_dtr.hours) AS total_hours,
                    CONCAT(tblprofile.fname, ' ', tblprofile.lname) AS trainee
                FROM tblstudent_dtr
                LEFT JOIN 
                    tblprofile ON tblprofile.id = tblstudent_dtr.sid
                LEFT JOIN 
                    tblstudent_connection ON tblstudent_connection.sid = tblprofile.id
                LEFT JOIN 
                    tblcompany ON tblcompany.id = tblstudent_connection.comp_id
                WHERE tblstudent_connection.comp_id = $compId GROUP BY tblprofile.id";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($company);
    }

    public function fetchOverviewHours($id=null, $compId=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_overview.sid
                FROM 
                    tblstudent_overview
                WHERE
                    tblstudent_overview.type_id = 2";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dd = " ";

        foreach ($company as $key => $comp) {
            $dd .= $comp['sid'] .", ";
        }

        $dd = explode(',', $dd);

        return $dd;
    }

    public function fetchCompletedHours($id=null) 
    {
        $data = [];
        $qry = "SELECT 
                    tblstudent_overview.sid
                FROM 
                    tblstudent_overview
                WHERE
                    tblstudent_overview.type_id = 2 AND tblstudent_overview.sid = $id";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($company);
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
        $total = 30;

        $total += !empty($profile['birthplace']) ? 2 : 0;
        $total += !empty($profile['citizenship']) ? 2 : 0;
        $total += !empty($profile['civil_status']) ? 2 : 0;
        $total += !empty($profile['provincial_address']) ? 2 : 0;
        $total += !empty($profile['provincial_phone']) ? 2 : 0;

        return json_encode($total);
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

    public function fetchEnrolledTrainee($id)
    {
        $qry = "SELECT * FROM tblstudent_connection WHERE comp_id = $id";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $docs = $stmt->rowCount(PDO::FETCH_ASSOC);

        return $docs;
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

    public function fetchAssessmentLink($id, $comp)
    {
        $qry = "SELECT is_done FROM tblassessment_links WHERE sid = $id AND comp_id = $comp ORDER BY id DESC limit 1";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
        return json_encode($dd);
    }

    public function fetchMyAssessmentLink($id, $comp)
    {
        $qry = "SELECT * FROM tblassessment_links WHERE sid = $id AND comp_id = $comp ORDER BY id DESC limit 1";

        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
        return json_encode($dd);
    }

    public function fetchSchoolInfo()
    {
        $qry = "SELECT * FROM tblschool";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();

        $dd = $stmt->fetch(PDO::FETCH_ASSOC);
            
        return json_encode($dd);
    }

    public function fetchForAssessment($id=null, $comp) 
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
                LEFT JOIN tblassessment_links al ON al.sid = p.id AND al.comp_id = c.id AND al.is_done = false
                LEFT JOIN tblrole r ON p.role = r.id";

        if (!empty($id)) {
            $qry .= " WHERE p.role = 4 AND c.id = $comp AND p.id = $id";
        }

        $qry .= " ORDER BY p.lname, p.fname, p.mname";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $p = $this->fetchAssessedStudents();

        foreach ($profiles as $profile) {
            if (!in_array($profile['id'], $p)) {
                $data[$profile['id']] = [
                    'fullname'  => $profile['lname'] .', ' .$profile['fname'],
                    'program'   => $profile['title'],
                    'major'     => $profile['major']
                ];
            }
        }

        return json_encode($data);
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

    public function fetchMyJournal($data) 
    {
        $array = [];
        $qry = "SELECT 
                    tblstudent_journal.title,
                    DATE_FORMAT(tblstudent_journal.start_date, '%M %d, %Y') as start_date,
                    DATE_FORMAT(tblstudent_journal.start_date, '%M %d') as start_dateF,
                    DATE_FORMAT(tblstudent_journal.start_date, '%W') as day_format,
                    DATE_FORMAT(tblstudent_journal.end_date, '%d %b') as end_date,
                    CASE  
                        WHEN tblstudent_journal.status = 1 THEN 'On-Going' 
                        WHEN tblstudent_journal.status = 2 THEN 'On-Hold'
                        WHEN tblstudent_journal.status = 3 THEN 'Completed'
                        ELSE 'Draft' END as status
                FROM tblstudent_journal 
                WHERE tblstudent_journal.sid = ".$data['id']." AND tblstudent_journal.start_date BETWEEN '".$data['dateFrom']."' AND '".$data['dateTo']."'";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $array[] = [
                'start_date'    => $result['start_date'],
                'start_dateF'   => $result['start_dateF'],
                'day_format'    => $result['day_format'],
                'end_date'      => $result['end_date'],
                'title'         => $result['title'],
                'status'        => $result['status'],
            ];
        }

        return json_encode($array);
    }

    public function fetchDtrList($data) 
    {
        $array = [];
        $qry = "SELECT 
                    DATE_FORMAT(tblstudent_dtr.time_in, '%M %d, %Y') as start_date,
                    tblstudent_dtr.hours,
                    tblstudent_dtr.ot_hours
                FROM tblstudent_dtr 
                WHERE tblstudent_dtr.sid = ".$data['id']." AND tblstudent_dtr.time_in BETWEEN '".$data['dateFrom']."' AND '".$data['dateTo']."'";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $ot_hrs = !empty($result['ot_hours']) ? $result['ot_hours'] : 0;
            $array[$result['start_date']] = $result['hours'] + $ot_hrs;
        }

        return json_encode($array);
    }

    public function fetchMyDtr($data) 
    {
        $array = [];
        $qry = "SELECT 
                    DATE_FORMAT(tblstudent_dtr.time_in, '%M %d, %Y') as date_in,
                    DATE_FORMAT(tblstudent_dtr.time_in, '%h:%i %p') as time_in,
                    DATE_FORMAT(tblstudent_dtr.time_out, '%h:%i %p') as time_out,
                    tblstudent_dtr.hours as reqHours
                FROM tblstudent_dtr 
                WHERE 
                    tblstudent_dtr.sid = ".$data['id']." AND 
                    tblstudent_dtr.time_in >= '".$data['dateFrom']."' AND 
                    tblstudent_dtr.time_out <= '".$data['dateTo']."'";
        
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $array[] = [
                'date_in'    => $result['date_in'],
                'time_in'    => $result['time_in'],
                'time_out'   => $result['time_out'],
                'reqHours'   => $result['reqHours'],
            ];
        }

        return json_encode($array);
    }

}