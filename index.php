<?php
// Tumhara Naam — Roll No: XXXX

$clinic_name = "City Care Clinic";
$established_year = 2005;
$consultation_fee = 500.00;
$is_open = true;

$current_year = date("Y");
$years_operating = $current_year - $established_year;

echo "<h2>Welcome to " . $clinic_name . "</h2>";
echo "<p>Established: " . $established_year . " (" . $years_operating . " years in service)</p>";
echo "<p>Consultation Fee: Rs. " . number_format($consultation_fee, 2) . "</p>";

if ($is_open) {
    echo "<p style='color:green;'>Status: Clinic is OPEN today — Walk-ins Welcome</p>";
} else {
    echo "<p style='color:red;'>Status: Clinic is CLOSED today — Please call ahead</p>";
}
?>