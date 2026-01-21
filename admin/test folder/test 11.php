


<form action="" method="post">
<div style="margin-top: 5rem; flex-direction: row; display: flex; align-items: normal;">
                                                                <label for="bus_s_depart"><h4 style="font-size: 1.5em">Departure Time : </h4> </label>
                                                                <input type="time" style="flex-direction: row;" id="bus_s_depart" placeholder="Departure Time" name="bus_s_depart" size="35" value="<?php echo $dep_time ?>">
                                                            </div>
                                                            <input type="submit" value="ss" name="ss">
</form>


<?php

if(isset($_POST['ss']))
{
    $sdsd = $_POST['bus_s_depart'];
    
    $time_parts = explode(':', $sdsd); // split the time string into hour and minute components
    $hour = (int) $time_parts[0]; // extract the hour as an integer
    $minute = (int) $time_parts[1]; // extract the minute as an integer

    $dep_time = sprintf("%02d.%02d", $hour, $minute); // format the time as hh:mm
    
    
    
    $total =0;


    // output the result
    echo $dep_time; // prints "16.3"
    
}




$time_parts = '16:30'; // input time string
$time_parts = explode(':', $time_parts); // split the time string into hour and minute components
$hour = (int) $time_parts[0]; // extract the hour as an integer
$minute = (int) $time_parts[1]; // extract the minute as an integer

$dep_time = sprintf("%02d.%02d", $hour, $minute); // format the time as hh:mm
$total =0;


// output the result
// echo $dep_time; // prints "16.3"

?>