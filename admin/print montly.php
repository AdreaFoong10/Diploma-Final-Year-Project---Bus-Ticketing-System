<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php';
require('fpdf185/fpdf.php');

$admin_profile_usrname = $_SESSION["admin_user"];



//Graph Data 
$query_graph = "SELECT YEAR(payment_date) AS payment_year, MONTH(payment_date) AS payment_month, SUM(total_pay) AS total_payment
FROM payment
GROUP BY payment_year, payment_month
ORDER BY payment_year, payment_month ASC";
/*$query_graph = "SELECT
MONTH(payment_date) AS month,
CASE
    WHEN COUNT(*) > 1 THEN MAX(total_pay)
    ELSE total_pay
END AS total_payment
FROM payment
GROUP BY booking_no, month";*/

$result_graph = $conn->query($query_graph);
$check_booking_no ="";
$check_month ="";
$check_totalPayment = "";

// Fetching data from the result set
while ($row_graph = $result_graph->fetch_assoc()) {
    $month = $row_graph['payment_month'];
    $year = $row_graph['payment_year'];
    $totalPayment = $row_graph['total_payment'];

    $monthYear = $month . '-' . $year;

    $month_graph[] = $monthYear;
    $total_graph[] = $totalPayment;
    
    /*if($check_month === "")
    {
        $check_month = $month;
        $check_totalPayment = $totalPayment;
        
    }
    else if($check_month === $month)
    {
        $totalPayment = $totalPayment + $check_totalPayment;
        $check_month = $month;
        $check_totalPayment = $totalPayment;
        
        
    }
    else if($check_month != $month)
    {*/
        
        /*

        $monthName_check = date("F Y", mktime(0, 0, 0, $check_month, 1));
        $month_graph[] = $monthName_check;
        $total_graph[] = $check_totalPayment;
        $check_month = $month;
        $check_totalPayment = $totalPayment;*/

    //}
    
}
/* if ($check_month != "") {
    $monthName_check = date("F Y", mktime(0, 0, 0, $check_month, 1));
    $month_graph[] = $monthName_check;
    $total_graph[] = $check_totalPayment;
}*/



$length = count($total_graph);
$total_get_month = 0;
for ($i = 0; $i < $length; $i++) 
{
    $total_get_month = $total_get_month + $total_graph[$i];
}

class PDF extends FPDF
{
    // Header function
    function Header()
    {
        // Select font
        $this->SetFont('Arial', 'B', 15);
        // Set title
        $this->Cell(0, 10, 'Monthly Revenue Report', 0, 1, 'C');
        // Line break
        $this->Ln(10);
    }

    // Footer function
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Select font
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Content function
    function Content($months, $revenues, $admin_profile_usrname, $total_get_month)
    {
        
        // Select font
        $this->SetFont('Arial', '', 12);

        // Monthly revenue title
        $this->SetFont('Arial', '', 14);
        $this->Cell(0, 10, 'Monthly Revenue', 0, 1, 'L');
        $this->Cell(0, 5, '', 'B', 1, 'C'); // Cell with bottom border (acts as the line)
        // Monthly revenue data
        $this->Cell(0, 10, 'Month / Date', 0, 0, 'L');
        $this->Cell(0, 10, 'Revenue / RM', 0, 1, 'R');
        $this->Ln(5);
        $this->SetFont('Arial', '', 12);
        for ($i = 0; $i < count($months); $i++) {
            $this->Cell(40, 5, $months[$i], 0, 0, 'L');
            $this->Cell(140, 5, number_format($revenues[$i], 2), 0, 1, 'R');
            $this->Ln(5);
        }

        // Total revenue line
        $this->Cell(150, 0, '', 0, 0, 'L');
        $this->Cell(0, 0, '', 'B', 1, 'C'); // Cell with bottom border (acts as the line)
        $this->Ln(5);
        
        $this->Cell(40, 5, "Total Revenue : ", 0, 0, 'L');
        $this->Cell(140, 5,number_format($total_get_month, 2), 0, 1, 'R');
        $this->Ln(5);


        $this->Cell(0, 0, '', 'B', 1, 'C'); // Cell with bottom border (acts as the line)
        $this->Ln(5);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 13, 'Printed by '.$admin_profile_usrname,0,0, 'L');
        
    }
}

$pdf = new PDF();
$pdf->SetTitle('Monthly Revenue Report');
$pdf->SetAuthor('CometBus');
$pdf->AddPage();

// CSS style for header and footer
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'CometBus', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);

// Content
$pdf->Content($month_graph, $total_graph, $admin_profile_usrname, $total_get_month);

$pdf->Output('D', 'Monthly_Revenue_Report.pdf', 'A4');
?>
