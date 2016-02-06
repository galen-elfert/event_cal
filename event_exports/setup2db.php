<?php
include "setup_classes.php";

if (($infile = fopen("20162501-setup.csv", "r")) == TRUE)
{
    $mysetups = setup::new_setup_from_file($infile);
    print_r($mysetups);
} else {
    echo "Cannot open file\n";
}

if (setup::compare($mysetups[102], $mysetups[103]))
{
    echo "match!\n";
} else {
    echo "no match\n";
}

/*
if (($inputfile = fopen($file_name, "r")) !== FALSE)
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
*/

?>
