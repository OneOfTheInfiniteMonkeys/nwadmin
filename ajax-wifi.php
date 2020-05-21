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

  $sigwifi = exec("iwconfig wlan0 | grep -e 'Signal level=' | awk -F '=' '{print $3}'");

  echo "{\"sigwifi\":" . "\"" . $sigwifi . "\"" . "}";
?>