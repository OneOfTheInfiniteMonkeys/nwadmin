<?php 
//-------><--------><--------><--------><--------><--------><--------><-------->
// PHP script to obtain system data in support of an Ajax request
// Rev 1.00
// 2020-01-12
//-------><--------><--------><--------><--------><--------><--------><-------->
//
//----------------------------------------------------------------------------->
// Example usage   :
//----------------------------------------------------------------------------->
//
// Used by Ajax to return Json structure to a HTML page via Javascript
//

//----------------------------------------------------------------------------->
// Check for use only from root page i.e. not by user
//----------------------------------------------------------------------------->
if(!isset($_SESSION['WebInstance'])) {                                          // Root page defines this variable as TRUE
     http_response_code(400);                                                   // Bad request error
     include('400.html');                                                       // Custom HTML for the error page
     die();
  }

//----------------------------------------------------------------------------->
// Get the WiFi Signal Strength
//----------------------------------------------------------------------------->
  $sigwifi = exec("iwconfig wlan0 | grep -e 'Signal level=' | awk -F '=' '{print $3}'");

  echo "{\"sigwifi\":" . "\"" . $sigwifi . "\"" . "}";
?>