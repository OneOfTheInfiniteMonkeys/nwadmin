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
// Used by Ajax to return Json structure to indicate quality of internet connection
//
//----------------------------------------------------------------------------->

  $respval = exec("ping -i 0.2 -c 5 www.google.com | grep received | awk '{print $4}'");
  if ($respval == 5) {
    $rprtval = "100%";
  } elseif ($respval == 4) {
    $rprtval = " 80%";
  } elseif ($respval == 3) {
    $rprtval = " 60%";
  } elseif ($respval == 3) {
    $rprtval = " 40%";
  } elseif ($respval == 1) {
    $rprtval = " 20%";
  } elseif ($respval == 0) {
    $rprtval = "  0%";
  }
  $intping = $rprtval;

  echo "{\"intping\":" . "\"" . $intping . "\"" . "}";

?>