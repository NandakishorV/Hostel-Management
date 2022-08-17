<?php
    $curr_gatepass = $_GET['gate_pass_no'];
    require_once './dbh-inc.php';
    $sql="SELECT `name`,hostel_no,room_no,from_date,to_date,from_time,to_time,reason FROM gatepass WHERE g_id = ? ;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i",$curr_gatepass);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    $rs=mysqli_fetch_assoc($resultData);
    require('../fpdf/fpdf.php');
  
    class PDF extends FPDF {
    
        // Page header
        function Header() {
            // Add logo to page
            $this->Image('img.png',10,8,33);
            
            // Set font family to Arial bold 
            $this->SetFont('Arial','B',20);
            
            // Move to the right
            $this->Cell(63);
            
            // Header
            $this->Cell(80,12,'Girls Hostel Gate Pass',0,0,'C');

            // Line break
            $this->Ln(20);
        }
    
        // Page footer
        function Footer() {
            
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            
            // Page number
            $this->Cell(0,10,'Page 1',0,0,'C');
        }
    }

    // Instantiation of FPDF class
    $pdf = new PDF('L','mm',array(150,200));
    // Define alias for number of pages
    $pdf->AddPage();    
    $pdf->SetFont('Times','',11);
    $pdf->Cell(35,10,'Gate Pass ID: '.$curr_gatepass.'',1,0);
    $pdf->Ln(11);
    $pdf->Cell(90,10,'Name: '.$rs["name"].'',1,0);
    $pdf->Cell(90,10,'Date: '.$rs["from_date"].'',1,0);
    $pdf->Ln(11);
    $pdf->Cell(90,10,'Hostel number: '.$rs["hostel_no"].'',1,0);
    $pdf->Cell(90,10,'Room Number: '.$rs["room_no"].'',1,0);
    $pdf->Ln(11);
    $pdf->Cell(45,10,'From Date: '.$rs["from_date"].'',1,0);
    $pdf->Cell(45,10,'From Time: '.$rs["from_time"].'',1,0);
    $pdf->Cell(45,10,'To Date: '.$rs["to_date"].'',1,0);
    $pdf->Cell(45,10,'To Time: '.$rs["to_time"].'',1,0);
    $pdf->Ln(11);
    $pdf->Cell(0,10,'Reason: '.$rs["reason"].'',1,0);
    $pdf->Output();
?>