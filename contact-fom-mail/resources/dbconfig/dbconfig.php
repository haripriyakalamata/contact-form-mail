<?php
 /*
   Name: database connection
   version: 1
   purpose:
            put website under maintanance, 
			
   Developer: Haripriya
   */
   
   /* original code starts */
   

session_start();


//change maintanance value to true,to keep the website in maintanance mode
$maintenance="";
if($maintenance==true)
{
	//status is true
    $_SESSION['maintenanceStatus'] = "true";
    //redirecting to maintanance.php
    header('location:resources/maintanance.php');
}

?>

