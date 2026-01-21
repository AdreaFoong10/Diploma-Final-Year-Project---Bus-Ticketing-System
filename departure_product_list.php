<?php
include ("header.php");
// session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
  <title>Departure Product List</title>
  <style>
    .container {
      display: flex;
      margin-top:10px;
    }

    .left-column {
      width: 13%;
      /* background-color: #f1f1f1; */
      margin-left:10px;
    }

    .right-column {
      flex: 1;
      /* background-color: #e9e9e9; */
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #ddd;
      box-shadow: 3px 4px 5px grey;
    }

    th, td {
      padding: 8px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    .fare-border{
        border-bottom: none;
        position:relative;
        top:32px;
    }

    .bo-pic{
        height:100px;
    }

    .td-btn-view-seat{
        padding:0px;
        padding-bottom:2px;
  
    }

    .btn-view-seat{
        padding:10px;
        border-radius:5px;
        background-color: #F34545;
        cursor: pointer;
        border:none;
        color:white;
    }

    .btn-view-seat:hover{
        box-shadow:1px 2px 3px lightcoral;
    }
  </style>

    <script>
        function check()
        {
            if(document.getElementById("radio5").checked)
            {
                document.getElementById("bus_schedule_fare_asc").style.display = "block";
                document.getElementById("bus_schedule_fare_desc").style.display = "none";
                document.getElementById("bus_schedule_depttime_asc").style.display = "none";
                document.getElementById("bus_schedule_depttime_desc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_asc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "none";
            }

            if(document.getElementById("radio6").checked)
            {
                document.getElementById("bus_schedule_fare_asc").style.display = "none";
                document.getElementById("bus_schedule_fare_desc").style.display = "block";
                document.getElementById("bus_schedule_depttime_asc").style.display = "none";
                document.getElementById("bus_schedule_depttime_desc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_asc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "none";
            }

            if(document.getElementById("radio1").checked)
            {
                document.getElementById("bus_schedule_depttime_asc").style.display = "block";
                document.getElementById("bus_schedule_depttime_desc").style.display = "none";
                document.getElementById("bus_schedule_fare_asc").style.display = "none";
                document.getElementById("bus_schedule_fare_desc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_asc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "none";
            }

            if(document.getElementById("radio2").checked)
            {
                document.getElementById("bus_schedule_depttime_asc").style.display = "none";
                document.getElementById("bus_schedule_depttime_desc").style.display = "block";
                document.getElementById("bus_schedule_fare_asc").style.display = "none";
                document.getElementById("bus_schedule_fare_desc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_asc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "none";
            }

            if(document.getElementById("radio3").checked)
            {
                document.getElementById("bus_schedule_arrtime_asc").style.display = "block";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "none";
                document.getElementById("bus_schedule_depttime_asc").style.display = "none";
                document.getElementById("bus_schedule_depttime_desc").style.display = "none";
                document.getElementById("bus_schedule_fare_asc").style.display = "none";
                document.getElementById("bus_schedule_fare_desc").style.display = "none";
            }

            if(document.getElementById("radio4").checked)
            {
                document.getElementById("bus_schedule_arrtime_asc").style.display = "none";
                document.getElementById("bus_schedule_arrtime_desc").style.display = "block";
                document.getElementById("bus_schedule_depttime_asc").style.display = "none";
                document.getElementById("bus_schedule_depttime_desc").style.display = "none";
                document.getElementById("bus_schedule_fare_asc").style.display = "none";
                document.getElementById("bus_schedule_fare_desc").style.display = "none";
            }
 
        }
        
    </script>
</head>
<body>
    <?php

        if(!isset($_SESSION['userid']))
        {
            $_SESSION['loginb4'] = 1;
            header("location:login.signup.php");

            
        }

        include("dbconnect.php");
        $currentday = date("d");
        $currentmonth = date("m");
        $currenttime = date('Y-m-d H:i:s');
        

        $departure = $_POST['origin'];
        $destination = $_POST['destination'];
        $departure_date = $_POST['Departure_Date'];
        $return_date = $_POST['Return_Date'];
        $error = 0;
        

        if($departure == "emptyo" || $destination =="emptyd" || empty($departure_date) || ($departure == $destination))
        {
            $error = 1;
            $_SESSION['error_message'] = "Please choose a correct origin/destination/departure date!";

            header("Location: home.php");
        }

        if($departure_date == $return_date)
        {
            ?>
                <script>
                Swal.fire({
                    title: 'Are you sure to return on same day?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        // User chose to stay on the same page
                        
                    } else {
                        // User chose to go to home.php
                        window.location.href = 'home.php';
                    }
                });
                </script>
            <?php
        }

        if(empty($return_date))
        {
            $return_null = 1;
            unset($_SESSION['return_date']);
        }
        else
        {
            $_SESSION['origin'] = $departure;
            $_SESSION['destination'] = $destination;
            $_SESSION['departure_date'] = $departure_date;
            $_SESSION['return_date'] = $return_date;
        }

        if($error == 0)
        { 
            $sql_route = "SELECT * FROM route WHERE starting_point LIKE '%$departure%' AND destination LIKE '%$destination%'";
            $get_route = mysqli_query($conn,$sql_route);
            $row_route = mysqli_fetch_assoc($get_route);
            $route_id = $row_route['route_id'];

            $_SESSION['origin'] = $departure;
            $_SESSION['destination'] = $destination;
            
        }

        
        ?>
        <div style="margin:0px;">
            <div style="padding:5px; border-bottom: 1px solid black">
                Bus From <?php echo $departure ?> To <?php echo $destination ?>
            </div>

            

            <div style="display:grid; grid-template-columns:auto auto;border-bottom: 1px solid black;">
                <div style="background-color:#CECCCC; padding:5px; " id="departure_list"><?php echo $departure ?> > <?php echo $destination ?> > <?php echo $departure_date ?></div>
                <?php
                if(!isset($return_date))
                {
                    ?>
                        <div style="padding:5px; " id="return_list">&nbsp;</div>
                    <?php
                }
                else
                {
                    ?>
                        <div style="padding:5px; " id="return_list"><?php echo $destination ?> > <?php echo $departure ?> > <?php echo $return_date ?></div>
                    <?php
                }
                ?>
            </div>
        </div>

        

  <div class="container">
    <div class="left-column">
    <div style="font-weight:bold;">FILTER</div>
        <p>
            <div style="font-weight:bold;">Departure Time</div>
            <p><input type="radio" name="radiobtn" id="radio1" onclick="check()">Ascending</p>
            <p><input type="radio" name="radiobtn" id="radio2" onclick="check()">Descending</p>
        </p>

        <div style="font-weight:bold;">Arrival Time</div>
            <p><input type="radio" name="radiobtn" id="radio3" onclick="check()">Ascending</p>
            <p><input type="radio" name="radiobtn" id="radio4" onclick="check()">Descending</p>

        <div style="font-weight:bold;">Fare</div>
            <p><input type="radio" name="radiobtn" id="radio5" onclick="check()">Low - High</p>
            <p><input type="radio" name="radiobtn" id="radio6" onclick="check()">High - Low</p>
        </div>

    <div class="right-column">

         <!-- START bus_schedule.fare ASC -->
        <div id="bus_schedule_fare_asc" style="display:none;">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);
            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.fare";

                            
                            
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                                 

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
    <!-- END bus_schedule.fare ASC -->



    <!-- START bus_schedule.fare DESC -->
    <div id="bus_schedule_fare_desc" style="display:none;">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);

            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.fare DESC";
                                
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                            
                            
                                              

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
        <!-- END bus_schedule.fare DESC -->

        <!-- START bus_schedule.dept time ASC -->
    <div id="bus_schedule_depttime_asc">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);

            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.departure_time ASC";
                                
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                            
                                      

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
        <!-- END bus_schedule.dept time ASC -->

         <!-- START bus_schedule.dept time DESC -->
    <div id="bus_schedule_depttime_desc" style="display:none;">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);

            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.departure_time DESC";
                                
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                            
                                                  

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
        <!-- END bus_schedule.dept time DESC -->

         <!-- START bus_schedule.arr time ASC -->
    <div id="bus_schedule_arrtime_asc" style="display:none;">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);

            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.arrival_time ASC";
                                
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                            
                 

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
        <!-- END bus_schedule.arr time ASC -->


        <!-- START bus_schedule.arr time DESC -->
    <div id="bus_schedule_arrtime_desc" style="display:none;">
      <?php
            // $sql_schedule = "SELECT * FROM bus_schedule INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
            // WHERE bus_schedule.route_id = $route_id";
            // $get_schedule = mysqli_query($conn,$sql_schedule);

            ?>

                <table>
                    <thead>
                        <th colspan="2" class="totallist">&nbsp;</th>
                        <th style="color:black;">Bus Operator</th>
                        <th style="color:black;">Departure Time</th>
                        <th style="color:black;">Boarding</th>
                        <th style="color:black;">Duration</th>
                        <th style="color:black;">Arrival Time</th>
                        <th style="color:black;">Rating</th>
                        <th style="color:black;">Fare</th>
                    </thead>
                        <?php
                            
                            
                            $get_schedule = "SELECT DISTINCT bus_operators.bus_operator_pic, bus_operators.bus_operator_name,bus_schedule.bus_schedule_id,bus_schedule.departure_time, bus_schedule.boarding,
                                            bus_schedule.duration, bus_schedule.arrival_time, bus_schedule.fare, bus_schedule.bus_schedule_date FROM bus_schedule 
                                            INNER JOIN bus_operators ON bus_schedule.bus_operator_id = bus_operators.bus_operator_id
                                            WHERE bus_schedule.bus_schedule_status = 1 AND bus_schedule.route_id = $route_id
                                            AND bus_schedule.bus_schedule_date LIKE '%$departure_date%'
                                            ORDER BY bus_schedule.arrival_time DESC";
                                
                            $x=0;
                            $run_schedule = mysqli_query($conn,$get_schedule);
                            
                                                      

                            while($row_schedule=mysqli_fetch_assoc($run_schedule))
                            {
                                $bo_pic = $row_schedule['bus_operator_pic'];
                                $bo_name = $row_schedule['bus_operator_name'];
                                
                                $bsid = $row_schedule['bus_schedule_id'];
                                $bs_dtime = $row_schedule['departure_time'];
                                $bs_boarding = $row_schedule['boarding'];
                                $bs_duration = $row_schedule['duration'];
                                $bs_arrival = $row_schedule['arrival_time'];
                                $bs_fare = $row_schedule['fare'];
                                $bs_dtime_format = $bs_dtime;
                                $bs_arrival_format = $bs_arrival;
                                $x++;
                            ?>

                            <tr>
                                <td class="bo-pic" rowspan="2" colspan="2"><img src="admin/pictures/<?php echo $bo_pic ?>"></td>
                                <td rowspan="2">  <?php echo $bo_name     ?></td>
                        
                            <?php
                                if($bs_dtime >= 12.00)
                                {
                                    if((int)$bs_dtime == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_dtime_format = $bs_dtime - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_dtime_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                            ?>

                                <td rowspan="2">  <?php echo $bs_boarding ?></td>
                                <td rowspan="2">  <?php echo $bs_duration ?> hours</td>

                                
                            <?php
                                if($bs_arrival >= 12.00)
                                {
                                    if((int)$bs_arrival == 12)
                                    {
                            ?>
                                        <td rowspan="2">  <?php echo number_format($bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    else
                                    {
                                        (float)$bs_arrival_format = $bs_arrival - 12.00;
                            ?>
                                        <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> PM</td>
                            <?php
                                    }
                                    
                                }
                                else 
                                {
                            ?>
                                    <td rowspan="2">  <?php echo number_format((float)$bs_arrival_format,2, ':', '')  ?> AM</td>
                            <?php
                                }
                                

                                //Get rating
                                $i=0;
                                $total = 0;
                                $total_avg = 0;
                                $get_rate = "SELECT rating_point FROM rating WHERE bus_schedule_id = $bsid";
                                $run_rate = mysqli_query($conn,$get_rate);

                                while ($row_pro = mysqli_fetch_assoc($run_rate))
                                {
                                    $rate_marks = $row_pro['rating_point'];
                                    $i++;

                                    $total += $rate_marks;
                                    $total_avg = $total/$i;
                                }
                                //END get rating
                            ?>
                                <td rowspan="2">  <?php echo number_format((float)($total_avg), 2, '.', '') ?> </td>
                                <td class="fare-border">RM<?php echo number_format((float)($bs_fare ), 2, '.', '')  ?> </td>          
                            </tr>
                              
                            <tr>
                                <form name="frmbsid<?php echo $x ?>" action="bus_seat.php" method="post">
                                    <input type="hidden" name="bsid" value="<?php echo $bsid ?>">
                                    <td colspan="8" valign="bottom" align="right" class="td-btn-view-seat"><input type="submit" class="btn-view-seat" name="viewseatbtn-<?php echo $x ?>" value="View Seat"></td>
                                </form>
                            </tr> 

                            <?php           
                            }
                            ?>
                    </tbody>
                </table>           
            </table>
        </div>
        <!-- END bus_schedule.arr time DESC -->
  </div>
</div>
</body>
</html>
<script>
    var return_date = <?php echo $return_null ?>
    
    if(return_date == 1)
    {
        document.getElementById("return_list").innerHTML = "<a href='home.php' style='color:black; text-decoration:none;'> ADD A RETURN DATE</a>";
    }
</script>

<?php 
    $_SESSION["qtybuses"] = $x;

    
    echo '<script>
        document.getElementById("row-dd").style.backgroundColor = "#ddd";
        </script>';      
    
?>

<script>

    var i = "<?php echo $x ?>";

    document.querySelectorAll("[class='totallist']").forEach(function(element) 
    {
        element.innerHTML ="<b style=color:black;>"+ i + "  Buses found</b>";
    });

</script>

<?php ob_end_flush(); ?>