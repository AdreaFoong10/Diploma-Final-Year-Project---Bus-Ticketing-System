<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div>
    <canvas id="myChart"></canvas>
  </div>

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


// Fetching data from the result set
while ($row = $result->fetch_assoc()) {
    $month = $row['month'];
    $totalPayment = $row['total_payment'];
    

    $monthName = date("F Y", mktime(0, 0, 0, $month, 1));

    $month_graph[] = $monthName;
    $total_graph[] = $totalPayment;
}

$conn->close();
?>

  <script>
    // <block:setup:1>
    const labels = <?php echo json_encode($month_graph) ?>;
    const data = {
      labels: labels,
      datasets: [{
        label: 'Total Revenue',
        data: <?php echo json_encode($total_graph) ?>,
        fill: true,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.2
      }]
    };
    // </block:setup>

    // <block:config:0>
    const config = {
      type: 'line',
      data: data,
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Custom Chart Title'
            }
        },
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Months',
              color: '#000',
              font: {
                size: 16
              }
            },
            ticks: {
              color: '#000'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Number of Revenue',
              color: '#000',
              font: {
                size: 16
              }
            },
            ticks: {
              color: '#000'
            }
          }
        }
      }
    };

    // </block:config>


    // <block:config:1>
    const myChart = new Chart(document.getElementById('myChart'), config);
    // </block:config>
  </script>
</body>
</html>
