<?php

function hello()
{
    echo "Hello\n";
}

class setup
{
    private $building, $room, $date, $time_start, $time_end, $event_number, $event_name, $resource, $quantity, $setup_by, $picked_up_by, $note;

    /* Constructor for file import
     *
     * params:  resource $handle
     *          file handle for csv file to parse_str
     */
    public static function new_setup_from_file($input_file)
    {
        $index = 0;
        while(($data = fgetcsv($input_file)) !== FALSE)
        {
            $setup[$index] = new setup;
            $setup[$index]->building = $data[0];
            $setup[$index]->date = $data[5];
            $event_num = substr($data[21], 1, 5);
            if (is_numeric($event_num))
            {
                $setup[$index]->event_number = $event_num;
            } else {
                // throw validation error
            }
            $setup[$index]->event_name = substr($data[21], 7);
            preg_match('/(?<=Room ).+/s', $data[16], $matches);
            $setup[$index]->room = $matches[0];
            $setup[$index]->time_start = $data[14];
            $setup[$index]->time_end =  $data[15];
            $setup[$index]->resource = $data[28];
            $setup[$index]->quantity = $data[26];
            $index++;
        }
        return $setup;
    }

    /* Match function
     *
     * Compare critical fields of two setup objects to determine if they
     * are identical
     */
    public static function match(setup $a, setup $b)
    {
        return  $a->building    == $b->building &&
                $a->room        == $b->room &&
                $a->date        == $b->date &&
                $a->event_number== $b->event_number &&
                $a->event_name  == $b->event_name &&
                $a->resource    == $b->resource &&
                $a->quantity    == $b->quantity &&
                $a->time_end    == $b->time_end &&
                $a->time_start  == $b->time_start;
    }
}
?>
