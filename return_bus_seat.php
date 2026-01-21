<?php
    ob_start();
    // session_start();
    include("header.php");
    include ("dbconnect.php");
    $_SESSION['return_bus_no'] = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_bus_seat.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Departure Bus Seat</title>
</head>
<body>
    <?php
        for($i=0;$i<$_SESSION["qtybuses"];$i++)
        {
            $button_name1 = 'viewseatbtn-' . $i+1;
            if(isset($_POST[$button_name1]))
            {
                if(isset($_POST["bsid"]))
                {
                    $bus_schid = $_POST["bsid"];
                    
                    $get_sql = "SELECT * FROM bus_schedule WHERE bus_schedule_id = $bus_schid";
                    $run_sql = mysqli_query($conn,$get_sql);
                    $row_sql = mysqli_fetch_assoc($run_sql);
                    $board = $row_sql["boarding"];
                    $alight = $row_sql["alighting"];
                    $fare = $row_sql['fare'];
                    $bus_schedule_date = $row_sql['bus_schedule_date'];
                    $bs_dtime = $row_sql['departure_time'];
                    $bs_arrival = $row_sql['arrival_time'];
                    $bs_dtime_format = $bs_dtime;
        
                    if($bs_dtime >= 12.00)
                    {
                        if((int)$bs_dtime == 12)
                        {
                            $summary_departure_time = number_format($bs_dtime_format, 2, ':', '') . ' PM';
                        }
                        else
                        {
                            (float)$bs_dtime_format = $bs_dtime - 12.00;
                            
                            $summary_departure_time = number_format($bs_dtime_format, 2, ':', '') . ' PM'; 
                        }
                                    
                    }
                    else 
                    {
                        $summary_departure_time = number_format((float)$bs_dtime_format,2, ':', '') . ' AM';
                    }
                    

                    $_SESSION['return_bushid'] = $bus_schid;
                    $_SESSION['return_fare'] = $fare;
                    $_SESSION['return_bus_schedule_date'] = $bus_schedule_date;
                    $_SESSION['summary_return_time'] = $summary_departure_time;
                    $_SESSION['gateR'] = $row_sql['gate'];

                }

                $sql_bus = "SELECT bus_id FROM bus WHERE bus_schedule_id = $_SESSION[return_bushid]";
                $get_busID = mysqli_query($conn,$sql_bus);
                $row_bus = mysqli_fetch_assoc($get_busID);

                
                $bus_id = $row_bus['bus_id'];
                $_SESSION['return_busID'] = $bus_id;


            }
        }
    ?>

    <form method="post" action="return_bus_seat.php">
    <div class="seat-container">
        <div class="columnOne">
            <div><img src="img/stearing.png" style="width:40px; transform: rotate(270deg); margin-top:20px; margin-left:20px;"></div>
            <div class="vl"></div>
            <ol>
                <li class="seat row-1">
                    <input type="checkbox" name="seat[]" id="1A" value="1A" onchange="checkSelection()"/>
                    <label for="1A" title="1A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="2A" value="2A" onchange="checkSelection()"/>
                    <label for="2A" title="2A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="3A" value="3A" onchange="checkSelection()"/>
                    <label for="3A" title="3A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="4A" value="4A" onchange="checkSelection()"/>
                    <label for="4A" title="4A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="5A" value="5A" onchange="checkSelection()"/>
                    <label for="5A" title="5A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="6A" value="6A" onchange="checkSelection()"/>
                    <label for="6A" title="6A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="7A" value="7A" onchange="checkSelection()"/>
                    <label for="7A" title="7A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="8A" value="8A" onchange="checkSelection()"/>
                    <label for="8A" title="8A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="9A" value="9A" onchange="checkSelection()"/>
                    <label for="9A" title="9A"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="10A" value="10A" onchange="checkSelection()"/>
                    <label for="10A" title="10A"><img src="img/seat.png"></label>
                </li>

                <li class="seat row-2">
                    <input type="checkbox" name="seat[]" id="1B" value="1B" onchange="checkSelection()"/>
                    <label for="1B" title="1B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="2B" value="2B" onchange="checkSelection()"/>
                    <label for="2B" title="2B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="3B" value="3B" onchange="checkSelection()"/>
                    <label for="3B" title="3B"><img src="img/seat.png"></label> 
                    <input type="checkbox" name="seat[]" id="4B" value="4B" onchange="checkSelection()"/>
                    <label for="4B" title="4B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="5B" value="5B" onchange="checkSelection()"/>
                    <label for="5B" title="5B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="6B" value="6B" onchange="checkSelection()"/>
                    <label for="6B" title="6B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="7B" value="7B" onchange="checkSelection()"/>
                    <label for="7B" title="7B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="8B" value="8B" onchange="checkSelection()"/>
                    <label for="8B" title="8B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="9B" value="9B" onchange="checkSelection()"/>
                    <label for="9B" title="9B"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="10B" value="10B" onchange="checkSelection()"/>
                    <label for="10B" title="10B"><img src="img/seat.png"></label>
                </li>

                <li class="seat row-3">
                    <input type="checkbox" name="seat[]" id="1C" value="1C" onchange="checkSelection()"/>
                    <label for="1C" title="1C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="2C" value="2C" onchange="checkSelection()"/>
                    <label for="2C" title="2C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="3C" value="3C" onchange="checkSelection()"/>
                    <label for="3C" title="3C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="4C" value="4C" onchange="checkSelection()"/>
                    <label for="4C" title="4C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="5C" value="5C" onchange="checkSelection()"/>
                    <label for="5C" title="5C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="6C" value="6C" onchange="checkSelection()"/>
                    <label for="6C" title="6C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="7C" value="7C" onchange="checkSelection()"/>
                    <label for="7C" title="7C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="8C" value="8C" onchange="checkSelection()"/>
                    <label for="8C" title="8C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="9C" value="9C" onchange="checkSelection()"/>
                    <label for="9C" title="9C"><img src="img/seat.png"></label>
                    <input type="checkbox" name="seat[]" id="10C" value="10C" onchange="checkSelection()"/>
                    <label for="10C" title="10C"><img src="img/seat.png"></label>
                </li>
            </ol>
        </div>

        <div class="columnTwo">
            <div class="available"><img src="img/seat.png">Available</div>
            <div class="unavailable"><img src="img/seated.png">Unavailable</div>
        </div>

        <div class="columnThree">
            <div class="fare-details">Fare Details</div>
            <div style="display:flex;">
                <div class="info1"><img src="img/dot.png" style="width:25px;"><span><?php echo $_SESSION['alight']  ?></span></div><br/>
            </div>

            <div style="display:flex; margin-top:5px;">
                <div class="info2"><img src="img/dot.png" style="width:25px;"><span><?php echo $_SESSION['board']?></span></div>
            </div>
            <div class="BpDp-dashed"></div>
            <div>
                <input type="submit" class="bookbtn btn-white btn" style="display:none;" value="PROCEED" id="btnpay" name="btnpro">
            </div>
        </div>
    </div>
    </form>
</body>
</html>

<script>
    // Function to check if at least one checkbox is selected
    function checkSelection() {
    var countseat = <?php echo count($_SESSION['bus_no']); ?>;
    var seatCheckboxes = document.querySelectorAll('input[name="seat[]"]');
    var proceedButton = document.getElementById('btnpay');
    var x = 0;

    for (var i = 0; i < seatCheckboxes.length; i++) {
        if (seatCheckboxes[i].checked) {
            x++;
        }
    }

    if (x == countseat) {
        proceedButton.style.display = 'block';

        // Disable other checkboxes
        for (var i = 0; i < seatCheckboxes.length; i++) {
            if (!seatCheckboxes[i].checked) {
                seatCheckboxes[i].disabled = true;
            }
        }
    } else {
        proceedButton.style.display = 'none';

        // Enable all checkboxes
        for (var i = 0; i < seatCheckboxes.length; i++) {
            seatCheckboxes[i].disabled = false;
        }
    }

    console.log(x);
}

</script>

<?php
    if($_SESSION['busID'] != null)
    {
        $sql_checkSeat = "SELECT bus_seat_no FROM bus_seat WHERE bus_schedule_id = $_SESSION[return_bushid] AND bus_id = $_SESSION[return_busID] AND bus_seat_status = 0";
        $get_checkSeat = mysqli_query($conn,$sql_checkSeat);

        while($row_checkSeat = mysqli_fetch_assoc($get_checkSeat))
        {
            $exists_Seat = $row_checkSeat['bus_seat_no'];
            
            ?>
                <script>
                    var seatCheckboxes = document.querySelectorAll('input[name="seat[]"]');
                    var exists_Seat = "<?php echo $exists_Seat ?>";
                    console.log()

                    for (var i = 0; i < seatCheckboxes.length; i++) {
                        if(seatCheckboxes[i].value === exists_Seat) 
                        {
                            seatCheckboxes[i].disabled = true;
                            var label = document.querySelector('label[for="' + exists_Seat + '"]');
                            label.innerHTML = "<img src='img/seated.png'>"
                        }
                        
                    }
                </script>
            <?php
        } 
    }


    if(isset($_POST['btnpro']))
    {
        $i = 0;
        $selectedSeats = $_POST['seat'];

        // Loop through the selected seats and store them in the session
        foreach ($selectedSeats as $seat) {
            $_SESSION['return_bus_no'][$i] = $seat; // Store each seat value in the session array
            $i++;
        }

        if(isset($_SESSION['return_date']))
        {
            header("Location: passenger_info.php");
        }
    }

    ob_end_flush();
?>