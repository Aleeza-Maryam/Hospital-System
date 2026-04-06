
<!-- Aleeza Maryam #232201025 -->
<?php


$doctors = [
  ["name"=>"Dr. Ahmed Khan",   "specialization"=>"Cardiology",   "days"=>["Monday","Wednesday","Friday"],           "fee"=>1500, "room"=>"Room 204"],
  ["name"=>"Dr. Sara Ali",     "specialization"=>"Pediatrics",   "days"=>["Tuesday","Wednesday","Thursday"],        "fee"=>1200, "room"=>"Room 101"],
  ["name"=>"Dr. Usman Raza",   "specialization"=>"General",      "days"=>["Monday","Tuesday","Wednesday"],          "fee"=>800,  "room"=>"Room 305"],
  ["name"=>"Dr. Nadia Shah",   "specialization"=>"Dermatology",  "days"=>["Thursday","Friday"],                     "fee"=>1800, "room"=>"Room 210"],
  ["name"=>"Dr. Kamran Malik", "specialization"=>"Orthopedics",  "days"=>["Monday","Wednesday","Saturday"],         "fee"=>2000, "room"=>"Room 402"],
];

function getDoctorsByDay($doctors, $day) {
  $result = [];
  foreach ($doctors as $doc) {
    if (in_array($day, $doc['days'])) $result[] = $doc;
  }
  return $result;
}

$fees = array_column($doctors, 'fee');
$avg_fee = array_sum($fees) / count($fees);
$wed_doctors = getDoctorsByDay($doctors, "Wednesday");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Schedule</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; padding: 40px 20px; }
    .container { max-width: 850px; margin: auto; }
    h2 { color: #03285f; margin: 28px 0 14px; }
    h2:first-child { margin-top: 0; }
    table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
    thead { background: #0a1470; color: white; }
    th { padding: 13px 16px; text-align: left; font-size: 13px; font-weight: 600; }
    td { padding: 12px 16px; font-size: 14px; border-bottom: 1px solid #f0f0f0; color: #333; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: #fff8f5; }
    .days-cell { color: #666; font-size: 13px; }
    .fee-cell { font-weight: 600; color: #2e7d32; }
    .avg-box {
      margin-top: 28px; background: white; border-radius: 12px;
      padding: 20px 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.08);
      display: flex; justify-content: space-between; align-items: center;
    }
    .avg-box .label { color: #555; font-size: 15px; }
    .avg-box .amount { color: #1a73e8; font-size: 22px; font-weight: 700; }
  </style>
</head>
<body>
<div class="container">

  <h2>All Doctors — Schedule</h2>
  <table>
    <thead>
      <tr><th>Name</th><th>Specialization</th><th>Available Days</th><th>Fee</th><th>Room</th></tr>
    </thead>
    <tbody>
      <?php foreach ($doctors as $doc): ?>
      <tr>
        <td><?php echo $doc['name']; ?></td>
        <td><?php echo $doc['specialization']; ?></td>
        <td class="days-cell"><?php echo implode(", ", $doc['days']); ?></td>
        <td class="fee-cell">Rs. <?php echo $doc['fee']; ?></td>
        <td><?php echo $doc['room']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Doctors Available on Wednesday</h2>
  <table>
    <thead>
      <tr><th>Name</th><th>Specialization</th><th>Fee</th><th>Room</th></tr>
    </thead>
    <tbody>
      <?php foreach ($wed_doctors as $doc): ?>
      <tr>
        <td><?php echo $doc['name']; ?></td>
        <td><?php echo $doc['specialization']; ?></td>
        <td class="fee-cell">Rs. <?php echo $doc['fee']; ?></td>
        <td><?php echo $doc['room']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="avg-box">
    <span class="label">Average Consultation Fee (all doctors)</span>
    <span class="amount">Rs. <?php echo number_format($avg_fee, 2); ?></span>
  </div>

</div>
</body>
</html>