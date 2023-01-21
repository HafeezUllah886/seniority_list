<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'List of Employees');
$sheet->setCellValue('A2', 'Ser');
$sheet->setCellValue('B2', 'Employee Name');
$sheet->setCellValue('C2', 'Father Name');
$sheet->setCellValue('D2', 'CNIC');
$sheet->setCellValue('E2', 'Date of Birth');
$sheet->setCellValue('F2', 'Personal Number');
$sheet->setCellValue('G2', 'Designation');
$sheet->setCellValue('H2', 'District');
$sheet->setCellValue('I2', 'Academic Qualification');
$sheet->setCellValue('J2', 'Professional Qualification');
$sheet->setCellValue('K2', 'Date of Appointment');
$sheet->setCellValue('L2', 'Date of Retirement');
$sheet->setCellValue('M2', 'Remaining Service');
$sheet->setCellValue('N2', 'Remarks');
include('connect.php');
                    $get = mysqli_query($con, "Select * from list ORDER BY doa, birth ASC");
                    $ser = 0;
                    while ( $row = mysqli_fetch_array($get) ) {
                      $ser += 1;
                      $dob = $row['birth'];
                      $doa = $row['doa'];
                      $dor = $row['dor'];
                      $dob1 = date("d-M-y", strtotime($dob));
                      $doa1 = date("d-M-y", strtotime($doa));
                      $dor1 = date("d-M-y", strtotime($dor));

                      $diff = abs(strtotime($row['dor']) - strtotime($row['doa']));
                      $years = floor($diff / (365*60*60*24));
                      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

                      $sheet->setCellValue('A'.$ser+2, $ser);
                        $sheet->setCellValue('B'.$ser+2, $row['name']);
                        $sheet->setCellValue('C'.$ser+2, $row['fname']);
                        $sheet->setCellValue('D'.$ser+2, $row['cnic']);
                        $sheet->setCellValue('E'.$ser+2, $dob1);
                        $sheet->setCellValue('F'.$ser+2, $row['pno']);
                        $sheet->setCellValue('G'.$ser+2, $row['desg']);
                        $sheet->setCellValue('H'.$ser+2, $row['dist']);
                        $sheet->setCellValue('I'.$ser+2, $row['aq']);
                        $sheet->setCellValue('J'.$ser+2, $row['pq']);
                        $sheet->setCellValue('K'.$ser+2, $doa1);
                        $sheet->setCellValue('L'.$ser+2, $dor1);
                        $sheet->setCellValue('M'.$ser+2, $years .'Y '. $months . 'M '. $days . 'D');
                        $sheet->setCellValue('N'.$ser+2, $row['rem']);

                    }
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename=data.xlsx');
                    $sheet->mergeCells('A1:N1');
                    $writer->save('php://output');
                    
?>
<script>
  window.open("index.php","_self");
</script>
