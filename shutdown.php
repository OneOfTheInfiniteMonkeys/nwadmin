<?php
//----------------------------------------------------------------------------->
// Check for use only from root page i.e. not by user
//----------------------------------------------------------------------------->
if(!isset($_SESSION['WebInstance'])) {                                          // Root page defines this variable as TRUE
     die();
  }

  $status = "";
  echo "Shutting down - ";

  $result = shell_exec("sudo python3 /home/pi/pizero-uw-i2c/tcpip_i2c_client.py '{\"text\":\"Shutdown\",\"image\":\"raspberry00.png\",\"delay\":10}' &");
  echo $result;

  // $status->addMessage("System Shutting Down Now!", "warning", false);
  // echo " Status " .  $status;
  $result = shell_exec("sudo /sbin/shutdown -h now");
  echo $result ;
?>

