<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($_POST["Action"] == "AcceptRejectAppointment")
    {
        if($Department->AppointmentAccRej($_POST["Appointment_id"],$_POST["State"]))
        {
            header("Location:".$_SERVER["PHP_SELF"]."?msg=Appointment+state+updated");die();
        }
    }
    else if($_POST["Action"] == "ReadComplain")
    {
        if($Department->ComplainReadUnread($_POST["Complain_id"],1))
        {
            header("Location:".$_SERVER["PHP_SELF"]."?msg=Complain+status+updated");die();
        }
    }
    
    unset($_POST);
	header("Location:".$_SERVER["PHP_SELF"]);
	die();
}

if(isset($_GET["msg"])){echo htmlentities($_GET["msg"]);}

?>