<?php

class User 
{
    private $Database;
    function __construct($Database){$this->Database = $Database;}
    function Login($Name,$Password)
    {
        $data = $this->Database->query("select * from User where (Name = '".$Name."' or Email = '".$Name."') and Password = '".$Password."'");
        if($data->num_rows!=1){return false;}
        
        $User = $data->fetch_assoc();
        $_SESSION["User_id"] = $User["User_id"];
        $_SESSION["Email"] = $User["Email"];
        $_SESSION["Name"] = $User["Name"];
        $_SESSION["Contact"] = $User["Contact"];
        $_SESSION["Location"] = $User["Location"];
        return true;
    }
    function Logout(){session_unset();session_destroy();session_start();}

    function Is_loggedin(){if(isset($_SESSION["User_id"]) && $_SESSION["User_id"]!=""){return true;}return false;}

    function Create($Name,$Password,$Email,$Contact,$Location)
    {
        return $this->Database->query("
            Insert into User(Name,Password,Email,Contact,Location)
            values('".$Name."','".$Password."','".$Email."','".$Contact."','".$Location."')
            ");
    }
    function Complain($Title,$Description,$User_id,$Department_id)
    {
        return $this->Database->query("
            Insert into Complain(Title,Description,User_id,Department_id)
            values('".$Title."','".$Description."',".$User_id.",".$Department_id.")
        ");
    }
    function Appointment($Service,$Date,$Time,$Address,$User_id,$Department_id)
    {
        return $this->Database->query("
            insert into Appointment(Service,Date,Time,Address,User_id,Department_id)
            values ('".$Service."','".$Date."','".$Time."','".$Address."',".$User_id.",".$Department_id.")
        ");
    }

    function MyComplain($User_id)
    {
        return $this->Database->query("
        select * from complain where User_id = ".$User_id."
        ");
    }
    function MyAppointment($User_id)
    {
        return $this->Database->query("
        select * from Appointment where User_id = ".$User_id."
        ");
    }


}

class Department
{
    private $Database;
    private $Department_id;
    function __construct($Database,$Department_id)
    {
        $this->Database = $Database;
        $this->Department_id=$Department_id;
    }
    function GetDepartmentId(){return $this->Department_id;}
    function GetAll(){return $this->Database->query("Select * from Department ");}
    function AppointmentAccRej($Appointment_id,$state)
    {
        return $this->Database->query("
            Update Appointment set Is_accepted = ".$state." where Appointment_id = ".$Appointment_id."
        ");
    }
    function ComplainReadUnread($Complain_id,$state)
    {
        return $this->Database->query("
            Update Complain set Is_read = ".$state." where Complain_id = ".$Complain_id."
        "); 
    }

    function AllAppointments()
    {
        return $this->Database->query("
            select * from Appointment natural join user where Department_id = ".$this->Department_id."
            order by Appointment_id desc
        ");
    }

    
    function AllComplains()
    {
        return $this->Database->query("
            select * from complain natural join user where Department_id = ".$this->Department_id."
            order by Complain_id desc
        ");
    }
}


session_start();
$Database_connection = new mysqli("localhost","root","","GovAppointment");

$User = new User($Database_connection);


?>