<?php 
//-------><--------><--------><--------><--------><--------><--------><-------->
// PHP script to obtain system data in support of an Ajax request
// Rev 1.00
// 2019-12-24
//-------><--------><--------><--------><--------><--------><--------><-------->
//
//----------------------------------------------------------------------------->
// Example usage   :
//----------------------------------------------------------------------------->
//
// Used by Ajax to return Json structure to a HTML page via Javascript
//
//----------------------------------------------------------------------------->
// File data
//----------------------------------------------------------------------------->
  $pesfiles = exec("ls /mnt/usb_share/ -R | grep -i .pes | wc -l");
  $numfiles = exec("ls /mnt/usb_share/ -R | grep -v -E '^$' | grep -v / | wc -l");
  $pctused  = exec("df -Ph | grep -E '/mnt/usb_share' | awk '{print $5}'");
  $drvsize  = exec("df -Ph | grep -E '/mnt/usb_share' | awk '{print $2}'");
  // $rctfile  = exec("ls -Rlt /mnt/usb_share/ | grep -i .pes | tail -1 | awk '{print $9}'");
  $rctfile  = "";

  echo "{\"PesFiles\":" . $pesfiles . "," . "\"NumFiles\":" . $numfiles . "," . "\"PctUsed\":" . "\"" . $pctused . "\"" . "," . "\"DrvSize\":" . "\"" .  $drvsize . "\"" . "," . "\"SigWifi\":" . "\"" . $sigwifi . "\"" . "," . "\"RctFile\":" . "\"" . $rctfile . "\"" . "}";
?>