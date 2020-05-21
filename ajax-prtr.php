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
// Router address and access to the internal router (both processed and raw ping returns
//----------------------------------------------------------------------------->
  $rtraddr = exec("route | grep default | awk '{print $2}'");
  $respval = exec("ping -c 5 " . $rtraddr . " | grep received | awk '{print $4}'");
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
  $rtrping = $rprtval;

  echo "{\"rtraddr\":\"" . $rtraddr . "\"," . "\"rtrping\":" . "\"" . $rtrping . "\"" . "," . "\"rtrrpng\":" . "\"" .  $respval . "\"}";
?>