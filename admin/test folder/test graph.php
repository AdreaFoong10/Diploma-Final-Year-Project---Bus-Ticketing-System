<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 
<?php


$bus_scheudule_check = "";
$total = 0;

/* Query the database to fetch the data
$sql = "SELECT total_pay, bus_schedule_id FROM payment";
$result = $conn->query($sql);

$dataPoints = array();
while($row_result = mysqli_fetch_assoc($result))
{
    $total_pay = $row_result['total_pay'];
    $bus_schedule_id = $row_result['bus_schedule_id'];

    $sql_payment_bus = "SELECT * FROM bus_schedule WHERE bus_schedule_id = $bus_schedule_id";
    $get_sql_payment_bus = $conn->query($sql_payment_bus);
    $row_result_bus = mysqli_fetch_assoc($get_sql_payment_bus);
    $bus_schedule_date = $row_result_bus['bus_schedule_date'];

    // Convert the date string to a Unix timestamp
    $timestamp = strtotime($bus_schedule_date) * 1000;

    if($bus_scheudule_check === "" )
    {
        $bus_scheudule_check = $bus_schedule_date;
        $total = $total_pay;
    }
    else
    {
        if($bus_scheudule_check === $bus_schedule_date)
        {
            $total = $total + $total_pay;
            $bus_scheudule_check = $bus_schedule_date;
        }
        else
        {
            $dataPoints[] = array("x" => $timestamp, "y" => $total_pay);
            
        }
    }

    
}
$dataPoints[] = array("x" => $timestamp, "y" => $total);*/
// SQL query to retrieve total payment and month
$query = "SELECT MONTH(bs.bus_schedule_date) AS month, SUM(p.total_pay) AS total_payment
          FROM bus_schedule bs
          JOIN payment p ON bs.bus_schedule_id = p.bus_schedule_id
          GROUP BY MONTH(bs.bus_schedule_date)";

$result = $conn->query($query);

$dataPoints = array();

// Fetching data from the result set
while ($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $totalPayment = $row['total_payment'];
    

    $monthName = date("F", mktime(0, 0, 0, $month, 1));

    $dataPoints[] = array("label" => $monthName, "y" => $totalPayment);
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Company Revenue by Year"
        },
        axisY: {
            title: "Revenue in RM",
            valueFormatString: "#,##0.##",
            prefix: "RM "
        },
        axisX: {
            valueFormatString: "MMMM"
        },
        data: [{
            type: "spline",
            markerSize: 5,
            xValueFormatString: "MMMM",
            yValueFormatString: "RM #,##0.##",
            xValueType: "dateTime",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>