<?php
// fetch_schedules.php

// Include your database connection file here
require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; 

if (isset($_GET['route_id'])) {
    $routeId = $_GET['route_id'];

    // Prepare and execute the query to fetch bus schedules for the selected route
    $get_schedule_id_sql = "SELECT bus_schedule_id, boarding, alighting FROM bus_schedule WHERE route_id = ?";
    $stmt = mysqli_prepare($conn, $get_schedule_id_sql);
    mysqli_stmt_bind_param($stmt, "i", $routeId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $schedules = array();

    // Fetch and store the bus schedules in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $schedule = array(
            'bus_schedule_id' => $row['bus_schedule_id'],
            'boarding' => $row['boarding'],
            'alighting' => $row['alighting']
        );
        $schedules[] = $schedule;
    }

    // Return the bus schedules in JSON format
    echo json_encode($schedules);
} else {
    // If route_id is not set, return an empty response
    echo json_encode([]);
}
?>
