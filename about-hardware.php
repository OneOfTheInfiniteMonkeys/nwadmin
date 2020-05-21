<?php

  include 'func_system.php';     // system functions such as network status

// ----------------------------------------------------------------------------
// This PHP file may have a parameter passed to it 
// "id". This is the device id for the board
// Here we validate that input to prevent silly things being sent as SQL injection querys
// It can be improved by validating against the known device list
// ----------------------------------------------------------------------------
$id = $_REQUEST["id"];                                                          // Get the parameter
if ( ($id == "") | ($id == NULL) ) { $id = "0"; }                               // Remove empty or NULL parameters
$id = substr(preg_replace("/-[^0-9]/", "", $id), 0, 8);                         // Stop some silly SQL injection being effected i.e. only numbers
// ----------------------------------------------------------------------------
// echo $id;                                                                    // was used for debugging the parameter sent to this script

?>


<div>

   <?php
           // Portions of code below from http://www.atouk.com/wordpress/?page_id=238
           // CPU info
           $cpu_info = shell_exec('cat /proc/cpuinfo');
           // board revision - http://elinux.org/RPi_HardwareHistory
           if ($id == "0") {
                $board_version = hexdec(substr($cpu_info, strpos($cpu_info, 'Revision	: ') + 11, 6));
                // See also http://elinux.org/RPi_HardwareHistory
              } // no board was specified, if $id is other than "0" a board was specified
            else {
                $board_version = $id;
              }
   ?>

   <?php
     // Create image instances of the RASPI board fron the stored graphic containing all boards
     $src = imagecreatefromjpeg('images/Pi-Family-Pi2-cropped_1500_01.jpg');
     $dest = imagecreatetruecolor(375, 287);

     $bg = imagecolorallocate ( $dest, 255, 255, 255 );   // The image background defaults to black - make it white
     imagefilledrectangle($dest, 0, 0, 375, 287, $bg);    // Faster than imagefill() which is a flood fill routine

     switch ($board_version) {
        case 1:
        case 2:
                $x1 =   0; $y1 =   0; $x2 = 375; $y2 = 287;
                   break;
        case 3:
                $x1 = 375; $y1 =   0; $x2 = 750; $y2 = 287;
                   break;
        case 4:
        case 5:
        case 6:
                $x1 =   0; $y1 = 287; $x2 = 750; $y2 = 574;
                   break;
        case 7: 
        case 8:
        case 9:
                $x1 = 750; $y1 =   0; $x2 = 1125; $y2 = 287;
                   break;
        case 13:
                   break;
        case 14:
                   break;
        case 15:
                   break;
        case 16:
                $x1 = 375; $y1 = 574; $x2 = 750; $y2 = 861;
                   break;
        case 17:
                   break;
        case 18:
                   break;
        case 19:
                   break;
        case 9437330:
               $x1 = 375; $y1 = 861; $x2 = 750; $y2 = 1148;
                   break;
        case 10489921:
                   break;
        case 10494082 :
               $x1 = 750; $y1 = 861; $x2 = 1125; $y2 = 1148;
                   break;
        case 10620993:
                   break;
        default:
               $x1 =   0; $y1 =   0; $x2 = 375; $y2 = 287;
                   break;
        }

    // Copy
    imagecopy($dest, $src, 0, 0, $x1, $y1, $x2, $y2);


    // Output and free from memory
    imagejpeg($dest, 'graphs/RASPI-Board.jpg');

    echo "<img src='graphs/RASPI-Board.jpg' HIEGHT='30%' WIDTH='30%'>";

    imagedestroy($dest);
    imagedestroy($src);
  ?>

  <div style="width:600px; height: 75px;">
    <textarea style="width:590px; height:75px; resize: none;">
      <?php
           echo "\r\n";
           $ip = exec("/sbin/ifconfig lan0 | /bin/grep 'inet addr' | /usr/bin/cut -d ':' -f 2 | /usr/bin/cut -d ' ' -f 1");
           if ($ip > "") { echo "Ethernet IP: " . $ip . "\r\n"; }
           $ip = exec("/sbin/ifconfig wlan0 | /bin/grep 'inet addr' | /usr/bin/cut -d ':' -f 2 | /usr/bin/cut -d ' ' -f 1");
           if ($ip > "") { echo "Wireless IP: " . $ip . "\r\n"; }
           echo "System temperature: " . round(intval(shell_exec('cat /sys/class/thermal/thermal_zone0/temp'))/1000, 1) . " C \r\n";
           echo "Load one five fifteen rest: " . exec("cat /proc/loadavg") . "\r\n";
           echo "System status:\r\n";
           echo exec("cat /proc/version") . "\r\n";
           echo exec("cat /proc/cpuinfo") . "\r\n";
           echo "Memory Info.:\r\n";
           echo exec("cat /proc/meminfo") . "\r\n";
           echo "Up Time: " . exec("cat /proc/uptime") . "\r\n";
           echo "\r\n";
 
           echo "Board version: " . $board_version . "\r\n";
           echo "Ver 	Release		Model 	PCB	Memory	Desc. \r\n";
           // Select board version description based on board version number
           switch ($board_version) {
                case 1:
                    echo "Beta 	Q1 2012 	B (Beta) 	 ? 	256 MB 	Beta Board";
                    break;
                case 2:
                    echo "0002 	Q1 2012 	B 		1.0 	256 MB";
                    break;
                case 3:
                    echo "0003 	Q3 2012 	B (ECN0001) 	1.0 	256 MB 	Fuses mod and D14 removed";
                    break;
                case 4:
                    echo "0004 	Q3 2012 	B 	2.0 	256 MB 	(Mfg by Sony)";
                    break;
                case 5:
                    echo "0005 	Q4 2012 	B 	2.0 	256 MB 	(Mfg by Qisda)";
                    break;
                case 6:
                    echo "0006 	Q4 2012 	B 	2.0 	256 MB 	(Mfg by Egoman)";
                    break;
                case 7:
                    echo "0007 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Egoman)";
                    break;
                case 8:
                    echo "0008 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Sony)";
                    break;
                case 9:
                    echo "0009 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Qisda)";
                    break;
                case 13:
                    echo "000d 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Egoman)";
                    break;
                case 14:
                    echo "000e 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Sony)";
                    break;
                case 15:
                    echo "000f 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Qisda)";
                    break;
                case 16:
                    echo "0010	Q3 2014 	B+ 	1.0 	512 MB 	(Mfg by Sony)";
                    break;
                case 17:
                    echo "0011 	Q2 2014 	Compute Module 	1.0 	512 MB 	(Mfg by Sony)";
                    break;
                case 18:
                    echo "0012 	Q4 2014 	A+ 	1.0 	256 MB 	(Mfg by Sony)";
                    break;
                case 19:
                    echo "0013 	Q1 2015 	B+ 	1.2 	512 MB 	 ?";
                    break;
                case 10489921:
                    echo "a01041 	Q1 2015 	2 Model B 	1.1 	1 GB 	(Mfg by Sony)";
                    break;
                case 10494082 :
                    echo "a02082 	Q1 2016 	3 Model B 	1.1 	1 GB 	(Mfg by Sony)";
                    break;
                case 10620993:
                    echo "a21041 	Q1 2015 	2 Model B 	1.1 	1 GB 	(Mfg by Embest, China)";
                    break;
                case 9437330:
                    echo "900092 	Q4 2015 	Zero 	1.2 	512 MB 	(Mfg by Sony)" ;
                    break;
                default:
                    echo "unknown";
                    break;
              }
           echo "\r\n";

          // board revisions - http://elinux.org/RPi_HardwareHistory
          // Beta 	Q1 2012 	B (Beta) 	 ? 	256 MB 	Beta Board
          // 0002 	Q1 2012 	B 	1.0 	256 MB 	
          // 0003 	Q3 2012 	B (ECN0001) 	1.0 	256 MB 	Fuses mod and D14 removed
          // 0004 	Q3 2012 	B 	2.0 	256 MB 	(Mfg by Sony)
          // 0005 	Q4 2012 	B 	2.0 	256 MB 	(Mfg by Qisda)
          // 0006 	Q4 2012 	B 	2.0 	256 MB 	(Mfg by Egoman)
          // 0007 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Egoman)
          // 0008 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Sony)
          // 0009 	Q1 2013 	A 	2.0 	256 MB 	(Mfg by Qisda)
          // 000d 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Egoman)
          // 000e 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Sony)
          // 000f 	Q4 2012 	B 	2.0 	512 MB 	(Mfg by Qisda)
          // 0010 	Q3 2014 	B+ 	1.0 	512 MB 	(Mfg by Sony)
          // 0011 	Q2 2014 	Compute Module 	1.0 	512 MB 	(Mfg by Sony)
          // 0012 	Q4 2014 	A+ 	1.0 	256 MB 	(Mfg by Sony)
          // 0013 	Q1 2015 	B+ 	1.2 	512 MB 	 ?
          // a01041 	Q1 2015 	2 Model B 	1.1 	1 GB 	(Mfg by Sony)
          // a21041 	Q1 2015 	2 Model B 	1.1 	1 GB 	(Mfg by Embest, China) 
          // a02082 	Q1 2016 	3 Model B 	1.2 	1024 MB 	(Mfg by Sony) 

           $cmdline = shell_exec('cat /proc/cmdline');
           // memory base 
           $mem_base = substr($cmdline, strpos($cmdline, 'mem_base') + 11, 1);
           echo "Memory base: " . $mem_base . "\r\n";
           // memory size
           $mem_size =  substr($cmdline, strpos($cmdline, 'mem_size') + 11, 1);
           echo "Memory size: " . $mem_size  . "\r\n";
           //board issue type
           $issue = shell_exec('cat /boot/issue.txt'). "\r\n";
           echo "Board issue: " . substr($issue, 0 , strpos($issue, ')') + 1). "\r\n";


           if (intval(substr(shell_exec('cat /proc/cpuinfo | grep "CPU revision"'), -1, 1)) && 0x80) 
           echo 'Warranty Bit    : Bad'; 
           else 
           echo 'Warranty Bit    : Good' . "\r\n"; 
           echo 'Memory Size     : ' . intval($mem_size) * 256 . 'M' . "\r\n";
           echo 'Memory Split    : ';
           switch ($mem_base) {
           	case 'f':
           		echo ((intval($mem_size) - 1) * 256) + 240 . 'M ARM / 16M GPU';
           		break;
           	case 'e':
           		echo ((intval($mem_size) - 1) * 256) + 224 . 'M ARM / 32M GPU';
           		break;
           	case 'c':
           		echo ((intval($mem_size) - 1) * 256) + 192 . 'M ARM / 64M GPU';
           		break;
           	case '8':
           		echo ((intval($mem_size) - 1) * 256) + 128 . 'M ARM / 128M GPU';
           		break;
           	default:
           		echo 'Other/User Defined' . "\r\n";
           	}

         echo "Memory: " . "\r\n" . exec('/usr/bin/free'). "\r\n";

         echo "Disk Space: " . exec('df -h'). "\r\n";

         echo "Top 10 CPU utilisation Chart" . "\r\n" . exec('ps -eo %cpu,comm --sort %cpu '). "\r\n";

         // get browser side stuff
         echo "\r\n";  
         echo "Browser detection\r\n";
         $ua=getBrowser();
         $yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . "\r\n" . " reports: \r\n" . $ua['userAgent'];
         echo ($yourbrowser);

         echo "\r\n";  
         echo "\r\n";  
         echo "Wifi\r\n";
         $wifi = shell_exec("/sbin/iwconfig wlan0");
         $wifi_freq = substr($wifi, strpos($wifi, 'Frequency:') + 10, 5);                       // Exract the Wifi Frequency
         $wifi_pwr =  substr($wifi, strpos($wifi, 'level=') + 6, 3);
         echo ($wifi);
         echo "\r\n";  
         echo "Wifi Signal Strength: " . ($wifi_pwr) . " dBm";
         echo "\r\n";  
         echo "Wifi Channel " . Get_Wifi_Channel($wifi_freq * 1000) . " ";
         echo "Wifi Frequency " . $wifi_freq . " GHz";
         echo "\r\n";  
      ?>
    </textarea>
  </div>
</div>


		<div id="bottom-navigation">
			<div id="back" onclick="pageChange();location.href='./';"></div>
		</div>
</div>
</div>
<div class="modal">Please wait...</div>
</body>
</html>
