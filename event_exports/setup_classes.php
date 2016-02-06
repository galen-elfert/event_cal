<?php

class setup
{
    private $building, $room, $date, $time_start, $time_end, $event_number, $event_name, $resource, $quantity, $setup_by, $picked_up_by, $note;

    // Private generic constructor

    // Constructor
    public static function new_setup_from_file($file_in)
    {
        $new_setup = new setup();
        if (($inputfile = fopen($file_in, "r")) !== FALSE) 
        {
            while(($data = fgetcsv($inputfile)) !== FALSE)
            {
                $this->building = $data[0];
                $this->date = $data[5];
                $event_num = substr($data[21], 1, 5);
                if (is_numeric($event_num) 
                {
                    $this->event_number = $event_num;
                } else {
                    // throw validation error
                }
	        $this->event_name = substr($data[21], 7);
		preg_match('/(?<=Room ).+/s', $data[16], $matches);
                $this->room = $matches[0];
                $this->time_start = $data[14];
                $this->time_end =  $data[15];
                $this->resource = $data[28];
                $this->qua
            }
        }
        else
        {
            // handle bad file error
        }

        return $new_setup;
    }
}
?>
