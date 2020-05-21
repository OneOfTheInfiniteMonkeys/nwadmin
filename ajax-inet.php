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
// Used by Ajax to return Json structure to index.php home page of PiZero-WU
//
  $ip4addr = exec("hostname -I");
  $hstname = exec("hostname");
  $rtraddr = exec("route | grep default | awk '{print $2}'");
  $respval = exec("ping -i 0.2 -c 5 " . $rtraddr . " | grep received | awk '{print $4}'");
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


  echo "{\"ip4addr\":\"" . $ip4addr . "\"," . "\"rtraddr\":\"" . $rtraddr . "\"," . "\"rtrping\":" . "\"" . $rtrping . "\"" . "," . "\"hstname\":" . "\"" .  $hstname . "\"" . "}";
?>