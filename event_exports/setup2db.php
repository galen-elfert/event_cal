<?php

if (($inputfile = fopen("20162501-setup.csv", "r")) !== FALSE) 
{
    $data = fgetcsv($inputfile);
	    for ($i = 0; $i <= count($data); ++$i)
	    {
			echo $i . ":\t" . $data[$i] . "\n";
		}
		$event_num = substr($data[21], 1, 5);
		$event_name = substr($data[21], 7);
		echo "number: ".$event_num."\tname: ".$event_name;
		echo "\nNum: ".is_numeric($event_num);
		echo "\nName: ".is_numeric($even_name);
		preg_match('/(?<=Room ).+/s', $data[16], $room);
		echo "\n".$room[0];
		//string pattern, string subject [, array &matches [, int flags [, int offset]]])
}

?>
