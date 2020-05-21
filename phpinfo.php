<?php
//-------><--------><--------><--------><--------><--------><--------><-------->
// PHP request to generate all status information
//

//
  $host    = "127.0.0.1";                         // Local host connection
  $port    = 65432;                               // port to connect to 
  $message = "{\"text\":\"  PHP Info \",\"image\":\"raspberry02.png\",\"delay\":5}";
  $message = utf8_encode($message);               // encode the message for sending to the listner

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

?>


<?php phpinfo( ); ?>
