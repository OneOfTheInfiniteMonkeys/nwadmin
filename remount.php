<?php
//-------><--------><--------><--------><--------><--------><--------><-------->
// PHP script to remount the USB disk
// Rev 1.00
// 2019-12-24
//-------><--------><--------><--------><--------><--------><--------><-------->
//
//----------------------------------------------------------------------------->
// Example usage   :
//----------------------------------------------------------------------------->
//
//----------------------------------------------------------------------------->
// Check for use only from root page i.e. not by user
//----------------------------------------------------------------------------->
if(!isset($_SESSION['WebInstance'])) {                                          // Root page defines this variable as TRUE
     die();
  }

  i2c_message("{\"text\":\"  Remount \",\"image\":\"raspberry02.png\",\"delay\":20}");  // Ouput message on i2c display


//----------------------------------------------------------------------------->
// Remount drive
//----------------------------------------------------------------------------->

  $count = 0;                                      // Counter for reconnection of the drive 
  $resp = "";                                      // Any response from the commands used to un mount and mount the virtual USB drive
  echo "Unmounting virtual USB drive - ";

                                                   // attempt to unmount th evirtual USB disk, some re-trys are permitted
  while ( ( $count <10 ) && (strpos($resp, 'not') === false ) ) {
       $resp = exec("umount /mnt/usb_share 2>&1"); // Execute the unmount command
       echo $resp;                                 // output the response from the unmount command
       $count = $count + 1;                        // Keep a track of how many times we need to try to unmount the virtual USB share
       echo $count;                                // Output the count
       sleep(1);                                   // Allow the O.S. time to perform background tasks
    }
 
  sleep(2);
  $resp = ""; 
  $count = 0;
  while ( ( $count <10 ) && (strpos($resp, 'mounted') === false ) ) {
       $resp = exec("mount /mnt/usb_share 2>&1");
       echo $resp;
       $count = $count + 1;
       echo $count;
       sleep(1);
    }

  header("Location: index.php");

  i2c_message("{\"text\":\"  Complete \",\"image\":\"raspberry02.png\",\"delay\":5}");  // Ouput message on i2c display

//----------------------------------------------------------------------------->

function i2c_message($msg) {
  $message = $msg;
  $message = utf8_encode($message);               // encode the message for sending to the listner

  $host    = "127.0.0.1";                         // Local host connection
  $port    = 65432;                               // port to connect to 

//----------------------------------------------------------------------------->
// Show a message on the i2c display
//----------------------------------------------------------------------------->
  // echo "Message To server :".$message;         // Debug message
  // create socket
  $socket = socket_create(AF_INET, SOCK_STREAM, 0);
  $result = socket_connect($socket, $host, $port);
  $result = socket_write($socket, $message, strlen($message));
  $result = socket_read ($socket, 1024);
  socket_close($socket);
}

?>
